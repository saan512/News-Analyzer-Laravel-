<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {
        // $data = DB::table('sentiment_results')->get();
        // return view('user.results', ['data' => $data]);
        
        // get DawnNewsChannel from sentiment_results table
        $dawn_latest = DB::table('sentiment_results')->groupBy('channel')->where('channel', 'dawn_latest')->pluck('channel');
        // $ary_latest = DB::table('sentiment_results')->groupBy('ary_latest')->pluck('channel');
        // $tribune_latest = DB::table('sentiment_results')->groupBy('tribune_latest')->pluck('channel');
        // get sentiments from sentiment_results table
        $dawn_sentiments = DB::table('sentiment_results')->where('channel', 'dawn_latest')->pluck('sentiments');
        // get scraped_data from sentiment_results table
        $dawn_scraped_data = DB::table('sentiment_results')->where('channel', 'dawn_latest')->pluck('scraped_data');

        $dawn_positive = DB::table('sentiment_results')->where('channel', 'dawn_latest')->where('sentiments', 'Positive')->count();
        $dawn_negative = DB::table('sentiment_results')->where('channel', 'dawn_latest')->where('sentiments', 'Negative')->count();
        $dawn_neutral = DB::table('sentiment_results')->where('channel', 'dawn_latest')->where('sentiments', 'Neutral')->count();
        $dawn_all = DB::table('sentiment_results')->where('channel', 'dawn_latest')->count();
        
        // get AryNewsChannel from sentiment_results table
        // get sentiments from sentiment_results table
        $ary_sentiments = DB::table('sentiment_results')->where('channel', 'ary_world')->pluck('sentiments');
        // get scraped_data from sentiment_results table
        $ary_scraped_data = DB::table('sentiment_results')->where('channel', 'ary_world')->pluck('scraped_data');

        // counting the number of sentiments
        $ary_positive = DB::table('sentiment_results')->where('channel', 'ary_world')->where('sentiments', 'Positive')->count();
        $ary_negative = DB::table('sentiment_results')->where('channel', 'ary_world')->where('sentiments', 'Negative')->count();
        $ary_neutral = DB::table('sentiment_results')->where('channel', 'ary_world')->where('sentiments', 'Neutral')->count();
        $ary_all = DB::table('sentiment_results')->where('channel', 'ary_world')->count();


        //Urdu channel data managment
        // get channel from sentiment_results table
        $channel_urdu = DB::table('sentiment_results_urdus')->where('channel', 'aryu_world')->pluck('channel');
        // get sentiments from sentiment_results table
        $sentiments_urdu = DB::table('sentiment_results_urdus')->where('channel', 'aryu_world')->pluck('sentiments');
        // get scraped_data from sentiment_results table
        $scraped_data_urdu = DB::table('sentiment_results_urdus')->where('channel', 'aryu_world')->pluck('scraped_data');

        // counting the number of sentiments
        $positive_urdu = DB::table('sentiment_results_urdus')->where('channel', 'aryu_world')->where('sentiments', 'Positive')->count();
        $negative_urdu = DB::table('sentiment_results_urdus')->where('channel', 'aryu_world')->where('sentiments', 'Negative')->count();
        $neutral_urdu = DB::table('sentiment_results_urdus')->where('channel', 'aryu_world')->where('sentiments', 'Neutral')->count();
        $all_urdu = DB::table('sentiment_results_urdus')->where('channel', 'aryu_world')->count();



        // return view('user.results', ['channel' => $channel, 'sentiments' => $sentiments, 'scraped_data' => $scraped_data]);
        return view('dashboards.users.charts', compact('dawn_latest', 'dawn_sentiments', 'dawn_scraped_data', 'dawn_positive', 'dawn_negative', 'dawn_neutral', 'dawn_all', 'ary_sentiments', 'ary_scraped_data', 'ary_positive', 'ary_negative', 'ary_neutral', 'ary_all', 'channel_urdu', 'sentiments_urdu', 'scraped_data_urdu', 'positive_urdu', 'negative_urdu', 'neutral_urdu', 'all_urdu'));
    }

    
}