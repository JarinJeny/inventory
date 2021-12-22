<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Country;
use App\Models\Brand;
use App\Models\Size;
use App\Models\Color;
use App\Models\Stock;
use App\Models\Variation;
use App\Models\VariationItem;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function allProduct()
    {
        $products = Product::all();
        return view('frontend.product.all_product')->with('products',$products);
    }

    public function productDetail($slug)
    {
        $product = Product::where('slug', $slug)->get()->first();
        //$color = Color::where('id', $product->color_id)->get()->first();
        //$size = Size::where('id', $product->size_id)->get()->first();
        $category = Category::where('id', $product->category_id)->get()->first();
        $country = Country::where('id', $product->country_id)->get()->first();
        //dd($product);
        return view('frontend.product.product_details',
            [
                'product'=>$product,
                //'color'=>$color,
                //'size'=>$size,
                'category'=>$category,
                'country'=>$country
            ]);
    }

    public function addPro()
    {
        $categoies = Category::all();
        $subCategoies = SubCategory::all();
        $brands = Brand::all();
        $stocks = Stock::all();
        $countries = Country::all();
        return view('frontend.product.add_product',
        [
            'categoies'=>$categoies,
            'subCategoies'=>$subCategoies,
            'brands'=>$brands,
            'stocks'=>$stocks,
            'countries'=>$countries
        ]);
    }

    public function storePro(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'code' => 'required',
            'qty' => 'required',
            'mrp' => 'required',
            'sale_price' => 'required',
            'category' => 'required',
            'country' => 'required',
            'brand' => 'required',
        ]);
        $pro = new Product();
        $pro->product_name = $request->input('product_name');
        $pro->slug = Str::slug($request->product_name);
        $pro->code = $request->input('code');
        $pro->stock = 1;
        $pro->qty = $request->input('qty');
        $pro->mrp = $request->input('mrp');
        $pro->sale_price = $request->input('sale_price');
        $pro->category_id = $request->input('category');
        $pro->country_id = $request->input('country');
        $pro->brand_id = $request->input('brand');

        $pro->save();
        Session::flash('message', 'Product Added successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('product')
            ->with('success','Post created successfully.');
    }

    public function editProduct($slug)
    {
        $proDetail = Product::where('slug', $slug)->get()->first();
        return view('frontend.product.edit')->with('proDetail',$proDetail);
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required',
            'code' => 'required',
            'mrp' => 'required',
            'sale_price' => 'required',
        ]);

        $pro = Product::find($id);
        $pro->product_name = $request->input('product_name');
        $pro->slug = Str::slug($request->product_name);
        $pro->code = $request->input('code');
        $pro->mrp = $request->input('mrp');
        $pro->sale_price = $request->input('sale_price');
        $pro->update();
        Session::flash('message', 'Product Update successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('product')
            ->with('success','Product updated successfully');
    }

    public function destroy($id)
    {
        $item = Product::find($id);
        $item->delete();
        Session::flash('message', 'Delete successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('product')
            ->with('success','Product deleted successfully');
    }

    public function StockProductLog()
    {
        $stock_logs = Stock::all();
        return view('frontend.product.stock', [
            'stock_logs'=>$stock_logs,
        ]);
    }
    public function addStock($id)
    {
        $product = Product::where('id', $id)->get()->first();

        return view('frontend.product.add_stock', ['product'=>$product]);
    }
    public function storeStock(Request $request, $id)
    {
        $product = Product::where('id', $id)->get()->first();
        $request->validate([
            'qty' => 'required',
        ]);
        $q = $request->input('qty');
        $total_qt = $q + $product->qty;

        $proStock = new Stock();
        $proStock->product_id = $id;
        $proStock->product_name = $product->name;
        $proStock->product_code = $product->code;
        $proStock->stock_in = $request->input('qty');
        $proStock->total_qty = $total_qt;
        $proStock->save();
        $product_stock = 1;
        if($product->qty <= 0)
        {
            $product_stock = 0;
        }
        $pro = Product::find($id);
        $pro->stock = $product_stock;
        $pro->qty = $total_qt;
        $pro->update();
        Session::flash('message', 'Product Update successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('product')
            ->with('success','Product updated successfully');
    }

    public function attribute($slug)
    {
        $product = Product::where('slug', $slug)->get()->first();
        $category = Category::where('id', $product->category_id)->get()->first();
        $country = Country::where('id', $product->country_id)->get()->first();
        $attributes = Attribute::where('product_id', $product->id)->get();
        $colors = Color::all();
        $sizes = Size::all();
        $vars = Variation::all();
        $v = 1;
        //dd($var_sizes);

        return view('frontend.product.attribute',
            [
                'attributes'=>$attributes,
                'product'=>$product,
                'colors'=>$colors,
                'sizes'=>$sizes,
                'vars'=>$vars,
                'category'=>$category,
                'country'=>$country
        ]);
    }

    public function storeAttribute(Request $request)
    {
//        $request->validate([
//            'color' => 'required',
//            'size' => 'required',
//        ]);
        //$p = $request->input('size');
        //dd($p);
        $att = new Attribute();
        $att->product_id = $request->input('product_id');
        $att->color_id = $request->input('color');
        $att->size_id = $request->input('size');

        if ($att->save()) {
            
            Session::flash('message', 'Product Added successfully!');
            Session::flash('alert-class', 'alert-success');
    
            return redirect()->route('product-attribute', $att->product->slug)->with('success','Post created successfully.');
        }
        
        
    }


}







