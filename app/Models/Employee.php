<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
