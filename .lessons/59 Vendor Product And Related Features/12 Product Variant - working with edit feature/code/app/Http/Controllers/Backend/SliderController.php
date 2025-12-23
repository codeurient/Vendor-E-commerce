<?php
namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    use ImageUploadTrait;

    public function index(SliderDataTable $dataTable)
    {
        return $dataTable->render('admin.slider.index');
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'banner' => ['required', 'image', 'max:2000'],
            'type' => ['string', 'max:200'],
            'title' => ['required', 'max:200'],
            'starting_price' => ['max:200'],
            'btn_url' => ['url'],
            'serial' => ['required'],
            'status' => ['required'],
        ]);

        $slider = new Slider();

        $imagePath = $this->uploadImage($request, 'banner', 'uploads');
        $slider->banner = $imagePath;

        $slider->type           = $request->type;
        $slider->title          = $request->title;
        $slider->starting_price = $request->starting_price;
        $slider->btn_url        = $request->btn_url;
        $slider->serial         = $request->serial;
        $slider->status         = $request->status;
        $slider->save();

        toastr('Created Successfully!', 'success');
        return redirect()->back();
    }

    
    public function show(string $id)
    {
        //
    }

   
    public function edit(string $id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

   
    public function update(Request $request, string $id)
    {
        $request->validate([
            'banner' => ['nullable', 'image', 'max:2000'],
            'type' => ['string', 'max:200'],
            'title' => ['required', 'max:200'],
            'starting_price' => ['max:200'],
            'btn_url' => ['url'],
            'serial' => ['required'],
            'status' => ['required'],
        ]);

        $slider = Slider::findOrFail($id);

        $imagePath = $this->updateImage($request, 'banner', 'uploads', $slider->banner);

        // dd(empty(!$imagePath));
        // die();

        $slider->banner         = empty(!$imagePath) ? $imagePath : $slider->banner;
        
        $slider->type           = $request->type;
        $slider->title          = $request->title;
        $slider->starting_price = $request->starting_price;
        $slider->btn_url        = $request->btn_url;
        $slider->serial         = $request->serial;
        $slider->status         = $request->status;
        $slider->save();

        toastr('Updated Successfully!', 'success');
        return redirect()->route('admin.slider.index');
    }

    
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);
        $this->deleteImage($slider->banner);
        $slider->delete();
        
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);

        // toastr('Deleted Successfully!', 'success');
        // return redirect()->back();
    }
}