@extends('layouts.app')

@section('content')
<body class="antialiased">
    <div class="mt-16 px-5">
        <div class="bg-white shadow-sm p-4 ">
            <div class="row">
                <div class="bg-light px-4 py-3 mb-4 fw-bold">
                    Title
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-8">
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label for="nama_lengkap" class="p-2 fw-bold">Nama Lengkap</label>
                        </div>
                        <div class="col-md 8">
                            <input type="text" class="form-control input-group-lg " id="nama_lengkap" name="nama_lengkap" aria-describedby="Nama Lengkap">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label for="username" class="p-2 fw-bold">Username</label>
                        </div>
                        <div class="col-md 8">
                            <input type="text" class="form-control input-group-lg " id="username" name="username" aria-describedby="Username">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label for="email" class="p-2  fw-bold">Email</label>
                        </div>
                        <div class="col-md 8">
                            <input type="email" class="form-control input-group-lg " id="email" name="name" aria-describedby="Email">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label for="no_hp" class="p-2 fw-bold">No Hp</label>
                        </div>
                        <div class="col-md 8">
                            <input type="number" class="form-control input-group-lg " id="no_hp" name="no_hp" aria-describedby="No Hp">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label for="gender" class="p-2 fw-bold">Gender</label>
                        </div>
                        <div class="col-md 8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="P" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Pria
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="W" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Wanita
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label for="no_hp" class="p-2 fw-bold">Tempat & Tanggal Lahir</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="tempat" name="tempat" aria-describedby="Tempat">
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="datepicker" name="tgl_lahir" aria-describedby="Tanggal Lahir">
                                <span class="input-group-text">
                                    <img src="/image/icon/datepicker.svg" alt="datepicker" srcset="">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label for="alamat" class="p-2 fw-bold">Alamat</label>
                        </div>
                        <div class="col-md 8">
                            <input type="text" class="form-control input-group-lg mb-2" id="alamat" name="alamat" aria-describedby="Alamat">
                            <input type="text" class="form-control input-group-lg " id="kota" name="kota" aria-describedby="Kota">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label for="npwp" class="p-2 fw-bold">NPWP</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control input-group-lg mb-2" id="npwp" name="npwp" aria-describedby="Npwp">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label for="linked_account" class="p-2 fw-bold">Linked Account</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control input-group-lg mb-2" id="linked_account" name="linked_account" aria-describedby="Linked Account">
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control input-group-lg mb-2"  name="linked_account" aria-describedby="Linked Account">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label for="tipe_akun" class="p-2 fw-bold">Tipe Akun</label>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select">
                                <option value="1">Perorangan</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label for="password" class="p-2 fw-bold">Password</label>
                        </div>
                        <div class="col-md-8">
                            <div class="input-group mb-3">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Eg. ***********">
                                <button class="input-group-text" id="btn-password">
                                    <i class="fas fa-eye" id="show_eye"></i>
                                    <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                </button>
                            </div>
                            <button type="button" class="btn btn-dark rounded-pill px-4">RESET PASSWORD</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                   <div class="mb-4">
                        <div class="photo-profil">
                            <div class="logo">
                                <input type="hidden" name="oldfoto" id="icon-old" value="">
                                <input type="file" name="foto" id="iconUpload" style="display:none;" accept="image/x-png,image/jpeg,image/jpg,image/svg" >
                                <div class="fw-bold ">Foto Profil </div>
                                <div class="bg-dark-subtle floating-button px-5 py-2">
                                    <img id="logo" src="{{ url('image/icon/user-solid.svg') }}" class="img-fluid" width="150rem" height="auto" />
                                    <a href="#" class="btn-download logodownloadbtn" onclick="$('#iconUpload').trigger('click')">
                                        <img id="logo" src="{{ url('image/icon/download.svg') }}" width="40rem" height="auto" />
                                    </a>
                                    <a href="#" class="btn-upload logouploadbtn" onclick="$('#iconUpload').trigger('click')">
                                        <img id="logo" src="{{ url('image/icon/upload.svg') }}" width="40rem" height="auto" />
                                    </a>
                                </div>
                                <div class="progress progreslogo" style="display:none;">
                                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <span><small class="text-danger foto-error" id="foto-error"></small></span>
                   </div>
                   <div class="mb-4">
                        <div class="photo-ktp">
                            <div class="logo">
                                <input type="hidden" name="oldfoto" id="icon-old" value="">
                                <input type="file" name="foto" id="iconUpload" style="display:none;" accept="image/x-png,image/jpeg,image/jpg,image/svg" >
                                <div class="fw-bold ">Foto KTP </div>
                                <div class="bg-dark-subtle floating-button px-5 py-2">
                                    <img id="logo" src="{{ url('image/icon/image-regular.svg') }}" class="img-fluid" width="150rem" height="auto" />
                                    <a href="#" class="btn-download logodownloadbtn" onclick="$('#iconUpload').trigger('click')">
                                        <img id="logo" src="{{ url('image/icon/download.svg') }}" width="40rem" height="auto" />
                                    </a>
                                    <a href="#" class="btn-upload logouploadbtn" onclick="$('#iconUpload').trigger('click')">
                                        <img id="logo" src="{{ url('image/icon/upload.svg') }}" width="40rem" height="auto" />
                                    </a>
                                </div>
                                <div class="progress progreslogo" style="display:none;">
                                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <span><small class="text-danger foto-error" id="foto-error"></small></span>
                   </div>
                   <div class="mb-4">
                        <div class="photo-ktp">
                            <div class="logo">
                                <input type="hidden" name="oldfoto" id="icon-old" value="">
                                <input type="file" name="foto" id="iconUpload" style="display:none;" accept="image/x-png,image/jpeg,image/jpg,image/svg" >
                                <div class="fw-bold ">Foto NPWP </div>
                                <div class="bg-dark-subtle floating-button px-5 py-2">
                                    <img id="logo" src="{{ url('image/icon/image-regular.svg') }}" class="img-fluid" width="150rem" height="auto" />
                                    <a href="#" class="btn-download logodownloadbtn" onclick="$('#iconUpload').trigger('click')">
                                        <img id="logo" src="{{ url('image/icon/download.svg') }}" width="40rem" height="auto" />
                                    </a>
                                    <a href="#" class="btn-upload logouploadbtn" onclick="$('#iconUpload').trigger('click')">
                                        <img id="logo" src="{{ url('image/icon/upload.svg') }}" width="40rem" height="auto" />
                                    </a>
                                </div>
                                <div class="progress progreslogo" style="display:none;">
                                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <span><small class="text-danger foto-error" id="foto-error"></small></span>
                   </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection

@section('footer')
<div class="d-flex justify-content-center shadow-sm sticky-bottom bg-white px-4 mb-0 mt-5" style="height: 12vh">
    <div class="py-3 ">
        <button type="button" class="btn btn-secondary rounded-pill px-4 me-3">BATALKAN</button>
        <button type="button" class="btn btn-success rounded-pill px-4">SIMPAN</button>
    </div>
</div>
@endsection


@section('page-script')
    <script type="module">
        $('#datepicker').datepicker();

        //show and hide password
        $('#btn-password').on('click',function(e){
            var x = document.getElementById("password");
            var show_eye = document.getElementById("show_eye");
            var hide_eye = document.getElementById("hide_eye");
            hide_eye.classList.remove("d-none");
            if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        })
    </script>
@endsection