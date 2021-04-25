<?php
namespace App\DataTables;

use App\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use app\Models\Subcategory;
use app\Models\Category;

class SubCategoryDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    
    // public function dataTable()
    // {    $model = \App\Models\Subcategory::query();
          
    //     return datatables()
    //         ->eloquent($model)
           
    //          ->addColumn('action', 'subcategories.datatables_actions');
    // }
    // ->filter(function ($query) {
    //     // if (request()->has('id')) {
    //         $query->where('category_id',request()->id );
    //     // }
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        $columns = array_column($this->getColumns(), 'data');
        $dataTable = 
        $dataTable
          
            ->editColumn('updated_at', function ($subcategory) {
                return getDateColumn($subcategory, 'updated_at');
            })
            ->addColumn('action', 'subcategories.datatables_actions')
            ->rawColumns(array_merge($columns, ['action']));

        return $dataTable;
    }
    public function query(Subcategory $model)
    {
        return $model->newQuery()->with("Categories")->where('category_id',request()->id );
    }

       
    // })
    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    // public function query(SubCategory $model)
    // {   
    //     return $model->newQuery()->where('id','=','1');
    // }
    // public function query(SubCategory $model)
    // {   dd($model);
    //     return $model->newQuery()->where('category_id','=','1');
    // }
    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    // public function html()
    // {
    //     return $this->builder()
    //                 ->setTableId('users-table')
    //                 ->columns($this->getColumns())
    //                 ->minifiedAjax()
    //                 ->dom('Bfrtip')
    //                 ->orderBy(1)
    //                 ->buttons(
    //                     Button::make('create'),
    //                     Button::make('export'),
    //                     Button::make('print'),
    //                     Button::make('reset'),
    //                     Button::make('reload')
    //                 );
    // }
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['title'=>trans('lang.actions'),'width' => '80px', 'printable' => false, 'responsivePriority' => '100'])
            ->parameters(array_merge(
                config('datatables-buttons.parameters'), [
                    'language' => json_decode(
                        file_get_contents(base_path('resources/lang/' . app()->getLocale() . '/datatable.json')
                        ), true)
                ]
            ));
    }

    /**
     * Get columns.
     *
     * @return array
     */
    // protected function getColumns()
    // {
        
    //     return [
            
    //         Column::make('id'),
    //         Column::make('name'),
    //         Column::make('description'),
    //         Column::make('category_id'),
    //         Column::make('created_at'),
    //         Column::make('updated_at'),
    //         Column::make('actions'),
    //     ];
    // }
    protected function getColumns()
    {
        $columns = [
            [
                'data' => 'id',
                'title' => 'id',

            ],
            [
                'data' => 'name',
                'title' => 'name',

            ],
            [
                'data' => 'categories.name',
                'title' => trans('lang.product_category_id'),

            ],
            [
                'data' => 'description',
                'title' => 'description',
            ],
            [
                'data' => 'updated_at',
                'title' => 'Created at',
            ]
        ];
        return $columns;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'subcategoriesdatatable_' . date('YmdHis');
    }
}