<!-- Simplified SVG with reduced path complexity -->
<svg width="100%" height="100%" id="svg" viewBox="0 0 1440 390" xmlns="http://www.w3.org/2000/svg" class="-mt-fots bg-fot svg-fot" style="margin-bottom: -25px;">
    <path d="M 0,400 C 0,400 0,200 0,200 C 480,243 960,286 1440,200 C 1440,200 1440,400 1440,400 Z" 
    stroke="none" stroke-width="0" fill="currentColor" fill-opacity="1" class="path-0 text-footer-color"></path>
</svg>

<footer aria-labelledby="footer-heading" class="overflow-hidden mt-4" style="background: var(--warna_2); color: rgb(230, 230, 230);">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="mx-auto max-w-7xl py-8 px-4 sm:px-6 lg:pt-14 lg:px-14">
        <div class="flex h-full w-full flex-col justify-between lg:flex-row md:justify-center md:space-x-10">
            <!-- Logo and description -->
            <div class="w-full space-y-4 xl:col-span-1">
                <img alt="logo"                                     src="https://res.cloudinary.com/dazayhg7s/image/upload/v1740910059/LOGOVZ_p9pmwj.png"
 width="100" height="100" 
                    class="block h-11 w-auto md:h-[110px] md:w-[270px]" loading="lazy">
                <p class="text-base" style="color: rgb(255, 255, 255);">{{ $config->deskripsi_web ?? '' }}</p>
            </div>
            
            <!-- Footer links -->
            <div class="mt-12 grid w-full grid-cols-99 gap-6 lg:gap-10 gap-y-10 md:flex lg:justify-between xl:mt-0" style="color: rgb(255, 255, 255);">
                @if($parent_footer_setting->count() > 0)
                    @foreach($parent_footer_setting as $pfs)
                    <div class="w-full">
                        <h3 class="text-sm font-bold uppercase">{{$pfs->nama_footer}}</h3>
                        <i class="strip-primary"></i>
                        <ul class="mt-4 space-y-4">
                            @if($child_footer_setting->count() > 0)
                                @foreach($child_footer_setting as $cfs)
                                    @if($cfs->parent == $pfs->id)
                                    <li><a class="text-base" href="{{$cfs->url_footer}}">{{$cfs->nama_footer}}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    @endforeach
                @endif
                
                <!-- Social media section -->
                <div class="w-full">
                    <h3 class="text-sm font-bold uppercase">Ikuti Kami</h3>
                    <i class="strip-primary"></i>
                    <div class="items-center space-x-4 my-4">
                        <!-- Instagram -->
                        <div class="icon-button hover:shadow-lg" style="width: 44px; height: 44px; display: inline-block;">
                            <a target="_blank" href="{{ $config->url_ig ?? '' }}" class="social-icon" aria-label="instagram"
                                style="display: inline-block; width: 40px; height: 40px; position: relative; overflow: hidden; vertical-align: middle;">
                                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                    <svg viewBox="0 0 64 64" style="border-radius: 50%; position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                        <circle cx="32" cy="32" r="31" fill="transparent"></circle>
                                        <path d="M32,21.89c3.3,0,3.69,0,5,0.07a6.83,6.83,0,0,1,2.29,0.42,3.78,3.78,0,0,1,1.41,0.92,3.78,3.78,0,0,1,0.92,1.41A6.83,6.83,0,0,1,42,26.92c0.07,1.31,0.07,1.7,0.07,5s0,3.69-.07,5a6.83,6.83,0,0,1-.42,2.29,4,4,0,0,1-2.33,2.33,6.83,6.83,0,0,1-2.29.42c-1.31.07-1.7,0.07-5,0.07s-3.69,0-5-0.07a6.83,6.83,0,0,1-2.29-.42,3.78,3.78,0,0,1-1.41-.92,3.78,3.78,0,0,1-.92-1.41A6.83,6.83,0,0,1,22,37.08c-0.07-1.31-.07-1.7-0.07-5s0-3.69.07-5a6.83,6.83,0,0,1,.42-2.29,3.78,3.78,0,0,1,.92-1.41,3.78,3.78,0,0,1,1.41-.92A6.83,6.83,0,0,1,27,22c1.31-.07,1.7-0.07,5-0.07m0-2.22c-3.36,0-3.78,0-5.1.07a9,9,0,0,0-3,.58,6,6,0,0,0-2.19,1.43,6,6,0,0,0-1.43,2.19,9,9,0,0,0-.58,3c-0.06,1.32-.07,1.74-0.07,5.1s0,3.78.07,5.1a9,9,0,0,0,.58,3A6,6,0,0,0,21.7,42.3a6,6,0,0,0,2.19,1.43,9,9,0,0,0,3,.58c1.32,0.06,1.74.07,5.1,0.07s3.78,0,5.1-.07a9,9,0,0,0,3-.58,6.37,6.37,0,0,0,3.62-3.62,9,9,0,0,0,.58-3c0.06-1.32.07-1.74,0.07-5.1s0-3.78-.07-5.1a9,9,0,0,0-.58-3,6,6,0,0,0-1.43-2.19,6,6,0,0,0-2.19-1.43,9,9,0,0,0-3-.58c-1.32-.06-1.74-0.07-5.1-0.07h0Z" fill="#e6e6e6"></path>
                                        <path d="M32,25.33a6.67,6.67,0,1,0,6.67,6.67A6.67,6.67,0,0,0,32,25.33Zm0,11a4.44,4.44,0,1,1,4.44-4.44A4.44,4.44,0,0,1,32,36.34Z" fill="#e6e6e6"></path>
                                        <circle cx="39" cy="25" r="1.56" fill="#e6e6e6"></circle>
                                    </svg>
                                </div>
                            </a>
                        </div>
                        
                        <!-- TikTok -->
                        <div class="icon-button hover:shadow-lg" style="width: 44px; height: 44px; display: inline-block;">
                            <a target="_blank" href="{{ $config->url_tiktok ?? '' }}" class="social-icon" aria-label="tiktok"
                                style="display: inline-block; width: 40px; height: 40px; position: relative; overflow: hidden; vertical-align: middle;">
                                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                    <svg viewBox="0 0 64 64" style="border-radius: 50%; position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                        <circle cx="32" cy="32" r="31" fill="transparent"></circle>
                                        <path d="M33.33,16h5.52c0.08,1.2,0.5,4.05,3.69,6.3c1.5,1.1,2.7,1.33,4.15,1.33v5.33c-2.75,0-5.4-0.9-7.66-2.45V38c0,5.6-4.55,10.13-10.15,10.13c-2.07,0-4.1-0.6-5.82-1.76c-3.4-2.6-4.8-7.1-3.5-11.1c1.35-4.3,5.25-7.1,9.65-7.1c0.45,0,0.9,0.04,1.35,0.12v5.57c-0.45-0.15-0.9-0.22-1.37-0.22c-2.13,0-3.97,1.53-4.47,3.67c-0.5,2.15,0.46,4.25,2.34,5.2c0.65,0.33,1.35,0.5,2.1,0.5c2.47,0,4.53-1.96,4.53-4.4V16H33.33z" fill="#e6e6e6"></path>
                                    </svg>
                                </div>
                            </a>
                        </div>
                        
                        <!-- YouTube -->
                        <div class="icon-button hover:shadow-lg" style="width: 44px; height: 44px; display: inline-block;">
                            <a target="_blank" href="{{ $config->url_youtube ?? '' }}" class="social-icon" aria-label="youtube"
                                style="display: inline-block; width: 40px; height: 40px; position: relative; overflow: hidden; vertical-align: middle;">
                                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                    <svg viewBox="0 0 64 64" style="border-radius: 50%; position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                        <circle cx="32" cy="32" r="31" fill="transparent"></circle>
                                        <path d="M46.7,26c0,0-0.3-2.1-1.2-3c-1.1-1.2-2.4-1.2-3-1.3C38.3,21.4,32,21.4,32,21.4s-6.3,0-10.5,0.3c-0.6,0.1-1.9,0.1-3,1.3c-0.9,0.9-1.2,3-1.2,3S17,28.4,17,30.9v2.3c0,2.4,0.3,4.9,0.3,4.9s0.3,2.1,1.2,3c1.1,1.2,2.6,1.2,3.3,1.3c2.4,0.2,10.2,0.3,10.2,0.3s6.3,0,10.5-0.3c0.6-0.1,1.9-0.1,3-1.3c0.9-0.9,1.2-3,1.2-3s0.3-2.4,0.3-4.9v-2.3C47,28.4,46.7,26,46.7,26z M28.9,35.9l0-8.4l8.1,4.2L28.9,35.9z" fill="#e6e6e6"></path>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Copyright section -->
        <div class="mt-fot flex flex-col gap-fot md:flex-row lg:flex-row border-t pt-fot items-center" style="border-color: rgb(255, 255, 255);">
            <p class="text-base xl:text-center" style="color: rgb(255, 255, 255);">© <script>document.write(new Date().getFullYear())</script> {{ ENV('APP_NAME') }}. All rights reserved.</p>
            <div class="flex gap-3">
                <a class="text-base xl:text-center hover:underline border-r pr-3" href="{{ url('/about-us') }}" style="color: #6b6b6b;">Tentang Kami</a>
                <a class="text-base xl:text-center hover:underline" href="{{ url('/page/terms') }}" style="color: #6b6b6b;">Syarat &amp; Ketentuan</a>
            </div>
        </div>
    </div>
</footer>