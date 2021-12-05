<?php

namespace Tests\Unit;

use App\Models\Company;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    public function test_can_create_company()
    {
        $data = [
            'email' => $this->faker->email,
            'logo' => $this->faker->image('public/storage/company/logos', 100, 100, null, false),
            'weblink' => $this->faker->url
        ];

        $this->post(route('companies.store'), $data)
            ->assertStatus(422);

        $data['name'] = $this->faker->name;

        $this->post(route('companies.store'), $data)
            ->assertStatus(201);
    }

    public function test_can_update_company()
    {
        $company = factory(Company::class)->create();

        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'logo' => $this->faker->image('public/storage/company/logos', 100, 100, null, false),
            'weblink' => $this->faker->url
        ];

        $this->put(route('companies.update', $company->id), $data)
            ->assertStatus(200);
    }

    public function test_can_show_company()
    {
        $company = factory(Company::class)->create();

        $this->get(route('companies.show', $company->id))
            ->assertStatus(200);
    }

    public function test_can_delete_company()
    {
        $company = factory(Company::class)->create();

        $this->delete(route('companies.delete', $company->id))
            ->assertStatus(204);
    }

    public function test_can_list_companies()
    {
        $companies = factory(Company::class, 2)->create()->map(function ($company) {
            return $company->only(['id', 'name']);
        });

        $this->get(route('companies.list'))
            ->assertStatus(200)
            ->assertJson($companies->toArray())
            ->assertJsonStructure([
                '*' => ['id', 'name']
            ]);
    }
}
