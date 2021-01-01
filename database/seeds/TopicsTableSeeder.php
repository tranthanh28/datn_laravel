<?php

use Illuminate\Database\Seeder;
use App\Models\topic;
class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topic = new topic;
        $topic->course_id='';
        $topic->teacher_id='';
        $topic->NameTopic='';
        $topic->cost='';
        $topic->address_Pic='';
        $topic->save();
    }
}
