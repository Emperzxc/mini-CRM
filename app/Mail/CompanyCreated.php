<?php
namespace App\Mail;

use App\Models\Company;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompanyCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function build()
    {
        return $this->view('emails.company_created')
                    ->subject('New Company Created')
                    ->with([
                        'companyName' => $this->company->name,
                        'companyEmail' => $this->company->email,
                        'companyWebsite' => $this->company->website,
                    ]);
    }
}

