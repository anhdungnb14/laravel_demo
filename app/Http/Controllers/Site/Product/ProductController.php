<?php

namespace App\Http\Controllers\Site\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function shop(){
        $data["categories"] = Category::all();
        $data["products"] = Product::orderBy("id","DESC")
        ->paginate(6);
        return view("frontend/product/shop",$data);
    }
    public function filter(Request $request){
        $start = $request->start;
        $end = $request->end;
        $data["categories"] = Category::all();
        $data["products"] = Product::whereBetween("price",[$start,$end])
        ->orderBy("id","DESC")
        ->paginate(6);
        $data["products"]->appends(['start' => $start, 'end' => $end]);
        // dd($data["products"]);
        return view("frontend/product/shop",$data);

    }
    public function details($slug){
       
        $product = Product::where("slug",$slug)->get()->toArray();
        $latest = Product::where("slug","<>",$slug)
        ->orderBy("id", "DESC")
        ->limit(4)
        ->get()
        ->toArray();
        return view("frontend/product/detail",["product"=>$product[0],"latest"=>$latest]);
    }
}
