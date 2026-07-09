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
               </div><!-- end card header -->
            </div>
            <!--end col-->
         </div> <!-- end row-->

         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header border-bottom border-dashed">
                     <h4 class="header-title">Search</h4>
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
      <!-- Standard modal content -->
      <div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title" id="standard-modalLabel">Modal Heading</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <h5>Text in a modal</h5>
                      <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                      <hr>
                      <h5>Overflowing text to show scroll behavior</h5>
                      <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                      <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                      <p class="mb-0">Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
              </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
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
                     row.label
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
                        name: gridjs.html('<div class="text-start w-100">Name</div>'),
                        width: '150px',
                     },
                     {
                        name: gridjs.html('<div class="text-start w-100">Label</div>'),
                        width: '150px',
                     },
                     {
                        name: 'Action',
                        width: '40px',
                        sort: false,
                        formatter: function(e) {
                           return gridjs.html('<div class="text-center">' + e + '</div>');
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
                        row.label,
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

            fetch("{{ route('admin.role.datatable') }}")
               .then(function(response) {
                  return response.json();
               })
               .then(function(response) {
                  roleRows = response.data;
                  renderGridjsTable(Number(gridjsLimit.value));
               });
         }
      </script>
   @endpush
</x-layout>
