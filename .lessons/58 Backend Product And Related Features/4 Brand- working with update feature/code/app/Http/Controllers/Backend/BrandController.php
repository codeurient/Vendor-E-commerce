<?php
namespace App\Http\Controllers\Backend;

use Str;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ImageUploadTrait;
use App\DataTables\BrandDataTable;

class BrandController extends Controller
{
    use ImageUploadTrait;
    
    public function index(BrandDataTable $dataTable)
    {
        return $dataTable->render('admin.brand.index');
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'logo' => ['image', 'required', 'max:2000'],
            'name' => ['required', 'max:200'],
            'is_featured' => ['required'],
            'status' => ['required'],
        ]);

        $logoPath = $this->uploadImage($request, 'logo', 'uploads');

        $brand = new Brand();

        $brand->logo = $logoPath;
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->is_featured = $request->is_featured;
        $brand->status = $request->status;
        $brand->save();

        toastr('Created Successfully!', 'success');
        return redirect()->route('admin.brand.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'logo'        => ['image', 'max:2000'],
            'name'        => ['required', 'max:200'],
            'is_featured' => ['required'],
            'status'      => ['required']
        ]);

        $brand = Brand::findOrFail($id);

        $logoPath = $this->updateImage($request, 'logo', 'uploads', $brand->logo);

        $brand->logo        = empty(!$logoPath) ? $logoPath : $brand->logo;
        $brand->name        = $request->name;
        $brand->slug        = Str::slug($request->name);
        $brand->is_featured = $request->is_featured;
        $brand->status      = $request->status;
        $brand->save();

        toastr('Updated Successfully!', 'success');
        return redirect()->route('admin.brand.index');
    }

    public function destroy(string $id)
    {
        //
    }
}