<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Model\Video;
use App\Repositories\VideoRepo\VideoRepository;

class VideoController extends Controller
{

    public $video;
    public function __construct(VideoRepository $video)
    {
        $this->video = $video;
    }

    public function index()
    {
        try {
            $videos = $this->video->getAllVideos();
    
            $cats = $this->video->getAllVideosCategory();
    
            return view('frontend.video.index',compact('cats', 'videos'))
                ->with('i', (request()->input('page', 1) - 1) * 12);
        } 
        catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->with($ex->getMessage());
        }
        catch (\Exception $e) {
            return redirect()->back()->with($e->getMessage());
        }
    }

    public function getVideoBySlug($slug)
    {
        try {
            $video = $this->video->getVideoBySlug($slug);

            $child_cat = $this->video->getRelatedCategories($slug);

            $similarVideos = $this->video->getSimilarVideos($slug);

            return view('frontend.video.single', compact('video', 'similarVideos', 'child_cat'));

        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->with($ex->getMessage());
        }
        catch (\Exception $e) {
            return redirect()->back()->with($e->getMessage());
        }
        
    }
}
