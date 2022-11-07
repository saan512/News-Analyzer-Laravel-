<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $sentiments_english = DB::table('sentiment_results')->pluck('sentiments');
        // get scraped_data from sentiment_results table
        $scraped_data_english = DB::table('sentiment_results')->pluck('scraped_data');

        // get sentiments from sentiment_results_urdus table
        $sentiments_urdus = DB::table('sentiment_results_urdus')->pluck('sentiments');
        // get scraped_data from sentiment_results_urdus table
        $scraped_data_urdus = DB::table('sentiment_results_urdus')->pluck('scraped_data');

        return view('dashboards.users.result', compact('sentiments_english' , 'scraped_data_english', 'sentiments_urdus', 'scraped_data_urdus'));
    }
    }