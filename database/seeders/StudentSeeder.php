<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i <= 100; $i++){
            $faker = Faker::create();
            $student = new Student();
            $student->roll_number = $faker->rollNumber;
            $student->image = '';
            $student->name = $faker->name;
            $student->gender = "";
            $student->standard_id = 1;
            $student->section_id = 1;
            $student->parents = $faker->name;
            $student->address_id = 1;
            $student->date_of_birth = $faker->date;
            $student->phone = $faker->phoneNumber;
            $student->email = $faker->email;
            $student->save();
        }
    }
}
