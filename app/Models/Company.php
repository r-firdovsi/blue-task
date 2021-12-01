<?php

namespace App\Models;

use App\Http\Traits\FileUploadScopes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use FileUploadScopes;

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
