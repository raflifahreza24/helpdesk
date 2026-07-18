<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
   private $route = "master.category.";
   private $page_title = 'Category Management';

   public function index()
   {
      return view($this->route . 'index', [
         'route' => $this->route,
         'page_title' => $this->page_title
      ]);
   }

   public function datatable()
   {
      $data = Category::datatable();

      return DataTables::of($data)
         // ->addIndexColumn()
         ->addColumn('name', function ($row) {
            return e($row->name ?? '-');
         })
         ->addColumn('description', function ($row) {
            return e($row->description ?? '-');
         })
         ->addColumn('color', function ($row) {
            $color = strtolower($row->color ?? '');

            if (empty($color)) {
               return '-';
            }

            $textColor = match ($color) {
               'light', 'warning' => 'text-dark',
               default => 'text-light',
            };

            return '
               <span class="badge bg-' . e($color) . ' ' . $textColor . ' fs-14">
                  ' . e(ucfirst($color)) . '
               </span>
            ';
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
         ->rawColumns(['status', 'color', 'action'])
         ->make(true);
   }

   public function edit($id)
   {
      $data = Category::find($id);

      if (!$data) {
         return response()->json([
            'success' => false,
            'message' => 'Category not found.'
         ], 404);
      }

      return response()->json([
         'success' => true,
         'data' => $data
      ]);
   }

   public function create(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'crt_name' => ['required', 'string', 'max:255'],
         'crt_description' => ['nullable', 'string'],
         'crt_color' => ['required', 'string', 'max:20'],
      ], [
         'crt_name.required' => 'Name is required.',
         'crt_name.string' => 'Name must be a string.',
         'crt_name.max' => 'Name may not be greater than 255 characters.',
         'crt_description.string' => 'Description must be a string.',
         'crt_color.required' => 'Color is required.',
         'crt_color.string' => 'Color must be a string.',
         'crt_color.max' => 'Color may not be greater than 20 characters.',
      ]);

      if ($validator->fails()) {
         return response()->json([
            'success' => false,
            'message' => 'Validation failed.',
            'errors' => $validator->errors()
         ], 422);
      }

      $category = new Category();
      $category->name = $request->crt_name;
      $category->description = $request->crt_description;
      $category->color = $request->crt_color;
      $category->is_active = true;
      $category->save();

      return response()->json([
         'success' => true,
         'message' => 'Department created successfully.',
         'data' => $category
      ]);
   }

   public function update(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'edt_id' => ['required', 'integer'],
         'edt_name' => ['required', 'string', 'max:255'],
         'edt_description' => ['nullable', 'string'],
         'edt_aktif' => ['required', 'in:0,1'],
         'edt_color' => ['required', 'string', 'max:20'],
      ], [
         'edt_id.required' => 'Category ID is required.',
         'edt_id.integer' => 'Category ID must be an integer.',
         'edt_name.required' => 'Name is required.',
         'edt_name.string' => 'Name must be a string.',
         'edt_name.max' => 'Name may not be greater than 255 characters.',
         'edt_description.string' => 'Description must be a string.',
         'edt_aktif.required' => 'Status is required.',
         'edt_aktif.in' => 'Status is invalid.',
         'edt_color.required' => 'Color is required.',
         'edt_color.string' => 'Color must be a string.',
         'edt_color.max' => 'Color may not be greater than 20 characters.',
      ]);

      if ($validator->fails()) {
         return response()->json([
            'success' => false,
            'message' => 'Validation failed.',
            'errors' => $validator->errors()
         ], 422);
      }

      $category = Category::find($request->edt_id);

      if (!$category) {
         return response()->json([
            'success' => false,
            'message' => 'Category not found.'
         ], 404);
      }

      $category->name = $request->edt_name;
      $category->description = $request->edt_description;
      $category->color = $request->edt_color;
      $category->is_active = (bool) (int) $request->edt_aktif;
      $category->save();

      return response()->json([
         'success' => true,
         'message' => 'Department updated successfully.',
         'data' => $category
      ]);
   }

   public function delete(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'id' => ['required', 'integer'],
      ], [
         'id.required' => 'Category ID is required.',
         'id.integer' => 'Category ID must be an integer.',
      ]);

      if ($validator->fails()) {
         return response()->json([
            'success' => false,
            'message' => 'Validation failed.',
            'errors' => $validator->errors()
         ], 422);
      }

      $category = Category::find($request->id);

      if (!$category) {
         return response()->json([
            'success' => false,
            'message' => 'Category not found.'
         ], 404);
      }

      $category->delete();

      return response()->json([
         'success' => true,
         'message' => 'Category deleted successfully.'
      ]);
   }
}
