<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
            return e($row->name ?? '-');
         })
         ->addColumn('description', function ($row) {
            return e($row->description ?? '-');
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
               <button type="button" class="btn btn-soft-warning btn-icon btn-edit" data-id="' . $row->id . '" title="Edit"><i class="ti ti-edit fs-20"></i> </button>
               <button type="button" class="btn btn-soft-danger btn-icon btn-delete ms-1" data-id="' . $row->id . '" title="Delete"><i class="ti ti-trash fs-20"></i> </button>
            ';
         })
         ->rawColumns(['status', 'action'])
         ->make(true);
   }

   public function edit($id)
   {
      $departement = Departement::find($id);

      if (!$departement) {
         return response()->json([
            'success' => false,
            'message' => 'Department not found.'
         ], 404);
      }

      return response()->json([
         'success' => true,
         'data' => $departement
      ]);
   }

   public function create(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'crt_name' => ['required', 'string', 'max:255'],
         'crt_description' => ['nullable', 'string'],
      ], [
         'crt_name.required' => 'Name is required.',
         'crt_name.string' => 'Name must be a string.',
         'crt_name.max' => 'Name may not be greater than 255 characters.',
         'crt_description.string' => 'Description must be a string.',
      ]);

      if ($validator->fails()) {
         return response()->json([
            'success' => false,
            'message' => 'Validation failed.',
            'errors' => $validator->errors()
         ], 422);
      }

      $departement = new Departement();
      $departement->name = $request->crt_name;
      $departement->description = $request->crt_description;
      $departement->is_active = true;
      $departement->save();

      return response()->json([
         'success' => true,
         'message' => 'Department created successfully.',
         'data' => $departement
      ]);
   }

   public function update(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'edt_id' => ['required', 'integer'],
         'edt_name' => ['required', 'string', 'max:255'],
         'edt_description' => ['nullable', 'string'],
         'edt_aktif' => ['required', 'in:0,1'],
      ], [
         'edt_id.required' => 'Department ID is required.',
         'edt_id.integer' => 'Department ID must be an integer.',
         'edt_name.required' => 'Name is required.',
         'edt_name.string' => 'Name must be a string.',
         'edt_name.max' => 'Name may not be greater than 255 characters.',
         'edt_description.string' => 'Description must be a string.',
         'edt_aktif.required' => 'Status is required.',
         'edt_aktif.in' => 'Status is invalid.',
      ]);

      if ($validator->fails()) {
         return response()->json([
            'success' => false,
            'message' => 'Validation failed.',
            'errors' => $validator->errors()
         ], 422);
      }

      $departement = Departement::find($request->edt_id);

      if (!$departement) {
         return response()->json([
            'success' => false,
            'message' => 'Department not found.'
         ], 404);
      }

      $departement->name = $request->edt_name;
      $departement->description = $request->edt_description;
      $departement->is_active = (bool) $request->edt_aktif;
      $departement->save();

      return response()->json([
         'success' => true,
         'message' => 'Department updated successfully.',
         'data' => $departement
      ]);
   }

   public function delete(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'id' => ['required', 'integer'],
      ], [
         'id.required' => 'Department ID is required.',
         'id.integer' => 'Department ID must be an integer.',
      ]);

      if ($validator->fails()) {
         return response()->json([
            'success' => false,
            'message' => 'Validation failed.',
            'errors' => $validator->errors()
         ], 422);
      }

      $departement = Departement::find($request->id);

      if (!$departement) {
         return response()->json([
            'success' => false,
            'message' => 'Department not found.'
         ], 404);
      }

      $departement->delete();

      return response()->json([
         'success' => true,
         'message' => 'Department deleted successfully.'
      ]);
   }
}
