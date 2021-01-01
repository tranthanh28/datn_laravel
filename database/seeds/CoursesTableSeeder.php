<?php

use Illuminate\Database\Seeder;
use App\Models\course;
class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = new course;
        $course->NameCourse='Khóa lớp 10';
        $course->save();
        $course = new course;
        $course->NameCourse='Khóa lớp 11';
        $course->save();
        $course = new course;
        $course->NameCourse='Khóa lớp 12';
        $course->save();
        $course = new course;
        $course->NameCourse='Khóa tiếng anh';
        $course->save();
    }
}
