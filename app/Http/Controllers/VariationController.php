<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Variation;
use App\Models\VariationItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class VariationController extends Controller
{
    public function variation()
    {
        $variations = Variation::all();
        return view('frontend.variation.all_variation')->with('variations',$variations);
    }

    public function addVariation()
    {
        return view('frontend.variation.add_variation');
    }

    public function storeVariation(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $var = new Variation();
        $var->name = $request->input('name');

        $var->save();
        Session::flash('message', 'Variation Added successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('variation')
            ->with('success','Post created successfully.');
    }

    public function editVariation($id)
    {
        $varDetail = Variation::where('id', $id)->get()->first();
        return view('frontend.variation.edit')->with('varDetail',$varDetail);
    }

    public function updateVariation(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $var = Variation::find($id);
        $var->name = $request->input('name');
        $var->update();
        Session::flash('message', 'Variation Update successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('variation')
            ->with('success','Cat updated successfully');
    }

    public function destroyVariation($id)
    {
        $item = Variation::find($id);
        //dd($item);
        $item->delete();
        Session::flash('message', 'Delete successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('variation')
            ->with('success','Cat deleted successfully');
    }


    public function variationItem()
    {
        $variationitems = VariationItem::with('variation')->get();
        return view('frontend.variation.all_variation_item',
            [
                'variationitems'=>$variationitems,
            ]);
    }
    public function addVariationItem()
    {
        $variations = Variation::all();
        return view('frontend.variation.add_variation_item',
            [
                'variations'=>$variations
            ]);
    }

    public function storeVariationItem(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'variation' => 'required',
        ]);
        $var = new VariationItem();
        $var->name = $request->input('name');
        $var->variation_id = $request->input('variation');

        $var->save();
        Session::flash('message', 'Variation Added successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('variation-item')
            ->with('success','variation-item created successfully.');
    }

    public function editVariationItem($id)
    {
        $varItemDetail = VariationItem::where('id', $id)->get()->first();
        return view('frontend.variation.edit_item')->with('varItemDetail',$varItemDetail);
    }

    public function updateVariationItem(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $varItem = VariationItem::find($id);
        $varItem->name = $request->input('name');
        $varItem->update();
        Session::flash('message', 'Variation Item Update successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('variation-item')
            ->with('success','Variation Item updated successfully');
    }

    public function destroyVariationItem($id)
    {
        $item = VariationItem::find($id);
        //dd($item);
        $item->delete();
        Session::flash('message', 'Delete successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('variation-item')
            ->with('success','variation Item deleted successfully');
    }
}
