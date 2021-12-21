<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    public function allSubCategory()
    {
        $subCategories = SubCategory::with('category')->get();
        //$subCategories = Category::with('subcategories')->get();
        //dd($subCategories);
        return view('frontend.subcategory.all_subcat')->with('subCategories',$subCategories);
    }

    public function addSubCat()
    {
        $allCats = Category::all();
        //dd($allCats);
        return view('frontend.subcategory.add_subcat')->with('allCats',$allCats);
    }

    public function storeSubCat(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cat' => 'required|integer',
        ]);
        $subcat = new SubCategory();
        $subcat->name = $request->input('name');
        $subcat->category_id = $request->input('cat');
        $subcat->slug = Str::slug($request->name);
        //dd($subcat);

        $subcat->save();
        Session::flash('message', 'Sub Category Added successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('subcat')
            ->with('success','Sub Category created successfully.');
    }

//    public function editCat($slug)
//    {
//        $catDetail = Category::where('slug', $slug)->get()->first();
//        return view('frontend.category.edit')->with('catDetail',$catDetail);
//    }
//
//    public function updateCat(Request $request, $id)
//    {
//        $request->validate([
//            'name' => 'required',
//        ]);
//
//        $cat = Category::find($id);
//        $cat->name = $request->input('name');
//        $cat->slug = Str::slug($request->name);
//        //dd($cat->name);
//        $cat->update();
//        Session::flash('message', 'Category Update successfully!');
//        Session::flash('alert-class', 'alert-success');
//
//        return redirect()->route('cat')
//            ->with('success','Cat updated successfully');
//    }
//
//    public function destroy($id)
//    {
//        $item = Category::find($id);
//        //dd($item);
//        $item->delete();
//        Session::flash('message', 'Delete successfully!');
//        Session::flash('alert-class', 'alert-success');
//
//        return redirect()->route('cat')
//            ->with('success','Cat deleted successfully');
//    }
}
