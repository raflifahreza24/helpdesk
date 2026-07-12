<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DepartementController extends Controller
{
   private $route = "master.departement.";
   private $page_title = 'Department Management';

   public function index()
   {
      return view($this->route . 'index', [
         'route' => $this->route,
         'page_title' => $this->page_title
      ]);
   }

   public function datatable()
   {
      $data = Departement::datatable();

      return DataTables::of($data)
         // ->addIndexColumn()
         ->addColumn('name', function ($row) {
            return $row->name ?? '-';
         })
         ->addColumn('description', function ($row) {
            return $row->description ?? '-';
         })
         ->addColumn('status', function ($row) {
            if ($row->is_active) {
               return '
                  <span class="badge bg-success fs-14">Aktif</span>
               ';
            }

            return '
                  <span class="badge bg-danger fs-14">Tidak Aktif</span>
               ';
         })
         ->addColumn('action', function ($row) {
            return '
               <button type="button" class="btn btn-soft-warning btn-icon"><i class="ti ti-edit fs-20"></i> </button>
               <button type="button" class="btn btn-soft-danger btn-icon ms-1"><i class="ti ti-trash fs-20"></i> </button>
            ';
         })
         ->rawColumns(['name', 'description', 'status', 'action'])
         ->make(true);
   }
}
