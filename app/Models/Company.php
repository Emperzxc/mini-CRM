<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Eloquent
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'logo', 'website'];

    // One-to-Many relationship
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
