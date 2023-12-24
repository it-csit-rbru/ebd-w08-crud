<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Brands;

class ProductsController extends Controller
{
    public function index(){
        $products = Products::orderBy('id', 'DESC')->paginate(5);
        return view('products.index',compact('products'));
    }
    public function create(){
        $categories = Categories::pluck('category_name','id');
        $brands = Brands::pluck('brand_name','id');
        return view('products.create',compact('categories','brands'));
    }
    public function store(Request $request){
        $request->validate([
            'product_name' => 'required',
            'product_desc' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',          
        ]);
        Products::create($request->post());

        return redirect()->route('products.index')->with('success','Product has been added');
    }
    public function show(Products $product){
        return view('products.show',compact('product'));
    }

    public function edit(Products $product){
        $categories = Categories::pluck('category_name','id');
        $brands = Brands::pluck('brand_name','id');
        return view('products.edit',compact('product','categories','brands'));
    }
    public function update(Request $request,Products $product){
        $request->validate([
            'product_name' => 'required',
            'product_desc' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
        ]);
        $product->fill($request->post())->save();

        return redirect()->route('products.index')->with('success','Product has been updated');
    }
    public function destroy(Products $product){
        $product->delete();
        return redirect()->route('products.index')->with('success','Product has been deleted');
    }
}
