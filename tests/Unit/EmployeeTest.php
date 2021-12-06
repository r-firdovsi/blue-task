<?php

namespace Tests\Unit;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    public function test_can_create_employee()
    {
        $user = factory(User::class)->create();
        $company = factory(Company::class)->create();

        $data = [
            'company_id' => $company->id,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber
        ];

        $this->actingAs($user)->post(route('employees.store'), $data)
            ->assertStatus(302);

        $data['firstname'] = $this->faker->firstName;
        $data['lastname'] = $this->faker->lastName;

        $this->actingAs($user)->post(route('employees.store'), $data)
            ->assertRedirect('/employees');
    }

    public function test_can_update_employee()
    {
        $user = factory(User::class)->create();
        $employee = factory(Employee::class)->create();
        $company = factory(Company::class)->create();

        $data = [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'company_id' => $company->id,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber
        ];

        $this->actingAs($user)->put(route('employees.update', $employee->id), $data)
            ->assertRedirect('/employees');
    }

    public function test_can_show_employee()
    {
        $user = factory(User::class)->create();
        $employee = factory(Employee::class)->create();

        $this->actingAs($user)->get(route('employees.show', $employee->id))
            ->assertStatus(200);
    }

    public function test_can_delete_employee()
    {
        $user = factory(User::class)->create();
        $employee = factory(Employee::class)->create();

        $this->actingAs($user)->delete(route('employees.destroy', $employee->id))
            ->assertRedirect('/employees');
    }

    public function test_can_list_employees()
    {
        $user = factory(User::class)->create();
        factory(Employee::class, 2)->create();

        $this->actingAs($user)->get(route('employees.list'))
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'company', 'firstname', 'lastname', 'email', 'phone']
                ]
            ]);
    }
}
