@extends('layouts.app')

@section('content')
<body class="antialiased" >
    <div class="mt-16 px-5">
        <div class="bg-white shadow-sm p-4 ">
            <div class="d-flex justify-content-between">
                <div>Daftar Pelanggan</div>
                <a href="{{route('pelanggan.create')}}" class="btn btn-dark rounded-pill px-4 py-2">
                    <img src="/image/icon/create.svg" alt="create" srcset="" class="me-2">
                    Create Pelanggan
                </a>
            </div>
            <div class="table-responsive my-4">
                <div class="row">
                    <div class="col-md-3">
                        <div class="d-flex justify-content-start mb-3">
                            <p class="me-3 my-auto">Show</p>
                            <div class="my-auto">
                                <select class="form-select">
                                    <option value="10">10</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <p class="mx-3 my-auto">Entries</p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input type="text" id="search" class="form-control rounded-start-pill z-0 input-search" placeholder="Nama Pelanggan" aria-label="Nama Pelanggan" >
                            <button type="button" class="btn btn-success rounded-pill px-3 btn-search z-1">
                                <i class="fas fa-regular fas fa-magnifying-glass me-2"></i>
                                CARI
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex justify-content-end mb-3">
                            <button type="button" class="btn btn-outline-secondary px-2 me-4">
                                <img src="/image/icon/ic_baseline-filter-alt-off.svg" alt="filter" srcset="">
                            </button>
                            <div class="dropdown">
                                <button class="btn btn-success dropdown-toggle align-center text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="/image/icon/export.svg" class="me-2" width="15rem" height="auto"  alt="filter" srcset="">
                                    EXPORT
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <table class="table table-md table-responsive table-striped" id="detailkrs" width="100%">
                    <thead class="table-active">
                        <th>
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        </th>
                        <th>TANGGAL BERGABUNG</th>
                        <th>PELANGGAN</th>
                        <th>TIPE PELANGGAN</th>
                        <th>STATUS BERLANGGANAN</th>
                        <th>STATUS AKUN</th>
                        <th>AKSI</th>
                    </thead>
                    <tfoot>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th> 
                        <th></th>                           
                    </tfoot>
                </table> 
                <div class="d-flex justify-content-between">
                    <div>
                        <p>Showing <span>1-10</span> of <span>400</span> Entries</p>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
         <!--   <div class="table-responsive ">
                <table class="table table-flush" id="dataTable">
                <thead class="thead-light">
                    <tr>
                        <th></th>
                        <th>TANGGAL BERGABUNG</th>
                        <th>PELANGGAN</th>
                        <th>TIPE PELANGGAN</th>
                        <th>STATUS BERLANGGANAN</th>
                        <th>STATUS AKUN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                </table>
            </div> -->
        </div>
    </div>
</body>

@endsection

@section('footer')
<div class="d-flex justify-content-start shadow-sm sticky-bottom bg-white px-4 mb-0 mt-5" style="height: 12vh">
    <p class="mx-4 my-auto">Apply to selected</p>
    <div class="col-md-2 my-auto">
        <select class="form-select">
            <option value="1">Hapus</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
    </div>
    <div class="col-md-2 my-auto mx-3">
        <button type="button" class="btn btn-success rounded-pill px-4">Apply</button>
    </div>
    
</div>
@endsection

@section('page-script')
    <script type="module">
         //get data table
         fetch_data();

         //fetch data method
         function fetch_data(){   
            
            /* $('#dataTable').DataTable({
                pageLength: 10,
                lengthChange: true,
                bFilter: true,
                destroy: true,
                processing: true,
                serverSide: true,
                oLanguage: {
                    sZeroRecords: "Tidak Ada Data",
                    sSearch: "Pencarian _INPUT_",
                    sLengthMenu: "_MENU_",
                    sInfo: "Showing _START_ - _END_ of _TOTAL_ entries",
                    sInfoEmpty: "0 data",
                    oPaginate: {
                        sNext: "<i class='fa fa-angle-right'></i>",
                        sPrevious: "<i class='fa fa-angle-left'></i>"
                    }
                },
                ajax: {
                    url:"{{ route('data.pelanggan')}}",
                    type: "GET"
                },  
                columns: [
                    { 
                        data: 'DT_RowIndex',
                        name: 'DT_Row_Index', 
                        "className": "text-center" 
                    },
                    {
                        data: 'created_at',
                        "className": "text-center"                                        
                    },   
                    {
                        data: 'nama_pelanggan',
                        "className": "text-center"                                        
                    },   
                    {
                        data: 'role_pelanggan',
                        "className": "text-center"                                        
                    },    
                    {
                        data: 'status_akun',
                        "className": "text-center"                                        
                    },   
                    {
                        data: 'kelas',
                        "className": "text-center"                                        
                    },                         
                    {
                        data: 'action',
                        "className": "text-center",
                        orderable: false, 
                        searchable: false    
                    },
                ],

            });*/
                         
        }
    </script>
@endsection