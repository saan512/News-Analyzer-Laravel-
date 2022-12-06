<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    use ResetsPasswords;

    function index()
    {
        // return redirect()->route('dashboards.users.charts');
        // return redirect()->route('user.dashboard');
        return view('dashboards.users.index');
        // return(redirect()->view('/dashboard/users'));
        // return view('dashboards.users.charts');
    }

    // function Homeee()
    // {
    //     return view('dashboards.users.index');
    // }
    function profile()
    {
        
        return view('dashboards.users.profile');
    }
    function settings()
    {
        return view('dashboards.users.settings');
    }

    function news()
    {
        return view('dashboards.users.news_analysis');
    }
    // public function results()
    // {
    //     return view('dashboards.users.charts');
    // }
    public function results()
    {
        $sentiments_english = DB::table('sentiment_results')->pluck('sentiments')->sortByDesc('id');
        // get scraped_data from sentiment_results table
        $scraped_data_english = DB::table('sentiment_results')->pluck('scraped_data')->sortByDesc('id');

        // get sentiments from sentiment_results_urdus table
        $sentiments_urdus = DB::table('sentiment_results_urdus')->pluck('sentiments')->sortByDesc('id');
        // get scraped_data from sentiment_results_urdus table
        $scraped_data_urdus = DB::table('sentiment_results_urdus')->pluck('scraped_data')->sortByDesc('id');

        return view('dashboards.users.result', compact('sentiments_english' , 'scraped_data_english', 'sentiments_urdus', 'scraped_data_urdus'));
    }

    function updateInfoUser(Request $request , $id){
        dd("update-profile-info");
        $user = User::find(auth()->user()->$id);
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();
        return view('dashboards.users.settings');
   }

   function changePassword(Request $request){
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|string|min:6|confirmed',
    ]);
    $admin = User::find(auth()->user()->id);
    if (Hash::check($request->current_password, $admin->password)) {
        $admin->password = Hash::make($request->new_password);
        $admin->save();
        return view('dashboards.admins.settings');
    } else {
        return redirect()->back()->with('error', 'Current password does not match!');
    }
}
    }