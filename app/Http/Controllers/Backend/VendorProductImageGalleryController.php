<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use App\Models\ProductImageGallery;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\DataTables\VendorProductImageGalleryDataTable;

class VendorProductImageGalleryController extends Controller
{
    use ImageUploadTrait;

    public function index(Request $request, VendorProductImageGalleryDataTable $dataTable)
    {
        $product = Product::findOrFail($request->product);

        /** Check product vendor */
        if($product->vendor_id !== Auth::user()->vendor->id){
            abort(404);
        }

        return $dataTable->render('vendor.product.image-gallery.index', compact('product'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'image.*' => ['required', 'image', 'max:2048']
        ]);

        /** Handle image upload */
        $imagePaths = $this->uploadMultiImage($request, 'image', 'uploads');

        foreach($imagePaths as $path){
            $productImageGallery = new ProductImageGallery();
            $productImageGallery->image = $path;
            $productImageGallery->product_id = $request->product;
            $productImageGallery->save();
        }

        toastr('Uploaded successfully!');
        return redirect()->back();
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        $productImage = ProductImageGallery::findOrFail($id);

        /** Check product vendor */
        if($productImage->product->vendor_id !== Auth::user()->vendor->id){
            abort(404);
        }

        $this->deleteImage($productImage->image);
        $productImage->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
