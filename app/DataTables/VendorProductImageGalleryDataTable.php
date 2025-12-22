<?php

namespace App\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use App\Models\ProductImageGallery;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Models\VendorProductImageGallery;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class VendorProductImageGalleryDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', function($query){
            $deleteBtn = "<a href='".route('vendor.products-image-gallery.destroy', $query->id)."' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";

            return $deleteBtn;
        })
        ->addColumn('image', function($query){
            return "<img width='100px' src='".asset($query->image)."' ></img>";
        })
        ->rawColumns(['image', 'action'])
        ->setRowId('id');
    }


    public function query(ProductImageGallery $model): QueryBuilder
    {
        return $model->where('product_id', request()->product)->newQuery();
    }


    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('vendorproductimagegallery-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }


    public function getColumns(): array
    {
        return [
            Column::make('id')->width(100),
            Column::make('image'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(400)
            ->addClass('text-center'),
        ];
    }


    protected function filename(): string
    {
        return 'VendorProductImageGallery_' . date('YmdHis');
    }
}
