<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Product;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $products = Product::all()->count();
        $members = TeamMember::all()->count();
        $partners = Partner::all()->count();
        return view('admin.dashboard',compact('products','members','partners'));
    }
}
