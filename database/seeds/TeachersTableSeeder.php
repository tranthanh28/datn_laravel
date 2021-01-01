<?php

use Illuminate\Database\Seeder;
use App\Models\lesson;
use App\Models\teacher;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher = new teacher;
        $teacher->nameTeacher = '';
        $teacher->save();
    }
}
