<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Validator;

class AdditionalController extends Controller
{
    //color
    public function allColor()
    {
        $colors = Color::all();
        return view('frontend.additional.all_color')->with('colors',$colors);
    }
    public function addColor()
    {
        return view('frontend.additional.add_color');
    }

    public function storeColor(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $brand = new Color();
        $brand->name = $request->input('name');
        $brand->slug = Str::slug($request->name);

        $brand->save();
        Session::flash('message', 'Color Added successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('color')
            ->with('success','Post created successfully.');
    }

    public function destroyColor($id)
    {
        $item = Color::find($id);
        //dd($item);
        $item->delete();
        Session::flash('message', 'Delete successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('color')
            ->with('success','Color deleted successfully');
    }
    //size
    public function allSize()
    {
        $sizes = Size::all();
        return view('frontend.additional.all_size')->with('sizes',$sizes);
    }
    public function addSize()
    {
        return view('frontend.additional.add_size');
    }

    public function storeSize(Request $request)
    {
        $request->validate([
            'size' => 'required',
        ]);
        $size = new Size();
        $size->size = $request->input('size');
        $size->slug = Str::slug($request->size);

        $size->save();
        Session::flash('message', 'Size Added successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('size')
            ->with('success','Post created successfully.');
    }

    public function destroySize($id)
    {
        $item = Size::find($id);
        //dd($item);
        $item->delete();
        Session::flash('message', 'Delete successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('size')
            ->with('success','Size deleted successfully');
    }
}
