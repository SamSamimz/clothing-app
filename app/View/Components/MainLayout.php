<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use Illuminate\View\View;

class MainLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        if(Auth::check()){
            $carts = auth()->user()->carts;
            if($carts) {
                $cart = $carts->cartItem->count();
                return view('layouts.main',compact('cart'));
            }
        }
        return view('layouts.main');
    }
}
