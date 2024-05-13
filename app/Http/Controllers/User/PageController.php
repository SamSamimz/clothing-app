<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Product;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //__Products
    public function products() {
        $products = Product::paginate(6);
        return view('user.pages.products',compact('products'));
    }
    //__About
    public function about() {
        $members = TeamMember::all();
        $partners = Partner::all();
        return view('user.pages.about',compact('members','partners'));
    }
    
    //__Contact
    public function contact() {
        $partners = Partner::all();
        return view('user.pages.contact',compact('partners'));
    }

    public function show(Product $product) {
        // $avgReview = $product->getReview();
        return view('user.pages.show_product',compact('product'));
    }

}
