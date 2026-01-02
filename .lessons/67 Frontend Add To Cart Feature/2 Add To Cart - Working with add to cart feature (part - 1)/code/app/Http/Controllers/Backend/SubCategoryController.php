<?php
namespace App\Http\Controllers\Backend;

use Str;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\ChildCategory;
use App\Http\Controllers\Controller;
use App\DataTables\SubCategoryDataTable;

class SubCategoryController extends Controller
{
    public function index(SubCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.sub-category.index');
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.sub-category.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'category' => ['required'],
            'name' => ['required', 'max:200', 'unique:sub_categories,name'],
            'status' => ['required'],
        ]);
        
        $category = new SubCategory();
        
        $category->category_id = $request->category;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->save();

        toastr('Created Successfully!', 'success');

        return redirect()->route('admin.sub-category.index');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $categories = Category::all();
        $subCategory = SubCategory::findOrFail($id);
        return view('admin.sub-category.edit', compact('subCategory', 'categories'));
    }


    public function update(Request $request, string $id)
    {
        // dd($request->all());

        $request->validate([
            'category' => ['required'],
            'name' => ['required', 'max:200', 'unique:sub_categories,name,'.$id],
            'status' => ['required'],
        ]);
        
        $category = SubCategory::findOrFail($id);
        
        $category->category_id = $request->category;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->save();

        toastr('Updated Successfully!', 'success');

        return redirect()->route('admin.sub-category.index');

    }


    public function destroy(string $id)
    {
        $subCategory = SubCategory::findOrFail($id);

        $childCategory = ChildCategory::where('sub_category_id', $subCategory->id)->count();
       
        if( $childCategory > 0 ) {
            return response(['status' => 'error', 'message' => 'This item contain sub items for delete this you have to delete the sub items first']);
        }

        $subCategory->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }


    public function changeStatus(Request $request) 
    {
        // dd($request->all());
        $subCategory = SubCategory::findOrFail($request->id);
        $subCategory->status = $request->isChecked == 'true' ? 1 : 0;
        $subCategory->save();
        
        return response(['message' => 'Status has been updated!']);
    }
}