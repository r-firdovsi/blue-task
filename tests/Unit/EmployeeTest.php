<?php

namespace Tests\Unit;

use App\Models\Company;
use App\Models\Employee;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    public function test_can_create_employee()
    {
        $company = factory(Company::class)->create();

        $data = [
            'company_id' => $company->id,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber
        ];

        $this->post(route('employees.store'), $data)
            ->assertStatus(422);

        $data['firstname'] = $this->faker->firstName;
        $data['lastname'] = $this->faker->lastName;

        $this->post(route('employees.store'), $data)
            ->assertStatus(201);
    }

    public function test_can_update_employee()
    {
        $employee = factory(Employee::class)->create();
        $company = factory(Company::class)->create();

        $data = [
            'company_id' => $company->id,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber
        ];

        $this->put(route('employees.update', $employee->id), $data)
            ->assertStatus(422);

        $data['firstname'] = $this->faker->firstName;
        $data['lastname'] = $this->faker->lastName;

        $this->put(route('employees.update', $employee->id), $data)
            ->assertStatus(200);
    }

    public function test_can_show_employee()
    {
        $employee = factory(Employee::class)->create();

        $this->get(route('employees.show', $employee->id))
            ->assertStatus(200);
    }

    public function test_can_delete_employee()
    {
        $employee = factory(Employee::class)->create();

        $this->delete(route('employees.delete', $employee->id))
            ->assertStatus(204);
    }

    public function test_can_list_employees()
    {
        $employees = factory(Employee::class, 2)->create()->map(function ($employee) {
            return $employee->only(['id', 'firstname', 'lastname']);
        });

        $this->get(route('employees.list'))
            ->assertStatus(200)
            ->assertJson($employees->toArray())
            ->assertJsonStructure([
                '*' => ['id', 'firstname', 'lastname']
            ]);
    }
}
