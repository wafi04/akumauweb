@extends("main")

@section('css')

<style>
.css-16pvxfk {
background: linear-gradient(270deg, rgb(211 211 211) -1.95%, var(--warna_5) 50.95%) !important;
}
.css-6qw8qz {
border: 1px solid #ddd);
background: linear-gradient(163.42deg, rgb(90 90 90) -107%, rgba(255, 255, 255, 0) 105.46%);
}
.css-6qw8qzz {
border: 1px solid #ddd;
background-color:#282828;
}
.css-138rpjn {
background: linear-gradient(500deg, var(--warna_5) 0%, rgba(112, 127, 235, 0) 100%);
color:white;
}
.css-138rpjnn:hover {
background: linear-gradient(500deg, var(--warna_5) 0%, rgba(112, 127, 235, 0) 100%);
color:white;
}
.font-medium {
font-weight: 500;
}
.text-sm {
font-size: .875rem;
line-height: 1.25rem;
}
.py-2 {
padding-top: 0.5rem;
padding-bottom: 0.5rem;
}
.px-3 {
padding-left: 0.75rem;
padding-right: 0.75rem;
}
.rounded-3xl {
border-radius: 1.5rem;
}
.gap-3 {
gap: 0.75rem;
}
.items-center {
align-items: center;
}
.flex {
display: flex;
}
a {
color: inherit;
text-decoration: inherit;
}
</style>

@endsection

@section("content")
@include('../navbar')

<style data-emotion="css 1nl4j3i2">
  .css-1nl4j3i2 {
    ;
  }
  @media  screen and (min-width: 768px) {
    .css-1nl4j3i2 {
      width: 350px;
    }
  }
</style>
<div class="mx-auto max-w-7xl pb-24 grid grid-cols-12 gap-6 lg:gap-x-16 lg:py-8 lg:px-12 mb-10 md:px-4 px-4 ">
  <div class="hidden md:block lg:block xl:block col-span-1 lg:col-span-3">
    <aside class="py-6 lg:col-span-3 lg:p-0 sticky top-20">
      <nav class="h-full content-start lg:grid lg:content-between">
        <div class="space-y-4">
          <style data-emotion="css vii8r9">
            .css-vii8r9 {
              background: linear-gradient(90deg, undefined 0%, rgba(112, 127, 235, 0) 100%);
            }
            .css-vii8r9:hover {
              background: linear-gradient(90deg, undefined 0%, rgba(112, 127, 235, 0) 100%);
            }
          </style>
          <a class="group flex gap-3 items-center rounded-3xl px-3 py-2 text-sm font-medium css-138rpjn css-138rpjnn" aria-current="page" href="{{ route('dash') }}">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
              <path fill="none" d="M0 0h24v24H0z">
              </path>
              <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z">
              </path>
            </svg>
            <span class="truncate hidden lg:block xl:block">Akun
            </span>
          </a>
          <style data-emotion="css 1bz809x">
            .css-1bz809x:hover {
              background: linear-gradient(90deg, undefined 0%, rgba(112, 127, 235, 0) 100%);
            }
          </style>
          <a class="group flex gap-3 items-center rounded-3xl px-3 py-2 text-sm font-medium css-138rpjnn" aria-current="page" href="{{ route('deposit') }}">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
              <path fill="none" d="M0 0h24v24H0z">
              </path>
              <path d="M20 2H4c-1.11 0-2 .89-2 2v11c0 1.11.89 2 2 2h4v5l4-2 4 2v-5h4c1.11 0 2-.89 2-2V4c0-1.11-.89-2-2-2zm0 13H4v-2h16v2zm0-5H4V4h16v6z">
              </path>
            </svg>
            <span class="truncate hidden lg:block xl:block">Deposit
            </span>
          </a>
          <form action="{{ route('logout') }}" method="POST" id='logout'>
            @csrf                                                           
            <button type='submit' class="group flex gap-3 items-center rounded-3xl px-3 py-2 text-sm font-medium css-138rpjnn" id="headlessui-menu-item-:r4:" role="menuitem" tabindex="-1" data-headlessui-state="">Keluar
            </button>
          </form>
          </nav>
        </aside>
      </div>
    <div class="col-span-12 md:col-span-11 lg:col-span-9 mt-6 sm:mt-6 lg:mt-0 md:mt-6 ">
      <div class="flex flex-col gap-6">
        <div class="grid grid-cols-12 gap-6">
          <style data-emotion="css 6qw8qz">
            .css-6qw8qz {
              border: 1px solid rgba(203,203,203,0.5);
              background: linear-gradient(163.42deg, #32323e -107%, #ffffff00 105.46%);
            }
          </style>
          <div class="p-6 col-span-12 md:col-span-6 lg:col-span-8 xl:col-span-8 rounded-2xl css-6qw8qz">
            <div class="flex justify-between items-center col-span-12 gap-4">
              <div class="flex items-center gap-4">
                <div class="relative h-12 w-12">
                  <img alt="akumauweb" sizes="100vw" srcset="/assets/logo/logo-user.png" src="" decoding="async" data-nimg="fill" class="rounded-full ring-1 ring-white" loading="lazy" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                </div>
                <div class="flex flex-col gap-1">
                  <h3 class="font-bold text-sm lg:text-lg text-white">{{Auth()->user()->name}}
                  </h3>
                  <p class="text-white/70 text-[12px] lg:text-[14px] flex items-center gap-3">
                    {{Str::upper(Auth()->user()->role)}}
                    <!-- -->
                    <span>
                      <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path fill="none" d="M0 0h24v24H0z">
                        </path>
                        <path d="M20 2H4c-1.11 0-2 .89-2 2v11c0 1.11.89 2 2 2h4v5l4-2 4 2v-5h4c1.11 0 2-.89 2-2V4c0-1.11-.89-2-2-2zm0 13H4v-2h16v2zm0-5H4V4h16v6z">
                        </path>
                      </svg>
                    </span>
                  </p>
                </div>
              </div>
              <style data-emotion="css 1mbz0zq">
                .css-1mbz0zq {
                  background: #707feb;
                }
                .css-1mbz0zq:hover {
                  background: rgba(112,127,235,0.85);
                }
              </style>
              <a type="button" href="{{ route('edit') }}" class="flex gap-2 px-5 py-2 rounded-full items-center font-medium css-1mbz0zq">
                <span class="text-[12px] auto">
                  <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="none" d="M0 0h24v24H0V0z">
                    </path>
                    <circle cx="10" cy="8" r="4">
                    </circle>
                    <path d="M10.67 13.02c-.22-.01-.44-.02-.67-.02-2.42 0-4.68.67-6.61 1.82-.88.52-1.39 1.5-1.39 2.53V20h9.26a6.963 6.963 0 01-.59-6.98zM20.75 16c0-.22-.03-.42-.06-.63l1.14-1.01-1-1.73-1.45.49c-.32-.27-.68-.48-1.08-.63L18 11h-2l-.3 1.49c-.4.15-.76.36-1.08.63l-1.45-.49-1 1.73 1.14 1.01c-.03.21-.06.41-.06.63s.03.42.06.63l-1.14 1.01 1 1.73 1.45-.49c.32.27.68.48 1.08.63L16 21h2l.3-1.49c.4-.15.76-.36 1.08-.63l1.45.49 1-1.73-1.14-1.01c.03-.21.06-.41.06-.63zM17 18c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z">
                    </path>
                  </svg>
                </span>
                <span class="hidden md:block lg:block lg:text-[14px] text-[12px]">Edit Profile
                </span>
              </a>
            </div>
            <hr class="my-6 border-white/30"/>
            <div class="flex justify-between items-center gap-3">
              <div class="flex items-center gap-3">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                  <path fill="none" d="M0 0h24v24H0V0z">
                  </path>
                  <path d="M17 1.01L7 1c-1.1 0-2 .9-2 2v18c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V3c0-1.1-.9-1.99-2-1.99zM17 19H7V5h10v14z">
                  </path>
                </svg>
                <p class="lg:text-[14px] text-[12px]">{{Auth()->user()->whatsapp}}
                </p>
              </div>
            </div>
          </div>
          <style data-emotion="css 16pvxfk">
            .css-16pvxfk {
              background: linear-gradient(270deg, #707feb -1.95%, #14279a 50.95%)!important;
            }
          </style>
          <div class="col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-4 flex justify-center rounded-2xl css-16pvxfk">
            <div class="membership-banner flex">
              <div class="p-6 flex flex-col justify-between items-center gap-6">
                <p class="leading-normal text-sm">Dapatkan harga lebih murah dengan Upgrade Membership!
                </p>
                <div class="relative w-full flex items-center justify-center">
                  <style data-emotion="css eqxk5j">
                    .css-eqxk5j {
                      background: #f5791e;
                    }
                    .css-eqxk5j:hover {
                      background: rgba(245,121,30,0.85);
                    }
                  </style>
                  <a type="button"  href="{{ route('membership') }}" class="flex gap-2 px-5 py-2 rounded-full items-center font-medium justify-center items-center z-20 w-full css-eqxk5j">
                    <span class="text-[12px]">
                      <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <path fill="none" d="M0 0h24v24H0z">
                        </path>
                        <path d="M20 2H4c-1.11 0-2 .89-2 2v11c0 1.11.89 2 2 2h4v5l4-2 4 2v-5h4c1.11 0 2-.89 2-2V4c0-1.11-.89-2-2-2zm0 13H4v-2h16v2zm0-5H4V4h16v6z">
                        </path>
                      </svg>
                    </span>
                    <span class="undefined lg:text-[14px] text-[12px] text-sm">Upgrade Sekarang
                    </span>
                  </a>
                  <div class="absolute top-0 bottom-0 left-0 right-0 z-10 px-20 lg:px-11 md:px-14 py-1">
                    <div class="relative w-full h-full">
                      <style data-emotion="css 1h67hu5">
                        .css-1h67hu5 {
                          background: #f5791e;
                        }
                      </style>
                      <div class="absolute animate-ping rounded-full w-full h-full css-1h67hu5">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="grid grid-cols-12 gap-6">
          <style data-emotion="css 6qw8qz">
            .css-6qw8qz {
              border: 1px solid rgba(203,203,203,0.5);
              background: linear-gradient(163.42deg, #32323e -107%, #ffffff00 105.46%);
            }
          </style>
          <div class="p-6 col-span-12 md:col-span-6 lg:col-span-8 flex flex-col lg:flex-row lg:items-center justify-between gap-5 rounded-2xl css-6qw8qz">
            <div>
              <p class="text-md font-medium mb-4">Saldo IDR
              </p>
              <style data-emotion="css m6e15a">
                .css-m6e15a {
                  background: linear-gradient(270deg, #f92d2d -1.95%, #f5791e 97.95%);
                  -webkit-background-clip: text;
                  -webkit-text-fill-color: transparent;
                  -webkit-background-clip: text;
                  background-clip: text;
                }
              </style>
              <h3 class="text-[24px] lg:text-[26px] font-bold css-m6e15a">Rp {{ number_format(Auth::user()->balance, 0,',', '.') }}
              </h3>
            </div>
            <div class="flex flex-row-reverse justify-end lg:flex-row md:flex-row gap-3">
              <style data-emotion="css eqxk5j">
                .css-eqxk5j {
                  background: #f5791e;
                }
                .css-eqxk5j:hover {
                  background: rgba(245,121,30,0.85);
                }
              </style>
              <a type="button"  href="/account/deposit" class="flex gap-2 px-5 py-2 rounded-full items-center font-medium css-eqxk5j">
                <span class="undefined lg:text-[14px] text-[12px]">Deposit
                </span>
              </a>
            </div>
          </div>
        </div>
        <h3 class="mt-4 text-xl font-medium">Pesanan Saya
        </h3>
        <div class="p-3 border-none rounded-2xl css-6qw8qz" style="border: 1px solid rgba(203,203,203,0.5);">
          <h4 class="mb-4">History
          </h4>
          <div class="table-responsive">
            <table class="table m-o table-bordered text-white">
              <thead>
                <tr>
                  <th>Invoice</th>
                  <th>Layanan</th>
                  <th>Target</th>
                  <th>Harga</th>
                  <th>Status</th>
                  <th>Detail</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($data as $pesanan)
                    @php
                    $zone = $pesanan->zone != null ? "-".$pesanan->zone : "";
                    $label_pesanan = '';
                    if($pesanan->status == "Pending" || $pesanan->status == "Menunggu Pembayaran" || $pesanan->status == "Waiting"){
                    $label_pesanan = 'warning';
                    }else if($pesanan->status == "Processing"){
                    $label_pesanan = 'info';
                    }else if($pesanan->status == "Success"){
                    $label_pesanan = 'success';
                    }else{
                    $label_pesanan = 'danger';
                    }
                    @endphp
                    <tr>
                        <th scope="row">{{ $pesanan->order_id }}</th>
                        <td>
                            {{ $pesanan->layanan }}<br>
                        </td>
                        <td>{{ $pesanan->user_id }}{{ $zone }}</td>
                        <td>Rp. {{ number_format($pesanan->harga, 0, ',', '.') }}</td>
                        <td><span class="badge bg-{{ $label_pesanan }}">{{ $pesanan->status }}</span></td>
                        <td><a href="javascript:;" onclick="modal('Order Details', '{{ route('riwayat.detail', [$pesanan->order_id]) }}')" class="btn btn-info"><i class="fa fa-qrcode"></i></a></td>
                    </tr>
                    @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  </main>
</div>


@include('../footer')
@section('js')
<script type="text/javascript">
     $(document).ready(function(){
        $('.table').DataTable();
    });
    function modal(name, link) {
        // var myModal = new bootstrap.Modal($('#modal-detail'))
        $.ajax({
            type: "GET",
            url: link,
            beforeSend: function() {
                $('#modal-detail-title').html(name);
                $('#modal-detail-body').html('Loading...');
            },
            success: function(result) {
                $('#modal-detail-title').html(name);
                $('#modal-detail-body').html(result);
            },
            error: function() {
                $('#modal-detail-title').html(name);
                $('#modal-detail-body').html('There is an error...');
            }
        });
        $("#modal-detail").modal("show");
    }
</script>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal-detail" style="border-radius:7%">
    <div class="modal-dialog modal-lg">
                <div class="p-3 border-none rounded-2xl css-6qw8qzz">
        <div class="modal-content css-6qw8qzz">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-detail-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-detail-body"></div>
        </div>
        </div>
    </div>
</div>
@endsection
@endsection