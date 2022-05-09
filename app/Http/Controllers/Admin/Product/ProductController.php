<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Slug\Slug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index()
    {
        // $products = DB::table('products')
        //     ->join('categories', 'products.categories_id', '=', 'categories.id')
        //     ->select('products.id', 'code', 'products.slug', 'image', 'price', 'state', 'products.name as products_name', 'categories.name as categories_name')
        //     ->orderBy('products.id', 'DESC')
        //     ->get()
        //     ->all();
        // dd($data);
        $products = Product::orderBy("id", "DESC")->paginate(5);
        return view("backend/products/listproduct", ['products' => $products]);
    }

    public function create()
    {
        $categories = Category::all()->toArray();
        return view("backend/products/addproduct", ["categories" => $categories]);
    }

    public function store(ProductRequest $ProductRequest)
    {
        if ($ProductRequest->hasFile('image')) {
            $file = $ProductRequest->image;
            // Lấy ra thành phần mở rộng của file
            $fileExtension = $file->getClientOriginalExtension();
            $file->move("uploads", Slug::getSlug($ProductRequest->name) . "." . $fileExtension);
        }
        $product = new Product();
        $product->name = $ProductRequest->name;
        $product->code = $ProductRequest->code;
        $product->slug = Slug::getSlug($ProductRequest->name);
        $product->info = $ProductRequest->info;
        $product->describer = $ProductRequest->describer;
        $product->image = Slug::getSlug($ProductRequest->name) . "." . $fileExtension;
        $product->price = $ProductRequest->price;
        $product->featured = $ProductRequest->featured;
        $product->state = $ProductRequest->state;
        $product->categories_id = $ProductRequest->categories_id;
        $product->save();
        $ProductRequest->session()->flash("alert", "Đã thêm thành công!");
        return redirect("/admin/product");
    }

    public function edit($id)
    {
        $categories = Category::all();
//        dd($categories);
        $product = Product::where('id', $id)->get()->toArray();
//        dd($product);
        return view("backend/products/editproduct", ["product" => $product[0], "categories" => $categories]);
    }

//    public function update(EditProductRequest $editProductRequest)
    public function update(EditProductRequest $editProductRequest)
    {
        $product = Product::find($editProductRequest->id);
        if ($editProductRequest->hasFile('image')) {
            $file = $editProductRequest->image;
            // Lấy ra thành phần mở rộng của file
            $fileExtension = $file->getClientOriginalExtension();
            $file->move("uploads", Slug::getSlug($editProductRequest->name) . "." . $fileExtension);
            $product->image = Slug::getSlug($editProductRequest->name) . "." . $fileExtension;
        }
        $product->name = $editProductRequest->name;
        $product->code = $editProductRequest->code;
        $product->slug = Slug::getSlug($editProductRequest->name);
        $product->info = $editProductRequest->info;
        $product->describer = $editProductRequest->describer;
        $product->price = $editProductRequest->price;
        $product->featured = $editProductRequest->featured;
        $product->state = $editProductRequest->state;
        $product->categories_id = $editProductRequest->categories_id;
        $product->save();
        $editProductRequest->session()->flash("alert", "Đã sửa thành công!");
        return redirect("/admin/product");
//        return view("backend/products/editproduct");
    }

    public function delete(Request $request, $id)
    {
        $product = Product::find($id);
        $product->delete();
        $request->session()->flash("alert", "Đã xóa thành công!");
        return redirect("/admin/product");
    }
}
