<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Admin extends Controller
{
    //
    public function display(): View
    {
        $studentCount =  DB::table('users')->where('usertype', 'student')->get()->count(); 
        $verifiedTeachercount = DB::table('users')->where('usertype', 'teacher')->where('verification', 'verified')->get()->count(); 
        $unverifiedTeachercount = DB::table('users')->where('usertype', 'teacher')->where('verification', 'unverified')->get()->count();

        $verifiedTeacherGraph = User::whereYear('created_at', Carbon::now()->format('Y'))->where('usertype', 'teacher')->where('verification', 'verified')->orderBy('created_at', 'asc')->get()->groupBy(function($item){
            return Carbon::parse($item->created_at)->format('F');
        });

        $months = [
            'January' => 0,
            'February' => 0,
            'March' => 0,
            'April' => 0,
            'May' => 0,
            'June' => 0,
            'July' => 0,
            'August' => 0,
            'September' => 0,
            'October' => 0,
            'November' => 0,
            'December' => 0,
            
        ];

        foreach($verifiedTeacherGraph as $month => $value)
        {
            $months[$month] = $verifiedTeacherGraph[$month]->count();

        } 



        $display = 
        [
            'studentcount' => $studentCount,
            'verifiedteacher' => $verifiedTeachercount,
            'unverifiedteacher' => $unverifiedTeachercount,
        ];

        return view('admin.dashboard', compact('display', 'months'));
    }

    public function displaymanageteacher()
    {
        $unverifiedTeacher = User::where('verification', 'unverified')->get();
        $verifiedTeacher = User::where('verification', 'verified')->get();
        return view('admin.manageuser', compact('unverifiedTeacher', 'verifiedTeacher'));
    }

     // Accept the teacher's application
     public function acceptTeacher($id)
     {
         $user = User::find($id);
         $user->verification = 'verified';
         $user->save();
 
         return redirect()->back()->with('success', 'Teacher has been verified.');
     }
 
     // Reject the teacher's application
     public function rejectTeacher($id)
     {
         $user = User::find($id);
 
         // Delete the image from storage
         if ($user->imagelink) {
             Storage::delete($user->imagelink);
         }
 
         // Update the user verification status and clear imagelink
         $user->verification = 'rejected';
         $user->imagelink = '';
         $user->save();
 
         return redirect()->back()->with('success', 'Teacher has been rejected.');
     }
}
