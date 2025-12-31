<?php

namespace App\Http\Controllers\Backend;

use App\Models\ShippingRule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\ShippingRuleDataTable;

class ShippingRuleController extends Controller
{
    public function index(ShippingRuleDataTable $dataTable)
    {
        return $dataTable->render('admin.shipping-rule.index');
    }

    public function create()
    {
        return view('admin.shipping-rule.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'type' => ['required'],
            'min_cost' => ['nullable', 'integer'],
            'cost' => ['required', 'integer'],
            'status' => ['required']
        ]);

        $shipping = new ShippingRule();
        $shipping->name = $request->name;
        $shipping->type = $request->type;
        $shipping->min_cost = $request->min_cost;
        $shipping->cost = $request->cost;
        $shipping->status = $request->status;
        $shipping->save();

        toastr('Created Successfully', 'success', 'Success');
        return redirect()->route('admin.shipping-rule.index');
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $shipping = ShippingRule::findOrFail($id);
        return view('admin.shipping-rule.edit', compact('shipping'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'     => ['required', 'max:200'],
            'type'     => ['required'],
            'min_cost' => ['nullable', 'integer'],
            'cost'     => ['required', 'integer'],
            'status'   => ['required']
        ]);

        $shipping = ShippingRule::findOrFail($id);
        $shipping->name = $request->name;
        $shipping->type = $request->type;
        $shipping->min_cost = $request->min_cost;
        $shipping->cost = $request->cost;
        $shipping->status = $request->status;
        $shipping->save();

        toastr('Updated Successfully', 'success', 'Success');
        return redirect()->route('admin.shipping-rule.index');
    }

    public function destroy(string $id)
    {
        //
    }
}
