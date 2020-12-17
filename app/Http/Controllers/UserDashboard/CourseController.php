<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Repositories\RepoCourse\CourseRepository;
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
        $purchaseCourse = Order::get();
        $courses = [];
        foreach ($purchaseCourse as $courseItem){
            $ss = $courseItem->purchaseble_type;
            if($ss == 'App\Model\Book'){
                $courses[] = $this->course->getBookById($courseItem->purchaseble_id);
            }
            if($ss == 'App\Model\Video'){
                $courses[] = $this->course->getVideoById($courseItem->purchaseble_id);
            }
            if($ss == 'App\Model\Package'){
                $courses[] = $this->course->getPackageById($courseItem->purchaseble_id);
            }
        }    
        $collectionCourse = collect($courses);
        $coursesList = $this->paginate($collectionCourse);    
        return view('userdashboard.purchaseCourse.index', compact('coursesList'));
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
