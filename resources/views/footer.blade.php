<div class="modal fade" id="modalInformations" aria-hidden="true" aria-labelledby="modalInformationsLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
            <div class="modal-content bg-dark" style="box-shadow:0 0 3rem #000000 !important">
                <div class="modal-body">
                    <div class="row" id="textInfo"></div>
                    <div class="row">
                        <div class="col float-start">
                            <div class="form-check" style="font-size:12px">
                                <input class="form-check-input" type="checkbox" value="" id="dontshowinfo">
                                <label class="form-check-label" for="dontshowinfo">
                                    Jangan tampilkan lagi
                                </label>
                            </div>
                        </div>
                        <div class="col text-end">
                            <button type="submit" name="read_popup_news_b2c" style="font-size:12px"
                                class="btn btn-primary btn-sm">
                                Tutup
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<svg width="100%" height="100%" id="svg" viewBox="0 0 1440 390" xmlns="http://www.w3.org/2000/svg" class="-mt-fots bg-fot svg-fot" style="margin-bottom: -25px;">
    <path d="M 0,400 C 0,400 0,200 0,200 C 40.34909359970402,243.0042668639783 80.69818719940804,286.0085337279566 135,268 C 189.30181280059196,249.9914662720434 257.5563448020718,170.97013195215192 311,159 C 364.4436551979282,147.02986804784808 403.07643359230485,202.11093846343573 452,207 C 500.92356640769515,211.88906153656427 560.137920828709,166.58611419410528 626,169 C 691.862079171291,171.41388580589472 764.3718830928599,221.54460476014305 826,248 C 887.6281169071401,274.45539523985695 938.3745467998519,277.2354667653225 985,246 C 1031.625453200148,214.7645332346775 1074.1299297077323,149.51352817856701 1122,137 C 1169.8700702922677,124.48647182143299 1223.1057343692194,164.71042052040943 1277,184 C 1330.8942656307806,203.28957947959057 1385.4471328153904,201.64478973979527 1440,200 C 1440,200 1440,400 1440,400 Z" 
    stroke="none" stroke-width="0" fill="currentColor" fill-opacity="1" class="path-0 text-footer-color"></path></svg>
<footer aria-labelledby="footer-heading" class="overflow-hidden mt-4"
        style="background: var(--warna_2); color: rgb(230, 230, 230);">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="mx-auto max-w-7xl py-8 px-4 sm:px-6 lg:pt-14 lg:px-14">
            <div class="flex h-full w-full flex-col justify-between lg:flex-row md:justify-center md:space-x-10">
                <div class="w-full space-y-4 xl:col-span-1"><img alt="logo" srcset="{{ !$config ? '' : $config->logo_footer }}"
                        src="{{ !$config ? '' : $config->logo_footer }}" width="100" height="100" decoding="async" data-nimg="1"
                        class="block h-11 w-auto md:h-[110px] md:w-[270px]" loading="lazy" style="color: transparent;">
                    <p class="text-base" style="color: rgb(255, 255, 255);">{{ !$config ? '' : $config->deskripsi_web }}</p>
                    <!--<p class="text-base" style="color: rgb(255, 255, 255); font-size: 10px;"><b>➤ : {{ !$config ? '' : $config->alamat }}<br>➤ : {{ !$config ? '' : $config->email }}<br>➤ : {{ !$config ? '' : $config->telp}}<p</b>
-->                </div>
                <div class="mt-12 grid w-full grid-cols-99 gap-6 lg:gap-10 gap-y-10 md:flex lg:justify-between xl:mt-0" style="color: rgb(255, 255, 255);">
                    @if($parent_footer_setting->count() > 0)
               @foreach($parent_footer_setting as $pfs)<div class="w-full">
                        <h3 class="text-sm font-bold uppercase">{{$pfs->nama_footer}}</h3>
                        <i class="strip-primary"></i>
                        <ul class="mt-4 space-y-4">@if($child_footer_setting->count() > 0)
                            @foreach($child_footer_setting as $cfs)
                            @if($cfs->parent == $pfs->id)
                            <li><a class="text-base" href="{{$cfs->url_footer}}">{{$cfs->nama_footer}}</a></li>@endif
                            @endforeach
                        @endif
                        </ul>
                    </div>@endforeach
              @endif
                    <div class="w-full">
                        <h3 class="text-sm font-bold uppercase ">Ikuti Kami</h3>
                        <i class="strip-primary"></i>
                        <div class="items-center space-x-4 my-4">
                            <div class="icon-button hover:shadow-lg css-4a5a1" style="width: 44px; height: 44px;"><a
                                    target="_blank" href="{{ !$config ? '' : $config->url_ig }}" class="social-icon" aria-label="instagram"
                                    style="display: inline-block; width: 40px; height: 40px; position: relative; overflow: hidden; vertical-align: middle;">
                                    <div class="social-container"
                                        style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;"><svg
                                            class="social-svg" viewBox="0 0 64 64"
                                            style="border-radius: 50%; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; fill-rule: evenodd;">
                                            <g class="social-svg-background"
                                                style="transition: fill 170ms ease-in-out 0s; fill: transparent;">
                                                <circle cx="32" cy="32" r="31"></circle>
                                            </g>
                                            <g class="social-svg-icon"
                                                style="transition: fill 170ms ease-in-out 0s; fill: rgb(230, 230, 230);">
                                                <path
                                                    d="M 39.88,25.89 C 40.86,25.89 41.65,25.10 41.65,24.12 41.65,23.14 40.86,22.35 39.88,22.35 38.90,22.35 38.11,23.14 38.11,24.12 38.11,25.10 38.90,25.89 39.88,25.89 Z M 32.00,24.42 C 27.82,24.42 24.42,27.81 24.42,32.00 24.42,36.19 27.82,39.58 32.00,39.58 36.18,39.58 39.58,36.18 39.58,32.00 39.58,27.82 36.18,24.42 32.00,24.42 Z M 32.00,36.92 C 29.28,36.92 27.08,34.72 27.08,32.00 27.08,29.28 29.28,27.08 32.00,27.08 34.72,27.08 36.92,29.28 36.92,32.00 36.92,34.72 34.72,36.92 32.00,36.92 Z M 32.00,19.90 C 35.94,19.90 36.41,19.92 37.96,19.99 39.41,20.05 40.19,20.29 40.71,20.50 41.40,20.77 41.89,21.08 42.41,21.60 42.92,22.12 43.24,22.61 43.51,23.30 43.71,23.82 43.95,24.60 44.02,26.04 44.09,27.60 44.11,28.06 44.11,32.01 44.11,35.95 44.09,36.41 44.02,37.97 43.95,39.41 43.71,40.19 43.51,40.71 43.24,41.40 42.92,41.90 42.41,42.41 41.89,42.93 41.40,43.25 40.71,43.51 40.19,43.71 39.41,43.96 37.96,44.02 36.41,44.09 35.94,44.11 32.00,44.11 28.06,44.11 27.59,44.09 26.04,44.02 24.59,43.96 23.81,43.72 23.29,43.51 22.60,43.24 22.11,42.93 21.59,42.41 21.08,41.90 20.76,41.40 20.49,40.71 20.29,40.19 20.05,39.41 19.98,37.97 19.91,36.41 19.89,35.95 19.89,32.01 19.89,28.06 19.91,27.60 19.98,26.04 20.05,24.60 20.29,23.82 20.49,23.30 20.76,22.61 21.08,22.12 21.59,21.60 22.11,21.08 22.60,20.76 23.29,20.50 23.81,20.30 24.59,20.05 26.04,19.99 27.59,19.91 28.06,19.90 32.00,19.90 Z M 32.00,17.24 C 27.99,17.24 27.49,17.26 25.91,17.33 24.34,17.40 23.27,17.65 22.33,18.01 21.36,18.39 20.54,18.90 19.72,19.72 18.90,20.54 18.39,21.37 18.01,22.33 17.65,23.27 17.40,24.34 17.33,25.92 17.26,27.49 17.24,27.99 17.24,32.00 17.24,36.01 17.26,36.51 17.33,38.09 17.40,39.66 17.65,40.73 18.01,41.67 18.39,42.65 18.90,43.47 19.72,44.29 20.54,45.11 21.37,45.61 22.33,45.99 23.27,46.36 24.34,46.61 25.92,46.68 27.49,46.75 27.99,46.77 32.01,46.77 36.02,46.77 36.52,46.75 38.09,46.68 39.66,46.61 40.74,46.36 41.68,45.99 42.65,45.62 43.47,45.11 44.29,44.29 45.11,43.47 45.62,42.64 46.00,41.67 46.36,40.74 46.61,39.66 46.68,38.09 46.75,36.51 46.77,36.01 46.77,32.00 46.77,27.99 46.75,27.49 46.68,25.91 46.61,24.34 46.36,23.27 46.00,22.33 45.62,21.35 45.11,20.53 44.29,19.71 43.47,18.89 42.65,18.39 41.68,18.01 40.74,17.64 39.67,17.39 38.09,17.32 36.51,17.26 36.01,17.24 32.00,17.24 Z">
                                                </path>
                                            </g>
                                            <g class="social-svg-mask"
                                                style="transition: fill 170ms ease-in-out 0s; fill: var(--warna_4);">
                                                <path
                                                    d="M0,0v64h64V0H0z M 42.03,23.99 C 42.03,24.99 41.22,25.79 40.23,25.79 39.23,25.79 38.43,24.99 38.43,23.99 38.43,22.99 39.23,22.19 40.23,22.19 41.22,22.19 42.03,22.99 42.03,23.99 Z M 24.52,31.99 C 24.52,27.74 27.97,24.29 32.22,24.29 36.47,24.29 39.92,27.75 39.92,31.99 39.92,36.24 36.47,39.70 32.22,39.70 27.97,39.70 24.52,36.25 24.52,31.99 Z M 27.22,31.99 C 27.22,34.76 29.46,36.99 32.22,36.99 34.98,36.99 37.22,34.76 37.22,31.99 37.22,29.23 34.98,27.00 32.22,27.00 29.46,27.00 27.22,29.23 27.22,31.99 Z M 38.28,19.79 C 36.70,19.72 36.22,19.70 32.22,19.70 28.22,19.70 27.74,19.71 26.17,19.79 24.69,19.85 23.90,20.11 23.37,20.31 22.67,20.58 22.17,20.90 21.65,21.43 21.13,21.96 20.80,22.46 20.53,23.16 20.33,23.68 20.08,24.48 20.01,25.94 19.94,27.52 19.92,27.99 19.92,32.01 19.92,36.01 19.94,36.48 20.01,38.06 20.08,39.52 20.33,40.32 20.53,40.84 20.80,41.54 21.13,42.05 21.65,42.57 22.17,43.10 22.67,43.41 23.37,43.69 23.90,43.90 24.69,44.15 26.17,44.21 27.74,44.28 28.22,44.30 32.22,44.30 36.22,44.30 36.70,44.28 38.28,44.21 39.75,44.15 40.54,43.89 41.07,43.69 41.77,43.42 42.27,43.10 42.80,42.57 43.32,42.05 43.64,41.54 43.91,40.84 44.12,40.32 44.36,39.52 44.43,38.06 44.50,36.48 44.52,36.01 44.52,32.01 44.52,27.99 44.50,27.52 44.43,25.94 44.36,24.48 44.12,23.68 43.91,23.16 43.64,22.46 43.32,21.96 42.80,21.43 42.27,20.90 41.77,20.59 41.07,20.31 40.54,20.10 39.75,19.85 38.28,19.79 Z M 26.03,17.09 C 27.64,17.02 28.15,17.00 32.22,17.00 36.27,17.00 36.80,17.02 38.38,17.08 38.38,17.08 38.41,17.08 38.41,17.08 40.01,17.15 41.10,17.41 42.06,17.78 43.04,18.17 43.87,18.68 44.71,19.51 45.54,20.34 46.06,21.18 46.44,22.17 46.81,23.13 47.06,24.21 47.14,25.81 47.21,27.41 47.23,27.92 47.23,31.99 47.23,36.07 47.21,36.58 47.14,38.18 47.06,39.78 46.81,40.87 46.44,41.82 46.06,42.80 45.54,43.65 44.71,44.48 43.87,45.31 43.04,45.83 42.06,46.21 41.10,46.58 40.00,46.84 38.41,46.91 36.81,46.98 36.31,47.00 32.23,47.00 28.15,47.00 27.64,46.98 26.04,46.91 24.44,46.84 23.35,46.58 22.40,46.21 21.42,45.82 20.58,45.31 19.75,44.48 18.91,43.65 18.39,42.81 18.01,41.82 17.64,40.86 17.39,39.78 17.32,38.18 17.25,36.58 17.23,36.07 17.23,31.99 17.23,27.92 17.25,27.41 17.32,25.82 17.39,24.21 17.64,23.13 18.01,22.17 18.39,21.20 18.91,20.35 19.75,19.52 20.58,18.69 21.41,18.17 22.40,17.78 23.35,17.42 24.44,17.16 26.03,17.09 Z">
                                                </path>
                                            </g>
                                        </svg></div>
                                </a></div>
                            <div class="icon-button hover:shadow-lg css-4a5a1" style="width: 44px; height: 44px;"><a
                                    target="_blank" href="{{ !$config ? '' : $config->url_tiktok }}" class="social-icon"
                                    aria-label="tiktok"
                                    style="display: inline-block; width: 40px; height: 40px; position: relative; overflow: hidden; vertical-align: middle;">
                                    <div class="social-container"
                                        style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;"><svg
                                            class="social-svg" viewBox="0 0 64 64"
                                            style="border-radius: 50%; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; fill-rule: evenodd;">
                                            <g class="social-svg-background"
                                                style="transition: fill 170ms ease-in-out 0s; fill: transparent;">
                                                <circle cx="32" cy="32" r="31"></circle>
                                            </g>
                                            <g class="social-svg-icon"
                                                style="transition: fill 170ms ease-in-out 0s; fill: rgb(230, 230, 230);">
                                                <path d="M 0,0 H 64 V 64 H 0 Z"></path>
                                            </g>
                                            <g class="social-svg-mask"
                                                style="transition: fill 170ms ease-in-out 0s; fill: var(--warna_4);">
                                                <path
                                                    d="M 0 0 L 0 64 L 64 64 L 64 0 L 0 0 z M 33.330078 16 L 38.845703 16 C 38.841484 16.464979 38.879928 16.930827 38.960938 17.388672 L 38.962891 17.388672 C 39.347214 19.450699 40.563022 21.263117 42.324219 22.402344 C 43.560373 23.223837 45.011906 23.660664 46.496094 23.660156 L 46.496094 24.853516 C 46.499654 24.854516 46.504312 24.854771 46.507812 24.855469 L 46.507812 29.123047 C 43.760055 29.129293 41.080342 28.271577 38.847656 26.669922 L 38.847656 37.882812 C 38.835889 43.478203 34.296575 48.007827 28.701172 48.007812 C 26.63222 48.048166 24.599665 47.449168 22.884766 46.291016 C 22.767781 46.167585 22.658664 46.038312 22.548828 45.910156 C 19.166219 43.334883 17.735525 38.905122 19.021484 34.820312 C 20.351327 30.5961 24.272588 27.726928 28.701172 27.736328 C 29.158607 27.742889 29.614526 27.781926 30.066406 27.853516 L 30.054688 33.488281 C 29.612312 33.350917 29.152646 33.277637 28.689453 33.273438 C 26.564626 33.28434 24.721455 34.740631 24.216797 36.804688 C 23.712137 38.868744 24.676556 41.009904 26.556641 42 C 27.215641 42.344292 27.967447 42.505495 28.710938 42.511719 C 31.19892 42.507676 33.238354 40.539029 33.330078 38.052734 L 33.330078 16 z">
                                                </path>
                                            </g>
                                        </svg></div>
                                </a></div>
                            <div class="icon-button hover:shadow-lg css-4a5a1" style="width: 44px; height: 44px;"><a
                                    target="_blank" href="{{ !$config ? '' : $config->url_youtube }}" class="social-icon"
                                    aria-label="youtube"
                                    style="display: inline-block; width: 40px; height: 40px; position: relative; overflow: hidden; vertical-align: middle;">
                                    <div class="social-container"
                                        style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;"><svg
                                            class="social-svg" viewBox="0 0 64 64"
                                            style="border-radius: 50%; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; fill-rule: evenodd;">
                                            <g class="social-svg-background"
                                                style="transition: fill 170ms ease-in-out 0s; fill: transparent;">
                                                <circle cx="32" cy="32" r="31"></circle>
                                            </g>
                                            <g class="social-svg-icon"
                                                style="transition: fill 170ms ease-in-out 0s; fill: rgb(230, 230, 230);">
                                                <path
                                                    d="M46.7,26c0,0-0.3-2.1-1.2-3c-1.1-1.2-2.4-1.2-3-1.3C38.3,21.4,32,21.4,32,21.4h0 c0,0-6.3,0-10.5,0.3c-0.6,0.1-1.9,0.1-3,1.3c-0.9,0.9-1.2,3-1.2,3S17,28.4,17,30.9v2.3c0,2.4,0.3,4.9,0.3,4.9s0.3,2.1,1.2,3 c1.1,1.2,2.6,1.2,3.3,1.3c2.4,0.2,10.2,0.3,10.2,0.3s6.3,0,10.5-0.3c0.6-0.1,1.9-0.1,3-1.3c0.9-0.9,1.2-3,1.2-3s0.3-2.4,0.3-4.9 v-2.3C47,28.4,46.7,26,46.7,26z M28.9,35.9l0-8.4l8.1,4.2L28.9,35.9z">
                                                </path>
                                            </g>
                                            <g class="social-svg-mask"
                                                style="transition: fill 170ms ease-in-out 0s; fill: var(--warna_4);">
                                                <path
                                                    d="M0,0v64h64V0H0z M47,33.1c0,2.4-0.3,4.9-0.3,4.9s-0.3,2.1-1.2,3c-1.1,1.2-2.4,1.2-3,1.3 C38.3,42.5,32,42.6,32,42.6s-7.8-0.1-10.2-0.3c-0.7-0.1-2.2-0.1-3.3-1.3c-0.9-0.9-1.2-3-1.2-3S17,35.6,17,33.1v-2.3 c0-2.4,0.3-4.9,0.3-4.9s0.3-2.1,1.2-3c1.1-1.2,2.4-1.2,3-1.3c4.2-0.3,10.5-0.3,10.5-0.3h0c0,0,6.3,0,10.5,0.3c0.6,0.1,1.9,0.1,3,1.3 c0.9,0.9,1.2,3,1.2,3s0.3,2.4,0.3,4.9V33.1z M28.9,35.9l8.1-4.2l-8.1-4.2L28.9,35.9z">
                                                </path>
                                            </g>
                                        </svg></div>
                                </a></div>
                                
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-fot flex flex-col gap-fot md:flex-row lg:flex-row border-t pt-fot items-center"
                style="border-color: rgb(255, 255, 255);">
                <p class="text-base xl:text-center" style="color: rgb(255, 255, 255);">© <script>
                                document.write(new Date().getFullYear())
                            </script>
                    {{ ENV('APP_NAME') }}. All rights reserved.</p>
                <div class="flex gap-3"><a class="text-base xl:text-center hover:underline border-r pr-3"
                        href="{{ url('/about-us') }}" style="color: #6b6b6b;">Tentang Kami</a><a
                        class="text-base xl:text-center hover:underline "
                        href="{{ url('/page/terms') }}" style="color: #6b6b6b;">Syarat &amp;
                        Ketentuan</a></div>

            </div>
        </div>
    </footer>