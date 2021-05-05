<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class SiteController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $basket = Session::get('basket') ?? [];
        $basketCount = $this->generateBasketString();

        return view('site.index', compact('products', 'basket', 'basketCount'));
    }

    public function addToBasket(Product $product, int $number)
    {
        if (!auth()->check()) {
            return response()->json(['result' => false, 'msg' => 'Please login']);
        }

        $basket = Session::get('basket') ?? [];
        if ($number == 0) {
            unset($basket[$product->id]);
        } else if ($number > 0) {
            $basket[$product->id] = $number;
        }
        Session::put('basket', $basket);

        $msg = ['result' => true, 'msg' => $this->generateBasketString()];
        return response()->json($msg);
    }

    private function generateBasketString()
    {
        $basket = Session::get('basket') ?? [];
        $basketCount = array_sum($basket);
        $msg = '';
        if ($basketCount == 1) {
            $msg = '(An item)';
        } else if ($basketCount > 1) {
            $msg = "($basketCount items)";
        }
        return $msg;
    }

    public function basketList()
    {
        $basket = Session::get('basket') ?? [];
        $products = Product::whereIn('id', array_keys($basket))->get();
        $basketCount = $this->generateBasketString();

        return view('site.basket', compact('basket', 'products', 'basketCount'));
    }

    public function showProfile($profilePath)
    {
        $user = User::where('profile_path', $profilePath)->first();
        if(!$user instanceof User){
            return abort(404);
        }

        $basketCount = $this->generateBasketString();
        return view('site.profile', [
            'profileName' => $user->first_name . ' ' . $user->last_name,
            'basketCount' => $basketCount,
        ]);
    }
}
