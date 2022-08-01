<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::select('id', 'name', 'price','img','status')->paginate(5);
        if ($keyword = request('keyword')) {
            $products = Product::select('id', 'name', 'price','img')->where('name','like','%'.$keyword.'%')->paginate(5);
        }
        return view('admin.product.list', ['product_list' => $products]);
    }
    public function add()
    {
        return view('admin.product.add');
    }
    public function store(Request $request)
    {


        $product = new Product();
        // gán dữ liệu gửi lên vào biến data
        // $data = $request->all();
        $product -> fill($request->all());
        if($request->hasFile('img')){
            $img = $request->img;
            $imgName = $img->hashName();
            $imgName = $request->user_name.'-'.$imgName;
          //    dd( $img->storeAs('images',$imgName));
          $product->img = $img ->storeAs('images/product',$imgName);

          }else
          {
              $product->img = '';
          }

        $product->save();

        return redirect()->route('product.list');

    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit', ['product' => $product]);
    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->fill($request->all());
        if($request->hasFile('img')){
            $img = $request->img;
            $imgName = $img->hashName();
            $imgName = $request->user_name.'-'.$imgName;
          //    dd( $img->storeAs('images',$imgName));
          $product->img = $img ->storeAs('images/product',$imgName);

          }else
          {
              $product->img = '';
          }
        $product->save();
        return redirect()->route('product.list');
    }
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.list');
    }
    public function update_status(Product $id )
    {
        // dd($id->status);
        // if ($id->status == 0) {
        //     $id->status = 1;
        // } else {
        //     $id->status = 0;
        // }
        // dd($id);
        $id->status = $id->status == 0 ? 1 : 0;
        $id->save();
        $id->status = $id->status == 0 ? 1 : 0;
        $id->save();
        return redirect()->route('product.list');
    }

    //
}
