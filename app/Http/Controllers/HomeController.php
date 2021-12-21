<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Brand;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }
    public function allCountry()
    {
        $countries = Country::all();
        return view('frontend.all_country')->with('countries',$countries);
    }
    public function addCountry()
    {
        return view('frontend.add_country');
    }

    public function storeCountry(Request $request)
    {
        $request->validate([
            'country_name' => 'required',
        ]);
        $country = new Country();
        $country->country_name = $request->input('country_name');
        $country->slug = Str::slug($request->country_name);

        $country->save();
        Session::flash('message', 'Category Added successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('country')
            ->with('success','Post created successfully.');
    }
    public function editCountry($slug)
    {
        $countryDetail = Country::where('slug', $slug)->get()->first();
        return view('frontend.country_edit')->with('countryDetail',$countryDetail);
    }

    public function updateCountry(Request $request, $id)
    {
        $request->validate([
            'country_name' => 'required',
        ]);

        $country = Country::find($id);
        $country->country_name = $request->input('country_name');
        $country->slug = Str::slug($request->country_name);
        $country->update();
        Session::flash('message', 'Category Update successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('country')
            ->with('success','Cat updated successfully');
    }

    public function destroyCountry($id)
    {
        $item = Country::find($id);
        //dd($item);
        $item->delete();
        Session::flash('message', 'Delete successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('country')
            ->with('success','Cat deleted successfully');
    }

    //brand
    public function allBrand()
    {
        $brands = Brand::all();
        return view('frontend.brand.all_brand')->with('brands',$brands);
    }
    public function addBrand()
    {
        return view('frontend.brand.add_brand');
    }

    public function storeBrand(Request $request)
    {
        $request->validate([
            'brand_name' => 'required',
        ]);
        $brand = new Brand();
        $brand->brand_name = $request->input('brand_name');
        $brand->slug = Str::slug($request->brand_name);

        $brand->save();
        Session::flash('message', 'Brand Added successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('brand')
            ->with('success','Post created successfully.');
    }
    public function editBrand($slug)
    {
        $brandDetail = Brand::where('slug', $slug)->get()->first();
        return view('frontend.brand.brand_edit')->with('brandDetail',$brandDetail);
    }

    public function updateBrand(Request $request, $id)
    {
        $request->validate([
            'brand_name' => 'required',
        ]);

        $brand = Brand::find($id);
        $brand->brand_name = $request->input('brand_name');
        $brand->slug = Str::slug($request->brand_name);
        $brand->update();
        Session::flash('message', 'Brand Update successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('brand')
            ->with('success','Cat updated successfully');
    }

    public function destroyBrand($id)
    {
        $item = Brand::find($id);
        //dd($item);
        $item->delete();
        Session::flash('message', 'Delete successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('brand')
            ->with('success','Cat deleted successfully');
    }
}
