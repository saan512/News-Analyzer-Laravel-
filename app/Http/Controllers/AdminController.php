<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\AutoMailAry;
use App\Mail\AutoMailDawn;
use App\Mail\AutoMailTribune;
use toastr;

class AdminController extends Controller
{
    function index(){
        $users = DB::table('users')->where('role', '=', 2)->get()->count();
        $eng_news_count = DB::table('sentiment_results')->pluck('id')->count();
        $urdu_news_count = DB::table('sentiment_results_urdus')->pluck('id')->count();

        $pos_sentiment_english = DB::table('sentiment_results')->where('sentiments', '=', 'Positive')->count();
        $neg_sentiment_english = DB::table('sentiment_results')->where('sentiments', '=', 'Negative')->count();
        $neu_sentiment_english = DB::table('sentiment_results')->where('sentiments', '=', 'Neutral')->count();

        $pos_sentiment_urdu = DB::table('sentiment_results_urdus')->where('sentiments', '=', 'Positive')->count();
        $neg_sentiment_urdu = DB::table('sentiment_results_urdus')->where('sentiments', '=', 'Negative')->count();
        $neu_sentiment_urdu = DB::table('sentiment_results_urdus')->where('sentiments', '=', 'Neutral')->count();

        //add sentiment results to each other
        $total_pos_sentiment = $pos_sentiment_english + $pos_sentiment_urdu;
        $total_neg_sentiment = $neg_sentiment_english + $neg_sentiment_urdu;
        $total_neu_sentiment = $neu_sentiment_english + $neu_sentiment_urdu;

        return view('dashboards.admins.index' , compact('users', 'eng_news_count', 'urdu_news_count' , 'total_pos_sentiment', 'total_neg_sentiment', 'total_neu_sentiment'));
       }
    
       function profile(){
           return view('dashboards.admins.profile');
       }
       function settings(){
           return view('dashboards.admins.settings');
       }

       function manage(){
        // $users = DB::table('users')->get();
        //get user id from users table with role = 2 and user id
        $users = DB::table('users')->where('role', '=', 2)->get();
        return view('dashboards.admins.manage', compact('users'));
       }

       function edit($id){
        $User = User::find($id);
        return view('dashboards.admins.manage_update', compact('User'));
       }

       public function update(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        if($request->password) {
            Auth::user()->password = Hash::make($request->password);
            }
        $user->save();
        return redirect()->route('admin.manageUsers')->with('success', 'User Updated Successfully');
       }

       public function results()
    {
        $sentiments_english = DB::table('sentiment_results')->pluck('sentiments')->sortByDesc('id')->take(20);
        // get scraped_data from sentiment_results table
        $scraped_data_english = DB::table('sentiment_results')->pluck('scraped_data')->sortByDesc('id')->take(20);

        // get sentiments from sentiment_results_urdus table
        $sentiments_urdus = DB::table('sentiment_results_urdus')->pluck('sentiments')->sortByDesc('id')->take(20);
        // get scraped_data from sentiment_results_urdus table
        $scraped_data_urdus = DB::table('sentiment_results_urdus')->pluck('scraped_data')->sortByDesc('id')->take(20);
        return view('dashboards.admins.result', compact('sentiments_english' , 'scraped_data_english', 'sentiments_urdus', 'scraped_data_urdus'));
    }

       function updateInfoAdmin(Request $request){
        Auth::user()->name = $request->name;
        Auth::user()->email = $request->email;
        if($request->password) {
            Auth::user()->password = Hash::make($request->password);
            }
        Auth::user()->save();
        return redirect()->back()->with('success', 'Profile updated successfully!');
       }

       public function delete($id){
            $user = User::destroy($id);
            return redirect()->route('admin.manageUsers')->with('success', 'User Deleted Successfully');
        }


    public function mailer(){
        //auto mailer
        $users = DB::table('sub_users')->get();
        $ary_users = $users->where('channel' , 'ARY');
        $dawn_users = $users->where('channel' , 'DAWN');
        // $dawn_user1 = $dawn_users->take(1);
        $tribune_users = $users->where('channel' , 'TRIBUNE');
        // dd($dawn_users, $ary_users, $tribune_users);
        $users_email = $users->pluck('email');

        // $dawn_latest = DB::table('sentiment_results')->groupBy('channel')->where('channel', 'dawn_latest')->pluck('channel');
        // $dawn_latest_sentiments = DB::table('sentiment_results')->where('channel', 'dawn_latest')->pluck('sentiments');
        // // get scraped_data from sentiment_results table
        // $dawn_latest_data = DB::table('sentiment_results')->where('channel', 'dawn_latest')->pluck('scraped_data');

        $dawn_latest_positive = DB::table('sentiment_results')->where('channel', 'dawn_latest')->where('sentiments', 'Positive')->count();
        $dawn_latest_negative = DB::table('sentiment_results')->where('channel', 'dawn_latest')->where('sentiments', 'Negative')->count();
        $dawn_latest_neutral = DB::table('sentiment_results')->where('channel', 'dawn_latest')->where('sentiments', 'Neutral')->count();
        $dawn_latest_all = DB::table('sentiment_results')->where('channel', 'dawn_latest')->count();
        
        //Dawn Business English
        // $dawn_business = DB::table('sentiment_results')->groupBy('channel')->where('channel', 'dawn_business')->pluck('channel');
        // $dawn_business_sentiments = DB::table('sentiment_results')->where('channel', 'dawn_business')->pluck('sentiments');
        // // get scraped_data from sentiment_results table
        // $dawn_business_data = DB::table('sentiment_results')->where('channel', 'dawn_business')->pluck('scraped_data');

        $dawn_business_positive = DB::table('sentiment_results')->where('channel', 'dawn_business')->where('sentiments', 'Positive')->count();
        $dawn_business_negative = DB::table('sentiment_results')->where('channel', 'dawn_business')->where('sentiments', 'Negative')->count();
        $dawn_business_neutral = DB::table('sentiment_results')->where('channel', 'dawn_business')->where('sentiments', 'Neutral')->count();
        $dawn_business_all = DB::table('sentiment_results')->where('channel', 'dawn_business')->count();
        
        //Dawn World English
        // $dawn_world = DB::table('sentiment_results')->groupBy('channel')->where('channel', 'dawn_world')->pluck('channel');
        // $dawn_world_sentiments = DB::table('sentiment_results')->where('channel', 'dawn_world')->pluck('sentiments');
        // // get scraped_data from sentiment_results table
        // $dawn_world_data = DB::table('sentiment_results')->where('channel', 'dawn_world')->pluck('scraped_data');

        $dawn_world_positive = DB::table('sentiment_results')->where('channel', 'dawn_world')->where('sentiments', 'Positive')->count();
        $dawn_world_negative = DB::table('sentiment_results')->where('channel', 'dawn_world')->where('sentiments', 'Negative')->count();
        $dawn_world_neutral = DB::table('sentiment_results')->where('channel', 'dawn_world')->where('sentiments', 'Neutral')->count();
        $dawn_world_all = DB::table('sentiment_results')->where('channel', 'dawn_world')->count();

        //Dawn all positive
        $dawn_all_positive = $dawn_latest_positive + $dawn_business_positive + $dawn_world_positive;
        //Dawn all negative
        $dawn_all_negative = $dawn_latest_negative + $dawn_business_negative + $dawn_world_negative;
        //Dawn all neutral
        $dawn_all_neutral = $dawn_latest_neutral + $dawn_business_neutral + $dawn_world_neutral;
        //Dawn all
        $dawn_all = $dawn_latest_all + $dawn_business_all + $dawn_world_all;

        
        

        // ============================================================================================================================================
        //Ary World English
        // $ary_world_sentiments = DB::table('sentiment_results')->where('channel', 'ary_world')->pluck('sentiments');
        // $ary_world_data = DB::table('sentiment_results')->where('channel', 'ary_world')->pluck('scraped_data');
        // counting the number of sentiments
        $ary_world_positive = DB::table('sentiment_results')->where('channel', 'ary_world')->where('sentiments', 'Positive')->count();
        $ary_world_negative = DB::table('sentiment_results')->where('channel', 'ary_world')->where('sentiments', 'Negative')->count();
        $ary_world_neutral = DB::table('sentiment_results')->where('channel', 'ary_world')->where('sentiments', 'Neutral')->count();
        $ary_world_all = DB::table('sentiment_results')->where('channel', 'ary_world')->count();        
        
        //Ary Buisness English
        // $ary_business_sentiments = DB::table('sentiment_results')->where('channel', 'ary_business')->pluck('sentiments');
        // $ary_business_data = DB::table('sentiment_results')->where('channel', 'ary_business')->pluck('scraped_data');
        // counting the number of sentiments
        $ary_business_positive = DB::table('sentiment_results')->where('channel', 'ary_business')->where('sentiments', 'Positive')->count();
        $ary_business_negative = DB::table('sentiment_results')->where('channel', 'ary_business')->where('sentiments', 'Negative')->count();
        $ary_business_neutral = DB::table('sentiment_results')->where('channel', 'ary_business')->where('sentiments', 'Neutral')->count();
        $ary_business_all = DB::table('sentiment_results')->where('channel', 'ary_business')->count();
        
        //Ary Latest English
        // $ary_latest_sentiments = DB::table('sentiment_results')->where('channel', 'ary_latest')->pluck('sentiments');
        // $ary_latest_data = DB::table('sentiment_results')->where('channel', 'ary_latest')->pluck('scraped_data');
        // counting the number of sentiments
        $ary_latest_positive = DB::table('sentiment_results')->where('channel', 'ary_latest')->where('sentiments', 'Positive')->count();
        $ary_latest_negative = DB::table('sentiment_results')->where('channel', 'ary_latest')->where('sentiments', 'Negative')->count();
        $ary_latest_neutral = DB::table('sentiment_results')->where('channel', 'ary_latest')->where('sentiments', 'Neutral')->count();
        $ary_latest_all = DB::table('sentiment_results')->where('channel', 'ary_latest')->count();

        //Ary all positive
        $ary_all_positive = $ary_latest_positive + $ary_business_positive + $ary_world_positive;
        //Ary all negative
        $ary_all_negative = $ary_latest_negative + $ary_business_negative + $ary_world_negative;
        //Ary all neutral
        $ary_all_neutral = $ary_latest_neutral + $ary_business_neutral + $ary_world_neutral;
        //Ary all
        $ary_all = $ary_latest_all + $ary_business_all + $ary_world_all;


        // ============================================================================================================================================
        //Express/Tribune English
        //tribune latest english
        // $tribune_latest_sentiments = DB::table('sentiment_results')->where('channel', 'tribune_latest')->pluck('sentiments');
        // $tribune_latest_data = DB::table('sentiment_results')->where('channel', 'tribune_latest')->pluck('scraped_data');
        // counting the number of sentiments
        $tribune_latest_positive = DB::table('sentiment_results')->where('channel', 'tribune_latest')->where('sentiments', 'Positive')->count();
        $tribune_latest_negative = DB::table('sentiment_results')->where('channel', 'tribune_latest')->where('sentiments', 'Negative')->count();
        $tribune_latest_neutral = DB::table('sentiment_results')->where('channel', 'tribune_latest')->where('sentiments', 'Neutral')->count();
        $tribune_latest_all = DB::table('sentiment_results')->where('channel', 'tribune_latest')->count();
        
        //tribune World english
        // $tribune_world_sentiments = DB::table('sentiment_results')->where('channel', 'tribune_world')->pluck('sentiments');
        // $tribune_world_data = DB::table('sentiment_results')->where('channel', 'tribune_world')->pluck('scraped_data');
        // counting the number of sentiments
        $tribune_world_positive = DB::table('sentiment_results')->where('channel', 'tribune_world')->where('sentiments', 'Positive')->count();
        $tribune_world_negative = DB::table('sentiment_results')->where('channel', 'tribune_world')->where('sentiments', 'Negative')->count();
        $tribune_world_neutral = DB::table('sentiment_results')->where('channel', 'tribune_world')->where('sentiments', 'Neutral')->count();
        $tribune_world_all = DB::table('sentiment_results')->where('channel', 'tribune_world')->count();
        
        //tribune Buisness english
        // $tribune_business_sentiments = DB::table('sentiment_results')->where('channel', 'tribune_business')->pluck('sentiments');
        // $tribune_business_data = DB::table('sentiment_results')->where('channel', 'tribune_business')->pluck('scraped_data');
        // counting the number of sentiments
        $tribune_business_positive = DB::table('sentiment_results')->where('channel', 'tribune_business')->where('sentiments', 'Positive')->count();
        $tribune_business_negative = DB::table('sentiment_results')->where('channel', 'tribune_business')->where('sentiments', 'Negative')->count();
        $tribune_business_neutral = DB::table('sentiment_results')->where('channel', 'tribune_business')->where('sentiments', 'Neutral')->count();
        $tribune_business_all = DB::table('sentiment_results')->where('channel', 'tribune_business')->count();

        //tribune all positive
        $tribune_all_positive = $tribune_latest_positive + $tribune_business_positive + $tribune_world_positive;
        //tribune all negative
        $tribune_all_negative = $tribune_latest_negative + $tribune_business_negative + $tribune_world_negative;
        //tribune all neutral
        $tribune_all_neutral = $tribune_latest_neutral + $tribune_business_neutral + $tribune_world_neutral;
        //tribune all
        $tribune_all = $tribune_latest_all + $tribune_business_all + $tribune_world_all;

        // ============================================================================================================================================
        //============================================================================================================================================
        //Urdu channel data managment
        // ============================================================================================================================================
        //Ary World Urdu
        // $aryu_world = DB::table('sentiment_results_urdus')->where('channel', 'aryu_world')->pluck('channel');
        // $aryu_world_sentiments = DB::table('sentiment_results_urdus')->where('channel', 'aryu_world')->pluck('sentiments');
        // // get scraped_data from sentiment_results table
        // $aryu_world_data = DB::table('sentiment_results_urdus')->where('channel', 'aryu_world')->pluck('scraped_data');
        // counting the number of sentiments
        $aryu_world_positive = DB::table('sentiment_results_urdus')->where('channel', 'aryu_world')->where('sentiments', 'Positive')->count();
        $aryu_world_negative = DB::table('sentiment_results_urdus')->where('channel', 'aryu_world')->where('sentiments', 'Negative')->count();
        $aryu_world_neutral = DB::table('sentiment_results_urdus')->where('channel', 'aryu_world')->where('sentiments', 'Neutral')->count();
        $aryu_world_all = DB::table('sentiment_results_urdus')->where('channel', 'aryu_world')->count();

        //Ary latest Urdu
        // $aryu_latest = DB::table('sentiment_results_urdus')->where('channel', 'aryu_latest')->pluck('channel');
        // $aryu_latest_sentiments = DB::table('sentiment_results_urdus')->where('channel', 'aryu_latest')->pluck('sentiments');
        // // get scraped_data from sentiment_results table
        // $aryu_latest_data = DB::table('sentiment_results_urdus')->where('channel', 'aryu_latest')->pluck('scraped_data');
        // counting the number of sentiments
        $aryu_latest_positive = DB::table('sentiment_results_urdus')->where('channel', 'aryu_latest')->where('sentiments', 'Positive')->count();
        $aryu_latest_negative = DB::table('sentiment_results_urdus')->where('channel', 'aryu_latest')->where('sentiments', 'Negative')->count();
        $aryu_latest_neutral = DB::table('sentiment_results_urdus')->where('channel', 'aryu_latest')->where('sentiments', 'Neutral')->count();
        $aryu_latest_all = DB::table('sentiment_results_urdus')->where('channel', 'aryu_latest')->count();
        
        //Ary Buisness Urdu
        // $aryu_business = DB::table('sentiment_results_urdus')->where('channel', 'aryu_business')->pluck('channel');
        // $aryu_business_sentiments = DB::table('sentiment_results_urdus')->where('channel', 'aryu_business')->pluck('sentiments');
        // // get scraped_data from sentiment_results table
        // $aryu_business_data = DB::table('sentiment_results_urdus')->where('channel', 'aryu_business')->pluck('scraped_data');
        // counting the number of sentiments
        $aryu_business_positive = DB::table('sentiment_results_urdus')->where('channel', 'aryu_business')->where('sentiments', 'Positive')->count();
        $aryu_business_negative = DB::table('sentiment_results_urdus')->where('channel', 'aryu_business')->where('sentiments', 'Negative')->count();
        $aryu_business_neutral = DB::table('sentiment_results_urdus')->where('channel', 'aryu_business')->where('sentiments', 'Neutral')->count();
        $aryu_business_all = DB::table('sentiment_results_urdus')->where('channel', 'aryu_business')->count();

        //Aryu all positive
        $aryu_all_positive = $aryu_latest_positive + $aryu_business_positive + $aryu_world_positive;
        //Aryu all negative
        $aryu_all_negative = $aryu_latest_negative + $aryu_business_negative + $aryu_world_negative;
        //Aryu all neutral
        $aryu_all_neutral = $aryu_latest_neutral + $aryu_business_neutral + $aryu_world_neutral;
        //Aryu all
        $aryu_all = $aryu_latest_all + $aryu_business_all + $aryu_world_all;

        // ============================================================================================================================================
        //Dawn Business Urdu
        // $dawnu_business = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_business')->pluck('channel');
        // $dawnu_business_sentiments = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_business')->pluck('sentiments');
        // // get scraped_data from sentiment_results table
        // $dawnu_business_data = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_business')->pluck('scraped_data');
        // counting the number of sentiments
        $dawnu_business_positive = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_business')->where('sentiments', 'Positive')->count();
        $dawnu_business_negative = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_business')->where('sentiments', 'Negative')->count();
        $dawnu_business_neutral = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_business')->where('sentiments', 'Neutral')->count();
        $dawnu_business_all = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_business')->count();
        
        //Dawn latest Urdu
        // $dawnu_latest = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_latest')->pluck('channel');
        // $dawnu_latest_sentiments = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_latest')->pluck('sentiments');
        // // get scraped_data from sentiment_results table
        // $dawnu_latest_data = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_latest')->pluck('scraped_data');
        // counting the number of sentiments
        $dawnu_latest_positive = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_latest')->where('sentiments', 'Positive')->count();
        $dawnu_latest_negative = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_latest')->where('sentiments', 'Negative')->count();
        $dawnu_latest_neutral = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_latest')->where('sentiments', 'Neutral')->count();
        $dawnu_latest_all = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_latest')->count();
        
        //Dawn World Urdu
        // $dawnu_world = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_world')->pluck('channel');
        // $dawnu_world_sentiments = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_world')->pluck('sentiments');
        // // get scraped_data from sentiment_results table
        // $dawnu_world_data = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_world')->pluck('scraped_data');
        // counting the number of sentiments
        $dawnu_world_positive = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_world')->where('sentiments', 'Positive')->count();
        $dawnu_world_negative = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_world')->where('sentiments', 'Negative')->count();
        $dawnu_world_neutral = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_world')->where('sentiments', 'Neutral')->count();
        $dawnu_world_all = DB::table('sentiment_results_urdus')->where('channel', 'dawnu_world')->count();

        //Dawnu all positive
        $dawnu_all_positive = $dawnu_latest_positive + $dawnu_business_positive + $dawnu_world_positive;
        //Dawnu all negative
        $dawnu_all_negative = $dawnu_latest_negative + $dawnu_business_negative + $dawnu_world_negative;
        //Dawnu all neutral
        $dawnu_all_neutral = $dawnu_latest_neutral + $dawnu_business_neutral + $dawnu_world_neutral;
        //Dawnu all
        $dawnu_all = $dawnu_latest_all + $dawnu_business_all + $dawnu_world_all;

        


        // ============================================================================================================================================
        //Express/Tribune Urdu
        //Express latest Urdu
        // $tribuneU_latest = DB::table('sentiment_results_urdus')->where('channel', 'tribuneU_latest')->pluck('channel');
        // $tribuneU_latest_sentiments = DB::table('sentiment_results_urdus')->where('channel', 'tribuneU_latest')->pluck('sentiments');
        // // get scraped_data from sentiment_results table
        // $tribuneU_latest_data = DB::table('sentiment_results_urdus')->where('channel', 'tribuneU_latest')->pluck('scraped_data');
        // counting the number of sentiments
        $tribuneU_latest_positive = DB::table('sentiment_results_urdus')->where('channel', 'tribuneU_latest')->where('sentiments', 'Positive')->count();
        $tribuneU_latest_negative = DB::table('sentiment_results_urdus')->where('channel', 'tribuneU_latest')->where('sentiments', 'Negative')->count();
        $tribuneU_latest_neutral = DB::table('sentiment_results_urdus')->where('channel', 'tribuneU_latest')->where('sentiments', 'Neutral')->count();
        $tribuneU_latest_all = DB::table('sentiment_results_urdus')->where('channel', 'tribuneU_latest')->count();

        //Express Business Urdu
        // $tribuneUrdu_business = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_business')->pluck('channel');
        // $tribuneUrdu_business_sentiments = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_business')->pluck('sentiments');
        // // get scraped_data from sentiment_results table
        // $tribuneUrdu_business_data = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_business')->pluck('scraped_data');
        // counting the number of sentiments
        $tribuneUrdu_business_positive = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_business')->where('sentiments', 'Positive')->count();
        $tribuneUrdu_business_negative = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_business')->where('sentiments', 'Negative')->count();
        $tribuneUrdu_business_neutral = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_business')->where('sentiments', 'Neutral')->count();
        $tribuneUrdu_business_all = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_business')->count();

        //Express World Urdu
        // $tribuneUrdu_world = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_world')->pluck('channel');
        // $tribuneUrdu_world_sentiments = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_world')->pluck('sentiments');
        // // get scraped_data from sentiment_results table
        // $tribuneUrdu_world_data = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_world')->pluck('scraped_data');
        // counting the number of sentiments
        $tribuneUrdu_world_positive = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_world')->where('sentiments', 'Positive')->count();
        $tribuneUrdu_world_negative = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_world')->where('sentiments', 'Negative')->count();
        $tribuneUrdu_world_neutral = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_world')->where('sentiments', 'Neutral')->count();
        $tribuneUrdu_world_all = DB::table('sentiment_results_urdus')->where('channel', 'tribuneUrdu_world')->count();

        //Tribuneu all positive
        $tribuneU_all_positive = $tribuneU_latest_positive + $tribuneUrdu_business_positive + $tribuneUrdu_world_positive;
        //Tribuneu all negative
        $tribuneU_all_negative = $tribuneU_latest_negative + $tribuneUrdu_business_negative + $tribuneUrdu_world_negative;
        //Tribuneu all neutral
        $tribuneU_all_neutral = $tribuneU_latest_neutral + $tribuneUrdu_business_neutral + $tribuneUrdu_world_neutral;
        //Tribuneu all
        $tribuneU_all = $tribuneU_latest_all + $tribuneUrdu_business_all + $tribuneUrdu_world_all;

        // dd($tribuneU_all_positive);


        Mail::to($dawn_users)->send(new AutoMailDawn($dawnu_all_positive, $dawnu_all_negative, $dawnu_all_neutral, $dawnu_all , $dawn_all , $dawn_all_neutral, $dawn_all_negative, $dawn_all_positive, $dawn_users ));

        Mail::to($ary_users)->send(new AutoMailAry($ary_all,$ary_all_negative, $ary_all_neutral, $ary_all_positive, $aryu_all,$aryu_all_negative, $aryu_all_neutral, $aryu_all_positive));

        Mail::to($tribune_users)->send(new AutoMailTribune($tribune_all,$tribune_all_negative, $tribune_all_positive, $tribune_all_neutral, $tribuneU_all,$tribuneU_all_negative, $tribuneU_all_neutral, $tribuneU_all_positive));

        toastr()->success('Mail Sent Successfully');
        return back()->with('success', 'Mail Sent Successfully');
            


    }


}
