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

        return redirect()->route('NewsAnalyzer')->with('success', 'Subscribed Successfully');

}
        }
