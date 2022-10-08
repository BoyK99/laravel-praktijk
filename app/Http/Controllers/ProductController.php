<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index() {
        $products = Product::all();
//        dd($products);
        return view('data', compact('products'));
    }

//    public function create() {
//        return view('products.create');
//    }
//
//    // Les 6 - functie
//    public function store(Request $request) {
//        // Validation
//        $request->validate([
//            'title' => 'required',
//            'description' => 'required',
//            'price' => 'required','numeric'
//        ]);
//
//        Product::create($request->all());
//
//        return redirect()->route('products.index');
//
////        dd($request);
//    }
//
//    public function delete() {
//        return view('products.delete');
//    }
}
