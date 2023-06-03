<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\Product;
use App\Models\Category;
use App\Traits\ResponseApi;
use App\Traits\Paginator;
use DateTime;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
// use DataTables;

class ProductController extends Controller
{
    use ResponseApi,Paginator;

    // public function index(){
    //     $products = Product::all();
    //     return view('pages.tables.product_table', ['products' => $products]);
    // }
    public function refreshView()
    {
        $active_products = Product::where('status', 1)->get();
        $active_categories = Category::where('status', 1)->get();


        // compose the date
        $data = [
            'active_products' => $active_products,
            'active_categories' => $active_categories
        ];

        return $data;
    }

    public function index()
    {
        $data = $this->refreshView();
        return view('pages.tables.product_table')->with('products', $data);
    }

    public function topProducts(){
        $products = Product::all();
        return view('home', ['products' => $products]);
    }
    public function allProducts(){
        $products = Product::all();
        return view('home', ['products' => $products]);
    }
    

    public function store(Request $request)
    {
        // Edit Product
        if ($request->method == 'editProduct') {
            $this->editProduct($request);
        }

        // toggling status
        if ($request->method == 'toggleStatus') {
            $this->toggleStatus($request, $request->id);
        }
        // complete all tasks
        if ($request->method == 'completeAllTasks') {
            $this->completeAllTasks($request, $request->id);
        }


        // delete
        if ($request->method == 'deleteProduct') {
            $this->destroyProduct($request->del_prod_id);
        }

        
        // deleteAll
        if ($request->method == 'deleteAll') {
            $this->destroyAll();
        }
        // add a new product
        if ($request->method == 'addProduct')
        {
            $this->addProduct($request);
        }

        return redirect()->route('products.index');
    }
    
    public function addProduct(Request $request)
    {
        $product = new Product;

        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->specs = $request->specs;
        $product->unit_price = $request->unit_price;
        $product->bundle_discount = $request->bundle_discount;
        $product->discount_percentage = $request->discount_percentage;
        $product->lead_time = $request->lead_time;
        $product->status = $request->status;

        $product->save();

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            //$image_name = $image->getClientOriginalName(); //gets the name of the image upon file upload
            $destination_path = public_path("/assets/products/");
            $image->move($destination_path, $product->id.'.jpg');
            Product::find($product->id)->update(['image' => "/assets/products/{$product->id}.jpg"]);
        }
        
        // Add Filtering
        session()->flash('success', 'Product Successfully Added!');

        return;

    }

    public function editProduct(Request $request)
    {
        $product = Product::where('id', $request->prod_id)->first();
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->specs = $request->specs;
        $product->unit_price = $request->unit_price;
        $product->bundle_discount = $request->bundle_discount;
        $product->discount_percentage = $request->discount_percentage;
        $product->lead_time = $request->lead_time;

        $product->save();

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $destination_path = public_path("/assets/products/");
            $image->move($destination_path, $product->id.'.jpg');
            Product::find($product->id)->update(['image' => "/assets/products/{$product->id}.jpg"]);
        }

        // Edit Filtering
        session()->flash('success', 'Product Successfully Updated!');

        return;
    }

    public function productDetails($productId)
    {
        return Product::find($productId);
    }

    public function destroyProduct($id)
    {
        // Product::destroy($id);
        $product = Product::find($id); // find the post with an id of 1
        $product->delete();

        // Delete Filtering
        session()->flash('success', 'Product Successfully Deleted!');
        return;
    }

}
