<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {
        //=============================================================================================================================================
        //Dawn English
        //Dawn latest English
        $dawn_latest = DB::table('sentiment_results')->groupBy('channel')->where('channel', 'dawn_latest')->pluck('channel');
        $dawn_latest_sentiments = DB::table('sentiment_results')->where('channel', 'dawn_latest')->pluck('sentiments');
        // get scraped_data from sentiment_results table
        $dawn_latest_data = DB::table('sentiment_results')->where('channel', 'dawn_latest')->pluck('scraped_data');

        $dawn_latest_positive = DB::table('sentiment_results')->where('channel', 'dawn_latest')->where('sentiments', 'Positive')->count();
        $dawn_latest_negative = DB::table('sentiment_results')->where('channel', 'dawn_latest')->where('sentiments', 'Negative')->count();
        $dawn_latest_neutral = DB::table('sentiment_results')->where('channel', 'dawn_latest')->where('sentiments', 'Neutral')->count();
        $dawn_latest_all = DB::table('sentiment_results')->where('channel', 'dawn_latest')->count();
        
        //Dawn Business English
        $dawn_business = DB::table('sentiment_results')->groupBy('channel')->where('channel', 'dawn_business')->pluck('channel');
        $dawn_business_sentiments = DB::table('sentiment_results')->where('channel', 'dawn_business')->pluck('sentiments');
        // get scraped_data from sentiment_results table
        $dawn_business_data = DB::table('sentiment_results')->where('channel', 'dawn_business')->pluck('scraped_data');

        $dawn_business_positive = DB::table('sentiment_results')->where('channel', 'dawn_business')->where('sentiments', 'Positive')->count();
        $dawn_business_negative = DB::table('sentiment_results')->where('channel', 'dawn_business')->where('sentiments', 'Negative')->count();
        $dawn_business_neutral = DB::table('sentiment_results')->where('channel', 'dawn_business')->where('sentiments', 'Neutral')->count();
        $dawn_business_all = DB::table('sentiment_results')->where('channel', 'dawn_business')->count();
        
        //Dawn World English
        $dawn_world = DB::table('sentiment_results')->groupBy('channel')->where('channel', 'dawn_world')->pluck('channel');
        $dawn_world_sentiments = DB::table('sentiment_results')->where('channel', 'dawn_world')->pluck('sentiments');
        // get scraped_data from sentiment_results table
        $dawn_world_data = DB::table('sentiment_results')->where('channel', 'dawn_world')->pluck('scraped_data');

        $dawn_world_positive = DB::table('sentiment_results')->where('channel', 'dawn_world')->where('sentiments', 'Positive')->count();
        $dawn_world_negative = DB::table('sentiment_results')->where('channel', 'dawn_world')->where('sentiments', 'Negative')->count();
        $dawn_world_neutral = DB::table('sentiment_results')->where('channel', 'dawn_world')->where('sentiments', 'Neutral')->count();
        $dawn_world_all = DB::table('sentiment_results')->where('channel', 'dawn_world')->count();

        // ============================================================================================================================================
        //Ary World English
        $ary_world_sentiments = DB::table('sentiment_results')->where('channel', 'ary_world')->pluck('sentiments');
        $ary_world_data = DB::table('sentiment_results')->where('channel', 'ary_world')->pluck('scraped_data');
        // counting the number of sentiments
        $ary_world_positive = DB::table('sentiment_results')->where('channel', 'ary_world')->where('sentiments', 'Positive')->count();
        $ary_world_negative = DB::table('sentiment_results')->where('channel', 'ary_world')->where('sentiments', 'Negative')->count();
        $ary_world_neutral = DB::table('sentiment_results')->where('channel', 'ary_world')->where('sentiments', 'Neutral')->count();
        $ary_world_all = DB::table('sentiment_results')->where('channel', 'ary_world')->count();        
        
        //Ary Buisness English
        $ary_business_sentiments = DB::table('sentiment_results')->where('channel', 'ary_business')->pluck('sentiments');
        $ary_business_data = DB::table('sentiment_results')->where('channel', 'ary_business')->pluck('scraped_data');
        // counting the number of sentiments
        $ary_business_positive = DB::table('sentiment_results')->where('channel', 'ary_business')->where('sentiments', 'Positive')->count();
        $ary_business_negative = DB::table('sentiment_results')->where('channel', 'ary_business')->where('sentiments', 'Negative')->count();
        $ary_business_neutral = DB::table('sentiment_results')->where('channel', 'ary_business')->where('sentiments', 'Neutral')->count();
        $ary_business_all = DB::table('sentiment_results')->where('channel', 'ary_business')->count();
        
        //Ary Latest English
        $ary_latest_sentiments = DB::table('sentiment_results')->where('channel', 'ary_latest')->pluck('sentiments');
        $ary_latest_data = DB::table('sentiment_results')->where('channel', 'ary_latest')->pluck('scraped_data');
        // counting the number of sentiments
        $ary_latest_positive = DB::table('sentiment_results')->where('channel', 'ary_latest')->where('sentiments', 'Positive')->count();
        $ary_latest_negative = DB::table('sentiment_results')->where('channel', 'ary_latest')->where('sentiments', 'Negative')->count();
        $ary_latest_neutral = DB::table('sentiment_results')->where('channel', 'ary_latest')->where('sentiments', 'Neutral')->count();
        $ary_latest_all = DB::table('sentiment_results')->where('channel', 'ary_latest')->count();


        // ============================================================================================================================================
        //Express/Tribune English
        //tribune latest english
        $tribune_latest_sentiments = DB::table('sentiment_results')->where('channel', 'tribune_latest')->pluck('sentiments');
        $tribune_latest_data = DB::table('sentiment_results')->where('channel', 'tribune_latest')->pluck('scraped_data');
        // counting the number of sentiments
        $tribune_latest_positive = DB::table('sentiment_results')->where('channel', 'tribune_latest')->where('sentiments', 'Positive')->count();
        $tribune_latest_negative = DB::table('sentiment_results')->where('channel', 'tribune_latest')->where('sentiments', 'Negative')->count();
        $tribune_latest_neutral = DB::table('sentiment_results')->where('channel', 'tribune_latest')->where('sentiments', 'Neutral')->count();
        $tribune_latest_all = DB::table('sentiment_results')->where('channel', 'tribune_latest')->count();
        
        //tribune World english
        $tribune_world_sentiments = DB::table('sentiment_results')->where('channel', 'tribune_world')->pluck('sentiments');
        $tribune_world_data = DB::table('sentiment_results')->where('channel', 'tribune_world')->pluck('scraped_data');
        // counting the number of sentiments
        $tribune_world_positive = DB::table('sentiment_results')->where('channel', 'tribune_world')->where('sentiments', 'Positive')->count();
        $tribune_world_negative = DB::table('sentiment_results')->where('channel', 'tribune_world')->where('sentiments', 'Negative')->count();
        $tribune_world_neutral = DB::table('sentiment_results')->where('channel', 'tribune_world')->where('sentiments', 'Neutral')->count();
        $tribune_world_all = DB::table('sentiment_results')->where('channel', 'tribune_world')->count();
        
        //tribune Buisness english
        $tribune_business_sentiments = DB::table('sentiment_results')->where('channel', 'tribune_business')->pluck('sentiments');
        $tribune_business_data = DB::table('sentiment_results')->where('channel', 'tribune_business')->pluck('scraped_data');
        // counting the number of sentiments
        $tribune_business_positive = DB::table('sentiment_results')->where('channel', 'tribune_business')->where('sentiments', 'Positive')->count();
        $tribune_business_negative = DB::table('sentiment_results')->where('channel', 'tribune_business')->where('sentiments', 'Negative')->count();
        $tribune_business_neutral = DB::table('sentiment_results')->where('channel', 'tribune_business')->where('sentiments', 'Neutral')->count();
        $tribune_business_all = DB::table('sentiment_results')->where('channel', 'tribune_business')->count();

        // ============================================================================================================================================
        //============================================================================================================================================
        //Urdu channel data managment
        // ============================================================================================================================================
        //Ary World Urdu
        $aryu_world = DB::table('sentiment_results_urdus')->where('channel', 'aryu_world')->pluck('channel');
        $aryu_world_sentiments = DB::table('sentiment_results_urdus')->where('channel', 'aryu_world')->pluck('sentiments');
        // get scraped_data from sentiment_results table
        $aryu_world_data = DB::table('sentiment_results_urdus')->where('channel', 'aryu_world')->pluck('scraped_data');
        // counting the number of sentiments
        $aryu_world_positive = DB::table('sentiment_results_urdus')->where('channel', 'aryu_world')->where('sentiments', 'Positive')->count();
        $aryu_world_negative = DB::table('sentiment_results_urdus')->where('channel', 'aryu_world')->where('sentiments', 'Negative')->count();
        $aryu_world_neutral = DB::table('sentiment_results_urdus')->where('channel', 'aryu_world')->where('sentiments', 'Neutral')->count();
        $aryu_world_all = DB::table('sentiment_results_urdus')->where('channel', 'aryu_world')->count();

        //Ary latest Urdu
        $aryu_latest = DB::table('sentiment_results_urdus')->where('channel', 'aryu_latest')->pluck('channel');
        $aryu_latest_sentiments = DB::table('sentiment_results_urdus')->where('channel', 'aryu_latest')->pluck('sentiments');
        // get scraped_data from sentiment_results table
        $aryu_latest_data = DB::table('sentiment_results_urdus')->where('channel', 'aryu_latest')->pluck('scraped_data');
        // counting the number of sentiments
        $aryu_latest_positive = DB::table('sentiment_results_urdus')->where('channel', 'aryu_latest')->where('sentiments', 'Positive')->count();
        $aryu_latest_negative = DB::table('sentiment_results_urdus')->where('channel', 'aryu_latest')->where('sentiments', 'Negative')->count();
        $aryu_latest_neutral = DB::table('sentiment_results_urdus')->where('channel', 'aryu_latest')->where('sentiments', 'Neutral')->count();
        $aryu_latest_all = DB::table('sentiment_results_urdus')->where('channel', 'aryu_latest')->count();
        
        //Ary Buisness Urdu
        $aryu_business = DB::table('sentiment_results_urdus')->where('channel', 'aryu_business')->pluck('channel');
        $aryu_business_sentiments = DB::table('sentiment_results_urdus')->where('channel', 'aryu_business')->pluck('sentiments');
        // get scraped_data from sentiment_results table
        $aryu_business_data = DB::table('sentiment_results_urdus')->where('channel', 'aryu_business')->pluck('scraped_data');
        // counting the number of sentiments
        $aryu_business_positive = DB::table('sentiment_results_urdus')->where('channel', 'aryu_business')->where('sentiments', 'Positive')->count();
        $aryu_business_negative = DB::table('sentiment_results_urdus')->where('channel', 'aryu_business')->where('sentiments', 'Negative')->count();
        $aryu_business_neutral = DB::table('sentiment_results_urdus')->where('channel', 'aryu_business')->where('sentiments', 'Neutral')->count();
        $aryu_business_all = DB::table('sentiment_results_urdus')->where('channel', 'aryu_business')->count();

        // ============================================================================================================================================
        //Dawn Business Urdu
        $dawnu_business = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_business')->pluck('channel');
        $dawnu_business_sentiments = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_business')->pluck('sentiments');
        // get scraped_data from sentiment_results table
        $dawnu_business_data = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_business')->pluck('scraped_data');
        // counting the number of sentiments
        $dawnu_business_positive = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_business')->where('sentiments', 'Positive')->count();
        $dawnu_business_negative = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_business')->where('sentiments', 'Negative')->count();
        $dawnu_business_neutral = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_business')->where('sentiments', 'Neutral')->count();
        $dawnu_business_all = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_business')->count();
        
        //Dawn latest Urdu
        $dawnu_latest = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_latest')->pluck('channel');
        $dawnu_latest_sentiments = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_latest')->pluck('sentiments');
        // get scraped_data from sentiment_results table
        $dawnu_latest_data = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_latest')->pluck('scraped_data');
        // counting the number of sentiments
        $dawnu_latest_positive = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_latest')->where('sentiments', 'Positive')->count();
        $dawnu_latest_negative = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_latest')->where('sentiments', 'Negative')->count();
        $dawnu_latest_neutral = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_latest')->where('sentiments', 'Neutral')->count();
        $dawnu_latest_all = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_latest')->count();
        
        //Dawn World Urdu
        $dawnu_world = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_world')->pluck('channel');
        $dawnu_world_sentiments = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_world')->pluck('sentiments');
        // get scraped_data from sentiment_results table
        $dawnu_world_data = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_world')->pluck('scraped_data');
        // counting the number of sentiments
        $dawnu_world_positive = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_world')->where('sentiments', 'Positive')->count();
        $dawnu_world_negative = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_world')->where('sentiments', 'Negative')->count();
        $dawnu_world_neutral = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_world')->where('sentiments', 'Neutral')->count();
        $dawnu_world_all = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_world')->count();

        // ============================================================================================================================================
        //Express/Tribune Urdu
        //Express latest Urdu
        $tribuneU_latest = DB::table('sentiment_results_urdus')->where('channel', 'tribuneU_latest')->pluck('channel');
        $tribuneU_latest_sentiments = DB::table('sentiment_results_urdus')->where('channel', 'tribuneU_latest')->pluck('sentiments');
        // get scraped_data from sentiment_results table
        $tribuneU_latest_data = DB::table('sentiment_results_urdus')->where('channel', 'tribuneU_latest')->pluck('scraped_data');
        // counting the number of sentiments
        $tribuneU_latest_positive = DB::table('sentiment_results_urdus')->where('channel', 'tribuneU_latest')->where('sentiments', 'Positive')->count();
        $tribuneU_latest_negative = DB::table('sentiment_results_urdus')->where('channel', 'tribuneU_latest')->where('sentiments', 'Negative')->count();
        $tribuneU_latest_neutral = DB::table('sentiment_results_urdus')->where('channel', 'tribuneU_latest')->where('sentiments', 'Neutral')->count();
        $tribuneU_latest_all = DB::table('sentiment_results_urdus')->where('channel', 'tribuneU_latest')->count();

        //Express Business Urdu
        $tribuneUrdu_business = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_business')->pluck('channel');
        $tribuneUrdu_business_sentiments = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_business')->pluck('sentiments');
        // get scraped_data from sentiment_results table
        $tribuneUrdu_business_data = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_business')->pluck('scraped_data');
        // counting the number of sentiments
        $tribuneUrdu_business_positive = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_business')->where('sentiments', 'Positive')->count();
        $tribuneUrdu_business_negative = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_business')->where('sentiments', 'Negative')->count();
        $tribuneUrdu_business_neutral = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_business')->where('sentiments', 'Neutral')->count();
        $tribuneUrdu_business_all = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_business')->count();

        //Express World Urdu
        $tribuneUrdu_world = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_world')->pluck('channel');
        $tribuneUrdu_world_sentiments = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_world')->pluck('sentiments');
        // get scraped_data from sentiment_results table
        $tribuneUrdu_world_data = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_world')->pluck('scraped_data');
        // counting the number of sentiments
        $tribuneUrdu_world_positive = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_world')->where('sentiments', 'Positive')->count();
        $tribuneUrdu_world_negative = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_world')->where('sentiments', 'Negative')->count();
        $tribuneUrdu_world_neutral = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_world')->where('sentiments', 'Neutral')->count();
        $tribuneUrdu_world_all = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_world')->count();

        // return view('user.results', ['channel' => $channel, 'sentiments' => $sentiments, 'scraped_data' => $scraped_data]);
        return view('dashboards.users.charts', compact('dawn_latest', 'dawn_latest_sentiments', 'dawn_latest_data', 'dawn_latest_positive', 'dawn_latest_negative', 'dawn_latest_neutral', 'dawn_latest_all', 'dawn_world', 'dawn_world_sentiments', 'dawn_world_data', 'dawn_world_positive', 'dawn_world_negative', 'dawn_world_neutral', 'dawn_world_all', 'dawn_business', 'dawn_business_sentiments', 'dawn_business_data', 'dawn_business_positive', 'dawn_business_negative', 'dawn_business_neutral', 'dawn_business_all', 'dawnu_latest', 'dawnu_latest_sentiments', 'dawnu_latest_data', 'dawnu_latest_positive', 'dawnu_latest_negative', 'dawnu_latest_neutral', 'dawnu_latest_all', 'dawnu_world', 'dawnu_world_sentiments', 'dawnu_world_data', 'dawnu_world_positive', 'dawnu_world_negative', 'dawnu_world_neutral', 'dawnu_world_all', 'tribuneU_latest', 'tribuneU_latest_sentiments', 'tribuneU_latest_data', 'tribuneU_latest_positive', 'tribuneU_latest_negative', 'tribuneU_latest_neutral', 'tribuneU_latest_all', 'tribuneUrdu_business', 'tribuneUrdu_business_sentiments', 'tribuneUrdu_business_data', 'tribuneUrdu_business_positive', 'tribuneUrdu_business_negative', 'tribuneUrdu_business_neutral', 'tribuneUrdu_business_all', 'tribuneUrdu_world', 'tribuneUrdu_world_sentiments', 'tribuneUrdu_world_data', 'tribuneUrdu_world_positive', 'tribuneUrdu_world_negative', 'tribuneUrdu_world_neutral', 'tribuneUrdu_world_all', 'ary_latest_sentiments', 'ary_latest_data', 'ary_latest_positive', 'ary_latest_negative', 'ary_latest_neutral', 'ary_latest_all',  'ary_business_sentiments', 'ary_business_data', 'ary_business_positive', 'ary_business_negative', 'ary_business_neutral', 'ary_business_all', 'ary_world_sentiments', 'ary_world_data', 'ary_world_positive', 'ary_world_negative', 'ary_world_neutral', 'ary_world_all', 'aryu_latest', 'aryu_latest_sentiments', 'aryu_latest_data', 'aryu_latest_positive', 'aryu_latest_negative', 'aryu_latest_neutral', 'aryu_latest_all', 'aryu_business', 'aryu_business_sentiments', 'aryu_business_data', 'aryu_business_positive', 'aryu_business_negative', 'aryu_business_neutral','aryu_business_all', 'dawnu_business', 'dawnu_business_sentiments', 'dawnu_business_data', 'dawnu_business_positive', 'dawnu_business_negative', 'dawnu_business_neutral', 'dawnu_business_all','aryu_world', 'aryu_world_sentiments', 'aryu_world_data', 'aryu_world_positive', 'aryu_world_negative', 'aryu_world_neutral', 'aryu_world_all', 'tribune_latest_sentiments', 'tribune_latest_data', 'tribune_latest_positive', 'tribune_latest_negative', 'tribune_latest_neutral', 'tribune_latest_all', 'tribune_business_sentiments', 'tribune_business_data', 'tribune_business_positive', 'tribune_business_negative', 'tribune_business_neutral', 'tribune_business_all', 'tribune_world_sentiments', 'tribune_world_data', 'tribune_world_positive', 'tribune_world_negative', 'tribune_world_neutral', 'tribune_world_all'));
    }

    
}