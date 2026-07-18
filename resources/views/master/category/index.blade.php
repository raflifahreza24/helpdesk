<x-layout>
   @include('components.sidebar')
   @include('components.topbar')

   <div class="page-content">
      <div class="page-container">
         <div class="row">
            <div class="col-12">
               <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column">
                  <div class="flex-grow-1">
                     <h4 class="fs-18 text-uppercase fw-bold m-0">{{ $page_title }}</h4>
                  </div>

                  <div class="mt-3 mt-sm-0">
                     <form action="javascript:void(0);">
                        <div class="row g-2 mb-0 align-items-center">
                           <div class="col-auto">
                              <button type="button" class="btn btn-soft-dark" data-bs-toggle="modal" data-bs-target="#modal-create"> 
                                 <iconify-icon icon="solar:add-circle-bold-duotone" class="fs-18 align-middle me-1"></iconify-icon>
                                 <span>Create</span>
                              </button>
                           </div>
                        </div>
                        <!--end row-->
                     </form>
                  </div>
               </div><!-- end card header -->
            </div>
            <!--end col-->
         </div> <!-- end row-->

         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header border-bottom border-dashed">
                     <h4 class="header-title">All Category</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                     <div id="table-gridjs"></div>
                  </div><!-- end card-body -->
               </div><!-- end card -->
            </div>
            <!-- end col -->
         </div>
         <!-- end row -->

      </div> <!-- container -->
      @include('components.footer')
   </div>

   @push('modal')
      <!-- Create Modal -->
      <div id="modal-create" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title" id="standard-modalLabel">Create Category</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form action="#" method="post" id="form-create-category">
                  <div class="modal-body">
                     <div class="row">
                        <div class="col-12">
                           <div class="mb-2">
                              <label for="crt-name" class="form-label">
                                 Name <span class="text-danger">*</span>
                              </label>
                              <input type="text" name="crt_name" id="crt-name" class="form-control">
                           </div>
                           
                           <div class="mb-2">
                              <label for="crt-description" class="form-label">Description</label>
                              <textarea class="form-control" id="crt-description" name="crt_description" rows="3"></textarea>
                           </div>

                           <div class="mb-2">
                              <label class="form-label">Color</label>

                              <div class="form-check mb-2">
                                 <input class="form-check-input"
                                    type="radio"
                                    name="crt_color"
                                    id="crt_color_primary"
                                    value="primary"
                                    checked>

                                 <label class="form-check-label" for="crt_color_primary">
                                    Primary
                                 </label>
                              </div>

                              <div class="form-check form-radio-secondary mb-2">
                                 <input class="form-check-input"
                                    type="radio"
                                    name="crt_color"
                                    id="crt_color_secondary"
                                    value="secondary">
                                 
                                 <label class="form-check-label" for="crt_color_secondary">
                                    Secondary
                                 </label>
                              </div>

                              <div class="form-check form-radio-success mb-2">
                                 <input class="form-check-input"
                                    type="radio"
                                    name="crt_color"
                                    id="crt_color_success"
                                    value="success">
                                 
                                 <label class="form-check-label" for="crt_color_success">
                                    Success
                                 </label>
                              </div>

                              <div class="form-check form-radio-danger mb-2">
                                 <input class="form-check-input"
                                    type="radio"
                                    name="crt_color"
                                    id="crt_color_danger"
                                    value="danger">
                                 
                                 <label class="form-check-label" for="crt_color_danger">
                                    Danger
                                 </label>
                              </div>

                              <div class="form-check form-radio-warning mb-2">
                                 <input class="form-check-input"
                                    type="radio"
                                    name="crt_color"
                                    id="crt_color_warning"
                                    value="warning">
                                 
                                 <label class="form-check-label" for="crt_color_warning">
                                    Warning
                                 </label>
                              </div>

                              <div class="form-check form-radio-info mb-2">
                                 <input class="form-check-input"
                                    type="radio"
                                    name="crt_color"
                                    id="crt_color_info"
                                    value="info">
                                 
                                 <label class="form-check-label" for="crt_color_info">
                                    Info
                                 </label>
                              </div>

                              <div class="form-check form-radio-dark">
                                 <input class="form-check-input"
                                    type="radio"
                                    name="crt_color"
                                    id="crt_color_dark"
                                    value="dark">
                                 
                                 <label class="form-check-label" for="crt_color_dark">
                                    Dark
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
               </form>
            </div><!-- /.modal-content -->
         </div><!-- /.modal-dialog -->
      </div>
      <!-- End Create Modal -->

      <!-- Edit Modal -->
      <div id="modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title" id="standard-modalLabel">Edit Departement</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form action="#" method="post" id="form-update-category">
                  <input type="hidden" name="edt_id" id="edt-id">
                  <div class="modal-body">
                     <div class="row">
                        <div class="col-12">
                           <div class="mb-2">
                              <label for="edt-name" class="form-label">
                                 Name <span class="text-danger">*</span>
                              </label>
                              <input type="text" name="edt_name" id="edt-name" class="form-control">
                           </div>
                           
                           <div class="mb-2">
                              <label for="edt-description" class="form-label">Description</label>
                              <textarea class="form-control" id="edt-description" name="edt_description" rows="3"></textarea>
                           </div>

                           <div class="mb-2">
                              <label class="form-label">Color</label>

                              <div class="form-check mb-2">
                                 <input class="form-check-input"
                                    type="radio"
                                    name="edt_color"
                                    id="edt_color_primary"
                                    value="primary"
                                    checked>

                                 <label class="form-check-label" for="edt_color_primary">
                                    Primary
                                 </label>
                              </div>

                              <div class="form-check form-radio-secondary mb-2">
                                 <input class="form-check-input"
                                    type="radio"
                                    name="edt_color"
                                    id="edt_color_secondary"
                                    value="secondary">
                                 
                                 <label class="form-check-label" for="edt_color_secondary">
                                    Secondary
                                 </label>
                              </div>

                              <div class="form-check form-radio-success mb-2">
                                 <input class="form-check-input"
                                    type="radio"
                                    name="edt_color"
                                    id="edt_color_success"
                                    value="success">
                                 
                                 <label class="form-check-label" for="edt_color_success">
                                    Success
                                 </label>
                              </div>

                              <div class="form-check form-radio-danger mb-2">
                                 <input class="form-check-input"
                                    type="radio"
                                    name="edt_color"
                                    id="edt_color_danger"
                                    value="danger">
                                 
                                 <label class="form-check-label" for="edt_color_danger">
                                    Danger
                                 </label>
                              </div>

                              <div class="form-check form-radio-warning mb-2">
                                 <input class="form-check-input"
                                    type="radio"
                                    name="edt_color"
                                    id="edt_color_warning"
                                    value="warning">
                                 
                                 <label class="form-check-label" for="edt_color_warning">
                                    Warning
                                 </label>
                              </div>

                              <div class="form-check form-radio-info mb-2">
                                 <input class="form-check-input"
                                    type="radio"
                                    name="edt_color"
                                    id="edt_color_info"
                                    value="info">
                                 
                                 <label class="form-check-label" for="edt_color_info">
                                    Info
                                 </label>
                              </div>

                              <div class="form-check form-radio-dark">
                                 <input class="form-check-input"
                                    type="radio"
                                    name="edt_color"
                                    id="edt_color_dark"
                                    value="dark">
                                 
                                 <label class="form-check-label" for="edt_color_dark">
                                    Dark
                                 </label>
                              </div>
                           </div>

                           <div class="mb-2">
                              <label for="edt-aktif" class="form-label">Status Aktif</label>
                              <select class="form-control" name="edt_aktif" id="edt-aktif">
                                 <option value="1">Active</option>
                                 <option value="0">Inactive</option>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
               </form>
            </div><!-- /.modal-content -->
         </div><!-- /.modal-dialog -->
      </div>
      <!-- End Edit Modal -->
   @endpush

   @push('script')
      <script>
         $(document).ready(function() {
            try {
               initializeDatatable();
            } catch (error) {
               console.log(error);
               Swal.fire({
                  icon: 'error',
                  title: 'Error 500',
                  text: error
               });
            }
         });

         const csrfToken = @json(csrf_token());
         const createModalElement = document.getElementById('modal-create');
         const editModalElement = document.getElementById('modal-edit');
         const createModal = bootstrap.Modal.getOrCreateInstance(createModalElement);
         const editModal = bootstrap.Modal.getOrCreateInstance(editModalElement);

         function clearValidation(formSelector) {
            const form = $(formSelector);

            form.find('.is-invalid').removeClass('is-invalid');
            form.find('.invalid-feedback').remove();
         }

         function showValidationErrors(formSelector, errors) {
            const form = $(formSelector);

            clearValidation(formSelector);

            Object.keys(errors).forEach(function(field) {
               const input = form.find('[name="' + field + '"]');

               if (!input.length) {
                  return;
               }

               input.addClass('is-invalid');

               const feedback = $('<div>', {
                  class: 'invalid-feedback d-block',
                  text: errors[field][0]
               });

               if (input.first().is(':radio') || input.first().is(':checkbox')) {
                  input.last().closest('.mb-2').append(feedback);
                  return;
               }

               feedback.insertAfter(input.last());
            });
         }

         function showSuccessAlert(message) {
            Swal.fire({
               text: message,
               icon: 'success',
               buttonsStyling: false,
               confirmButtonText: 'Ok, got it!',
               customClass: {
                  confirmButton: 'btn btn-success'
               }
            });
         }

         function showErrorAlert(message) {
            Swal.fire({
               text: message,
               icon: 'error',
               buttonsStyling: false,
               confirmButtonText: 'Ok, got it!',
               customClass: {
                  confirmButton: 'btn btn-danger'
               }
            });
         }

         function resetCreateForm() {
            $('#form-create-category')[0].reset();
            clearValidation('#form-create-category');
         }

         function resetUpdateForm() {
            $('#form-update-category')[0].reset();
            $('#edt-id').val('');
            clearValidation('#form-update-category');
         }

         createModalElement.addEventListener('hidden.bs.modal', function() {
            resetCreateForm();
         });

         editModalElement.addEventListener('hidden.bs.modal', function() {
            resetUpdateForm();
         });

         function initializeDatatable() {
            const tableGridjs = document.getElementById('table-gridjs');

            tableGridjs.innerHTML = `
               <div class="d-flex align-items-center justify-content-between gap-2 mb-2 flex-wrap">
                  <div class="d-flex align-items-center gap-2">
                     <span>Show</span>
                     <select id="role-gridjs-limit" class="form-select form-select-sm" style="width: 80px;">
                        <option value="10" selected>10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                     </select>
                     <span>entries</span>
                  </div>
                  <input id="role-gridjs-search" type="search" class="form-control form-control-sm ms-auto" style="width: 250px;" placeholder="Search...">
               </div>
               <div id="role-gridjs-table"></div>
            `;

            const gridjsTable = document.getElementById('role-gridjs-table');
            const gridjsLimit = document.getElementById('role-gridjs-limit');
            const gridjsSearch = document.getElementById('role-gridjs-search');
            let roleRows = [];
            let roleGridjs = null;

            function filterRoleRows() {
               const keyword = gridjsSearch.value.toLowerCase();

               return roleRows.filter(function(row) {
                  return [
                     row.name,
                     row.description,
                     row.status
                  ].join(' ').toLowerCase().includes(keyword);
               });
            }

            function renderGridjsTable(limit) {
               if (roleGridjs) {
                  roleGridjs.destroy();
               }

               gridjsTable.innerHTML = '';

               roleGridjs = new gridjs.Grid({
                  style: {
                     th: {
                        textAlign: 'center'
                     }
                  },
                  columns: [
                     {
                        name: 'Name',
                        width: '150px',
                        formatter: function(e) {
                           return gridjs.html(
                              '<div class="text-start">' + e + '</div>'
                           );
                        },
                     },
                     {
                        name: 'Description',
                        formatter: function(e) {
                           return gridjs.html(
                              '<div class="text-start">' + e + '</div>'
                           );
                        },
                     },
                     {
                        name: 'Color',
                        sort: false,
                        formatter: function(e) {
                           return gridjs.html(
                              '<div class="text-center">' + e + '</div>'
                           );
                        },
                     },
                     {
                        name: 'Status',
                        width: '150px',
                        sort: false,
                        formatter: function(e) {
                           return gridjs.html(
                              '<div class="text-center">' + e + '</div>'
                           );
                        },
                     },
                     {
                        name: 'Action',
                        width: '150px',
                        sort: false,
                        formatter: function(e) {
                           return gridjs.html(
                              '<div class="text-center">' + e + '</div>'
                           );
                        },
                     },
                  ],
                  pagination: {
                     limit: limit
                  },
                  sort: !0,
                  data: filterRoleRows().map(function(row) {
                     return [
                        row.name,
                        row.description,
                        row.color,
                        row.status,
                        row.action
                     ];
                  }),
               }).render(gridjsTable);
            }

            gridjsLimit.addEventListener('change', function() {
               renderGridjsTable(Number(this.value));
            });

            gridjsSearch.addEventListener('input', function() {
               renderGridjsTable(Number(gridjsLimit.value));
            });

            fetch("{{ route('master.category.datatable') }}")
               .then(function(response) {
                  return response.json();
               })
               .then(function(response) {
                  roleRows = response.data;
                  renderGridjsTable(Number(gridjsLimit.value));
               });
         }

         // Edit
         $(document).on('click', '.btn-edit', function() {
            const id = $(this).data('id');

            clearValidation('#form-update-category');

            $.ajax({
               url: "{{ url('master/category/edit') }}/" + id,
               method: 'GET',
               dataType: 'json',
               success: function(response) {
                  const category = response.data;

                  $('#edt-id').val(category.id);
                  $('#edt-name').val(category.name);
                  $('#edt-description').val(category.description);
                  $('#edt-aktif').val(Number(category.is_active) === 1 ? '1' : '0');

                  // Reset pilihan color terlebih dahulu
                  $('input[name="edt_color"]').prop('checked', false);

                  // Pilih radio berdasarkan data category.color
                  $('input[name="edt_color"][value="' + category.color + '"]')
                     .prop('checked', true);

                  editModal.show();
               },
               error: function(xhr) {
                  const message = xhr.responseJSON && xhr.responseJSON.message
                     ? xhr.responseJSON.message
                     : 'Failed to get category data.';

                  showErrorAlert(message);
               }
            });
         });

         // Create
         $('#form-create-category').on('submit', function(event) {
            event.preventDefault();

            const form = $(this);
            const submitButton = form.find('button[type="submit"]');

            clearValidation('#form-create-category');
            submitButton.prop('disabled', true);

            $.ajax({
               url: "{{ route('master.category.create') }}",
               method: 'POST',
               data: form.serialize(),
               dataType: 'json',
               headers: {
                  'X-CSRF-TOKEN': csrfToken
               },
               success: function(response) {
                  createModal.hide();
                  resetCreateForm();
                  initializeDatatable();
                  showSuccessAlert(response.message || 'Department created successfully.');
               },
               error: function(xhr) {
                  if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                     showValidationErrors('#form-create-category', xhr.responseJSON.errors);
                     return;
                  }

                  const message = xhr.responseJSON && xhr.responseJSON.message
                     ? xhr.responseJSON.message
                     : 'Failed to create category.';

                  showErrorAlert(message);
               },
               complete: function() {
                  submitButton.prop('disabled', false);
               }
            });
         });

         // Update
         $('#form-update-category').on('submit', function(event) {
            event.preventDefault();

            const form = $(this);
            const submitButton = form.find('button[type="submit"]');

            clearValidation('#form-update-category');
            submitButton.prop('disabled', true);

            $.ajax({
               url: "{{ route('master.category.update') }}",
               method: 'POST',
               data: form.serialize(),
               dataType: 'json',
               headers: {
                  'X-CSRF-TOKEN': csrfToken
               },
               success: function(response) {
                  editModal.hide();
                  resetUpdateForm();
                  initializeDatatable();
                  showSuccessAlert(response.message || 'Department updated successfully.');
               },
               error: function(xhr) {
                  if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                     showValidationErrors('#form-update-category', xhr.responseJSON.errors);
                     return;
                  }

                  const message = xhr.responseJSON && xhr.responseJSON.message
                     ? xhr.responseJSON.message
                     : 'Failed to update department.';

                  showErrorAlert(message);
               },
               complete: function() {
                  submitButton.prop('disabled', false);
               }
            });
         });

         // Delete
         $(document).on('click', '.btn-delete', function() {
            const id = $(this).data('id');
            const deleteButton = $(this);

            Swal.fire({
               title: 'Delete Department',
               text: 'Are you sure you want to delete this department?',
               icon: 'warning',
               showCancelButton: true,
               buttonsStyling: false,
               confirmButtonText: 'Yes, delete it',
               cancelButtonText: 'Cancel',
               customClass: {
                  confirmButton: 'btn btn-danger',
                  cancelButton: 'btn btn-secondary ms-2'
               }
            }).then(function(result) {
               if (!result.isConfirmed) {
                  return;
               }

               deleteButton.prop('disabled', true);

               Swal.fire({
                  title: 'Deleting...',
                  allowOutsideClick: false,
                  allowEscapeKey: false,
                  showConfirmButton: false,
                  didOpen: function() {
                     Swal.showLoading();
                  }
               });

               $.ajax({
                  url: "{{ route('master.category.delete') }}",
                  method: 'POST',
                  data: {
                     id: id
                  },
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': csrfToken
                  },
                  success: function() {
                     initializeDatatable();
                     showSuccessAlert('Department deleted successfully.');
                  },
                  error: function(xhr) {
                     const message = xhr.responseJSON && xhr.responseJSON.message
                        ? xhr.responseJSON.message
                        : 'Failed to delete department.';

                     showErrorAlert(message);
                  },
                  complete: function() {
                     deleteButton.prop('disabled', false);
                  }
               });
            });
         });
      </script>
   @endpush
</x-layout>
