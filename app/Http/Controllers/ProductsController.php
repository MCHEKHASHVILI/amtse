<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * 
     * Set Locale en
     * Create a new controller instance.
     * Create public repository.
     *
     * @return void
     */
    public function __construct(){
        // Set Locale
        if(request()->has("lang")){
            App::setLocale(request()->get("lang"));
        }
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            "user_id" => Auth::id(),
            "name" => $request["name"],
            "length" => $request["length"],
            "width" => $request["length"],
            "height" => $request["height"],
            "weight" => $request["weight"],
        ];

        if(Product::create($data)){
            $request->session()->flash('success', 'პროდუქტი წარმატებით დაემატა!');
        }else{
            $request->session()->flash('error', 'პროდუქტი ვერ დაემატა!');
        }
        return view('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view("products.show")->with("product",$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view("products.edit")->with("product",$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = [
            "user_id" => Auth::id(),
            "name" => $request["name"],
            "length" => $request["length"],
            "width" => $request["length"],
            "height" => $request["height"],
            "weight" => $request["weight"],
        ];

        if($product->update($data)){
            $request->session()->flash('success', 'პროდუქტი წარმატებით განახლდა!');
        }else{
            $request->session()->flash('error', 'პროდუქტი ვერ განახლდა!');
        }
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
