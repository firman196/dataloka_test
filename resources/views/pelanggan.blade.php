@extends('layouts.app')

@section('content')
<body class="antialiased" >
    <div class="mt-16 px-5">
        <div class="bg-white shadow-sm p-4 ">
            <div class="d-flex justify-content-between">
                <div class="fw-bold">{{$breadcrumb}}</div>
                <a href="{{route('pelanggan.create')}}" class="btn btn-dark rounded-pill px-4 py-2">
                    <img src="/image/icon/create.svg" alt="create" srcset="" class="me-2">
                    Create Pelanggan
                </a>
            </div>
            <div id="collapseFilter" class="card collapse bg-success-subtle mt-4 px-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-group input-group-sm bg-body p-1 rounded">
                                <input type="text" class="form-control border-0" id="datepicker-start" name="tgl_lahir" aria-describedby="Tanggal Lahir">
                                <span class="input-group-text border-0">
                                    -
                                </span>
                                <input type="text" class="form-control border-0 " id="datepicker-end" name="tgl_lahir" aria-describedby="Tanggal Lahir">
                                <span class="input-group-text border-0">
                                    <img src="/image/icon/datepicker.svg" alt="datepicker" srcset="">
                                </span>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="input-group ">
                                <span class="input-group-text " id="basic-addon1">Produk :</span>
                                <select class="form-select" id="inputGroupSelect01">
                                    <option selected>All</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" id="filter" class="btn btn-success rounded-pill px-4">FILTER</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive my-3">
                <div class="row">
                    <div class="col-md-3">
                        <div class="d-flex justify-content-start mb-3">
                            <p class="me-3 my-auto">Show</p>
                            <div class="my-auto">
                                <select class="form-select" id="entries">
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
                            <button type="button" id="search-btn" class="btn btn-success rounded-pill px-3 btn-search z-1">
                                <i class="fas fa-regular fas fa-magnifying-glass me-2"></i>
                                CARI
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex justify-content-end mb-3">
                            <button type="button" class="btn btn-outline-secondary px-2 me-4" data-bs-toggle="collapse" data-bs-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter">
                                <img src="/image/icon/ic_baseline-filter-alt-off.svg" alt="filter" srcset="">
                            </button>
                            <div class="dropdown">
                                <button class="btn btn-success dropdown-toggle align-center text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="/image/icon/export.svg" class="me-2" width="15rem" height="auto"  alt="filter" srcset="">
                                    EXPORT
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" id="export-excel">Excel</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <table id="data-table" class="table table-md table-responsive" id="detailkrs" width="100%">
                    <thead class="table-active">
                        <th width="5%">
                            <input class="checkall form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        </th>
                        <th width="10%">TANGGAL BERGABUNG</th>
                        <th width="25%">PELANGGAN</th>
                        <th width="10%">TIPE PELANGGAN</th>
                        <th width="15%">STATUS BERLANGGANAN</th>
                        <th width="15%">STATUS AKUN</th>
                        <th width="20%">AKSI</th>
                    </thead>
                    <tbody >
                    </tbody>
                </table> 
                <div class="d-flex justify-content-between">
                    <div>
                        <p>Showing <span id="range-data"></span> of <span id="total-data"></span> Entries</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection

@section('footer')
<div class="d-flex justify-content-start shadow-sm sticky-bottom bg-white px-4 mb-0 mt-5" style="height: 12vh">
    <p class="mx-4 my-auto">Apply to selected</p>
    <div class="col-md-2 my-auto">
        <select class="form-select" id="select-apply">
            <option value="delete">Hapus</option>
        </select>
    </div>
    <div class="col-md-2 my-auto mx-3">
        <button type="button" id="btn-apply" class="btn btn-success rounded-pill px-4">Apply</button>
    </div>
    
</div>
@endsection

@section('page-script')
    <script type="module">
        $('#datepicker-start').datepicker();
        $('#datepicker-end').datepicker();
        //get data table
        fetch_data();

        //fetch data method
        function fetch_data() {
            var search  = $('#search').val();
            var start   = $('#datepicker-start').val();
            var end     = $('#datepicker-end').val(); 
            var entries = $('#entries').val() ?? 10;
            
            $.ajax({
                url: '{{ route('data.pelanggan.index') }}', 
                method: 'GET',
                dataType: 'json',
                data: {
                    'search':search,
                    'entries':entries,
                    'start_date': start,
                    'end_date': end
                },
                success: function(data) {
                    populateTable(data.data);
                    
                    $("#range-data").text((data.meta.from ?? 0)+" - "+entries);
                    $("#total-data").text((entries*data.meta.last_page)-((entries*data.meta.last_page)-data.meta.from));
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                }
            });              
        }

        // Populate table with data
        function populateTable(datas) {
            var tableBody = $('#data-table tbody');
            tableBody.empty();
            
            // Loop through the data and create table rows
            $.each(datas, function(index, data) {
                var checked = data.status_akun == "aktif" ? "checked":""
                var row = $('<tr>');
                row.append($('<td> <input class="form-check-input data-check" type="checkbox" id="inlineCheckbox1" value="'+data.id_pelanggan+'"> </td>'));
                row.append($('<td>').text(data.id_pelanggan));
                row.append($('<td><div class="fs-5 fw-bold">'+data.username+'</div><div class="fs-6">'+data.no_hp+'</div></td>'));
                row.append($('<td>').text(data.nama_pelanggan));
                row.append($('<td><div class="bg-success-subtle col-md-8 py-2 d-flex justify-content-center rounded">'+data.status_akun+'</div></td>'));
                row.append($('<td><div class="form-switch"><input class="form-check-input status-togle" type="checkbox" role="switch" data-toggle="toggle" id="status-togle" value="'+data.id_pelanggan+'" '+checked+'></td>'));
                row.append($('<td><a href="{{ route('pelanggan.show') }}" type="button" class="btn btn-primary me-2 btn-sm"><img src="/image/icon/show.svg" alt="show" srcset="" ></a><button type="button" class="btn btn-warning me-2 btn-sm"><img src="/image/icon/edit.svg" alt="show" srcset="" ></button><button data-id="'+data.id_pelanggan+'" type="button" class="btn btn-danger hapus-btn btn-sm"><img src="/image/icon/delete.svg" alt="show" srcset="" ></button></td>'))
                tableBody.append(row);
            });
        }

        // Search functionality
        $('#search-btn').on('click', function() {
            fetch_data()
        });

        //Filter functionality
        $('#filter').on('click', function() {
            fetch_data()
        });

        //set status 
        $('#data-table').on('click', '.status-togle', function(){
            var status = ''
            if ($(this).is(":checked"))
            {
                status = 'aktif'
            }else{
                status = 'suspend'
            }
            var id = $(this).val()
            $.ajax({
                url: "{{ url('data/pelanggan/status') }}/"+id, 
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                data: {
                    'status':status
                },
                success: function(data) {
                    fetch_data()
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                }
            });

        });

        //export excel data
        $('#export-excel').on('click', function() {
            var search = $('#search').val();
            $.ajax({
                url: '{{ route('data.pelanggan.export') }}', 
                method: 'GET',
                xhrFields:{
                    responseType: 'blob'
                },
                data: {
                    'search':search
                },
                success: function(data) {
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(data);
                    link.download = `data_pelanggan.xlsx`;
                    link.click();
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                }
            });
        });

        // Checkall checkboxes
        $(".checkall").click(function() {
            var isChecked = $(this).prop('checked');
            $(".data-check").prop('checked', isChecked); 
        });

        //Ajax delete multiple colums pelanggan
        $('#btn-apply').on('click', function() {
            var select = $('#select-apply').val();
            var dataCheck =  $('.data-check:checked').map(function(_, el) {
                return $(el).val();
            }).get();
           
            if(select == 'delete'){
                
                $.ajax({
                    url: '{{ route('data.pelanggan.delete') }}', 
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    data: {
                        'id_pelanggan':dataCheck
                    },
                    success: function(data) {
                        //toastr success
                        fetch_data()
                    },
                    error: function(xhr, status, error) {
                        console.log('Error:', error);
                    }
                });
            }
        });

        //event delete pengguna
        $('#data-table').on('click','.hapus-btn', function(e){
            const ids = []
            const id = $(this).data("id")
            ids.push(id)
            $.ajax({
                url: '{{ route('data.pelanggan.delete') }}', 
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                data: {
                    'id_pelanggan':ids
                },
                success: function(data) {
                    //toastr success
                    fetch_data()
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                }
            });
        });

        //Select entries perpage action
        $('#entries').on('change', function (e) {
            fetch_data()
        })

    </script>
@endsection