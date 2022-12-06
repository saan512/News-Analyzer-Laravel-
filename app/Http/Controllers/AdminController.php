<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function index(){

        return view('dashboards.admins.index');
        // return view('dashboards.users.charts');
        // return redirect()->route('admin.charts');
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
        $user->password = $request->get('password');
        $user->save();
        return redirect()->route('manage')->with('success', 'User Updated Successfully');
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

       function updateInfoAdmin(Request $request , $id){
            $admin = User::find(auth()->user()->$id);
            $admin->name = $request->name;
            $admin->email = $request->email;

            $admin->save();
            return view('dashboards.admins.settings');
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
