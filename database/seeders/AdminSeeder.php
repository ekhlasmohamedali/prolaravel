<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Role;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'name'           => 'super_admin',
            'email'          => 'super_admin@app.com',
            'national_id'    => '12345678901234',
            'password'       => bcrypt(123),
            'phone'          => '01286680617',
            'image'          => 'admin.jpg',
            'remember_token' => Str::random(10),
        ]);

        $admin->attachRole('admin');

        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $admin = Admin::create([
                'name'           => $faker->unique()->firstName(),
                'email'          => $faker->unique()->safeEmail,
                'national_id'    => $faker->ean13(),
                'password'       => bcrypt(123),
                'phone'          => $faker->unique()->phoneNumber(),
                'image'          => $faker->image(public_path('uploads/images/admins'), 150, 150, 'users', false),
                'remember_token' => Str::random(10),
                'created_by'     => 1,
            ]);

            $admin->attachRole('manager');
        }
    }
}
