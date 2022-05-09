<?php

namespace App\Http\Controllers;

use App\Demo\Demo;
use App\Models\Category;
use App\Models\Detail;
use App\Models\Product;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class TestController extends Controller
{
    //
    public function test1(Request $request)
    {
        //        $request->session()->put("email","vietpro.edu.vn@gmail.com");
        // $request->session()->forget("email");
            //    return view('test1');
        // dd("model");
        // $test = new Test();
        // $test->name = "test3";
        // $test->save();
        // $test = Test::find(1);
        // $test->name = "New Test";
        // $test->save();
        // $test = Test::find(1);
        // $test->delete();
        // $tests = Test::paginate(1);
        // return view("test1",["tests"=>$tests]);
        // $users = User::all()->toArray();
        // dd($users);
        // $user = User::find(1)->detail->sex;
        // $user = Detail::find(1)->user->fullname;
        // dd($user);
        // $product = Category::find(2)->product->toArray();
        // $product = Product::find(3)->category->toArray();
        // dd($product);
        // //vòng lặp
        // $result = 0;
        // for($i=1; $i <=100; $i++){
        //     $result += $i;
        // }
        // echo $result;
        // //đệ quy
        // function result($n){
        //     if($n == 1){
        //         return $n;
        //     }
        //     return $n += result($n-1);
        // }
        // echo result(100);
        // $categories = Category::All()->toArray();
        // function showCategories($categories, $parent, $char){
        //     foreach($categories as $category){
        //         if($category['parent'] == $parent){
        //             echo $char.$category['name']."<br/>";
        //             echo showCategories($categories, $category['id'], $char."|-- ");
        //         }
        //     }
        // }
        // showCategories($categories,0,"");
        echo Demo::helloWorld();
    }
    public function test2(Request $request)
    {

        //        return $request->session()->get("email");
        //        return $request->session()->get("phone","123");
        //        return $request->session()->all();
        if ($request->session()->get("email")) {
            return "helo";
        }
    }
}
