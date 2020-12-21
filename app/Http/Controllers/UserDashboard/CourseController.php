<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Repositories\RepoCourse\CourseRepository;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use PhpParser\ErrorHandler\Collecting;

class CourseController extends Controller
{
    public $course;
    public function __Construct(CourseRepository $course)
    {
        $this->course = $course;
    }
    public function getAllCourses()
    {
        $user = Sentinel::getUser();
        $purchaseCourse = Order::where('user_id', $user->id)->get();
        $courses = [];
        foreach ($purchaseCourse as $courseItem){
            $ss = $courseItem->purchaseble_type;
            if($ss == 'App\Model\Package'){
                $courses[] = $this->course->getPackageById($courseItem->purchaseble_id);
            }
            if($ss == 'App\Model\Book'){
                $courses[] = $this->course->getBookById($courseItem->purchaseble_id);
            }
            if($ss == 'App\Model\Video'){
                $courses[] = $this->course->getVideoById($courseItem->purchaseble_id);
            }
            
        }    
        $collectionCourse = collect($courses);
        $coursesList = $this->paginate($collectionCourse);    
        return view('userdashboard.purchaseCourse.index', compact('coursesList'));
    }

    public function getSingleVideo($id)
    {
        $video = $this->course->getVideoById($id);
        return view('userdashboard.purchaseCourse.videoSingle', compact('video'));
    }
    public function getSingleBook($id)
    {
        $book = $this->course->getBookById($id);
        return view('userdashboard.purchaseCourse.bookSingle', compact('book'));
    }
    public function getSinglePackage($id)
    {
        $package = $this->course->getPackageById($id);
        $courses = [];
        foreach ($package->packageItem as $ppp){
            if ($ppp->itemable_type == 'App\Model\Book') {
                $bookId = $ppp->itemable_id;
                $courses[] = $this->course->getBookById($bookId);
            }
            if ($ppp->itemable_type == 'App\Model\Video') {
                $videoId = $ppp->itemable_id;
                $courses[] = $this->course->getVideoById($videoId);
            }
        }

        $coursesList = $courses;
        return view('userdashboard.purchaseCourse.packList', compact('coursesList'));
    }   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function paginate($items, $perPage = 12, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
