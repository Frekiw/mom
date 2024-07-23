<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Meeting;
use App\Models\Stmeeting;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    public function index()
    {
        // Assuming you want to sum a specific column, e.g., 'amount'
        $stmeeting = Stmeeting::count(); 
        $meeting = Meeting::count(); 
        $user = User::count(); 
        $approvedMeetings = Meeting::where('pm_sign', 'Approve')->count(); 

        return view('dashboard', compact('stmeeting','meeting','user','approvedMeetings'));
    }
}
