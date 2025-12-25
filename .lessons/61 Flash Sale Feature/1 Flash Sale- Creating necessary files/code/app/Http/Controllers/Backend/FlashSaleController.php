<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\FlashSale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\FlashSaleItemDataTable;

class FlashSaleController extends Controller
{
    public function index(FlashSaleItemDataTable $dataTable)
    {
        return $dataTable->render('admin.flash-sale.index');
    }
}
