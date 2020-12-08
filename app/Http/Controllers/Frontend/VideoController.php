<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Video;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('ID','DESC')
            ->where('status','Active')
            ->paginate(12);
        return view('frontend.video.index',compact('videos'))
            ->with('i', (request()->input('page', 1) - 1) * 12);
    }
    public function getVideoBySlug($slug)
    {
        $video = Video::where('slug', $slug)->first();
        $similarVideos = Video::orderBy('ID','DESC')
            ->where('category_id', $video->category_id)
            ->where('id', '!=' , $video->id)
            ->where('status','Active')
            ->take(3)
            ->get();
        return view('frontend.video.single', compact('video', 'similarVideos'));
    }
}
