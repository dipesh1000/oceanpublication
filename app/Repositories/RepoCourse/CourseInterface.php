<?php

namespace App\Repositories\RepoCourse;
Interface CourseInterface {

    public function getBookById($id);

    public function getVideoById($id);

    public function getPackageById($id);

}