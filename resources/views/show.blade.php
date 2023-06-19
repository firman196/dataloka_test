@extends('layouts.app')

@section('content')
<body class="antialiased" >
    <div class="mt-16 px-5">
        <div class="bg-white shadow-sm p-4 ">
            <div class="row">
                <div class="col-md-3">
                    <div class="input-group input-group-sm bg-secondary-subtle p-1 rounded">
                        <input type="text" class="form-control border-0 bg-secondary-subtle" id="datepicker-start" name="tgl_lahir" aria-describedby="Tanggal Lahir">
                        <span class="input-group-text border-0 bg-secondary-subtle">
                            -
                        </span>
                        <input type="text" class="form-control border-0 bg-secondary-subtle" id="datepicker-end" name="tgl_lahir" aria-describedby="Tanggal Lahir">
                        <span class="input-group-text border-0 bg-secondary-subtle">
                            <img src="/image/icon/datepicker.svg" alt="datepicker" srcset="">
                        </span>
                    </div>
                </div>
                <div class="col-md-5">
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
                <div class="col-md-4">
                    <div class="input-group ">
                        <span class="input-group-text " id="basic-addon1">Status Berlangganan :</span>
                        <select class="form-select" id="inputGroupSelect01">
                            <option selected>Semua</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="table-responsive my-3">
                <div class="row mb-3">
                    <div class="col-md-5 col-sm-12">
                        <div class="input-group">
                            <input type="text" id="search" class="form-control rounded-start-pill z-0 input-search" placeholder="Nama Pelanggan" aria-label="Nama Pelanggan" >
                            <button type="button" id="search-btn" class="btn btn-success rounded-pill px-3 btn-search z-1">
                                <i class="fas fa-regular fas fa-magnifying-glass me-2"></i>
                                CARI
                            </button>
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
                url: '{{ route('api.pelanggan.index') }}', 
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
                row.append($('<td><div class="form-check form-switch"><input class="form-check-input status-togle" type="checkbox" role="switch" data-toggle="toggle" id="status-togle" value="'+data.id_pelanggan+'" '+checked+'></td>'));
                row.append($('<td><button type="button" class="btn btn-primary me-2 btn-sm"><img src="/image/icon/show.svg" alt="show" srcset="" ></button><button type="button" class="btn btn-warning me-2 btn-sm"><img src="/image/icon/edit.svg" alt="show" srcset="" ></button><button type="button" class="btn btn-danger btn-sm"><img src="/image/icon/delete.svg" alt="show" srcset="" ></button></td>'))
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
                url: "{{ url('api/pelanggan/status') }}/"+id, 
                method: 'PUT',
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
                url: '{{ route('api.pelanggan.export') }}', 
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
                    url: '{{ route('api.pelanggan.delete') }}', 
                    method: 'DELETE',
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

        //Select entries perpage action
        $('#entries').on('change', function (e) {
            fetch_data()
        })

    </script>
@endsection