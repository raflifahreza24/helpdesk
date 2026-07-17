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
                     <h4 class="header-title">All Department</h4>
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
                  <h4 class="modal-title" id="standard-modalLabel">Create Departement</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form action="#" method="post" id="form-create-departement">
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
               <form action="#" method="post" id="form-update-departement">
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
            clearValidation(formSelector);

            Object.keys(errors).forEach(function(field) {
               const input = $(formSelector).find('[name="' + field + '"]');

               if (!input.length) {
                  return;
               }

               input.addClass('is-invalid');
               $('<div>', {
                  class: 'invalid-feedback',
                  text: errors[field][0]
               }).insertAfter(input);
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
            $('#form-create-departement')[0].reset();
            clearValidation('#form-create-departement');
         }

         function resetUpdateForm() {
            $('#form-update-departement')[0].reset();
            $('#edt-id').val('');
            clearValidation('#form-update-departement');
         }

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
                        width: '250px',
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

            fetch("{{ route('master.departement.datatable') }}")
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

            clearValidation('#form-update-departement');

            $.ajax({
               url: "{{ url('master/departement/edit') }}/" + id,
               method: 'GET',
               dataType: 'json',
               success: function(response) {
                  const departement = response.data;

                  $('#edt-id').val(departement.id);
                  $('#edt-name').val(departement.name);
                  $('#edt-description').val(departement.description);
                  $('#edt-aktif').val(Number(departement.is_active) === 1 ? '1' : '0');

                  editModal.show();
               },
               error: function(xhr) {
                  const message = xhr.responseJSON && xhr.responseJSON.message
                     ? xhr.responseJSON.message
                     : 'Failed to get department data.';

                  showErrorAlert(message);
               }
            });
         });

         // Create
         $('#form-create-departement').on('submit', function(event) {
            event.preventDefault();

            const form = $(this);
            const submitButton = form.find('button[type="submit"]');

            clearValidation('#form-create-departement');
            submitButton.prop('disabled', true);

            $.ajax({
               url: "{{ route('master.departement.create') }}",
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
                     showValidationErrors('#form-create-departement', xhr.responseJSON.errors);
                     return;
                  }

                  const message = xhr.responseJSON && xhr.responseJSON.message
                     ? xhr.responseJSON.message
                     : 'Failed to create department.';

                  showErrorAlert(message);
               },
               complete: function() {
                  submitButton.prop('disabled', false);
               }
            });
         });

         // Update
         $('#form-update-departement').on('submit', function(event) {
            event.preventDefault();

            const form = $(this);
            const submitButton = form.find('button[type="submit"]');

            clearValidation('#form-update-departement');
            submitButton.prop('disabled', true);

            $.ajax({
               url: "{{ route('master.departement.update') }}",
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
                     showValidationErrors('#form-update-departement', xhr.responseJSON.errors);
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

         $('#modal-create').on('hidden.bs.modal', function() {
            resetCreateForm();
         });

         $('#modal-edit').on('hidden.bs.modal', function() {
            resetUpdateForm();
         });

         // Delete
         $(document).on('click', '.btn-delete', function() {
            const id = $(this).data('id');

            Swal.fire({
               title: 'Delete Department',
               text: 'Are you sure you want to delete this department?',
               icon: 'warning',
               showCancelButton: true,
               confirmButtonText: 'Yes, delete it',
               cancelButtonText: 'Cancel',
               buttonsStyling: false,
               customClass: {
                  confirmButton: 'btn btn-danger me-2 mt-2',
                  cancelButton: 'btn btn-secondary mt-2'
               }
            }).then(function(result) {
               if (!(result.isConfirmed || result.value)) {
                  return;
               }

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
                  url: "{{ route('master.departement.delete') }}",
                  method: 'POST',
                  data: {
                     id: id
                  },
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': csrfToken
                  },
                  success: function(response) {
                     initializeDatatable();
                     showSuccessAlert(response.message || 'Department deleted successfully.');
                  },
                  error: function(xhr) {
                     const message = xhr.responseJSON && xhr.responseJSON.message
                        ? xhr.responseJSON.message
                        : 'Failed to delete department.';

                     showErrorAlert(message);
                  }
               });
            });
         });

      </script>
   @endpush
</x-layout>
