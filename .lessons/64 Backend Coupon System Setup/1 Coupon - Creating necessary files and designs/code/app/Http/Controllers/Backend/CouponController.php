<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\DataTables\CouponDataTable;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
   
    public function index(CouponDataTable $dataTable)
    {
        return $dataTable->render('admin.coupon.index');
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
