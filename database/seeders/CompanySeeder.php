<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Employee;

class CompanySeeder extends Seeder
{
    public function run()
    {
        // Create 10 companies
        $companies = Company::factory(10)->create();

        foreach ($companies as $company) {
            Employee::factory(10)->create([
                'company_id' => $company->_id,
            ]);
        }
    }
}
