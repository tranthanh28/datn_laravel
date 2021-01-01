<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
class LessonController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('Lesson');
    }
    public function index(Lesson $lesson)
    {
        return view('frontend.lesson', ['lesson' => $lesson]);
    }
}
