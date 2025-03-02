@extends('main')



@section('css')
<style>
    .form-check-input:focus {
        border-color: #fe6c17;
        box-shadow: 0 0 0 0.25rem rgb(13 110 253 / 25%);
        outline: 0;
    }

    .form-check-input:checked {
        background-color: #fe6c17;
        border-color: #fe6c17;
    }

    .btn-primary {
        background-color: #3571e2;
        border-color: #3571e2;
        cursor: pointer;
        color: #fff;
    }

    .btn-primary:hover {
        color: #fff;
        background-color: #3571e2;
        border-color: #3571e2;
    }

    .btn-primary:focus,
    .btn-primary.focus {
        color: #fff;
        background-color: #3571e2;
        border-color: #3571e2;
        box-shadow: 0 0 0 0.2rem rgba(255, 168, 38, 0.5);
    }

    #searchProds {
        width: 60px;
        transition: width .5s ease
    }

    #searchProds:focus {
        width: 240px
    }
    
    
.bg-yellow-500	{
    --tw-bg-opacity: 1;
    background-color: rgba(245, 158, 11, var(--tw-bg-opacity));    
}

.bg-blue-500	{
    --tw-bg-opacity: 1;
background-color: rgba(59, 130, 246, var(--tw-bg-opacity));
}

.bg-green-500	{
    --tw-bg-opacity: 1;
background-color: rgba(16, 185, 129, var(--tw-bg-opacity));
}

.bg-red-500	{
    --tw-bg-opacity: 1;
background-color: rgba(239, 68, 68, var(--tw-bg-opacity));
}
</style>
@endsection

@section('content')
@include('../navbar')

@if(session('error'))
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
toastr.error('{{ session('error') }}');
</script>
@elseif(session('success'))
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
toastr.success('{{ session('success') }}');
</script>
@endif

                <div class="md:pt-16">
                    <main class="min-h-[65vh]">
                        <div class="pt-10">
                            <div class="relative">
                                <div class="relative mx-auto max-w-7xl px-4 py-24 sm:px-6 lg:px-14">
                                                                        <h2 class="text-base font-semibold uppercase leading-[26px] tracking-[0.2em]">LACAK PESANAN DENGAN NOMOR INVOICE</h2>
                                    <br>
                                    <div class="max-w-7xl lg:max-w-6xl">
                                        <form action="{{ url('/cari') }}" method="post">
                                            @csrf
                                           <div class="relative flex grow items-stretch focus-within:z-10">
                                                <div class="pointer-events-none absolute inset-y-0 left-0 hidden items-center pl-3 md:flex">
                                        
                                                </div>
                                                <style data-emotion="css 1ytvo7d">
                                                    .css-1ytvo7d {
                                                        color: #272727;
                                                    }

                                                    .css-1ytvo7d:focus {
                                                        border: 2px solid var(--warna_5);
                                                    }
                                                </style>
                                                <input type="text" name="id" id="id" class="block h-14 w-full rounded-none rounded-l-full border-none px-6 text-xs focus:border-none sm:text-sm md:rounded-none md:rounded-l-full md:px-6 md:py-5 md:pl-12 focus:outline-none focus:ring-2 css-1ytvo7d" placeholder="Contoh: VAG8798699ZZ" required=""/>
                                            <style data-emotion="css 1wakjti">
                                                .css-1wakjti {
                                                    color: #ffffff;
                                                    background: var(--warna_5);
                                                }
                                            </style>
                                            
                                            
                                        <button class="relative -ml-px inline-flex items-center space-x-1 rounded-r-full p-3 float-left css-1wakjti md:hidden" type="submit">
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
  <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z">
  </path>
  <path d="M11.412 8.586c.379.38.588.882.588 1.414h2a3.977 3.977 0 0 0-1.174-2.828c-1.514-1.512-4.139-1.512-5.652 0l1.412 1.416c.76-.758 2.07-.756 2.826-.002z">
  </path>
</svg>

                                        </button>
                                        </form>
                                    </div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
                
                <div class="container">
            	    <div class="row">
                       <div class="col-md-8" style="padding-top: 0px;">
            			<h4 class="mb-3 text-[24px] ">10 Transaksi Terakhir</h4>
            			<p class="text-white/70 fs-16 mb-4 ">Ini adalah 10 transaksi terakhir dari semua pengguna. Informasi yang tersedia mencakup tanggal transaksi, no transaksi, harga, dan status.</p>
            		</div>
            		
          <div class="space-y-4">
              <div class="css-6qw8qz rounded-lg overflow-x-auto">
                 <table id="tblBuyer" class="min-w-full table text-white">
              <thead>
                <tr>
                  <th scope="col" class="whitespace-nowrap px-3 py-3.5 text-left text-xs">Date</th>
                  <th scope="col" class="whitespace-nowrap px-3 py-3.5 text-left text-xs">Invoice</th>
                  <th scope="col" class="whitespace-nowrap px-3 py-3.5 text-left text-xs">Item</th>
                  <th scope="col" class="whitespace-nowrap px-3 py-3.5 text-left text-xs">Price</th>
                  <th scope="col" class="whitespace-nowrap px-3 py-3.5 text-left text-xs">Status</th>
                </tr>
              </thead>
    <tbody>
    @foreach ($pembelians as $pembelian)
        @php
            $status = $pembelian->status;
            if ($status == 'Success') {
                $label = 'bg-green-500';
            } elseif ($status == 'Pending') {
                $label = 'bg-yellow-500';
            } elseif ($status == 'Process') {
                $label = 'bg-blue-500';
            } else {
                $label = 'bg-red-500';
            }
        @endphp
        <tr>
            <td scope="row" class="whitespace-nowrap px-3 py-3.5 text-left text-xs">{{ $pembelian->created_at }}</td>
            <td scope="row" class="whitespace-nowrap px-3 py-3.5 text-left text-xs">{{ substr($pembelian->order_id, 0, (strlen($pembelian->order_id) / 2) - 2) . '****' . substr($pembelian->order_id, (strlen($pembelian->order_id) / 2) + 2) }}</td>
            <td scope="row" class="whitespace-nowrap px-3 py-3.5 text-left text-xs">{{ $pembelian->layanan }}</td>
            <td scope="row" class="whitespace-nowrap px-3 py-3.5 text-left text-xs">Rp {{ number_format($pembelian->harga, 0, ',', '.') }}</td>
            <td scope="row" ><span class="text-white/70 whitespace-nowrap rounded-md px-2 py-1 text-xs {{ $label }}">{{ $status }}</span></td>
        </tr>
    @endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
@include('../footer')
@endsection