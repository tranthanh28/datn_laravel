<?php

namespace App\Http\Controllers;
use App\Models\Topic;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $topic = Topic::find(1);
        return view('frontend.lesson')->with('topic',$topic->teacher->nameTeacher);
    }
}
