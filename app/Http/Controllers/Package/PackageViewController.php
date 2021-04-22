<?php

namespace App\Http\Controllers\Package;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Package;

class PackageViewController extends Controller
{
    public function TourDetailsView($slug, Request $r)
	{
		$addDestination=null;
		$package = Package::where('slug',$slug)->first();
    
		$randomlyChangePackages = Package::take(3)->inRandomOrder()->get();
		
	 	return view('home.package-details',compact('package','addDestination','randomlyChangePackages'));
    }
	 
	public function TourDetailsView2($from, $slug,Request $r)
	{
		$addDestination = $from;
		$package = Package::where('slug',$slug)->first();
		$randomlyChangePackages = Package::take(3)->inRandomOrder()->get();
		
	 	return view('home.package-details',compact('package','addDestination','randomlyChangePackages'));
	}
}
