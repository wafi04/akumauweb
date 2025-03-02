@extends("main")

@section("content")
@include('../navbar')
<div class="wrapper pt-4">
    <div class="container mb-5">
        <div class="row mt-1 justify-content-center">
            <div class="col-md-6">
                <div class="card mt-1 bg-dark shadow-lg mt-1 text-white">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session('success'))
                          <div class="alert alert-success">
                              <ul>
                                  <li>{{session('success')}}</li>
                              </ul>
                          </div>
                        @endif
                        <form id="editProfile" action="{{url('/user/edit/profile')}}" method="POST">
                            @csrf
                            <div class="row mt-2">
                            <div class="col-4"><strong>Nama</strong></div>
                            <div class="col"><input placeholder="nama" type="text" name="name" value="{{Auth()->user()->name}}" class="form-control"></div>
                            </div>
                            <div class="row mt-2">
                            <div class="col-4"><strong>Nama Pengguna</strong></div>
                            <div class="col"><input placeholder="nama pengguna" type="text" name="username" value="{{Auth()->user()->username}}" class="form-control"></div>
                            </div>
                            <div class="row mt-2">
                            <div class="col-4"><strong>No WhatsApp</strong></div>
                            <div class="col"><input placeholder="no whatsapp" type="number" name="whatsapp" value="{{Auth()->user()->whatsapp}}" class="form-control"></div>
                            </div>
                            <div class="row mt-2">
                            <div class="col-4"><strong>Kata Sandi</strong></div>
                            <div class="col"><input type="password" name="password" id="password" placeholder="Ubah kata sandi" class="form-control"></div>
                            </div>
                            <div class="row mt-3">
                            <div class="col-12 text-end">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('../footer')
@endsection