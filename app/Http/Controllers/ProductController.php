<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('order','asc')->paginate(12);
        return view('admin.products.products')->with('products',$products);
    }

    public function create()
    {
        return view('admin.products.addProduct');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'image' => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'availability' => 'required',
            'short_description' => 'required|min:10',
        ]);

        $product = new Product;

        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $request->file('image')->move(public_path() . '/uploads/Products', $fileNameToStore);
        $product->image=$fileNameToStore;

        $product->title=$request->input('title');
        $product->order = (Product::count()) + 1;
        $product->model=$request->input('model');
        $product->price=$request->input('price');
        $product->availability=$request->input('availability');
        $product->color=$request->input('color');
        $product->type=$request->input('product_type');
        $product->short_description=$request->input('short_description');
        $product->long_description=$request->input('long_description');
        $product->seo_title = $request->input('seo_title');
        $product->meta_description = $request->input('meta_description'); 
        $product->slug = str_replace(' ', '-', strtolower($request->input('title')));
        $product->save();

        if($request->hasFile('product_gallery')){
            foreach($request->file('product_gallery') as $image){
                $fileNameWithExt = $image->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
                $image->move(public_path() . '/uploads/Products/ProductsGallery', $fileNameToStore);  
                
                $productGallery = new ProductGallery;
                $productGallery->image = $fileNameToStore;              
                $productGallery->product_id = $product->id;
                $productGallery->save();
            }
        } 

        return redirect()->route('products')->with('success','Product Added Successfully!');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.products.editProduct')->with('product',$product);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'availability' => 'required',
            'short_description' => 'required|min:10',
        ]);

        $product = Product::find($id);

        if($request->hasFile('image')){
            File::delete("uploads/Products/" . $product->image);
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $request->file('image')->move(public_path() . '/uploads/Products', $fileNameToStore);
            $product->image=$fileNameToStore;
        }

        $product->title=$request->input('title');
        $product->model=$request->input('model');
        $product->price=$request->input('price');
        $product->availability=$request->input('availability');
        $product->color=$request->input('color');
        $product->type=$request->input('product_type');
        $product->short_description=$request->input('short_description');
        $product->long_description=$request->input('long_description');
        $product->seo_title = $request->input('seo_title');
        $product->meta_description = $request->input('meta_description'); 
        $product->slug = str_replace(' ', '-', strtolower($request->input('title')));
        $product->save();

        if($request->hasFile('product_gallery')){
            foreach($request->file('product_gallery') as $image){
                $fileNameWithExt = $image->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
                $image->move(public_path() . '/uploads/Products/ProductsGallery', $fileNameToStore);  
                
                $productGallery = new ProductGallery;
                $productGallery->image = $fileNameToStore;              
                $productGallery->product_id = $product->id;
                $productGallery->save();
            }
        } 

        return redirect()->route('products')->with('success','Product Updated Successfully!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        File::delete("uploads/Products/" . $product->image);
        $product->delete();

        return redirect()->route('products')->with('success','Product Deleted Successfully!');
    }

    public function productStatus(Request $request)
    {
        $product = Product::find($request->product_id);
        $product->status = $request->status;
        $product->save();
    }

    public function sortProduct()
    {
        $products = Product::orderBy('order','asc')->get();
        return view('admin.products.sortProducts')->with('products',$products);
    }

    public function updateProductsOrder(Request $request)
    {
        $products = Product::all();
        
        foreach ($products as $product) {
            foreach ($request->order as $order) {
                if ($order['id'] == $product->id) {
                    $product->update(['order' => $order['position']]);
                }
            }
        }
        return response('Updated Successfully.', 200);
    }

    public function productGallery($id)
    {
        $product = Product::find($id);
        return view('admin.products.productGallery')->with('product',$product);
    }

    public function deleteProductGallery($id)
    {
        $productGalleryImage = ProductGallery::find($id);
        File::delete("uploads/Products/ProductsGallery/" . $productGalleryImage->image);
        $productGalleryImage->delete();

        return redirect()->route('products.productGallery',[$productGalleryImage->product_id])->with('success','Image Deleted Successfully');
    }

    public function productGalleryImageStatus(Request $request)
    {
        $productGalleryImageStatus = ProductGallery::find($request->image_id);
        $productGalleryImageStatus->status = $request->status;
        $productGalleryImageStatus->save();
    }

}
