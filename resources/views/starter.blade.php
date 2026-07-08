<x-layout>
   @include('components.sidebar')
   @include('components.topbar')

   <div class="page-content">
      <div class="page-container">
         <div class="row">
            <div class="col-12">
               <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column">
                  <div class="flex-grow-1">
                     <h4 class="fs-18 text-uppercase fw-bold m-0">Dashboard</h4>
                  </div>
                  <div class="mt-3 mt-sm-0">
                     <form action="javascript:void(0);">
                        <div class="row g-2 mb-0 align-items-center">
                           <div class="col-auto">
                              <a href="javascript: void(0);" class="btn btn-outline-primary">
                                 <i class="ti ti-sort-ascending me-1"></i> Sort By
                              </a>
                           </div>
                           <!--end col-->
                           <div class="col-sm-auto">
                              <div class="input-group">
                                 <input type="text" class="form-control" data-provider="flatpickr" data-deafult-date="01 May to 31 May" data-date-format="d M" data-range-date="true">
                                 <span class="input-group-text bg-primary border-primary text-white">
                                       <i class="ti ti-calendar fs-15"></i>
                                 </span>
                              </div>
                           </div>
                           <!--end col-->
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
                     <h4 class="header-title">Search</h4>
                  </div><!-- end card header -->

                  <div class="card-body">
                     <div id="table-search"></div>
                  </div><!-- end card-body -->
               </div><!-- end card -->
            </div>
            <!-- end col -->
         </div>
         <!-- end row -->

      </div> <!-- container -->
      @include('components.footer')
   </div>

   @push('script')
      <script>
         (new gridjs.Grid({
    columns: [
        {
            name: "ID",
            width: "80px",
            formatter: function (e) {
                return gridjs.html(
                    '<span class="fw-semibold">' + e + "</span>",
                );
            },
        },
        { name: "Name", width: "150px" },
        {
            name: "Email",
            width: "220px",
            formatter: function (e) {
                return gridjs.html('<a href="">' + e + "</a>");
            },
        },
        { name: "Position", width: "250px" },
        { name: "Company", width: "180px" },
        { name: "Country", width: "180px" },
    ],
    pagination: { limit: 5 },
    sort: !0,
    search: !0,
    data: [
        ["11", "John", "john@example.com", "Developer", "ABC Corp", "USA"],
        ["12", "Jane", "jane@example.com", "Designer", "XYZ Inc", "Canada"],
        [
            "13",
            "Alice",
            "alice@example.com",
            "Manager",
            "123 Company",
            "Australia",
        ],
        ["14", "Bob", "bob@example.com", "Engineer", "456 Ltd", "UK"],
        [
            "15",
            "Eve",
            "eve@example.com",
            "Analyst",
            "789 Enterprises",
            "France",
        ],
        [
            "16",
            "Charlie",
            "charlie@example.com",
            "Consultant",
            "Hello World",
            "Germany",
        ],
        [
            "17",
            "David",
            "david@example.com",
            "Architect",
            "Goodbye World",
            "Japan",
        ],
        ["18", "Grace", "grace@example.com", "Programmer", "Foo Bar", "China"],
        [
            "19",
            "Heather",
            "heather@example.com",
            "Supervisor",
            "Baz Qux",
            "Brazil",
        ],
        [
            "20",
            "Isaac",
            "isaac@example.com",
            "Administrator",
            "Fizz Buzz",
            "India",
        ],
    ],
}).render(document.getElementById("table-gridjs")),
    new gridjs.Grid({
        columns: [
            {
                name: "ID",
                width: "80px",
                formatter: function (e) {
                    return gridjs.html(
                        '<span class="fw-semibold">' + e + "</span>",
                    );
                },
            },
            { name: "Name", width: "150px" },
            {
                name: "Email",
                width: "220px",
                formatter: function (e) {
                    return gridjs.html('<a href="">' + e + "</a>");
                },
            },
            { name: "Position", width: "250px" },
            { name: "Company", width: "180px" },
            { name: "Country", width: "180px" },
        ],
        pagination: { limit: 3 },
        data: [
            ["11", "John", "john@example.com", "Developer", "ABC Corp", "USA"],
            ["12", "Jane", "jane@example.com", "Designer", "XYZ Inc", "Canada"],
            [
                "13",
                "Alice",
                "alice@example.com",
                "Manager",
                "123 Company",
                "Australia",
            ],
            ["14", "Bob", "bob@example.com", "Engineer", "456 Ltd", "UK"],
            [
                "15",
                "Eve",
                "eve@example.com",
                "Analyst",
                "789 Enterprises",
                "France",
            ],
            [
                "16",
                "Charlie",
                "charlie@example.com",
                "Consultant",
                "Hello World",
                "Germany",
            ],
            [
                "17",
                "David",
                "david@example.com",
                "Architect",
                "Goodbye World",
                "Japan",
            ],
            [
                "18",
                "Grace",
                "grace@example.com",
                "Programmer",
                "Foo Bar",
                "China",
            ],
            [
                "19",
                "Heather",
                "heather@example.com",
                "Supervisor",
                "Baz Qux",
                "Brazil",
            ],
            [
                "20",
                "Isaac",
                "isaac@example.com",
                "Administrator",
                "Fizz Buzz",
                "India",
            ],
        ],
    }).render(document.getElementById("table-pagination")),
    new gridjs.Grid({
        columns: [
            { name: "Name", width: "150px" },
            { name: "Email", width: "250px" },
            { name: "Position", width: "250px" },
            { name: "Company", width: "250px" },
            { name: "Country", width: "150px" },
        ],
        pagination: { limit: 5 },
        search: !0,
        data: [
            ["John", "john@example.com", "Developer", "ABC Corp", "USA"],
            ["Jane", "jane@example.com", "Designer", "XYZ Inc", "Canada"],
            [
                "Alice",
                "alice@example.com",
                "Manager",
                "123 Company",
                "Australia",
            ],
            ["Bob", "bob@example.com", "Engineer", "456 Ltd", "UK"],
            ["Eve", "eve@example.com", "Analyst", "789 Enterprises", "France"],
            [
                "Charlie",
                "charlie@example.com",
                "Consultant",
                "Hello World",
                "Germany",
            ],
            [
                "David",
                "david@example.com",
                "Architect",
                "Goodbye World",
                "Japan",
            ],
            ["Grace", "grace@example.com", "Programmer", "Foo Bar", "China"],
            [
                "Heather",
                "heather@example.com",
                "Supervisor",
                "Baz Qux",
                "Brazil",
            ],
            [
                "Isaac",
                "isaac@example.com",
                "Administrator",
                "Fizz Buzz",
                "India",
            ],
        ],
    }).render(document.getElementById("table-search")),
    new gridjs.Grid({
        columns: [
            { name: "Name", width: "150px" },
            { name: "Email", width: "250px" },
            { name: "Position", width: "250px" },
            { name: "Company", width: "250px" },
            { name: "Country", width: "150px" },
        ],
        pagination: { limit: 5 },
        sort: !0,
        data: [
            ["John", "john@example.com", "Developer", "ABC Corp", "USA"],
            ["Jane", "jane@example.com", "Designer", "XYZ Inc", "Canada"],
            [
                "Alice",
                "alice@example.com",
                "Manager",
                "123 Company",
                "Australia",
            ],
            ["Bob", "bob@example.com", "Engineer", "456 Ltd", "UK"],
            ["Eve", "eve@example.com", "Analyst", "789 Enterprises", "France"],
            [
                "Charlie",
                "charlie@example.com",
                "Consultant",
                "Hello World",
                "Germany",
            ],
            [
                "David",
                "david@example.com",
                "Architect",
                "Goodbye World",
                "Japan",
            ],
            ["Grace", "grace@example.com", "Programmer", "Foo Bar", "China"],
            [
                "Heather",
                "heather@example.com",
                "Supervisor",
                "Baz Qux",
                "Brazil",
            ],
            [
                "Isaac",
                "isaac@example.com",
                "Administrator",
                "Fizz Buzz",
                "India",
            ],
        ],
    }).render(document.getElementById("table-sorting")),
    new gridjs.Grid({
        columns: [
            { name: "Name", width: "150px" },
            { name: "Email", width: "250px" },
            { name: "Position", width: "250px" },
            { name: "Company", width: "250px" },
            { name: "Country", width: "150px" },
        ],
        pagination: { limit: 5 },
        sort: !0,
        data: function () {
            return new Promise(function (e) {
                setTimeout(function () {
                    e([
                        [
                            "John",
                            "john@example.com",
                            "Developer",
                            "ABC Corp",
                            "USA",
                        ],
                        [
                            "Jane",
                            "jane@example.com",
                            "Designer",
                            "XYZ Inc",
                            "Canada",
                        ],
                        [
                            "Alice",
                            "alice@example.com",
                            "Manager",
                            "123 Company",
                            "Australia",
                        ],
                        ["Bob", "bob@example.com", "Engineer", "456 Ltd", "UK"],
                        [
                            "Eve",
                            "eve@example.com",
                            "Analyst",
                            "789 Enterprises",
                            "France",
                        ],
                        [
                            "Charlie",
                            "charlie@example.com",
                            "Consultant",
                            "Hello World",
                            "Germany",
                        ],
                        [
                            "David",
                            "david@example.com",
                            "Architect",
                            "Goodbye World",
                            "Japan",
                        ],
                        [
                            "Grace",
                            "grace@example.com",
                            "Programmer",
                            "Foo Bar",
                            "China",
                        ],
                        [
                            "Heather",
                            "heather@example.com",
                            "Supervisor",
                            "Baz Qux",
                            "Brazil",
                        ],
                        [
                            "Isaac",
                            "isaac@example.com",
                            "Administrator",
                            "Fizz Buzz",
                            "India",
                        ],
                    ]);
                }, 2e3);
            });
        },
    }).render(document.getElementById("table-loading-state")),
    new gridjs.Grid({
        columns: [
            { name: "Name", width: "150px" },
            { name: "Email", width: "250px" },
            { name: "Position", width: "250px" },
            { name: "Company", width: "250px" },
            { name: "Country", width: "150px" },
        ],
        sort: !0,
        pagination: !0,
        fixedHeader: !0,
        height: "400px",
        data: [
            ["John", "john@example.com", "Developer", "ABC Corp", "USA"],
            ["Jane", "jane@example.com", "Designer", "XYZ Inc", "Canada"],
            [
                "Alice",
                "alice@example.com",
                "Manager",
                "123 Company",
                "Australia",
            ],
            ["Bob", "bob@example.com", "Engineer", "456 Ltd", "UK"],
            ["Eve", "eve@example.com", "Analyst", "789 Enterprises", "France"],
            [
                "Charlie",
                "charlie@example.com",
                "Consultant",
                "Hello World",
                "Germany",
            ],
            [
                "David",
                "david@example.com",
                "Architect",
                "Goodbye World",
                "Japan",
            ],
            ["Grace", "grace@example.com", "Programmer", "Foo Bar", "China"],
            [
                "Heather",
                "heather@example.com",
                "Supervisor",
                "Baz Qux",
                "Brazil",
            ],
            [
                "Isaac",
                "isaac@example.com",
                "Administrator",
                "Fizz Buzz",
                "India",
            ],
        ],
    }).render(document.getElementById("table-fixed-header")),
    new gridjs.Grid({
        columns: [
            { name: "Name", width: "120px" },
            { name: "Email", width: "250px" },
            { name: "Position", width: "250px" },
            { name: "Company", width: "250px" },
            { name: "Country", hidden: !0 },
        ],
        pagination: { limit: 5 },
        sort: !0,
        data: [
            ["John", "john@example.com", "Developer", "ABC Corp", "USA"],
            ["Jane", "jane@example.com", "Designer", "XYZ Inc", "Canada"],
            [
                "Alice",
                "alice@example.com",
                "Manager",
                "123 Company",
                "Australia",
            ],
            ["Bob", "bob@example.com", "Engineer", "456 Ltd", "UK"],
            ["Eve", "eve@example.com", "Analyst", "789 Enterprises", "France"],
            [
                "Charlie",
                "charlie@example.com",
                "Consultant",
                "Hello World",
                "Germany",
            ],
            [
                "David",
                "david@example.com",
                "Architect",
                "Goodbye World",
                "Japan",
            ],
            ["Grace", "grace@example.com", "Programmer", "Foo Bar", "China"],
            [
                "Heather",
                "heather@example.com",
                "Supervisor",
                "Baz Qux",
                "Brazil",
            ],
            [
                "Isaac",
                "isaac@example.com",
                "Administrator",
                "Fizz Buzz",
                "India",
            ],
        ],
    }).render(document.getElementById("table-hidden-column")));

      </script>
   @endpush
</x-layout>