<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Student;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $products;
    protected $product;


    public function index()
    {
        return view('product.add');
    }
    public function create(Request $request)
    {
        $this->product = new product();
        $this->product->name = $request->name;
        $this->product->category = $request->category;
        $this->product->brand = $request->brand;
        $this->product->price = $request->price;
        $this->product->description = $request->description;
        $this->product->image = $request->image;
        $this->product->save();

        return redirect()->back()->with('message', 'product info save successfully.');
    }
    public function manage()
    {
        $this->products = Product::orderby('id','desc')->get();
        return view('manage-product',['products'=> $this->products]);
    }
    public  function edit($id)
    {
        $this->product = Product::find($id);

        return view ('edit-product',['product' => $this->product]);
    }
    public function update(Request $request,$id)
    {

        $this->product = Product::find($id);
        $this->product->name     = $request->name;
        $this->product->category = $request->category;
        $this->product->brand    = $request->brand;
        $this->product->price    = $request->price;
        $this->product->description = $request->description;
        $this->product->image = $request->image;
        $this->product->save();
        return redirect('/manage-product')->with('message','Product info update successfully');
    }
    public function delete($id)
    {
        $this->product =Product::find($id);
        $this->product->delete();

        return redirect('/manage-product')->with('message','Product info delete successfully');
    }
}
