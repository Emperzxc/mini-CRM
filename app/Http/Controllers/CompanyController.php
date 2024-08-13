<?php
namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Resources\CompanyResource;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Mail\CompanyCreated;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $query = Company::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('website', 'like', '%' . $search . '%');
        }
    
        $companies = $query->paginate(10);
        
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }
    public function store(StoreCompanyRequest $request)
    {
        $data = $request->validated();
    
        // Handle file upload if logo is present
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('public/logos');
        }
    
        // Create the company instance
        $company = Company::create($data);
    
        // Send email notification
        Mail::to('recipient@example.com')->send(new CompanyCreated($company));
    
        // Redirect or return a response
        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }
        public function show(Company $company)
    {
        return view('companies.index', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $data = $request->validated();

        // Handle file upload if logo is present
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('public/logos');
        }

        $company->update($data);

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
