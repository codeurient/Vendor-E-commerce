<?php
namespace App\Http\Controllers\Backend;

use Str;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\CategoryDataTable;

class CategoryController extends Controller
{
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'icon' => ['required', 'not_in:empty'],
            'name' => ['required', 'max:200', 'unique:categories,name'],
            'status' => ['required'],
        ]);
        
        $category = new Category();
        
        $category->icon = $request->icon;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->save();

        toastr('Created Successfully!', 'success');

        return redirect()->route('admin.category.index');

    }

    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        // dd($request->all());

        $request->validate([
            'icon' => ['required', 'not_in:empty'],
            'name' => ['required', 'max:200', 'unique:categories,name,'.$id],
            'status' => ['required'],
        ]);
        
        $category = Category::findOrFail($id);
        
        $category->icon = $request->icon;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->save();

        toastr('Updated Successfully!', 'success');

        return redirect()->route('admin.category.index');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        
        return response(['status' => 'success', 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request) 
    {
        // dd($request->all());
        $category = Category::findOrFail($request->id);
        $category->status = $request->isChecked == 'true' ? 1 : 0;
        $category->save();
        
        return response(['message' => 'Status has been updated!']);
    }
}
