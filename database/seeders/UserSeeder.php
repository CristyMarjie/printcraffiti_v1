<?php

namespace Database\Seeders;

use App\Models\People;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $persons = [
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'address1' => 'Davao'
            ],
            [
                'first_name' => 'Staff',
                'last_name' => 'User',
                'address1' => 'Davao'
            ],
            [
                'first_name' => 'Customer',
                'last_name' => 'User',
                'address1' => 'Davao'
            ]
        ];
        // $person = People::create([
        //     'first_name' => 'Admin',
        //     'last_name' => 'User',
        //     'address1' => 'bajada'
        // ]);

        // $person->user()->create([
        //     'email' => 'Admin@dsgsonsgroup.com',
        //     'password' => Hash::make('admin123'),
        //     'role_id' => 1
        // ]);
        foreach ($persons as $person) {
            $new_person = People::create($person);
            $new_person->user()->create([
                'email' => strtolower($person['first_name']) . '@gmail.com',
                'password' => Hash::make(strtolower($person['first_name']) . '123'),
                'role_id' => array_search($person['first_name'], array_column($persons, 'first_name')) + 1
            ]);
            
        }


    }
}
