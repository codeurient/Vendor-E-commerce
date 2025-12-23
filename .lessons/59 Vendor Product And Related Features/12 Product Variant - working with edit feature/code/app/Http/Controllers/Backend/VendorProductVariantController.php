<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\DataTables\VendorProductVariantDataTable;

class VendorProductVariantController extends Controller
{
    public function index(Request $request, VendorProductVariantDataTable $dataTable)
    {
        $product = Product::findOrFail($request->product);

        if($product->vendor_id !== Auth::user()->vendor->id){
            abort(404);
        }

        return $dataTable->render('vendor.product.product-variant.index', compact('product'));
    }

    public function create()
    {
        return view('vendor.product.product-variant.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product' => ['integer', 'required'],
            'name'    => ['required', 'max:200'],
            'status'  => ['required']
        ]);

        $varinat = new ProductVariant();
        $varinat->product_id = $request->product;
        $varinat->name = $request->name;
        $varinat->status = $request->status;
        $varinat->save();

        toastr('Created Successfully!', 'success', 'success');
        return redirect()->route('vendor.products-variant.index', ['product' => $request->product]);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $variant = ProductVariant::findOrFail($id);
        /** Check product vendor */
        if($variant->product->vendor_id !== Auth::user()->vendor->id){
            abort(404);
        }
        return view('vendor.product.product-variant.edit', compact('variant'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'status' => ['required']
        ]);

        $varinat = ProductVariant::findOrFail($id);
        /** Check product vendor */
        if($varinat->product->vendor_id !== Auth::user()->vendor->id){
            abort(404);
        }
        $varinat->name = $request->name;
        $varinat->status = $request->status;
        $varinat->save();

        toastr('Updated Successfully!', 'success', 'success');

        return redirect()->route('vendor.products-variant.index', ['product' => $varinat->product_id]);
    }

    public function destroy(string $id)
    {
        //
    }
}
