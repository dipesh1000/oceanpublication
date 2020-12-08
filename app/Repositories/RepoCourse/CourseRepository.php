<?php

namespace App\Repositories\RepoCourse;

use App\Model\Book;
use App\Model\Package;
use App\Model\Video;

class CourseRepository implements CourseRepository 
{
    public function getBookBySlug($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $book->type = 'book';
        return $book;
    }
    public function getVideoBySlug($slug)
    {
        $video = Video::where('slug', $slug)->first();
        $video->type = 'video';
        return $video;
    }
    public function getPackageBySlug($slug)
    {
        $package = Package::where('slug', $slug);
        $package->type = 'package';
        return $package;
    }
}
