@extends("main")

@section("content")
@include('../navbar')
<div class="wrapper pt-5"
     <br>
<br>
<br>
<div class="container">
  <div class="main-content">
    <section class="section">
      <h2 class="section-title mt-1">
        <img src="/assetss/img/trophy (1).svg"  width="35"> Hall Of Fame
      </h2>
      <i class="strip-primary">
      </i>
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card-body mt-3 ">
              <div class="row">
                <div class="col-lg-6">
                  <div class="card bg-dark shadow akumauweb-rounded-sedang ">
                    <div class="card-header akumauweb-rounded-sedang  bg-akumauweb">
                      <h5 class="card-title text-white mt-2">
                        <img src="/assetss/img/top-1.svg"  width="30"> Top 10 Pesanan Bulan Ini
                      </h5>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-striped table-dark table-bordered table-responsive">
                          <tr>
                            @php
											    $i = 1;
											@endphp
                                            @foreach($top_user as $user)
                                            @if($user->username)
											<tr>
												<td align="center">{{ $i++ }}</td>
												<td>{{ $user->username }}</td>
												<td>Rp. {{ number_format($user->tamount, 0, ',', '.') }} dari {{ $user->tcount }} pesanan.</td>
											</tr>
											@endif
                                            @endforeach
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card bg-dark shadow akumauweb-rounded-sedang">
                    <div class="card-header akumauweb-rounded-sedang  bg-akumauweb">
                      <h5 class="card-title text-white mt-2">
                        <img src="/assetss/img/top-1.svg"  width="30"> Top 10 Layanan Bulan Ini
                      </h5>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-striped table-dark  table-bordered table-responsive">
                          <tr>
                            @php
											    $i = 1;
											@endphp
                                            @foreach($top_service as $service)
											<tr>
												<td align="center">{{ $i++ }}</td>
												<td>{{ $service->nama }} ( {{ $service->layanan }} )</td>
												<td>{{ $service->jumlah_order }} Pesanan.</td>
											</tr>
                                            @endforeach
                          </tr>
                          
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
  </div>
</div>
</section>
</div>
@include('../footer')
@endsection