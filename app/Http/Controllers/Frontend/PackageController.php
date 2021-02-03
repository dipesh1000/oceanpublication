<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Package;
use App\Model\Book;
use App\Model\PackageItem;
use App\Repositories\PackageRepo\PackageRepository;

class PackageController extends Controller
{
    public $package;
    public function __construct(PackageRepository $package)
    {
        $this->package = $package;
    }
    public function index()
    {
        try {
            $packages = $this->package->getAllPackages();
            
            return view('frontend.packages.index',compact('packages'))
            ->with('i', (request()->input('page', 1) - 1) * 12);

        } catch (\Exception $e) {
            //throw $th;
        }
    
    }
    public function singlePackage($slug)
    {
        try {
            $package = $this->package->getPackageBySlug($slug);

            $similarPackages = $this->package->getSimilarPackages($slug);

            return view('frontend.packages.single', compact('package', 'similarPackages'));

        } catch (\Exception $e) {
            //throw $th;
        }
        
    }
}
