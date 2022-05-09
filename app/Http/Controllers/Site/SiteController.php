<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $featured = Product::orderBy("id", "DESC")
            ->where("featured", "1")
            ->limit(4)
            ->get()
            ->toArray();
        $latest = Product::orderBy("id", "DESC")
            ->limit(8)
            ->get()
            ->toArray();
        return view("frontend/index", ["featured" => $featured, "latest" => $latest]);
    }
    public function about()
    {
        return view("frontend/about/about");
    }
    public function contact()
    {
        return view("frontend/contact/contact");
    }
}
