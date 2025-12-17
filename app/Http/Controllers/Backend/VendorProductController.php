<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\VendorProductDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorProductController extends Controller
{

    public function index(VendorProductDataTable $dataTable)
    {
        return $dataTable->render('vendor.product.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
        //
    }
}
