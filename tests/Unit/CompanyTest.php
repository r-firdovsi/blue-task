<?php

namespace Tests\Unit;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    public function test_can_create_company()
    {
        $user = factory(User::class)->create();

        $data = [
            'email' => $this->faker->email,
            'weblink' => $this->faker->url
        ];

        $this->actingAs($user)->post(route('companies.store'), $data)
            ->assertStatus(302);

        $data['name'] = $this->faker->name;

        $this->actingAs($user)->post(route('companies.store'), $data)
            ->assertRedirect('/companies');
    }

    public function test_can_update_company()
    {
        $user = factory(User::class)->create();
        $company = factory(Company::class)->create();

        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'weblink' => $this->faker->url
        ];

        $this->actingAs($user)->put(route('companies.update', $company->id), $data)
            ->assertRedirect('/companies');
    }

    public function test_can_show_company()
    {
        $user = factory(User::class)->create();
        $company = factory(Company::class)->create();

        $this->actingAs($user)->get(route('companies.show', $company->id))
            ->assertStatus(200);
    }

    public function test_can_delete_company()
    {
        $user = factory(User::class)->create();
        $company = factory(Company::class)->create();

        $this->actingAs($user)->delete(route('companies.destroy', $company->id))
            ->assertRedirect('/companies');
    }

    public function test_can_list_companies()
    {
        $user = factory(User::class)->create();
        $companies = factory(Company::class, 2)->create();

        $this->actingAs($user)->get(route('companies.list'))
            ->assertStatus(200)
            ->assertJson($companies->toArray())
            ->assertJsonStructure([
                'data' => [
                    ['id', 'name', 'email', 'weblink', 'logo']
                ],
                'links' => [
                    'first', 'last', 'prev', 'next'
                ],
                'meta' => [
                    'current_page', 'from', 'last_page', 'path', 'per_page', 'to', 'total'
                ]
            ]);
    }
}
