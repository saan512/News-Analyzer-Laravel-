<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    

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
        $sentiments_english = DB::table('sentiment_results')->pluck('sentiments')->sortByDesc('id')->take(20);
        // get scraped_data from sentiment_results table
        $scraped_data_english = DB::table('sentiment_results')->pluck('scraped_data')->sortByDesc('id')->take(20);

        // get sentiments from sentiment_results_urdus table
        $sentiments_urdus = DB::table('sentiment_results_urdus')->pluck('sentiments')->sortByDesc('id')->take(20);
        // get scraped_data from sentiment_results_urdus table
        $scraped_data_urdus = DB::table('sentiment_results_urdus')->pluck('scraped_data')->sortByDesc('id')->take(20);

        return view('dashboards.users.result', compact('sentiments_english' , 'scraped_data_english', 'sentiments_urdus', 'scraped_data_urdus'));
    }

    function updateInfoUser(Request $request){
        Auth::user()->name = $request->name;
        Auth::user()->email = $request->email;
        if($request->password) {
            Auth::user()->password = Hash::make($request->password);
            }
        Auth::user()->save();
        return redirect()->back()->with('success', 'Profile updated successfully!');
        // return view('dashboards.users.settings');
   }

   
    }