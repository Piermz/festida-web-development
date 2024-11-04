<?php

namespace App\Http\Controllers;

use App\Models\JobCandidate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function my_applications()
    {
        $user = Auth::user();
        $my_applications = JobCandidate::where('candidate_id', $user->id)->orderBy('id')->paginate(10);
        return view('dashboard.my_applications', compact('my_applications'));
    }

    public function my_applications_details(JobCandidate $JobCandidate)
    {
        $user = Auth::user();
        if ($JobCandidate->candidate_id != $user->id) {
            abort(403);
        }
        return view('dashboard.my_application_details', compact('JobCandidate'));
    }
}
