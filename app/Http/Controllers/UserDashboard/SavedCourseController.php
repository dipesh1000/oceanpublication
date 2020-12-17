<?php

namespace App\Http\Controllers\userdashboard;

use App\Http\Controllers\Controller;
use App\Model\Book;
use App\Model\SavedCourse;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\Repositories\RepoCourse\CourseRepository;
use Gloudemans\Shoppingcart\Facades\Cart;

class SavedCourseController extends Controller
{
    public $course;
    public function __Construct(CourseRepository $course)
    {
        $this->course = $course;
    }
    public function savedCourse(Request $request)
    { 
        if (Sentinel::check()) {
            $user = Sentinel::getUser();
            $courseId = $request->courseId;
            $savedCourses = SavedCourse::get();
            foreach ($savedCourses as $savedCourseId => $savedId) {
                if($savedId) {
                    if (SavedCourse::where('id', $courseId)->exists()) {
                        return response()->json( [
                            'status'  => 'exists',
                            'message' => 'You Have Already Save This Course.'
                        ], 200 );
                    } else {
                        try {
                            $savedCourse = new SavedCourse();
                            $savedCourse->user_id = $user->id;
                            $savedCourse->saveable_id = $request->courseId;
                            $savedCourse->saveable_type = get_class(getSavedCourseByType($request));
                            $saved = $savedCourse->save();
                            if(!$request->ajax()){
                                return redirect()->back()->with( 'success', 'Course Saved Successfully' );
                            }
                            return response()->json( [
                                'status'  => 'success',
                                'message' => 'Course Saved Successfully.'
                            ], 200 );
                        }
                        catch (\Exception $e) {
                            return redirect()->back()->with('errors', 'Error While Saving Course');
                        }
                    }
                }
            }
        }
        else {
            return response()->json( [
                'status'  => 'login',
                'message' => 'Please Login'
            ], 200 );
        }
    }
    public function getSavedCourse()
    {
        $savedCourse = SavedCourse::all();
        $courses = [];
        foreach ($savedCourse as $courseItem){
            $ss = $courseItem->saveable_type;
            if($ss == 'App\Model\Book'){
                $courses[] = $this->course->getBookById($courseItem->saveable_id);
            }
            if($ss == 'App\Model\Video'){
                $courses[] = $this->course->getVideoById($courseItem->saveable_id);
            }
            if($ss == 'App\Model\Package'){
                $courses[] = $this->course->getPackageById($courseItem->saveable_id);
            }
        }
        return view('userdashboard.savedcourse.index', compact('courses'));
        
    }
}
