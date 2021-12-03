<?php

namespace App\Http\Resources;

use App\Models\Company;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        /** @var $company Company */
        $company = $this->resource;

        return [
            'id' => $company->id,
            'name' => $company->name,
            'email' => $company->email,
            'weblink' => $company->weblink,
            'logo' => $company->logo ? asset('storage/company/logos/' . $company->logo) : asset('storage/images/no-image.jpg')
        ];
    }
}
