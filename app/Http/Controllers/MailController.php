<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\SubUsers;

class MailController extends Controller
{
    //
    public function subuser(Request $request)
    {
        $sub_user = new SubUsers;
        $sub_user->name = $request->get('name');
        $sub_user->email = $request->get('email');
        $sub_user->channel = $request->get('type');
        $sub_user->save();

        //call store function
        
        return redirect()->route('NewsAnalyzer')->with('success', 'Subscribed Successfully');



    }

    // public function sendmail()
    // {
    //     $sub_user = new SubUsers;
    //     //get mail from SubUsers table
    //     $mail = $sub_user->pluck('email');
    //     $data = array($mail=>"News Analyzer");
    //     Mail::send(['text'=>'mail'], $data, function($message) {
    //         $message->to('foo@example.com', 'News Analyzer')->subject
    //         ('News Analyzer');
    //         $message->from('News Analyzer','News Analyzer');
    //     });
    //     echo "HTML Email Sent. Check your inbox.";


    // }

    

    

}
