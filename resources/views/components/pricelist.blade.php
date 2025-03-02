@extends("main")

@section("content")
@include('../navbar')
<div class="wrapper pt-4">
    <div class="container mb-5">
        <div class="row mt-1">
            <div class="col-12">
                <div class="card bg-dark shadow akumauweb-rounded-sedang">
                    <div class="flex p-4 mt-6 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd">
          </path>
        </svg>
        <span class="sr-only">Info
        </span>
        <div>
          Koneksi tersedia melalui metode POST (API) Silahkan baca Dokumentasi untuk memulai integrasi dengan Kami.
          <a href="{{ url('/api/dokumentasi') }}">
            <b>Baca Dokumentasi Api
            </b> (Klik Disini)
          </a>
        </div>
      </div>
                    <div class="card-header akumauweb-rounded-sedang bg-akumauweb">
                        <h5 class="card-title text-white mt-2">Daftar Harga</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-dark table-bordered table-hover"  style="font-size: 14px !important; margin-top: 0px; text-align: center">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">&nbsp&nbsp&nbsp&nbsp PID</th>
                                        <th style="text-align: center">&nbsp&nbsp&nbsp&nbsp Produk</th>
                                        <th style="text-align: center">&nbsp&nbsp&nbsp&nbsp Item</th>
                                        <th style="text-align: center">&nbsp&nbsp&nbsp&nbsp Harga</th>
                                        <th style="text-align: center">&nbsp&nbsp&nbsp&nbsp Akun Gold</th>
                                        <th style="text-align: center">&nbsp&nbsp&nbsp&nbsp Akun Platinum</th>
                                        <th style="text-align: center">&nbsp&nbsp&nbsp&nbsp Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($datas as $data)
                                        @php
                                            if($data->status == "available"){
                                                $label_pesanan = "success";
                                            }else{
                                                $label_pesanan = "danger";
                                            }
                                        @endphp
                                        <tr>
                                             <th scope="row">{{ $data->id }}</th>
                                            <td>{{ $data->nama_kategori }}</td>
                                            <td>{{ $data->layanan }}</td>
                                            <td>Rp. {{ number_format($data->harga,0,',','.') }}</td>
                                            <td>Rp. {{ number_format($data->harga_gold,0,',','.') }}</td>
                                            <td>Rp. {{ number_format($data->harga_platinum,0,',','.') }}</td>
                                            <td>
                                                <span class="badge bg-{{ $label_pesanan }}">{{ $data->status }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('../footer')
<script>
    $(document).ready(function(){
        $('.table').DataTable();
    });
</script>
@endsection