<!--Navbar -->
    <header class="mb-5">
        <nav class="fixed top-0 z-40 w-full  backdrop-blur-sm" data-headlessui-state="open"
        style="background: #00000000">
            <div class="mx-auto max-w-7xl px-3 sm:px-6 lg:px-[3.2rem]">
                <div class="relative flex h-16 items-center justify-between">
                    
                    <!-- Show Daftar / Masuk -->
                    <div class="flex flex-1 items-center sm:items-center sm:justify-start ml-12 gap-4">
                        <div class="flex flex-shrink-0 items-center">
                            <a class="relative w-auto" href="{{ url('') }}">
                                <img alt="logo" 
                                    src="https://res.cloudinary.com/dazayhg7s/image/upload/v1740910059/LOGOVZ_p9pmwj.png"
                                    decoding="async" data-nimg="1" class="block h-10 w-auto" loading="lazy"
                                    style="color: transparent;" />
                            </a>
                        </div>
                        <p class="hidden md:block text-sm text-ellipsis truncate md:w-[75%] lg:w-[100%] leading-normal italic "
                            style="margin-top:0px;">{{ !$config ? '' : $config->slogan_web }}</p>
                    </div>
                    <div class="relative" data-headlessui-state="open">
            
                        <div class="flex items-center space-x-5 ">
                            <div class="h-7" style="margin-right:1rem;">


                            </div>
                            @guest<button
                                class="inline-flex d-block d-lg-block justify-center rounded-md py-2 text-sm font-medium hover:bg-opacity-30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
                                id="headlessui-menu-button-:R1qd6:" type="button" aria-haspopup="menu"
                                aria-expanded="false" data-headlessui-state="closed"
                                aria-controls="headlessui-menu-items-:r0:">
                                <div class="flex gap-2 pr-0 lg:pr-2 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" width="24"
                                        height="24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9">
                                        </path>
                                    </svg>
                                    <!--<div class="mt-1">Masuk / Daftar</div>-->
                                </div>
                                <div class="flex gap-2 pr-0 lg:pr-2 ">

                                </div>
                            </button>@endguest
                        @auth    
                            <div class="relative" data-headlessui-state="open">
                    <div>
                    </div>
                    <div class="flex items-center space-x-5 ">
                        <div class="h-7" style="margin-right:1rem;">
                        </div>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                        <div class="relative">
                            <div>
                            <button id="headlessui-menu-button-:R1qd6:" type="button" aria-haspopup="menu" aria-expanded="false" data-headlessui-state="closed" aria-controls="headlessui-menu-items-:r0:"
                                    class="inline-flex w-full justify-center rounded-md py-2 text-sm font-medium hover:bg-opacity-30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
                                    id="headlessui-menu-button-:R1qd6:"
                                    >
                                <div class="relative h-8 w-8">
                                <img
                                    alt="logo navbar"
                                    sizes="100vw"
                                    src="https://res.cloudinary.com/dazayhg7s/image/upload/v1740910059/LOGOVZ_p9pmwj.png"
                                    decoding="async"
                                    data-nimg="fill"
                                    class="rounded-full ring-1 ring-white"
                                    loading="lazy"
                                    style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"
                                    />
                                </div>
                            </button>
                            </div>
                            <div class="absolute right-0 mt-2 w-72 origin-top-right divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-non css-18exuzb transform opacity-0 scale-95 hidden" aria-labelledby="headlessui-menu-button-:R1qd6:" id="headlessui-menu-items-:r0:" role="menu" tabindex="0" data-headlessui-state="closed">
                            <div class="" role="none">
                                <div class="px-1 py-1" role="none" id="headlessui-menu-item-:r1:" role="menuitem" tabindex="-1" data-headlessui-state="1">
                                    @if(Auth::user()->role !== "Admin")
                                <a class="group flex w-full items-center rounded-md px-2 py-2 text-sm transition duration btn-akumauweb" id="headlessui-menu-item-:rf:" role="menuitem" tabindex="-1" data-headlessui-state="" href="{{ route('dash') }}" >
                                    <i class="fas fa-home">
                                    </i>&nbsp;Dashboard
                                </a>
                                @endif
                                @if(Auth::user()->role == "Admin")
                                <a class="group flex w-full items-center rounded-md px-2 py-2 text-sm transition duration btn-akumauweb" id="headlessui-menu-item-:rf:" role="menuitem" tabindex="-1" data-headlessui-state="" href="{{ url('/dashboard') }}" >
                                    <i class="fas fa-home">
                                    </i>&nbsp;MyAdmin
                                </a>
                                @endif
                                <a class="group flex w-full items-center rounded-md px-2 py-2 text-sm transition duration btn-akumauweb" id="headlessui-menu-item-:rg:" role="menuitem" tabindex="-1" data-headlessui-state="" href="{{ route('deposit') }}">
                                    <i class="fas fa-wallet">
                                    </i>&nbsp;IDR {{ number_format(Auth::user()->balance, 0,',', '.') }}  
                                </a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf             
                                    <button class="group flex w-full items-center rounded-md px-2 py-2 text-sm transition duration btn-akumauweb" href="/logout" id="headlessui-menu-item-:ri:" role="menuitem" tabindex="-1" data-headlessui-state="">
                                    <i class="fa-sharp fa-solid fa-right-from-bracket">
                                    </i>&nbsp;Keluar
                                    </button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>@endauth

                            @guest
                            <div class="absolute right-0 mtman w-72 origin-top-right divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-non css-18exuzb transform opacity-0 scale-95 hidden"
                                aria-labelledby="headlessui-menu-button-:R1qd6:" id="headlessui-menu-items-:r0:"
                                role="menu" tabindex="0" data-headlessui-state="closed">
                                <div class="px-1 py-1" role="none">
                                    <style>
                                        .mtman {
                                            margin-top: 15rem;
                                        }
                                    </style>
                                    <div id="headlessui-menu-item-:r1:" role="menuitem" tabindex="-1"
                                        data-headlessui-state="1">
                                        <div class="text-center mt-4">
                                            <img alt="mbgs-logo-"
                                               src="https://res.cloudinary.com/dazayhg7s/image/upload/v1740910059/LOGOVZ_p9pmwj.png"
                                               width="150" height="150" decoding="async" data-nimg="1" class="mx-auto"
                                                loading="lazy" style="color: transparent;" />
                                            <p class="text-md font-normal mt-2">Masuk atau Daftar?</p>
                                        </div>
                                        <div class="flex w-full p-3">

                                            <a class="btn-voucher w-full flex justify-center rounded-l-full py-2 text-sm font-medium md:inline-flex  css-1wpp9sf"
                                                href="{{ url('/login') }}">Masuk</a>
                                            <a class="btn-voucher w-full flex justify-center rounded-r-full py-2 text-sm font-medium md:inline-flex transition duration-300 css-mxl5am"
                                                href="{{ url('/register') }}">Daftar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>@endguest
                        </div>

                    </div>
                </div>
            </div>

        </nav>
    </header>























    <!--Show Navbar menu-->
    <div class="flex shrink-0 items-center px-4 ">
        <div class="offcanvas offcanvas-start " tabindex="-1" id="offcanvasDarkNavbar"
            aria-labelledby="offcanvasDarkNavbarLabel" style="background: var(--warna_2);  visibility: visible;"
            aria-modal="true" role="dialog">
            <div class="offcanvas-header ">
                <h5 class="offcanvas-title " id="offcanvasDarkNavbarLabel">
                    <img src="" alt="" width="100">
                </h5>
                <button type="button"
                    class="rounded-full text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white"
                    data-bs-dismiss="offcanvas" aria-label="Close">
                    <span class="sr-only">Close panel</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg></button>
            </div>
            <div class="flex shrink-0 items-center px-4" style="margin-top:-1rem;">
                <a class="relative h-[5.7rem] w-56" href="{{ url('') }}">
                    <img alt="logo" srcset="{{ url('') }}{{ !$config ? '' : $config->og_image }}"
                        src="{{ url('') }}{{ !$config ? '' : $config->logo_header }}" decoding="async" data-nimg="fill"
                        loading="lazy" style="position: absolute; width:50%; inset: 0px; color: transparent;" />
                </a>
            </div>
            <nav class="space-y-1 px-3 mt-4">
          
               <a class="btn-akumauweb group flex items-center rounded-md p-2 text-base font-medium css-1tq05rq"
                   href="{{ url('/all') }}">
                   <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                      stroke-linejoin="round" class="mr-2" height="1em" width="1em"
                       xmlns="http://www.w3.org/2000/svg">
                       <desc></desc>
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M12 5h3.5a5 5 0 0 1 0 10h-5.5l-4.015 4.227a2.3 2.3 0 0 1 -3.923 -2.035l1.634 -8.173a5 5 0 0 1 4.904 -4.019h3.4z">
                        </path>
                       <path d="M14 15l4.07 4.284a2.3 2.3 0 0 0 3.925 -2.023l-1.6 -8.232"></path>
                       <path d="M8 9v2"></path>
                        <path d="M7 10h2"></path>
                        <path d="M14 10h2"></path>
                    </svg>
                    Semua Game
                </a>
                <a class="btn-akumauweb group flex items-center rounded-md p-2 text-base font-medium css-1tq05rq"
                    href="{{ url('/daftar-harga') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="none" viewBox="0 0 16 16" class="mr-2" height="1em" width="1em"> <path d="M7.765 1.559a.5.5 0 0 1 .47 0l7.5 4a.5.5 0 0 1 0 .882l-7.5 4a.5.5 0 0 1-.47 0l-7.5-4a.5.5 0 0 1 0-.882l7.5-4z"/> <path d="m2.125 8.567-1.86.992a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882l-1.86-.992-5.17 2.756a1.5 1.5 0 0 1-1.41 0l-5.17-2.756z"/>
                    </svg>
                    Daftar Harga
                </a>
                <a class="btn-akumauweb group flex items-center rounded-md p-2 text-base font-medium css-1tq05rq"
                    href="{{ url('/cari') }}">
                    <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                        stroke-linejoin="round" class="mr-2" height="1em" width="1em"
                        xmlns="http://www.w3.org/2000/svg">
                        <desc></desc>
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="10" cy="10" r="7"></circle>
                        <line x1="21" y1="21" x2="15" y2="15"></line>
                    </svg>
                    Lacak Pesanan
                </a>
         
                
                <div class="dropdown">
                    <a class="btn-akumauweb group flex items-center rounded-md p-2 w-90 text-base font-medium css-1tq05rq dropdown-toggle"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        style="cursor:pointer;">
                        <i class="fa fa-calculator"> </i>&nbsp;
                        Calculator MLBB
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start"
                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(8px, 322px, 0px);">

                        <a href="{{ url('/winrate') }}" class="dropdown-item"> <i class="fa fa-address-card"></i>
                            Winrate</a>
                        <a href="{{ url('/magicwheel') }}" class="dropdown-item"> <i
                                class="fa fa-address-card"></i> Magic Wheel</a>
                        <a href="{{ url('/zodiac') }}" class="dropdown-item"> <i
                                class="fa fa-address-card"></i> Zodiac</a>
                    </div>
                </div>
                
                <div class="card-title items-center lex text-center mt-2 ms-2 font-extrabold">------------------</div>
                
        @auth  <a class="btn-akumauweb group flex items-center rounded-md p-2 text-base font-medium css-1tq05rq"
                   href="{{ url('/api/dokumentasi') }}">
                   <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                      stroke-linejoin="round" class="mr-2" height="1em" width="1em"
                       xmlns="http://www.w3.org/2000/svg">
                       <desc></desc>
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M12 5h3.5a5 5 0 0 1 0 10h-5.5l-4.015 4.227a2.3 2.3 0 0 1 -3.923 -2.035l1.634 -8.173a5 5 0 0 1 4.904 -4.019h3.4z">
                        </path>
                       <path d="M14 15l4.07 4.284a2.3 2.3 0 0 0 3.925 -2.023l-1.6 -8.232"></path>
                       <path d="M8 9v2"></path>
                        <path d="M7 10h2"></path>
                        <path d="M14 10h2"></path>
                    </svg>
                    Dokumentasi API
                </a>    @endauth     
           
        </div>

        </nav>
    </div>
    </div>



    <!-- End Show Navbar-->