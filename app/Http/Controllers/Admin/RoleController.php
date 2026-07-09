<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
   private $route = "admin.role.";
   private $page_title = 'Role Management';

   public function index()
   {
      return view($this->route . 'index', [
         'route' => $this->route,
         'page_title' => $this->page_title
      ]);
   }

   public function datatable()
   {
      $data = Role::datatable();

      return DataTables::of($data)
         // ->addIndexColumn()
         ->addColumn('name', function ($row) {
            return $row->name;
         })
         ->addColumn('label', function ($row) {
            return $row->label;
         })
         ->addColumn('action', function ($row) {
            return '
               <button type="button" class="btn btn-soft-warning btn-icon"><i class="ti ti-edit fs-20"></i> </button>
               <button type="button" class="btn btn-soft-danger btn-icon ms-1"><i class="ti ti-trash fs-20"></i> </button>
            ';
         })
         ->rawColumns(['name', 'label', 'action'])
         ->make(true);
   }
}
