@extends('layouts.app')

@section('content')
<body class="antialiased">
    <div class="mt-16 px-5">
        <div class="bg-white shadow-sm p-4 ">
            <div class="d-flex justify-content-between">
                <div>Daftar Pelanggan</div>
                <a href="{{route('pelanggan.create')}}" class="btn btn-dark rounded-pill px-4 py-2">
                    <img src="/image/icon/create.svg" alt="create" srcset="" class="me-2">
                    Create Pelanggan
                </a>
            </div>
            <div class="table-responsive ">
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
            </div>
        </div>
    </div>
</body>

@endsection

@section('footer')
<div class="d-flex shadow-sm sticky-bottom bg-white px-4" style="height: 10vh">
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
            $('#dataTable').DataTable({
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
             
            });
                         
        }
    </script>
@endsection