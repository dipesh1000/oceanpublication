<?php

namespace App\Repositories\RepoCourse;

use App\Model\Book;
use App\Model\Package;
use App\Model\Video;

class CourseRepository implements CourseInterface 
{
    public function getBookById($id)
    {
        $book = Book::where('id', $id)->first();
        $book->type = 'book';
        return $book;
    }
    public function getVideoById($id)
    {
        $video = Video::where('id', $id)->first();
        $video->type = 'video';
        return $video;
    }
    public function getPackageById($id)
    {
        $package = Package::where('id', $id)->first();
        $package->type = 'package';
        return $package;
    }
    public function getBookModelById($id)
    {
        $book = Book::where('id', $id)->first();
        return $book;
    }
    public function getVideoModelById($id)
    {
        $video = Video::where('id', $id)->first();
        return $video;
    }
    public function getPackageModelById($id)
    {
        $package = Package::where('id', $id)->first();
        return $package;
    }
}
