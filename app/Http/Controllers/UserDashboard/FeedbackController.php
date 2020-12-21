<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Model\Feedback;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $user = Sentinel::getUser();
        try {
            $review = new Feedback();
            $review->user_id = $user->id;
            $review->coursable_id = $request->courseId;
            $review->coursable_type = get_class(getSavedCourseByType($request));
            $review->star = $request->rating;
            $review->review = $review->review;
            $review->save();
            return redirect()->back()->with('success', 'Thank you for your Feedback');
        } catch (\Throwable $e) {
            return redirect()->back()->with('errors', 'Error While Feedback');
        }
    }
}
