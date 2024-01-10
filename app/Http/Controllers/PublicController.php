<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home(){
        $products = Product::where('is_accepted', true)->take(4)->orderByDesc('created_at')->get();
        return view('home', compact('products'));
    }
    public function searchProduct(Request $request){
        $products = Product::search($request->searched)->where('is_accepted', true)->paginate(16);
        return view('index', compact('products'));
    }
    
    public function setLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
