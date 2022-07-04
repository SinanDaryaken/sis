<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $people = Person::all()->shuffle();
        $data = [];
        $date = Carbon::now()->format('Ymd');

        foreach ($people as $person) {
            $data[] = [
                'person_id' => $person->id,
                'student_number' => $date . $person->id,
                'uid' => $person->short_name . $person->id . $date,
            ];
        }

        Student::insert($data);
    }
}
