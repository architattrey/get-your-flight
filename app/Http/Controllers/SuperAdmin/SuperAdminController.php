<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
Use Auth;
use App\Package;
use App\PackagesBooking;
use Session;

class SuperAdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function RedirecttoDashboard()
    // {
    //     return view('super_admin.dashboard');
    // }

	public function CreatePackage()
    {
        return view('super_admin.packages.create');
    }

	public function AddToDataBasePackage(Request $r)
    {
        // dd($r->all());
        $validatedData = $r->validate([
            'country_type'          =>'required', 
            'package_name'          =>'required|string|max:255',
            'city'                  =>'required', 
            'seller'                =>'required|string|max:255',
            'themes_type'           =>'required',
            'about_package'         =>'required|string|max:1255',
            'trip_highlights'       =>'required|string|max:1255',
            'package_rate'          =>'required',
            'terms_conditions'      =>'required|string|max:1255',
            'cancellation_policy'   =>'required|string|max:1255',
            'inclusions'            =>'required|string|max:1255',
            'exclusions'            =>'required|string|max:1255',
            'payment_policy'        =>'required|string|max:1255'
        ]);

        $day = 0;
        foreach ($r->day_title as $key => $value) {
            $day++;
            $path = '';
            $path = $r->hotel_image[$key]->store('public/image');
            $data [] = [
                'day'          => $day,
                'day_title'    => $value,
                'day_summary'  => $r->day_summary[$key],
                'hotel_name'   => $r->hotel_name[$key],
                'hotel_image'  => $path
            ];
        }

        dd($r->hotel_image->all());
            
        $package_images = [];
        foreach ($r->gallery as $key => $value) {
            // dd($value);
            $path = $value->store('public/image');
            array_push($package_images, $path);
        }

        $slug = str_slug($r->package_name,'-');

        $packages =  Package::create([
            'country_type'          =>$r['country_type'],
            'package_name'          =>$r['package_name'],
            'city'                  =>$r['city'],
            'slug'                  =>$slug,
            'seller'                =>$r['seller'],
            'image'                 => json_encode($package_images),
            'themes_type'           =>$r['themes_type'],
            'about_package'         =>$r['about_package'],
            'trip_highlights'       =>$r['trip_highlights'],    
            'itinerarys'            => json_encode($data),
            'package_rate'          =>$r['package_rate'],
            'terms_conditions'      =>$r['terms_conditions'],
            'cancellation_policy'   =>$r['cancellation_policy'],
            'inclusions'            =>$r['inclusions'],
            'exclusions'            =>$r['exclusions'],
            'payment_policy'        =>$r['payment_policy']
        ]);

        // return $packages;
             // dd($r->all());
        Session::flash('flash_message','Successfully Saved.');    
        return back();
    }


    public function PackageList()
    {
        $packages =Package::paginate(10);
        return view('super_admin.packages.index',compact('packages'));
    }

    public function SinglePackageList($id,Request $r)
    {
        $package =Package::where('id',$id)->first();
        return json_decode($package->itinerarys);
    }

    public function SinglePackageLists($id,Request $r)
    {
       $package =Package::where('id',$id)->first();
       return view('super_admin.packages.edit',compact('package'));
    }

    // Update packages-----------=========Atul Gupta>>>>>>>>>>>

    public function SinglePackageEdit($id,Request $r)
    {
        $validatedData = $r->validate([
            'country_type'          => 'required', 
            'package_name'          => 'required|string|max:255',                
            'seller'                => 'required|string|max:255',
            'themes_type'           => 'required',
            'about_package'         => 'required|string|max:1255',
            'trip_highlights'       => 'required|string|max:1255',
            'package_rate'          => 'required',
            'terms_conditions'      => 'required|string|max:1255',
            'cancellation_policy'   => 'required|string|max:1255',
            'inclusions'            =>'required|string|max:1255',
            'exclusions'            =>'required|string|max:1255',
            'payment_policy'        =>'required|string|max:1255'
        ]);

        $day = 0;
        foreach ($r->day_title as $key => $value) {
            $day++;
            $path = '';

            if (isset($r->hotel_image[$key])) {
                $path = $r->hotel_image[$key]->store('public/image');

            }else{
                $path = $r->day_image[$key];
            }
            
            $data [] = [
                'day'          => $day,
                'day_title'    => $value,
                'day_summary'  => $r->day_summary[$key],
                'hotel_name'   => $r->hotel_name[$key],
                'hotel_image'    => $path
            ];
        }

        $package_images = [];
        
        if (isset($r->gallery)) {
            foreach ($r->gallery as $key => $value) {
                $path = $value->store('public/image');
                array_push($package_images, $path);
            }
        }else{
            // dd($r->gallery_image);            
            foreach ($r->gallery_image as $key => $pack_image) {
                array_push($package_images, $pack_image);
            }
        }
        

        $slug = str_slug($r->package_name,'_');

        $packages = Package::where('id',$id)->first();
        $data = [
            'country_type'          =>$r['country_type'],
            'package_name'          =>$r['package_name'],
            'slug'                  => $slug,
            'seller'                =>$r['seller'],
            'image'                 => json_encode($package_images),
            'themes_type'           =>$r['themes_type'],
            'about_package'         =>$r['about_package'],
            'trip_highlights'       =>$r['trip_highlights'],    
            'itinerarys'            => json_encode($data),
            'package_rate'          =>$r['package_rate'],
            'terms_conditions'      =>$r['terms_conditions'],
            'cancellation_policy'   =>$r['cancellation_policy'],
            'inclusions'            =>$r['inclusions'],
            'exclusions'            =>$r['exclusions'],
            'payment_policy'        =>$r['payment_policy']
        ];

        $packages->update($data);
        // return $packages;

        Session::flash('flash_message','Record Successfully Updated.');    
        return back();
    }

    // package booking lists---------------=======>>>>Atul<<<<<<<<<//
    public function BookingList()
    {
		$bookinglists=PackagesBooking::with('package')->paginate(10);  //with is used for relationship with package//
        return view('super_admin.booking.index',compact('bookinglists'));
    }

    public function PackagesSingleBooking_list($id,Request $r)
    {
        $bookingPackagelist = PackagesBooking::where('id',$id)->first();
        return view('super_admin.booking.viewbooking',compact('bookingPackagelist'));

    }


}
