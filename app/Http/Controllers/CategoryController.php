<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function allCategory()
    {
        $categories = Category::all();
        return view('frontend.category.all_cat')->with('categories',$categories);
    }

    public function addCat()
    {
        return view('frontend.category.add_cat');
    }

    public function storeCat(Request $request)
    {
        $request->validate([
            'name' => 'required',
            //'slug' => 'required',
        ]);
        $cat = new Category();
        $cat->name = $request->input('name');
        //$cat->slug = $request->input('slug');
        $cat->slug = Str::slug($request->name);

        $cat->save();
        Session::flash('message', 'Category Added successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('cat')
            ->with('success','Post created successfully.');
    }

    public function editCat($slug)
    {
        $catDetail = Category::where('slug', $slug)->get()->first();
        return view('frontend.category.edit')->with('catDetail',$catDetail);
    }

    public function updateCat(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $cat = Category::find($id);
        $cat->name = $request->input('name');
        $cat->slug = Str::slug($request->name);
        //dd($cat->name);
        $cat->update();
        Session::flash('message', 'Category Update successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('cat')
            ->with('success','Cat updated successfully');
    }

    public function destroy($id)
    {
        $item = Category::find($id);
        //dd($item);
        $item->delete();
        Session::flash('message', 'Delete successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('cat')
            ->with('success','Cat deleted successfully');
    }

}
