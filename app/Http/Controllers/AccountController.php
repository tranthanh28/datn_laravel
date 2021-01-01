<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Topic;
use App\Http\Requests\DoiMKRequest;
use Illuminate\Support\Facades\Hash;
class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        return view('frontend.account.ThongTinTK', ['user' => $user]);
    }
    public function DoiMK()
    {
        $user = Auth::user();
        return view('frontend.account.DoiMK', ['user' => $user]);
    }
    public function updateMK(DoiMKRequest $request)
    {
        $user = User::find(Auth::id());
        if(Hash::check($request->oldpass, $user->password)){
            $user->password = Hash::make($request->newpass);
            $user->save();
            return redirect()->back()->with('success','Password succesfully update');
        }else{
            return redirect()->back()->with('error1','Old password does not match.');
        }
        return view('frontend.account.DoiMK', ['user' => $user]);
    }
    public function KhoaHocDK()
    {
        $user = Auth::user();
        return view('frontend.account.KhoaHocDK', ['user' => $user]);
    }
    public function showSuaTT()
    {
        $user = Auth::user();
        return view('frontend.account.SuaTT', ['user' => $user]);
    }
    public function SuaTT(Request $request)
    {

        $user_id = Auth::user()->id;
        $user = User::find($user_id);
         $user->address = $request->input('diachi');
         $user->FullName = $request->input('hoten');
         $user->phone = $request->input('sdt');
         $user->email = $request->input('email');
         $user->save();

        return view('frontend.account.ThongTinTK', ['user' => $user]);
    }
    public function DangKy(Topic $topic)
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        if($user->wallet >= $topic->cost){
            $user->wallet = $user->wallet - $topic->cost;
            $user->save();
            $user->topics()->attach($topic);
            $nap = false;
        }
        else{
            $nap = true;
        }
        return view('frontend.DKkhoaHoc', ['nap'=>$nap]);
    }

}
