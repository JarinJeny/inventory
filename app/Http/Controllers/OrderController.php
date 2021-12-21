<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Country;
use App\Models\Product;
use App\Models\Size;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function purchase()
    {
        $categoies = Category::all();
        $brands = Brand::all();
        $sizes = Size::all();
        $colors = Color::all();
        $stocks = Stock::all();
        $countries = Country::all();
        $products = Product::all();
        return view('frontend.product.purchase',
            [
                'categoies'=>$categoies,
                'brands'=>$brands,
                'sizes'=>$sizes,
                'colors'=>$colors,
                'stocks'=>$stocks,
                'countries'=>$countries,
                'products'=>$products
            ]);
    }

    public function order(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'code' => 'required',
            'qty' => 'required',
        ]);
        $product = $request->input('product_name');
        $p_details = Product::where('id', $product)->get()->first();
        dd($p_details);
        $order = new Order();
        $order->product_name = $request->input('product_name');
        $order->code = $request->input('code');
        $order->product_id = 1;
        $order->qty = $request->input('qty');

        $order->save();
        Session::flash('message', 'Product Added successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('product')
            ->with('success','Post created successfully.');
    }
}
