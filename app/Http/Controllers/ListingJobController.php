<?php 
namespace App\Http\Controllers;
use App\Models\Job;
class ListingJobController extends Controller
{
    public function listingjob() {
        $Jobs = Job::all();
        return view('listingJob', compact('Jobs'));
    }
}