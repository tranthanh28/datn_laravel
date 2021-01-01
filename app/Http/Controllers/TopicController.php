<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\User;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Topic $topic)
    {
        $user_id = Auth::user()->id;
        $array = User::find($user_id)->topics()->get();
        $register=true;
        foreach($array as $arr){
            if($arr->id == $topic->id){
                $register=false;
                break;
            }
        }
        return view('frontend.topic', ['topic' => $topic,'register'=> $register]);
    }
}
