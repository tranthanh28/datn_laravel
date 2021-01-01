<?php

use Illuminate\Database\Seeder;
use App\Models\lesson;
class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lesson = new lesson;
        $lesson->Namelesson='';
        $lesson->topic_id='';
        $lesson->url='';
        $lesson->save();

    }
}
