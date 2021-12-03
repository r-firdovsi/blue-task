<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $perPage = 10;

    public function __construct(Request $request)
    {
        $request->validate([
            'per_page' => 'sometimes|required|numeric|max:100'
        ]);

        $this->perPage = $request->query('per_page', 15);
    }
}
