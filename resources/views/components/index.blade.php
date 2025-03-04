@extends('../main')

@section('css')
<style>
        .py-6 {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .items-end {
            align-items: flex-end;
        }

        .flex {
            display: flex;
        }

        .z-50 {
            z-index: 50;
        }

        .inset-0,
        .inset-x-0 {
            right: 0;
            left: 0;
        }

        .inset-0 {
            top: 0;
            bottom: 0;
        }

        .fixed {
            position: fixed;
        }

        .pointer-events-none {
            pointer-events: none;
        }



        /*Start*/
        .flip-card {
  position: relative;
  display: inline-flex;
  flex-direction: column;
  border-radius: 0.15em 0.15em 0 0;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 17px;
}

.top,
.bottom,
.flip-card .top-flip,
.flip-card .bottom-flip {
  height: .75em;
  line-height: 1;
  padding: .25em;
  overflow: hidden;
}

.top,
.flip-card .top-flip {
  background-color: #c21010!important;
  border-top-right-radius: .1em;
  border-top-left-radius: .1em;
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
  color: #ccc;
  border-radius: 0.25em 0.25em 0 0;
}

.bottom,
.flip-card .bottom-flip {
  background-color: #e64848!important;
  display: flex;
  align-items: flex-end;
  border-bottom-right-radius: .1em;
  border-bottom-left-radius: .1em;
  color: #fff;
  border-radius: 0 0 0.25em 0.25em;
}

.flip-card .top-flip {
  position: absolute;
  width: 100%;
  animation: flip-top 250ms ease-in;
  transform-origin: bottom;
  background-color: #e64848!important;
}

@keyframes  flip-top {
  100% {
    transform: rotateX(90deg);
  }
}

.flip-card .bottom-flip {
  position: absolute;
  bottom: 0;
  width: 100%;
  animation: flip-bottom 250ms ease-out 250ms;
  transform-origin: top;
  transform: rotateX(90deg);
}

@keyframes  flip-bottom {
  100% {
    transform: rotateX(0deg);
  }
}

        .container-countdown {
            display: flex;
            gap: 0.5em;
            justify-content: center;
        }

        @media (max-width: 568px) {
            .container-countdown {
                justify-content: flex-end;
            }
        }


        .container-segment {
            display: flex;
            gap: .1em;
            align-items: center;
        }

        .segment {
            display: flex;
            gap: .1em;
        }

        .segment-title {
            font-size: 1rem;
        }




        .font-bold {
            font-weight: 700;
        }

        .outline-none {
            outline: 2px solid transparent;
            outline-offset: 2px;
        }

        .text-primary-500 {
            --tw-text-opacity: 1;
            color: rgb(249 115 22/var(--tw-text-opacity));
        }

        .font-medium {
            font-weight: 500;
        }

        .text-sm {
            font-size: .875rem;
            line-height: 1.25rem;
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .px-3 {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
        }

        .to-murky-800 {
            --tw-gradient-to: var(--warna_1);
        }

        .from-murky-700 {
            --tw-gradient-from: var(--warna_1);
            --tw-gradient-to: rgba(61, 67, 72, 0);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }

        .bg-gradient-to-t {
            background-image: linear-gradient(to top, var(--tw-gradient-stops));
        }

        .border-primary-500 {
            --tw-border-opacity: 1;
            border-color: #e10603;
        }

        .border-b-2 {
            border-bottom-width: 2px;
        }

        .truncate,
        .whitespace-nowrap {
            white-space: nowrap;
        }

        .flex {
            display: flex;
        }

        [type=button],
        [type=reset],
        [type=submit],
        button {
            -webkit-appearance: button;
            background-color: transparent;
            background-image: none;
        }

        [role=button],
        button {
            cursor: pointer;
        }

        button,
        select {
            text-transform: none;
        }

        button,
        input,
        optgroup,
        select,
        textarea {
            font-family: inherit;
            font-size: 100%;
            font-weight: inherit;
            line-height: inherit;
            color: inherit;
            margin: 0;
            padding: 0;
        }

        .overflow-auto {
            overflow: auto;
        }

        .flex {
            display: flex;
        }

        .-mb-px {
            margin-bottom: -1px;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .bg-gradient-to-t {
            background-image: linear-gradient(to top, var(--tw-gradient-stops));
        }

        .bg-gradient-to-t:hover {
            background-image: linear-gradient(to top, var(--tw-gradient-stops));
        }

        .from-murky-700:hover {
            --tw-gradient-from: var(--warna_1);
            --tw-gradient-to: rgb(0 70 128 / 0%);
            --tw-gradient-stops: transparent, rgb(205 205 205 / 0%);
        }

        .text-yellow-400 {
            --tw-text-opacity: 1;
            color: rgb(250 204 21/var(--tw-text-opacity));
        }

        .animate-flicker {
            -webkit-animation: flicker 5s linear infinite;
            animation: flicker 5s linear infinite;
        }

        .w-8 {
            width: 2rem;
        }

        .h-8 {
            height: 2rem;
        }

        audio,
        canvas,
        embed,
        iframe,
        img,
        object,
        svg,
        video {
            display: block;
            vertical-align: middle;
        }

        @-webkit-keyframes flicker {

            0%,
            19.999%,
            22%,
            62.999%,
            64%,
            64.999%,
            70%,
            to {
                opacity: .99;
                filter: drop-shadow(0 0 1px rgba(252, 211, 77)) drop-shadow(0 0 15px rgba(245, 158, 11)) drop-shadow(0 0 1px rgba(252, 211, 77))
            }

            20%,
            21.999%,
            63%,
            63.999%,
            65%,
            69.999% {
                opacity: .4;
                filter: none
            }
        }

        @keyframes flicker {

            0%,
            19.999%,
            22%,
            62.999%,
            64%,
            64.999%,
            70%,
            to {
                opacity: .99;
                filter: drop-shadow(0 0 1px rgba(252, 211, 77)) drop-shadow(0 0 15px rgba(245, 158, 11)) drop-shadow(0 0 1px rgba(252, 211, 77))
            }

            20%,
            21.999%,
            63%,
            63.999%,
            65%,
            69.999% {
                opacity: .4;
                filter: none
            }
        }

        .border-primary-500.active,
        .border-primary-500.show>.border-primary-500 .bg-gradient-to-t {
            border-color: #fff;

        }

        .border-primary-500 {
            --tw-border-opacity: 1;
            border-color: var(--warna_1);
        }

        .border-primary-500:hover {
            --tw-border-opacity: 1;
            border-color: #ffffff;
        }

        .border-gray-500 {
            --tw-border-opacity: 1;
            border-color: rgb(107 104 128/var(--tw-border-opacity));
        }

        .-mb-px {
            margin-bottom: -9px;
        }


        /*FLASHSALE*/
        .flash-sale-carousel .swiper-wrapper .swiper-slide .bg {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: top;
            position: relative;
            top: -1px;
            height: 150px;
        }

        .swiper-pointer-events {
            touch-action: pan-y;
        }

        .swiper {
            margin-left: auto;
            margin-right: auto;
            position: relative;
            overflow: hidden;
            list-style: none;
            padding: 0;
            z-index: 1;
        }

        .flash-sale-carousel .swiper-wrapper .swiper-slide .contents {
            position: relative;
            z-index: 91;
            top: 10px;
        }

        .flash-sale-carousel .swiper-wrapper .swiper-slide .contents .logo {
            margin: 10px 15px 0;
            height: 40px;
            width: 40px;
            overflow: hidden;
            border-radius: 100%;
            border: 1px solid #ffffff;
        }

        .flash-sale-carousel .swiper-wrapper .swiper-slide .contents .logo img {
            height: 100%;
            order: ;
            width: 100%;
        }

        .flash-sale-carousel .swiper-wrapper .swiper-slide .contents .text-area {
            padding: 8px 15px 13px;
        }

        .flash-sale-carousel .swiper-wrapper .swiper-slide .contents .text-area__denom span {
            font-size: 14px;
            font-family: Montserrat, sans-serif;
            color: #fff;
            font-weight: lighter;
            overflow: hidden;
            -webkit-box-orient: vertical;
            display: -webkit-box;
            -line-clamp: 1;
            text-overflow: ellipsis;
        }

        .flash-sale-carousel .swiper-wrapper .swiper-slide .contents .text-area__prize {
            display: flex;
            margin: 5px 0 7px;
        }

        .flash-sale-carousel .swiper-wrapper .swiper-slide .contents .text-area__prize h4:first-child {
            font-size: 16px;
            color: #fff;
            font-family: Montserrat-Semibold, sans-serif;
            font-weight: 600;
        }

        .flash-sale-carousel .swiper-wrapper .swiper-slide .contents .text-area__prize h4:last-child {
            margin-left: 10px;
            font-size: 12px;
            color: #fff;
            font-family: Montserrat, sans-serif;
            text-decoration: line-through;
        }

        .flash-sale-carousel .swiper-wrapper .swiper-slide .contents .text-area progress-bar .progress-outer {
            padding: 0;
            margin: 5px 0 !important;
            border-radius: 8px 0 0 8px;
            height: 4px;
            overflow: hidden;
            border: none;
            background: rgba(180, 180, 192, .5);
            width: 98%;
            color: #d0021b;
        }

        .flash-sale-carousel .swiper-wrapper .swiper-slide .contents .text-area progress-bar .progress-outer .progress-inner {
            border-radius: 0;
            min-width: 0;
        }

        [_nghost-vyn-c95] .progress-outer .progress-inner {
            border-radius: 0;
            min-width: 0;
        }

        .progress-inner[_ngcontent-vyn-c94] {
            min-width: 15%;
            min-height: 18px;
            white-space: nowrap;
            overflow: hidden;
            padding: 0px;
            border-radius: 20px;
        }

        .flash-sale-carousel .swiper-wrapper .swiper-slide .contents .text-area__sold h4 {
            margin-top: 5px;
            margin-bottom: 14px;
            font-size: 14px;
            color: #fff;
            font-family: Montserrat, sans-serif;
        }

        [_nghost-vyn-c95] .url {
            z-index: 101;
        }

        .url {
            position: absolute;
            inset: 0;
            z-index: 91;
        }

        .flash-sale-carousel .swiper-wrapper .swiper-slide {
            position: relative;
            min-width: 290px;
            width: 287px;
            border-radius: 8px;
            overflow: hidden;
            margin-right: 10px !important;
        }


        .swiper-virtual .swiper-slide {
            -webkit-backface-visibility: hidden;
            transform: translateZ(0);
        }




        .flash-sale-carousel .swiper-wrapper .swiper-slide:before {
            position: absolute;
            content: "";
            inset: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, .0) 0%, #4c4c52);
            z-index: 0;
        }

        *:before,
        *:after {
            box-sizing: border-box;
        }

        .flash-sale-far-right {
            position: absolute;
            left: 9000px;
        }

        .product-wrap .product-content-lists__item .mat-tab-body-content {
            overflow-y: hidden;
        }

        .mat-tab-body-content {
            height: 100%;
            overflow: auto;
        }

        .mat-tab-body-wrapper {
            position: relative;
            overflow: hidden;
            display: flex;
            transition: height 500ms cubic-bezier(0.35, 0, 0.25, 1);
        }

        .mat-tab-body.mat-tab-body-active {
            position: relative;
            overflow-x: hidden;
            overflow-y: auto;
            z-index: 0;
            flex-grow: 1;
        }

        .mat-tab-body {
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            position: absolute;
            display: block;
            overflow: hidden;
            outline: 0;
            flex-basis: 100%;
        }

        .product-wrap .product-content-lists__item .mat-tab-body-content {
            overflow-y: hidden;
        }

        .mat-tab-body-content {
            height: 100%;
            overflow: auto;
        }

        .flash-sale-countdown[_ngcontent-vyn-c93] {
            display: flex;
            padding-top: 10px;
            margin-bottom: 10px;
        }

        .flash-sale-countdown__item[_ngcontent-vyn-c93] .flash-sale-count[_ngcontent-vyn-c93] .count-text[_ngcontent-vyn-c93] {
            margin-right: 10px;
            min-width: 140px;
            min-height: 23px;
        }

        .flash-sale-countdown__item[_ngcontent-vyn-c93] .flash-sale-count__item[_ngcontent-vyn-c93] {
            display: inline-block;
            vertical-align: middle;
        }

        .flash-sale-countdown__item[_ngcontent-vyn-c93] .flash-sale-count[_ngcontent-vyn-c93] .count-text[_ngcontent-vyn-c93] span[_ngcontent-vyn-c93],
        .flash-sale-countdown__item[_ngcontent-vyn-c93] .flash-sale-count[_ngcontent-vyn-c93] .count-number[_ngcontent-vyn-c93] span[_ngcontent-vyn-c93] {
            text-align: center;
        }

        .flash-sale-countdown__item[_ngcontent-vyn-c93] .flash-sale-count[_ngcontent-vyn-c93] span[_ngcontent-vyn-c93] {
            font-family: Montserrat, sans-serif;
            font-size: 16px;
            color: #fff;
        }

        .flash-sale-countdown__item[_ngcontent-vyn-c93] .flash-sale-count[_ngcontent-vyn-c93] .count-number[_ngcontent-vyn-c93] {
            border-radius: 4px;
            min-width: 85px;
            text-align: center;
            min-height: 20px;
        }

        .flash-sale-countdown__item[_ngcontent-vyn-c93] .flash-sale-count__item[_ngcontent-vyn-c93] {
            display: inline-block;
            vertical-align: middle;
        }

        .flash-sale-countdown__item[_ngcontent-vyn-c93] .flash-sale-count[_ngcontent-vyn-c93] .count-number[_ngcontent-vyn-c93] span[_ngcontent-vyn-c93] {
            position: relative;
            font-size: 12px;
            top: -1px;
            width: 85px;
            display: inline-block;
        }

        .flash-sale-countdown__item[_ngcontent-vyn-c93] .flash-sale-count[_ngcontent-vyn-c93] .count-text[_ngcontent-vyn-c93] span[_ngcontent-vyn-c93],
        .flash-sale-countdown__item[_ngcontent-vyn-c93] .flash-sale-count[_ngcontent-vyn-c93] .count-number[_ngcontent-vyn-c93] span[_ngcontent-vyn-c93] {
            text-align: center;
        }

        .flash-sale-countdown__item[_ngcontent-vyn-c93] .flash-sale-count[_ngcontent-vyn-c93] span[_ngcontent-vyn-c93] {
            font-family: Montserrat, sans-serif;
            font-size: 16px;
            color: #fff;
        }

        .flash-sale-carousel .swiper-button-prev.swiper-button-disabled {
            display: none;
        }

        .product-wrap .product-content-lists__item .swiper-button-prev {
            top: 40%;
        }

        .swiper-button-next.swiper-button-disabled,
        .swiper-button-prev.swiper-button-disabled {
            opacity: .5;
            cursor: auto;
            pointer-events: none;
        }

        .flash-sale-carousel .swiper-button-prev {
            left: 0;
            top: 50px;
            z-index: 91;
            width: 24px;
            height: 96px;
            border-radius: 4px;
            border: solid 1.2px rgba(255, 255, 255, .3);
            background-color: #161619cc;
        }

        .product-wrap .product-content-lists__item .swiper-button-next {
            top: 40%;
            margin-right: 8px;
        }

        .flash-sale-carousel .swiper-button-next {
            right: 0;
            top: 50px;
            z-index: 91;
            width: 24px;
            height: 96px;
            border-radius: 4px;
            border: solid 1.2px rgba(255, 255, 255, .3);
            background-color: #161619cc;
            margin-right: 0 !important;
        }

        .swiper-button-next,
        .swiper-rtl .swiper-button-prev {
            right: 10px;
            left: auto;
        }

        .swiper-button-next,
        .swiper-button-prev {
            position: absolute;
            top: 50%;
            width: 27px;
            width: calc(var(--swiper-navigation-size) / 44 * 27);
            height: 44px;
            height: var(--swiper-navigation-size);
            margin-top: -22px;
            margin-top: calc(0px - var(--swiper-navigation-size) / 2);
            z-index: 10;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #007aff;
            color: var(--swiper-navigation-color, var(--swiper-theme-color));
        }


        .product-wrap .product-content-lists__item .swiper-button-next {
            top: 40%;
            margin-right: 8px;
        }

        .flash-sale-carousel .swiper-button-next {
            right: 0;
            top: 50px;
            z-index: 91;
            width: 24px;
            height: 96px;
            border-radius: 4px;
            border: solid 1.2px rgba(255, 255, 255, .3);
            background-color: #161619cc;
            margin-right: 0 !important;
        }

        .swiper-button-next,
        .swiper-rtl .swiper-button-prev {
            right: 10px;
            left: auto;
        }

        .flash-sale-carousel .swiper-wrapper {
            /*padding-top: 20px; */
        }

        .swiper-android .swiper-slide,
        .swiper-wrapper {
            transform: translate(0);
        }

        .swiper-wrapper {
            position: relative;
            width: 120%;
            height: 100%;
            z-index: 1;
            display: flex;
            transition-property: transform;
            box-sizing: content-box;
        }

        .flash-sale-carousel .swiper-wrapper .swiper-slide {
            position: relative;
            min-width: 290px;
            width: 287px;
            border-radius: 8px;
            overflow: hidden;
            margin-right: 10px !important;
        }

        .swiper-virtual .swiper-slide {
            -webkit-backface-visibility: hidden;
            transform: translateZ(0);
        }



        .line-through {
            text-decoration-line: line-through;
        }

        .text-\[\#FF2A2A\] {
            --tw-text-opacity: 50;
            color: rgb(255 42 42/var(--tw-text-opacity));
        }

        .text-xs {
            font-size: .75rem;
            line-height: 1rem;
        }

        .ml-2 {
            margin-left: 0.5rem;
        }

        @media (max-width: 750px) {
            .flash-sale-carousel .swiper-wrapper .swiper-slide .bg {
                height: 100%;
            }

            .flash-sale-carousel .swiper-wrapper .swiper-slide .contents .logo {
                margin: 10px 15px 0;
                height: 35px;
                width: 35px;
            }

            .flash-sale-carousel .swiper-wrapper .swiper-slide .contents .text-area {
                padding: 5px 15px 0;

            }

            flash-sale-carousel .swiper-wrapper .swiper-slide .contents .text-area__prize {
                display: block;
                margin: 10px 0 7px;
            }

            .flash-sale-carousel .swiper-wrapper .swiper-slide .contents .text-area__sold h4 {
                margin-top: 6px;
                margin-bottom: 8px;
                font-size: 12px;
            }

            .flash-sale-carousel .swiper-wrapper .swiper-slide {
                min-width: unset;
                width: 42.5vw;
            }
        }

        /*index*/
        
         .akumauweb-shadow {
        box-shadow: 0 4px 80px hsla(0, 0%, 77%, .13), 0 1.6711px 33.4221px hsla(0, 0%, 77%, .09), 0 0.893452px 17.869px hsla(0, 0%, 77%, .08), 0 0.500862px 10.0172px hsla(0, 0%, 77%, .07), 0 0.266004px 5.32008px hsla(0, 0%, 77%, .05), 0 0.11069px 2.21381px hsla(0, 0%, 77%, .04);
    }
        
        .content-body {
          max-width: 1370px;
          margin: 0 auto;
          padding: 0 20px;
          box-sizing: border-box;
        }
        
        @media (max-width: 768px) {
          .content-body {
            padding: 0 7px;
          }
        }

        .hover\:border-primary-500:hover {
            --tw-border-opacity: 1;
            border-color: white:
        }

        .hover\:\!bg-murky-600:hover {
            --tw-bg-opacity: 1 !important;
            background-color: rgb(74 81 87/var(--tw-bg-opacity)) !important
        }

        .hover\:\!bg-murky-800:hover {
            --tw-bg-opacity: 1 !important;
            background-color: rgb(52 55 59/var(--tw-bg-opacity)) !important
        }

        .hover\:bg-murky-50:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(246 246 247/var(--tw-bg-opacity))
        }

        .hover\:bg-murky-500:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(94 102 110/var(--tw-bg-opacity))
        }

        .hover\:bg-murky-600:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(74 81 87/var(--tw-bg-opacity))
        }

        .hover\:bg-murky-700:hover {
            --tw-bg-opacity: 1;
            background-color: #8a1111 !important;
        }

        .hover\:bg-murky-800:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(52 55 59/var(--tw-bg-opacity))
        }

        .hover\:bg-orange-400:hover,
        .hover\:bg-primary-400:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(251 146 60/var(--tw-bg-opacity))
        }

        .hover\:bg-primary-600:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(234 88 12/var(--tw-bg-opacity))
        }

        .hover\:from-murky-700:hover {
            --tw-gradient-from: #3d4348;
            --tw-gradient-to: rgba(61, 67, 72, 0);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to)
        }

        .hover\:text-murky-500:hover {
            --tw-text-opacity: 1;
            color: rgb(94 102 110/var(--tw-text-opacity))
        }

        .hover\:text-murky-800:hover {
            --tw-text-opacity: 1;
            color: rgb(52 55 59/var(--tw-text-opacity))
        }

        .hover\:text-primary-200:hover {
            --tw-text-opacity: 1;
            color: rgb(254 215 170/var(--tw-text-opacity))
        }

        .hover\:text-primary-300:hover {
            --tw-text-opacity: 1;
            color: rgb(253 186 116/var(--tw-text-opacity))
        }

        .hover\:text-primary-400:hover {
            --tw-text-opacity: 1;
            color: rgb(251 146 60/var(--tw-text-opacity))
        }

        .hover\:shadow-2xl:hover {
    --tw-shadow: 0 25px 50px -12px rgba(0,0,0,.25);
    --tw-shadow-colored: 0 25px 50px -12px var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow)
        }

        .hover\:ring-2:hover {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)
        }

        .hover\:ring-primary-500:hover {
            --tw-ring-opacity: 1;
            --tw-ring-color: white;
        }

        .hover\:ring-offset-2:hover {
            --tw-ring-offset-width: 2px
        }

        .hover\:ring-offset-murky-800:hover {
            --tw-ring-offset-color: white
        }

        .filter {
            filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)
        }

        .backdrop-blur {
            --tw-backdrop-blur: blur(8px)
        }

        .backdrop-blur,
        .backdrop-blur-sm {
            -webkit-backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
            backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia)
        }

        .backdrop-blur-sm {
            --tw-backdrop-blur: blur(4px)
        }

        .backdrop-filter {
            -webkit-backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
            backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia)
        }

        .transition {
            transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-backdrop-filter;
            transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
            transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter;
            transition-timing-function: cubic-bezier(.4, 0, .2, 1);
            transition-duration: .15s
        }

        .transition-\[max-height\] {
            transition-property: max-height;
            transition-timing-function: cubic-bezier(.4, 0, .2, 1);
            transition-duration: .15s
        }

        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(.4, 0, .2, 1);
            transition-duration: .15s
        }

        .transition-colors {
            transition-property: color, background-color, border-color, outline-color, text-decoration-color, fill, stroke;
            transition-timing-function: cubic-bezier(.4, 0, .2, 1);
            transition-duration: .15s
        }

        .transition-opacity {
            transition-property: opacity;
            transition-timing-function: cubic-bezier(.4, 0, .2, 1);
            transition-duration: .15s
        }

        .delay-150 {
            transition-delay: .15s
        }

        .duration-100 {
            transition-duration: .1s
        }

        .duration-150 {
            transition-duration: .15s
        }

        .duration-200 {
            transition-duration: .2s
        }

        .duration-300 {
            transition-duration: .3s
        }

        .duration-700 {
            transition-duration: .7s
        }

        .duration-75 {
            transition-duration: 75ms
        }

        .ease-in {
            transition-timing-function: cubic-bezier(.4, 0, 1, 1)
        }

        .ease-in-out {
            transition-timing-function: cubic-bezier(.4, 0, .2, 1)
        }

        .ease-linear {
            transition-timing-function: linear
        }

        .ease-out {
            transition-timing-function: cubic-bezier(0, 0, .2, 1)
        }

        .ease-in-out {
            transition-timing-function: cubic-bezier(.4, 0, .2, 1);
        }

        .duration-300 {
            transition-duration: .3s;
        }

        .bg-murky-700 {
            --tw-bg-opacity: 1;
            background-color: rgb(61 67 72/var(--tw-bg-opacity));
        }

        .rounded-2xl {
            border-radius: 1rem;
        }

        .overflow-hidden {
            overflow: hidden;
        }

        .scale-95,
        .transform {
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }
        .relative {
    position: relative;
}

  .swiper-testimonial {
        padding: 1.5em;
    }

    .swiper-testimonial .content-wrapper {
        position: relative;
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows: 1fr;
        grid-template-areas: ".";
        width: 100%;
        justify-items: center;
        align-items: center;
    }

    .swiper-testimonial .content-wrapper .content {
        padding: 3em 1.5em;
        text-align: center;
        display: grid;
        justify-items: center;
        align-items: center;
        margin: 0 auto;
        color: #000;
    }

    .swiper-testimonial .content-wrapper .content :first-child {
        margin: 0;
    }

    .swiper-testimonial .content-wrapper .content .swiper-avatar {
        width: 100%;
        max-width: 125px;
        height: auto;
    }

    .swiper-testimonial .content-wrapper .content .swiper-avatar img {
        border-radius: 500px;
    }

    .swiper-testimonial .content-wrapper .content .cite {
        font-size: 14px;
        font-weight: bold;
    }

    .swiper-testimonial .swiper-slide {
        margin: 0;
        height: auto;
        width: 100%;
        padding: 0;
        opacity: 0.2;
        /* background: rgba(255, 255, 255, 0.3); */
        border-radius: 6px;
        transition: all 0.5s ease-in-out;
    }

    .swiper-testimonial .swiper-slide.swiper-slide-active {
        /* background: white; */
        opacity: 1;
        transform: scale(1.1);
    }

    .swiper-testimonial .swiper-nav-wrapper {
        bottom: 0;
        left: 0;
        right: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
        width: auto;
        padding-top: 3em;
    }

    .swiper-testimonial .swiper-nav-wrapper .swiper-button-next,
    .swiper-testimonial .swiper-nav-wrapper .swiper-button-prev {
        top: 0;
        top: auto;
        left: auto;
        right: auto;
        position: relative !important;
    }

    .swiper-testimonial .swiper-nav-wrapper .swiper-button-next:after,
    .swiper-testimonial .swiper-nav-wrapper .swiper-button-prev:after {
        display: none;
    }

    .swiper-testimonial .swiper-nav-wrapper .swiper-button-next,
    .swiper-testimonial .swiper-nav-wrapper .swiper-container-rtl .swiper-button-prev {
        background-image: url("data:image/svg+xml,%0A%3Csvg width='9px' height='16px' viewBox='0 0 9 16' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cg id='Page-1' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='chevron-right' fill='%23FFFFFF' fill-rule='nonzero'%3E%3Cpath d='M8.674805,7.066406 L1.924805,0.316406 C1.696288,0.105468 1.432619,0 1.133789,0 C0.834959,0 0.57129,0.105468 0.342773,0.316406 C0.114257,0.544923 0,0.808592 0,1.107422 C0,1.406251 0.114257,1.669921 0.342773,1.898438 L6.301758,7.857422 L0.342773,13.816406 C0.114257,14.044923 0,14.308592 0,14.607422 C0,14.906251 0.114257,15.169921 0.342773,15.398438 C0.465821,15.521485 0.584472,15.609375 0.69873,15.662109 C0.812989,15.714844 0.958007,15.741211 1.133789,15.741211 C1.309571,15.741211 1.454589,15.714844 1.568848,15.662109 C1.683106,15.609375 1.801757,15.521485 1.924805,15.398438 L8.674805,8.648438 C8.903321,8.419921 9.017578,8.156251 9.017578,7.857422 C9.017578,7.558592 8.903321,7.294923 8.674805,7.066406 Z' id='Path'%3E%3C/path%3E%3C/g%3E%3C/g%3E%3C/svg%3E") !important;
        width: 20px;
        height: 20px;
        background-size: 20px 20px;
        background-repeat: no-repeat;
        margin: 0;
        padding: 0;
    }

    .swiper-testimonial .swiper-nav-wrapper .swiper-button-prev,
    .swiper-testimonial .swiper-nav-wrapper .swiper-container-rtl .swiper-button-next {
        background-image: url("data:image/svg+xml,%0A%3Csvg width='9px' height='16px' viewBox='0 0 9 16' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cg id='Page-1' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='chevron-right' transform='translate(4.508789, 7.870605) rotate(-180.000000) translate(-4.508789, -7.870605) translate(-0.000000, -0.000000)' fill='%23FFFFFF' fill-rule='nonzero'%3E%3Cpath d='M8.674805,7.066406 L1.924805,0.316406 C1.696288,0.105468 1.432619,0 1.133789,0 C0.834959,0 0.57129,0.105468 0.342773,0.316406 C0.114257,0.544923 0,0.808592 0,1.107422 C0,1.406251 0.114257,1.669921 0.342773,1.898438 L6.301758,7.857422 L0.342773,13.816406 C0.114257,14.044923 0,14.308592 0,14.607422 C0,14.906251 0.114257,15.169921 0.342773,15.398438 C0.465821,15.521485 0.584472,15.609375 0.69873,15.662109 C0.812989,15.714844 0.958007,15.741211 1.133789,15.741211 C1.309571,15.741211 1.454589,15.714844 1.568848,15.662109 C1.683106,15.609375 1.801757,15.521485 1.924805,15.398438 L8.674805,8.648438 C8.903321,8.419921 9.017578,8.156251 9.017578,7.857422 C9.017578,7.558592 8.903321,7.294923 8.674805,7.066406 Z' id='Path'%3E%3C/path%3E%3C/g%3E%3C/g%3E%3C/svg%3E") !important;
        width: 20px;
        height: 20px;
        background-size: 20px 20px;
        background-repeat: no-repeat;
        margin: 0;
        padding: 0;
    }

    .swiper-pagination {
        margin: 0;
        padding: 0;
        width: auto;
        position: relative !important;
        display: block;
        width: auto;
    }

    .swiper-pagination .swiper-pagination-bullets {
        margin: 0;
    }

    .swiper-pagination .swiper-pagination-bullets .swiper-pagination-bullet {
        margin: 0;
        background: #fff !important;
    }

 
   
    .ulasan {
        font-size: 10px;
        color: #fff;
    }
    .naprod {
        font-size: 10px;
        color: #fff;
    }
    .nanominal {
        font-size: 13px;
        color: #fff;
        font-weight: 100;
    }
    .ulasan-email {
        font-size: 6px;
        color: #6c757d;
    }
    .ulasan-email::before {
        content: "\2014 \00A0";
    }
    
     .creativeux-shadow {
        box-shadow: 0 4px 80px hsla(0, 0%, 77%, .13), 0 1.6711px 33.4221px hsla(0, 0%, 77%, .09), 0 0.893452px 17.869px hsla(0, 0%, 77%, .08), 0 0.500862px 10.0172px hsla(0, 0%, 77%, .07), 0 0.266004px 5.32008px hsla(0, 0%, 77%, .05), 0 0.11069px 2.21381px hsla(0, 0%, 77%, .04);
    }


.flip-card {
  position: relative;
  display: inline-flex;
  flex-direction: column;
  border-radius: 0.15em 0.15em 0 0;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 17px;
}

.top,
.bottom,
.flip-card .top-flip,
.flip-card .bottom-flip {
  height: .75em;
  line-height: 1;
  padding: .25em;
  overflow: hidden;
}

.top,
.flip-card .top-flip {
  background-color: #c21010!important;
  border-top-right-radius: .1em;
  border-top-left-radius: .1em;
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
  color: #ccc;
  border-radius: 0.25em 0.25em 0 0;
}

.bottom,
.flip-card .bottom-flip {
  background-color: #e64848!important;
  display: flex;
  align-items: flex-end;
  border-bottom-right-radius: .1em;
  border-bottom-left-radius: .1em;
  color: #fff;
  border-radius: 0 0 0.25em 0.25em;
}

.flip-card .top-flip {
  position: absolute;
  width: 100%;
  animation: flip-top 250ms ease-in;
  transform-origin: bottom;
  background-color: #e64848!important;
}

@keyframes flip-top {
  100% {
    transform: rotateX(90deg);
  }
}

.flip-card .bottom-flip {
  position: absolute;
  bottom: 0;
  width: 100%;
  animation: flip-bottom 250ms ease-out 250ms;
  transform-origin: top;
  transform: rotateX(90deg);
}

@keyframes flip-bottom {
  100% {
    transform: rotateX(0deg);
  }
}

.containerr {
  gap: .4em;
  justify-content: center;
  position:absolute;
  display:flex;
}

.container-segment {
  display: flex;
  flex-direction: column;
  gap: .1em;
  align-items: center;
}

.segment {
  display: flex;
  gap: .1em;
}

.segment-title {
  font-size: 1rem;
}


.text-tih {
    font-size: 1.25rem;
    line-height: 1.90rem;
}

 @media (min-width: 992px) {
    .desktop-padding {
      padding: 20px;
    }
  }
  
.container {
  max-width: 1370px;
  margin: 0 auto;
  padding: 0 20px;
  box-sizing: border-box;
}

@media (max-width: 768px) {
  .container {
    padding: 0 7px;
  }
}


  /*FLASHSALE*/
  

.swiper-android .swiper-slide, .swiper-wrapper {
    transform: translateZ(0);
}
.swiper-wrapper {
    position: relative;
    width: 120%;
    height: 100%;
    z-index: 1;
    display: flex;
    transition-property: transform;
    box-sizing: content-box;
}




.mat-tab-body-content {
    height: 100%;
    overflow: auto;
}
.mat-tab-body-wrapper {
    position: relative;
    overflow: hidden;
    display: flex;
    transition: height 500ms cubic-bezier(0.35, 0, 0.25, 1);
}
.mat-tab-body.mat-tab-body-active {
    position: relative;
    overflow-x: hidden;
    overflow-y: auto;
    z-index: 0;
    flex-grow: 1;
}

.mat-tab-body {
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    position: absolute;
    display: block;
    overflow: hidden;
    outline: 0;
    flex-basis: 100%;
}



.text-\[\#FF2A2A\] {
    --tw-text-opacity: 1;
    color: rgb(255 42 42/var(--tw-text-opacity));
}
.font-bold {
    font-weight: 700;
}
.text-xs {
    font-size: .75rem;
    line-height: 1rem;
}
.py-0\.5 {
    padding-top: 0.125rem;
    padding-bottom: 0.125rem;
}
.px-2 {
    padding-left: 0.5rem;
    padding-right: 0.5rem;
}
.bg-danger-100 {
    --tw-bg-opacity: 1;
    background-color: rgb(254 202 202/var(--tw-bg-opacity));
}
.rounded {
    border-radius: 0.25rem;
}
.items-center {
    align-items: center;
}
.inline-flex {
    display: inline-flex;
}
.left-4 {
    left: 1rem;
}
.absolute {
    position: absolute;
}
.text-white {
    --tw-text-opacity: 1;
    color: rgb(255 255 255/var(--tw-text-opacity));
}
.font-bold {
    font-weight: 700;
}
.text-sm {
    font-size: .875rem;
    line-height: 1.25rem;
}
.relative {
    position: relative;
}
blockquote, dd, dl, figure, h1, h2, h3, h4, h5, h6, hr, p, pre {
    margin: 0;
}
h1, h2, h3, h4, h5, h6 {
    font-size: inherit;
    font-weight: inherit;
}
.backdrop-promo {
    background: linear-gradient(0deg,rgba(0,0,0,.6),rgba(0,0,0,.4));
}
.p-2 {
    padding: 0.5rem;
}
.rounded-lg {
    border-radius: 0.5rem;
}
.overflow-hidden {
    overflow: hidden;
}
.justify-end {
    justify-content: flex-end;
}
.items-end {
    align-items: flex-end;
}
.h-full {
    height: 100%;
}
.flex {
    display: flex;
}
.top-0 {
    top: 0;
}
.inset-x-0 {
    left: 0;
    right: 0;
}
.absolute {
    position: absolute;
}

.shadow, .shadow-lg {
    box-shadow: var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow);
}
.shadow-lg {
    --tw-shadow: 0 10px 15px -3px rgba(0,0,0,.1),0 4px 6px -4px rgba(0,0,0,.1);
    --tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color),0 4px 6px -4px var(--tw-shadow-color);
}
.rounded-lg {
    border-radius: 0.5rem;
}



.shadow, .shadow-lg {
    box-shadow: var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow);
}
.shadow-lg {
    --tw-shadow: 0 10px 15px -3px rgba(0,0,0,.1),0 4px 6px -4px rgba(0,0,0,.1);
    --tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color),0 4px 6px -4px var(--tw-shadow-color);
}
.rounded-lg {
    border-radius: 0.5rem;
}
.overflow-hidden {
    overflow: hidden;
}

.h-80 {
    height: 20rem;
}

.line-through {
    text-decoration-line: line-through;
}
.text-\[\#FF2A2A\] {
    --tw-text-opacity: 1;
    color: rgb(255 42 42/var(--tw-text-opacity));
}
.text-xs {
    font-size: .75rem;
    line-height: 1rem;
}
.ml-2 {
    margin-left: 0.5rem;
}

   .tihmel {
    width: 25px;
}

       .shadow-2xl {
    --tw-shadow: 0 25px 50px -12px rgba(0,0,0,.25);
    --tw-shadow-colored: 0 25px 50px -12px var(--tw-shadow-color);
}
.shadow, .shadow-2xl {
    box-shadow: var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow);
}
.py-4 {
    padding-top: 1rem;
    padding-bottom: 1rem;
}
.px-4 {
    padding-left: 1rem;
    padding-right: 1rem;
}
.bg-transparent {
    background-color: transparent;
}
.mb-4 {
    margin-bottom: 1rem;
}
.relative {
    position: relative;
}
.-z-10 {
    z-index: -10;
}
.inset-0, .inset-x-0 {
    right: 0;
    left: 0;
}
.inset-0 {
    top: 0;
    bottom: 0;
}
.absolute {
    position: absolute;
}
@keyframes hightlight {
    0% {
        left: -400%;
    }
    to {
        left: 100%;
    }
}
.selected-item:after {
    animation: hightlight 5s ease-in infinite forwards;
    background-color: hsla(204, 9%, 89%, 0.5);
    --tw-content: "";
    content: var(--tw-content);
}
.product-thumbnail-container {
    perspective: 25em;
}
.product-thumbnail-container img {
    position: relative;
    transform: rotateY(20deg) rotateX(-4deg) !important;
    transform-origin: left center;
}
.area {
    background-image: linear-gradient(to right, var(--tw-gradient-stops));
    --tw-gradient-from: #001431;
    --tw-gradient-to: rgb(30 32 34 / 0%);
    --tw-gradient-stops: var(--tw-gradient-from), #00000000;
    --tw-gradient-to: rgba(94, 102, 110, 0);
    --tw-gradient-stops: var(--tw-gradient-from), #001028, #00000000;
    --tw-gradient-to: #00000000;
    position: relative;
}
.area,
.circles {
    width: 100%;
    height: 100%;
}
.circles {
    position: absolute;
    top: 0;
    left: 0;
    overflow: hidden;
}
.circles li {
    position: absolute;
    display: block;
    list-style: none;
    width: 20px;
    height: 20px;
    background: hsla(0, 0%, 100%, 0.2);
    animation: animate 25s linear infinite;
    bottom: -150px;
}
.circles li:first-child {
    left: 25%;
    width: 80px;
    height: 80px;
    animation-delay: 0s;
}
.circles li:nth-child(2) {
    left: 10%;
    width: 20px;
    height: 20px;
    animation-delay: 2s;
    animation-duration: 12s;
}
.circles li:nth-child(3) {
    left: 70%;
    width: 20px;
    height: 20px;
    animation-delay: 4s;
}
.circles li:nth-child(4) {
    left: 40%;
    width: 60px;
    height: 60px;
    animation-delay: 0s;
    animation-duration: 18s;
}
.circles li:nth-child(5) {
    left: 65%;
    width: 20px;
    height: 20px;
    animation-delay: 0s;
}
.circles li:nth-child(6) {
    left: 75%;
    width: 110px;
    height: 110px;
    animation-delay: 3s;
}
.circles li:nth-child(7) {
    left: 35%;
    width: 150px;
    height: 150px;
    animation-delay: 7s;
}
.circles li:nth-child(8) {
    left: 50%;
    width: 25px;
    height: 25px;
    animation-delay: 10s;
    animation-duration: 45s;
}
.circles li:nth-child(9) {
    left: 20%;
    width: 15px;
    height: 15px;
    animation-delay: 2s;
    animation-duration: 35s;
}
.circles li:nth-child(10) {
    left: 85%;
    width: 150px;
    height: 150px;
    animation-delay: 0s;
    animation-duration: 11s;
}
.rectangle {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}
.rectangle li {
    position: absolute;
    display: block;
    list-style: none;
    width: 20px;
    height: 80px;
    background: hsla(0, 0%, 100%, 0.2);
    animation: animate-persegi-panjang 25s linear infinite;
    bottom: -250px;
}
.rectangle li:first-child {
    left: 25%;
    width: 80px;
    height: 80px;
    animation-delay: 0s;
}
.rectangle li:nth-child(2) {
    left: 10%;
    width: 20px;
    height: 80px;
    animation-delay: 2s;
    animation-duration: 12s;
}
.rectangle li:nth-child(3) {
    left: 70%;
    width: 20px;
    height: 80px;
    animation-delay: 4s;
}
.rectangle li:nth-child(4) {
    left: 40%;
    width: 60px;
    height: 120px;
    animation-delay: 0s;
    animation-duration: 18s;
}
.rectangle li:nth-child(5) {
    left: 65%;
    width: 20px;
    height: 80px;
    animation-delay: 0s;
}
.rectangle li:nth-child(6) {
    left: 75%;
    width: 110px;
    height: 170px;
    animation-delay: 3s;
}
.rectangle li:nth-child(7) {
    left: 35%;
    width: 150px;
    height: 240px;
    animation-delay: 7s;
}
.rectangle li:nth-child(8) {
    left: 50%;
    width: 25px;
    height: 25px;
    animation-delay: 10s;
    animation-duration: 45s;
}
.rectangle li:nth-child(9) {
    left: 20%;
    width: 15px;
    height: 40px;
    animation-delay: 2s;
    animation-duration: 35s;
}
.rectangle li:nth-child(10) {
    left: 85%;
    width: 150px;
    height: 270px;
    animation-delay: 0s;
    animation-duration: 11s;
}
@keyframes animate {
    0% {
        transform: translateY(0) rotate(0deg);
        opacity: 1;
        border-radius: 0;
    }
    to {
        transform: translateY(-1000px) rotate(2turn);
        opacity: 0;
        border-radius: 50%;
    }
}
@keyframes animate-persegi-panjang {
    0% {
        transform: translateY(0) rotate(0deg);
        opacity: 1;
        border-radius: 0;
    }
    to {
        transform: translateY(-1000px) rotate(2turn);
        opacity: 0;
        border-radius: 5%;
    }
}

.jstorew {
    flex-shrink: 0;
    margin-top: var(--bs-gutter-y);
    max-width: 100%;
    padding-left: calc(var(--bs-gutter-x)*.5);
    padding-right: calc(var(--bs-gutter-x)*.5);
    width: 100%;
}
.text-lgh {
    font-size: .8rem;
}
.container {
    max-width: none;
}
.container {
    width: 100%;
    margin-right: auto;
    margin-left: auto;
    padding-right: 1rem;
    padding-left: 1rem;
}
.text-text-color {
    color: hsl(var(--text-color));
}

.tracking-wider {
    letter-spacing: .05em;
}
.leading-relaxed {
    line-height: 1.625;
}
.uppercase {
    text-transform: uppercase;
}
.font-semibold {
    font-weight: 600;
}
.text-lg {
    font-size: 1.125rem;
    line-height: 1.75rem;
}
.mb-3 {
    margin-bottom: 0.75rem;
}
blockquote, dd, dl, figure, h1, h2, h3, h4, h5, h6, hr, p, pre {
    margin: 0;
}
.gap-2 {
    gap: 0.5rem;
}
.grid-cols-2 {
    grid-template-columns: repeat(2,minmax(0,1fr));
}
.grid {
    display: grid;
}
.ease-in-out {
    transition-timing-function: cubic-bezier(.4,0,.2,1);
}
.duration-300 {
    transition-duration: .3s;
}
.shadow-xl {
    --tw-shadow: 0 20px 25px -5px rgba(0,0,0,.1),0 8px 10px -6px rgba(0,0,0,.1);
    --tw-shadow-colored: 0 20px 25px -5px var(--tw-shadow-color),0 8px 10px -6px var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow);
}
.p-1\.5 {
    padding: 0.375rem;
}
.rounded-xl {
    border-radius: 0.75rem;
}
.gap-x-1\.5 {
    -moz-column-gap: .375rem;
    column-gap: 0.375rem;
}
.items-center {
    align-items: center;
}
.flex {
    display: flex;
}
.bg-title-product {
    background-color: hsl(var(--popular-bg));
    --tw-text-opacity: 1;
    color: rgb(255 255 255/var(--tw-text-opacity));
    background-image: url(https://jstoregame.com/assets/jsgbg.svg);
    background-repeat: repeat-x;
    background-position: top;
    background-size: clamp(60em,100rem,100em) auto,cover;
}
.ring-secondary-600 {
    --tw-ring-color: hsl(var(--secondary-600));
}
.ring-1, .ring-2 {
    box-shadow: var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow,0 0 #0000);
}
.ring-1 {
    --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
    --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
}
.\!object-center {
    -o-object-position: center!important;
    object-position: center!important;
}
.\!object-cover {
    -o-object-fit: cover!important;
    object-fit: cover!important;
}
.rounded-lg {
    border-radius: 0.5rem;
}
.w-14 {
    width: 3.5rem;
}
.h-14 {
    height: 3.5rem;
}
.aspect-square {
    aspect-ratio: 1/1;
}
img, video {
    max-width: 100%;
    height: auto;
}
audio, canvas, embed, iframe, img, object, svg, video {
    display: block;
    vertical-align: middle;
}
.flex-col {
    flex-direction: column;
}

.w-full {
    width: 100%;
}
.flex {
    display: flex;
}
.relative {
    position: relative;
}
.text-pupular-text {
    color: hsl(var(--popular-text));
}
@media (min-width: 768px)
.md\:text-base {
    font-size: 1rem;
    line-height: 1.5rem;
}
@media (min-width: 768px)
.md\:w-\[275px\] {
    width: 275px;
}
@media (min-width: 640px)
.sm\:w-\[200px\] {
    width: 200px;
}
.wx-\[100px\] {
    width: 100%;
}
.text-pupular-text {
    color: hsl(var(--popular-text));
}
.font-semibold {
    font-weight: 600;
}
.text-xxs {
    font-size: .625rem;
}
.truncate, .whitespace-nowrap {
    white-space: nowrap;
}
.truncate {
    overflow: hidden;
    text-overflow: ellipsis;
}
.w-\[100px\] {
    width: 100px;
}
blockquote, dd, dl, figure, h1, h2, h3, h4, h5, h6, hr, p, pre {
    margin: 0;
}
.text-primary-300 {
    color: hsl(var(--primary-300));
}

.text-xxs {
    font-size: .6rem;
}
blockquote, dd, dl, figure, h1, h2, h3, h4, h5, h6, hr, p, pre {
    margin: 0;
}

audio, canvas, embed, iframe, img, object, svg, video {
    display: block;
    vertical-align: middle;
}
@media (max-width: 750px)
.card-titlexx {
    margin-top: -2px;
}
.card-titlexx {
    margin-top: 10px;
    font-size: 9px;
    width: 100%;
    font-weight: bold;
    text-align: center;
}
.text-whitexx, .text-white-all *, .text-white-all *:before, .text-white-all *:after {
    color: #ffffff !important;
}
.text-whitexx {
    color: #fff!important;
}
.text-truncatexx {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.card-titlexx {
    margin-bottom: 0.75rem;
}
.inset-0, .inset-x-0 {
    right: 0;
    left: 0;
}
.inset-0 {
    top: 0;
    bottom: 0;
}
.absolute {
    position: absolute;
}

.text-lgx {
    font-size: 1.212rem;
    line-height: 1rem;
    font-weight: 600;
}

.hover\:ring-offset-bg-color:hover {
    --tw-ring-offset-color: #1219ff;
}
.hover\:ring-offset-2:hover {
    --tw-ring-offset-width: 1px;
}
.hover\:ring-primary-600:hover {
    --tw-ring-color: hsl(var(--primary-600));
}
.hover\:ring-2:hover {
    --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) hsl(212.31deg 100% 54.78%);
    --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) hsl(224.83deg 100% 50%);
    box-shadow: var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow,0 0 #0000);
}
.hover\:shadow-2xl:hover {
    --tw-shadow: 0 25px 50px -12px rgba(0,0,0,.25);
    --tw-shadow-colored: 0 25px 50px -12px var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow);
}

.border-primary-500.active, .border-primary-500.show>.bg-red-600 {
    background-color: rgba(220, 38, 38, var(--tw-bg-opacity));
}
[type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
    cursor: pointer;
}
.flex {
    display: flex;
}
.text-sm {
    font-size: .875rem;
    line-height: 1.25rem;
}
/*.swiper-3d, .swiper-3d.swiper-css-mode .swiper-wrapper {
    perspective: 10000px;
}*/
/* Reset styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  background-color: #f8f9fa;
}

.promo-section {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

.promo-title {
  font-weight: bold;
  font-size: 1.5rem;
  margin-bottom: 20px;
}

.promo-image img {
  width: 100%;
  max-width: 40px;
  height: auto;
}

.promo-carousel {
  margin-top: 20px;
  display: flex;
  overflow-x: auto; /* Enable horizontal scrolling */
}

.promo-slide {
  flex: 0 0 auto; /* Prevent flex items from growing */
  width: calc(33.333% - -10px); /* Adjust to fit three items per row */
  margin-right: 20px;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.promo-link {
  display: block;
  text-decoration: none;
  color: inherit;
}

.promo-pattern {
  width: 100%;
  height: auto;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

.promo-details {
  padding: 20px;
}

.promo-subtitle {
  font-weight: bold;
  font-size: 15px;
  margin-bottom: 5px;
}

.promo-description {
  font-size: 0.775rem;
  margin-bottom: 10px;
}

.promo-timer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 20px 20px;
}

.timer-badge {
  background-color: #F36D0A;
  color: #fff;
  border-radius: 20px;
  padding: 5px 15px;
  font-weight: bold;
  font-size: 0.875rem;
}

.discount-badge {
  color: #4CAF50;
  font-weight: bold;
  font-size: 0.875rem;
}

/* Hover effect */
.promo-slide:hover {
  transform: translateY(-5px);
  transition: transform 0.3s ease;
}

/* Splide styles */
.splide__arrow {
  background: #ccc;
  border-radius: 50%;
  height: 2em;
  opacity: .7;
  width: 2em;
}

.splide__arrow svg {
  fill: #5f101000;
  height: 1.2em;
  width: 1.2em;
}

/* Other styles remain the same */

.mx-jsgx {
    margin-right: 15px !important;
    margin-left: 15px !important;
}

/* Style for the promo section */
.promo-section {
    padding: 20px;
    background-image: url(https://jstoregame.com/assets/jsgbg.svg);
    border-radius: 10px;
    margin-bottom: 20px;
}

/* Style for the promo title */
.promo-title {
    font-size: 24px;
    color: #333;
    margin-bottom: 15px;
}

/* Style for the promo image */
.promo-image img {
    width: 100%;
    border-radius: 10px;
}

/* Style for the promo details */
.promo-details {
    padding: 15px;
    background-color: #fff;
    border-radius: 0 0 10px 10px;
}

/* Style for the promo subtitle */
.promo-subtitle {
    font-size: 20px;
    color: #333;
    margin-bottom: 5px;
}

/* Style for the promo description */
.promo-description {
    font-size: 16px;
    color: #666;
    margin: 0;
}

.grid-cols-2xx {
    grid-template-columns: repeat(1, minmax(0, 1fr));
}
.ribbon {
    position: absolute;
    right: -7px;
    top: -26.5px;
    z-index: 1;
    overflow: hidden;
    width: 75px;
    height: 75px;
    text-align: right;
}
.ribbon span {
    font-size: 10px;
    font-weight: bold;
    color: #FFF;
    text-transform: uppercase;
    text-align: center;
    line-height: 20px;
    transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
    width: 100px;
    display: block;
    background: #79A70A;
    background: linear-gradient(#F70505 0%, #F70505 100%);
    box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
    position: absolute;
    top: 19px;
    right: -21px;
}
.ribbon span::before {
    content: "";
    position: absolute;
    left: 0px;
    top: 100%;
    z-index: -1;
    border-left: 3px solid #F70505;
    border-right: 3px solid transparent;
    border-bottom: 3px solid transparent;
    border-top: 3px solid #F70505;
}
.ribbon span::after {
    content: "";
    position: absolute;
    right: 0px;
    top: 100%;
    z-index: -1;
    border-left: 3px solid transparent;
    border-right: 3px solid #F70505;
    border-bottom: 3px solid transparent;
    border-top: 3px solid #F70505;
}

@media (max-width: 576px) {
    .swiper-slidexx img {
        display: block;
        width: 55px;
        height: 100% !important;
        border-radius: 12px;
    }
}
.ribbondks {
    position: absolute;
    right: -10px;
    top: -20px;
    z-index: 1;
    overflow: hidden;
    width: 75px;
    height: 75px;
    text-align: right;
}
.ribbondks span {
    font-size: 10px;
    font-weight: bold;
    color: #FFF;
    text-transform: uppercase;
    text-align: center;
    line-height: 20px;
    transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
    width: 100px;
    display: block;
    background: #79A70A;
    background: linear-gradient(#F70505 0%, #F70505 100%);
    box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
    position: absolute;
    top: 19px;
    right: -21px;
}
.ribbondks span::before {
    content: "";
    position: absolute;
    left: 0px;
    top: 100%;
    z-index: -1;
    border-left: 3px solid #F70505;
    border-right: 3px solid transparent;
    border-bottom: 3px solid transparent;
    border-top: 3px solid #F70505;
}
.ribbondks span::after {
    content: "";
    position: absolute;
    right: 0px;
    top: 100%;
    z-index: -1;
    border-left: 3px solid transparent;
    border-right: 3px solid #F70505;
    border-bottom: 3px solid transparent;
    border-top: 3px solid #F70505;
}.ribbondks span {
    font-size: 10px;
    font-weight: bold;
    color: #FFF;
    text-transform: uppercase;
    text-align: center;
    line-height: 20px;
    transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
    width: 100px;
    display: block;
    background: #79A70A;
    background: linear-gradient(#F70505 0%, #F70505 100%);
    box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
    position: absolute;
    top: 19px;
    right: -21px;
}
.ribbondks span::before {
    content: "";
    position: absolute;
    left: 0px;
    top: 100%;
    z-index: -1;
    border-left: 3px solid #F70505;
    border-right: 3px solid transparent;
    border-bottom: 3px solid transparent;
    border-top: 3px solid #F70505;
}
.ribbondks span::after {
    content: "";
    position: absolute;
    right: 0px;
    top: 100%;
    z-index: -1;
    border-left: 3px solid transparent;
    border-right: 3px solid #F70505;
    border-bottom: 3px solid transparent;
    border-top: 3px solid #F70505;
}
.nav-pills .nav-link {
--tw-text-opacity: 1;
color: rgb(156 163 175 / var(--tw-text-opacity));
}

.nav-pills .nav-link:hover {
    color: #fff;
    background-color: transparent;
    border-bottom: 2px solid #ffffff;
}

.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff;
    background-color: var(--warna_5) !important;
    border-bottom: 2px solid #fff;
    border-radius: 9999px;
}
.nav-pills .nav-link {
    border-radius: 0rem;
    margin: 0px;
}
.nav-link {
--tw-text-opacity: 1;
color: rgb(156 163 175 / var(--tw-text-opacity));
display: block;
padding: 0.5rem 1rem;
text-decoration: none;
transition: color 0.15s ease-in-out 0s, background-color 0.15s ease-in-out 0s, border-color 0.15s ease-in-out 0s;
}
</style>
@endsection
@section('content')
@include('../navbar')


<div class="content-body">
<div class="wrapper mt-2">
    <div aria-live="assertive"
        class="pointer-events-none fixed inset-0 z-50 flex items-end px-4 py-6 sm:items-start sm:p-6">
        <div class="flex w-full flex-col items-center space-y-4 sm:items-end"></div>
    </div>
    <div class="row d-lg-none d-inline-block m-0 w-100 pt-4x ">
        <section class="relative mb-2 bg-transparent px-0 py-4 shadow-2xl lg:min-h-[350px]">
            <div class="col-lg-10 mx-auto p-0 jstorew d-lg-block">
                <div class=" swiper my-swiper swiper-coverflow swiper-3d swiper-initialized swiper-horizontal swiper-pointer-events swiper-watch-progress swiper-container swiper-container-mobile">
                    <div class="swiper-wrapper">
                        @php $i = 1; @endphp 
                        @foreach($banner as $data) 
                        @php $active = ($i == 1) ? 'active' : ''; @endphp
                        <div class="swiper-slide" data-swiper-slide-index="{{ $i-1 }}" role="group" aria-label="{{ $i }} / {{ count($banner) }}">
                          <img src="{{ $data->path }}" alt="" class="d-block w-100 akumauweb-rounded-kecil">
                         
                        </div>
                        @php $i++; @endphp 
                        @endforeach
                    </div>
                </div>
            </div>
        <div class="absolute inset-0" style=" background-color: rgba(0, 0, 0, 0.5); z-index:-1;">
        <img alt=""  decoding="async" data-nimg="fill" class="object-cover object-center" src="https://res.cloudinary.com/dazayhg7s/image/upload/v1741005493/POSTER_HEADER_WEB_VAZZ_UNIVERSE_3_cr0lhi.png" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
        </div>


<div class="col-lg-11 mx-jsgx mt-4">
<app-count-down _nghost-vyn-c93="">
                                        <div _ngcontent-vyn-c93="" class="flash-sale-countdown">
                                            <div _ngcontent-vyn-c93="" class="flash-sale-countdown__item">
                                                <!---->
                                                <div _ngcontent-vyn-c93="" class="flash-sale-count ng-star-inserted">
                                                    <div _ngcontent-vyn-c93=""
                                                        class="flash-sale-count__item count-text">
                                                        <span _ngcontent-vyn-c93="">
                                                            <div class="flex items-center gap-1">
                                                                <svg stroke="currentColor" fill="currentColor"
                                                                    stroke-width="0" viewBox="0 0 16 16"
                                                                    class="h-8 w-8 animate-flicker text-yellow-400"
                                                                    height="1em" width="1em"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M5.52.359A.5.5 0 0 1 6 0h4a.5.5 0 0 1 .474.658L8.694 6H12.5a.5.5 0 0 1 .395.807l-7 9a.5.5 0 0 1-.873-.454L6.823 9.5H3.5a.5.5 0 0 1-.48-.641l2.5-8.5z">
                                                                    </path>
                                                                </svg>
                                                                <span
                                                                    class="text-xl font-bold uppercase leading-[26px] tracking-[0.2em] text-primary-400">Flashsale</span>

                                                            </div>
                                                        </span>

                                                    </div>
                                                    <div _ngcontent-vyn-c93=""
                                                        class="flash-sale-count__item count-number ng-star-inserted">
                                                        <div class="container-countdown">
                                                            <div class="container-segment">
                                                                <div class="segment">
                                                                    <div class="flip-card" data-hours-tens>
                                                                        <div class="top">0</div>
                                                                        <div class="bottom">0</div>
                                                                    </div>

                                                                    <div class="flip-card" data-hours-ones>
                                                                        <div class="top">0</div>
                                                                        <div class="bottom">0</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="container-segment">
                                                                <div class="segment">
                                                                    <div class="flip-card" data-minutes-tens>
                                                                        <div class="top">0</div>
                                                                        <div class="bottom">0</div>
                                                                    </div>
                                                                    <div class="flip-card" data-minutes-ones>
                                                                        <div class="top">0</div>
                                                                        <div class="bottom">0</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="container-segment">
                                                                <div class="segment">
                                                                    <div class="flip-card" data-seconds-tens>
                                                                        <div class="top">0</div>
                                                                        <div class="bottom">0</div>
                                                                    </div>
                                                                    <div class="flip-card" data-seconds-ones>
                                                                        <div class="top">0</div>
                                                                        <div class="bottom">0</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    
                                                </div>
                                             
                                            </div>
                                        </div>
                                    </app-count-down>
    <div class="splide" id="flashsale-slider">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach($flashsale as $fs)
                <li class="splide__slide">
                    <a tabindex="0" href="{{('/order')}}/{{$fs->kode_game}}" style="outline: none;">
                        <div class="bg-title-product flex items-center gap-x-1.5 rounded-xl bg-murky-600 p-1.5 duration-300 ease-in-out md:gap-x-3 md:rounded-2xl md:p-3 bg-murky-800">
                            <img alt="{{$fs->judul_flash_sale}}" fetchpriority="high" width="56" height="56" decoding="async" data-nimg="1" class="aspect-square h-14 w-14 rounded-lg !object-cover !object-center ring-1 ring-murky-600 md:h-20 md:w-20 md:rounded-xl" sizes="100vw" srcset="{{$fs->banner_flash_sale}}" style="color: transparent;">
                            <div class="relative flex w-full flex-col">
                                <h2 class="truncate text-xxs font-semibold text-murky-200 sm:w-[200px] md:w-[275px] md:text-base">{{$fs->judul_flash_sale}}</h2>
                                <p class="text-xxs text-murky-300 md:text-sm">Rp.{{ number_format($fs->harga_flash_sale, 0, '.', ',') }},-</p>
                                <figure class="top-0" style="width: 70px;">
                                    <img alt="fs-gif" loading="lazy" width="50" height="50" decoding="async" data-nimg="1" 
                                    class="object-cover object-left rounded-xl absolute top-0 right-0" sizes="(max-width: 768px) 100vw, 100px" 
                                    srcset="/assets/fs.gif" 
                                    src="/assets/fs.gif" 
                                    style="color: transparent; margin-top: -20px;">
                                    </figure>
                           
                            </div>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>


</section>

           <!-- @if($flashsale->count() > 0)          
            <div class="col-lg-11 mx-jsgx mt-4">        
    <div class="promo-carousel splide">
        <div class="splide__track">@foreach($flashsale as $fs)
            <ul class="splide__list">
                <li class="promo-slide splide__slide">
                    <a href="{{('/order')}}/{{$fs->kode_game}}" class="promo-link">
                        <img src="{{$fs->banner_flash_sale}}" alt="Pattern 1" class="promo-pattern">
                        <div class="promo-details">
                            <h2 class="promo-subtitle">{{$fs->judul_flash_sale}}</h2>
                            <p class="promo-description">Rp.{{ number_format($fs->harga_flash_sale, 0, '.', ',') }},-</p>
                        </div>
                    </a>
                </li>
            </ul>
        </div>@endforeach
    </div>
    </div>
    @endif               --> 
                    
         





<div class="col-lg-11 mx-jsg mt-4">
    <h3 class="mb-3 text-lgh font-semibold uppercase leading-relaxed tracking-wider">ðŸ”¥ <!-- -->Populer</h3>
    <div class="grid grid-cols-2 gap-2 md:gap-4 lg:grid-cols-3">
    @foreach($kategori as $jsgori)@if($jsgori->tipe == "populer")    <a tabindex="0" href="{{ env('APP_URL').'/order/'.$jsgori->kode }}" style="outline: none;">
            <div class="bg-title-product flex items-center gap-x-1.5 rounded-xl bg-murky-600 p-1.5 duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-primary-500 hover:ring-offset-2 hover:ring-offset-murky-800 md:gap-x-3 md:rounded-2xl md:p-3 bg-murky-800">
                <img alt="{{ $jsgori->nama }}" fetchpriority="high" width="56" height="56" decoding="async" data-nimg="1" class="aspect-square h-14 w-14 rounded-lg !object-cover !object-center ring-1 ring-murky-600 md:h-20 md:w-20 md:rounded-xl" sizes="100vw" srcset="{{ url('') }}{{ $jsgori->thumbnail }}" style="color: transparent;">
                <div class="relative flex w-full flex-col">
                    <h2 class="w-[100px] truncate text-xxs font-semibold text-murky-200 sm:w-[200px] md:w-[275px] md:text-base">{{ $jsgori->nama }}</h2>
                    <p class="text-xxs text-murky-300 md:text-sm">{{ $jsgori->sub_nama }}</p></div></div></a>@endif @endforeach</div></div>
                <div class="row border-bottom-jsg h-100 mt-4">
                    <div class="col-sm-11">
                        <ul class="nav nav-pills justify-content-left akumauweb-scroll flex space-x-3 overflow-auto"
                            id="myTab" role="tablist">
                         
                           <li class="nav-item me-1 nav-tab" role="presentation">
                                <button
                                    class="btn-category nav-link text-lgx flex whitespace-nowrap border-b-2 py-2 px-3 outline-none border-primary-500 bg-gradient-to-t from-murky-700 to-murky-800 active"
                                    id="gamelainnya-tab" data-bs-toggle="tab" data-bs-target="#gamelainnya" type="button"
                                    role="tab" aria-controls="gamelainnya" aria-selected="true">
                                    <small>Game Lainnya</small>
                                </button>
                            </li>
                        
                            <li class="nav-item me-1 nav-tab" role="presentation">
                                <button
                                    class="btn-category nav-link text-lgx flex whitespace-nowrap border-b-2 py-2 px-3 outline-none border-primary-500 bg-gradient-to-t from-murky-700 to-murky-800"
                                    id="Pulsa-tab" data-bs-toggle="tab" data-bs-target="#Pulsa" type="button"
                                    role="tab" aria-controls="game" aria-selected="true">
                                    <small>Pulsa/Data</small>
                                </button>
                            </li>
                            <li class="nav-item me-1 nav-tab" role="presentation">
                                <button
                                    class="btn-category nav-link text-lgx flex whitespace-nowrap border-b-2 py-2 px-3 outline-none border-primary-500 bg-gradient-to-t from-murky-700 to-murky-800"
                                    id="voucher-tab" data-bs-toggle="tab" data-bs-target="#voucher" type="button"
                                    role="tab" aria-controls="game" aria-selected="true">
                                    <small>Voucher</small>
                                </button>
                            </li> 
                           <li class="nav-item me-1 nav-tab" role="presentation">
                                <button
                                    class="btn-category nav-link text-lgx flex whitespace-nowrap border-b-2 py-2 px-3 outline-none border-primary-500 bg-gradient-to-t from-murky-700 to-murky-800"
                                    id="e-money-tab" data-bs-toggle="tab" data-bs-target="#e-money" type="button"
                                    role="tab" aria-controls="game" aria-selected="true">
                                    <small>E-Wallet</small>
                                </button>
                            </li> 
                          <li class="nav-item me-1 nav-tab" role="presentation">
                                <button
                                    class="btn-category nav-link text-lgx flex whitespace-nowrap border-b-2 py-2 px-3 outline-none border-primary-500 bg-gradient-to-t from-murky-700 to-murky-800"
                                    id="PLN-tab" data-bs-toggle="tab" data-bs-target="#PLN" type="button"
                                    role="tab" aria-controls="game" aria-selected="true">
                                    <small>PLN</small>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
        </div>
        
            <div class="row d-none d-lg-block pt-5x">
                <section class="relative mb-2 bg-transparent px-0 py-4 shadow-2xl lg:min-h-[350px]">
                <div class="col-lg-11 mx-auto">
                    <div
                        class=" swiper my-swiper swiper-coverflow swiper-3d swiper-initialized swiper-horizontal swiper-pointer-events swiper-watch-progress swiper-containerr swiper-container-mobile">
                        <div class="swiper-wrapper">
                                 @php $i = 1; @endphp 
                        @foreach($banner as $data) 
                        @php $active = ($i == 1) ? 'active' : ''; @endphp
                        <div class="swiper-slide akumauweb-rounded-sedang" data-swiper-slide-index="{{ $i-1 }}" role="group"
                                aria-label="{{ $i }} / {{ count($banner) }}">
                                <img src="{{ $data->path }}" alt=""
                                    class="d-block w-100 akumauweb-rounded-sedang">
                                <div class="swiper-slide-shadow-left" style="opacity: 2; transition-duration: 300ms;">
                                </div>
                                <div class="swiper-slide-shadow-right" style="opacity: 0; transition-duration: 300ms;">
                                </div>
                            </div>
                        @php $i++; @endphp 
                        @endforeach
                            </div>
                        </div>
                        <div class="col-lg-11 mx-jsgx mt-4">
    <app-count-down _nghost-vyn-c93="">
                                        <div _ngcontent-vyn-c93="" class="flash-sale-countdown">
                                            <div _ngcontent-vyn-c93="" class="flash-sale-countdown__item">
                                                <!---->
                                                <div _ngcontent-vyn-c93="" class="flash-sale-count ng-star-inserted">
                                                    <div _ngcontent-vyn-c93=""
                                                        class="flash-sale-count__item count-text">
                                                        <span _ngcontent-vyn-c93="">
                                                            <div class="flex items-center gap-1">
                                                                <svg stroke="currentColor" fill="currentColor"
                                                                    stroke-width="0" viewBox="0 0 16 16"
                                                                    class="h-8 w-8 animate-flicker text-yellow-400"
                                                                    height="1em" width="1em"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M5.52.359A.5.5 0 0 1 6 0h4a.5.5 0 0 1 .474.658L8.694 6H12.5a.5.5 0 0 1 .395.807l-7 9a.5.5 0 0 1-.873-.454L6.823 9.5H3.5a.5.5 0 0 1-.48-.641l2.5-8.5z">
                                                                    </path>
                                                                </svg>
                                                                <span
                                                                    class="text-xl font-bold uppercase leading-[26px] tracking-[0.2em] text-primary-400">Flashsale</span>

                                                            </div>
                                                        </span>

                                                    </div>
                                                  
                                                    <!---->
                                                </div>
                                                <!---->
                                                <!---->
                                            </div>
                                        </div>
                                    </app-count-down>
    <div class="grid grid-cols-2xx gap-2 md:gap-4 lg:grid-cols-3 whitespace-nowrap">
        @foreach($flashsale as $fs)
            <a tabindex="0" href="{{('/order')}}/{{$fs->kode_game}}" style="outline: none;">
                <div class="bg-title-product flex items-center gap-x-1.5 rounded-xl bg-murky-600 p-1.5 duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-primary-500 hover:ring-offset-2 hover:ring-offset-murky-800 md:gap-x-3 md:rounded-2xl md:p-3 bg-murky-800">
                    <img alt="{{$fs->judul_flash_sale}}" fetchpriority="high" width="56" height="56" decoding="async" data-nimg="1" class="aspect-square h-14 w-14 rounded-lg !object-cover !object-center ring-1 ring-murky-600 md:h-20 md:w-20 md:rounded-xl" sizes="100vw" srcset="{{$fs->banner_flash_sale}}" style="color: transparent;">
                    <div class="relative flex w-full flex-col">
                        <h2 class="truncate text-xxs font-semibold text-murky-200 sm:w-[200px] md:w-[275px] md:text-base">{{$fs->judul_flash_sale}}</h2>
                        <p class="text-xxs text-murky-300 md:text-sm">Rp.{{ number_format($fs->harga_flash_sale, 0, '.', ',') }},-</p>
                        <figure class="top-0" style="width: 70px;">
                                    <img alt="fs-gif" loading="lazy" width="50" height="50" decoding="async" data-nimg="1" 
                                    class="object-cover object-left rounded-xl absolute top-0 right-0" sizes="(max-width: 768px) 100vw, 100px" 
                                    srcset="/assets/fs.gif" 
                                    src="/assets/fs.gif" 
                                    style="color: transparent; margin-top: -20px;">
                                    </figure>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
                    </div>
                    <div class="absolute inset-0" style=" background-color: rgba(0, 0, 0, 0.5); z-index:-1;"><img alt="" fetchpriority="high" decoding="async" data-nimg="fill" class="object-cover object-center" src="{{ url('') }}{{ !$config ? '' : $config->logo_banner }}" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;"></div>

                </div>
                
               <!-- <div class="row d-none d-lg-block">
                               <div class="col-lg-11 mx-auto mt-4">
                                   <div class="bg-gradient card bg-cardy corona-gradient-card">
                                       <div class="card-body py-2 px-2 px-sm-3">
                                           <div class="row align-items-center">
                                               /* <div class="col-2">
                                                   <img src="/cdn/image/jsggif.gif" style="height:50px;" class="gradient-corona-img img-x" alt="">
                                               </div> */
                                               <div class="col-4">
                                                   <marquee width="250%" direction="left">
                                                       <span class="mb-0 font-weight-normal"><strong>Selamat Berbelanja</strong> |</span>
                                                       <span class="font-weight-normal">Semoga harimu Menyenangkan |</span>&nbsp; <span class="mb-0 font-weight-normal">Thank you for your kind attention! </span>
                                                   </marquee>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div> -->
                           
            
<div class="row d-none d-lg-block" style="padding-top: 0rem !important;">
<div class="col-lg-11 mx-auto mt-4">
    <h3 class="mb-3 text-lgh font-semibold uppercase leading-relaxed tracking-wider">ðŸ”¥ <!-- -->Populer</h3>
    <div class="grid grid-cols-2 gap-2 md:gap-4 lg:grid-cols-3">
    @foreach($kategori as $jsgori)@if($jsgori->tipe == "populer")    <a tabindex="0" href="{{ env('APP_URL').'/order/'.$jsgori->kode }}" style="outline: none;">
            <div class="bg-title-product flex items-center gap-x-1.5 rounded-xl bg-murky-600 p-1.5 duration-300 ease-in-out hover:shadow-2xl hover:ring-2 hover:ring-primary-500 hover:ring-offset-2 hover:ring-offset-murky-800 md:gap-x-3 md:rounded-2xl md:p-3 bg-murky-800">
                <img alt="{{ $jsgori->nama }}" fetchpriority="high" width="56" height="56" decoding="async" data-nimg="1" class="aspect-square h-14 w-14 rounded-lg !object-cover !object-center ring-1 ring-murky-600 md:h-20 md:w-20 md:rounded-xl" sizes="100vw" srcset="{{ url('') }}{{ $jsgori->thumbnail }}" style="color: transparent;">
                <div class="relative flex w-full flex-col">
                    <h2 class="wx-[100px] truncate text-xxs font-semibold text-murky-200 sm:w-[200px] md:w-[275px] md:text-base">{{ $jsgori->nama }}</h2>
                    <p class="text-xxs text-murky-300 md:text-sm">{{ $jsgori->sub_nama }}</p></div></div></a>@endif @endforeach</div></div></section></div>


        
            <div class="mx-auto max-w-7xl px-3 pt-4 sm:px-6 lg:px-8 d-none d-lg-block">
                <div class="mx-auto max-w-7xl pt-0 lg:px-8 mt-0 md:mt-1">
                        <nav class="-mb-px flex text-center text-sm font-medium mb-1 border-bottom-jsg" aria-label="Tabs">
                            <ul class="nav nav-pills justify-content-left akumauweb-scroll" id="myTab" role="tablist">
                             <!--   <li class="nav-item me-1 nav-tab " role="presentation">
                                    <button
                                        class="btn-category nav-link  text-lgx flex whitespace-nowrap border-b-2 py-2 px-3 outline-none border-primary-500 bg-gradient-to-t from-murky-700 to-murky-800 active"
                                        id="populer-tab" data-bs-toggle="tab" data-bs-target="#populer" type="button"
                                        role="tab" aria-controls="populer" aria-selected="true">
                                        <small>Populer</small>
                                    </button>
                                </li> -->
                                <li class="nav-item me-1 nav-tab " role="presentation">
                                    <button
                                        class="btn-category nav-link  text-lgx flex whitespace-nowrap border-b-2 py-2 px-3 outline-none border-primary-500 bg-gradient-to-t from-murky-700 to-murky-800 active"
                                        id="gamelainnya-tab" data-bs-toggle="tab" data-bs-target="#gamelainnya" type="button"
                                        role="tab" aria-controls="gamelainnya" aria-selected="true">
                                        <small>Game Lainnya</small>
                                    </button>
                                </li>
                             <!--   <li class="nav-item me-1 nav-tab " role="presentation">
                                    <button
                                        class="btn-category nav-link  text-lgx flex whitespace-nowrap border-b-2 py-2 px-3 outline-none border-primary-500 bg-gradient-to-t from-murky-700 to-murky-800 "
                                        id="vilog-tab" data-bs-toggle="tab" data-bs-target="#vilog" type="button"
                                        role="tab" aria-controls="vilog" aria-selected="true">
                                        <small>Via Login</small>
                                    </button>
                                </li>-->
                                <li class="nav-item me-1 nav-tab " role="presentation">
                                    <button
                                        class="btn-category nav-link  text-lgx flex whitespace-nowrap border-b-2 py-2 px-3 outline-none border-primary-500 bg-gradient-to-t from-murky-700 to-murky-800 "
                                        id="Pulsa-tab" data-bs-toggle="tab" data-bs-target="#Pulsa" type="button"
                                        role="tab" aria-controls="game" aria-selected="true">
                                        <small>Pulsa/Data</small>
                                    </button>
                                </li>
                                <li class="nav-item me-1 nav-tab " role="presentation">
                                    <button
                                        class="btn-category nav-link  text-lgx flex whitespace-nowrap border-b-2 py-2 px-3 outline-none border-primary-500 bg-gradient-to-t from-murky-700 to-murky-800 "
                                        id="voucher-tab" data-bs-toggle="tab" data-bs-target="#voucher" type="button"
                                        role="tab" aria-controls="game" aria-selected="true">
                                        <small>Voucher</small>
                                    </button> 
                                </li> 
                                <li class="nav-item me-1 nav-tab " role="presentation">
                                    <button
                                        class="btn-category nav-link  text-lgx flex whitespace-nowrap border-b-2 py-2 px-3 outline-none border-primary-500 bg-gradient-to-t from-murky-700 to-murky-800 "
                                        id="e-money-tab" data-bs-toggle="tab" data-bs-target="#e-money" type="button"
                                        role="tab" aria-controls="game" aria-selected="true">
                                        <small>E-Wallet</small>
                                    </button> 
                                </li>
                                <li class="nav-item me-1 nav-tab " role="presentation">
                                    <button
                                        class="btn-category nav-link  text-lgx flex whitespace-nowrap border-b-2 py-2 px-3 outline-none border-primary-500 bg-gradient-to-t from-murky-700 to-murky-800 "
                                        id="PLN-tab" data-bs-toggle="tab" data-bs-target="#PLN" type="button"
                                        role="tab" aria-controls="game" aria-selected="true">
                                        <small>PLN</small>
                                    </button> 
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        
<!--        @if($flashsale->count() > 0)
            <section class="section">
                <div class="col-lg-12 mx-auto max-w-7xl px-0 pt-0 sm:px-6 lg:px-6 mt-4">
                    <div class="mx-auto max-w-7xl pt-0 lg:px-8 mt-0 md:mt-1">
                        <div class="section-body">
                            <div class="card " style="border-radius: 10px;">
                                
                                <div class="" style="border-radius: 10px;">
                                    <div class="mat-tab-body-wrapper">
                                        <mat-tab-body role="tabpanel"
                                            class="mat-tab-body ng-tns-c103-2 mat-tab-body-active ng-star-inserted"
                                            id="mat-tab-content-0-0" aria-labelledby="mat-tab-label-0-0">
                                            <div class="mat-tab-body-content ng-tns-c103-2 ng-trigger ng-trigger-translateTab"
                                                style="transform: none;">
                                                <app-flash-sale class="ng-star-inserted" style="">
                                                    <div class="flash-sale-carousel ng-star-inserted">
                                                        <swiper
                                                            class="swiper swiper-virtual swiper-initialized swiper-horizontal swiper-pointer-events swiper-watch-progress">
                                                            <div class="swiper-button-prev swiper-button-disabled ng-star-inserted"
                                                                tabindex="0" role="button" aria-label=""
                                                                aria-controls="swiper-wrapper-2124444"
                                                                aria-disabled="true"></div>
                                                            <swiper-wrapper class="swiper-wrapper"
                                                                id="swiper-wrapper-2124444" aria-live="polite">
                                                                
                                                                <div class="slide-container swiper">
                                                                    <div class="slide-content swiper-initialized swiper-horizontal swiper-backface-hidden">
                                                                        <div class="card-wrapper swiper-wrapper"
                                                                            style="cursor: grab; transition-duration: 0ms; transform: translate3d(-374.667px, 0px, 0px);"
                                                                            id="swiper-wrapper-a910eaeefb21523d8"
                                                                            aria-live="off">@foreach($flashsale as $fs)
                                                                            <div class="swiper-slide" style="width: 200px; margin-right: 16px;">
                                            <a class="cursor-pointer" href="{{('/order')}}/{{$fs->kode_game}}">
                                                <div class="relative flex h-40 w-36 cursor-pointer flex-col rounded-lg  md:h-56 md:w-auto xl:h-56 xl:w-auto">
                                                    <div class="relative h-80 w-full overflow-hidden rounded-lg  sm:w-36 md:w-[170px] xl:w-52">
                                                        <figure class="h-full w-full object-cover object-center" style="max-width: 100%; height: auto;">
                                                            <span style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: absolute; inset: 0px;">
                                                                <img alt="{{$fs->judul_flash_sale}}" src="{{$fs->banner_flash_sale}}" decoding="async" data-nimg="fill" class="" sizes="100vw" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover; object-position: center center;">
                                                               
                                                            </span>
                                                        </figure>
                                                    </div>
                                                    <div class="backdrop-promo absolute inset-x-0 top-0 flex h-full items-end justify-end overflow-hidden rounded-lg p-2">
                                                        <div aria-hidden="true" class="absolute inset-x-0 bottom-0 h-56"></div>
                                                        <div class="absolute left-4">
                                                            <h2 class="relative text-sm font-bold text-white">{{$fs->judul_flash_sale}}</h2>
                                                         <p class="mt-2">
                                                            <span class="inline-flex items-center rounded bg-danger-100 px-2 py-0.5 text-xs font-bold text-[#FF2A2A]">Rp.{{ number_format($fs->harga_flash_sale, 0, '.', ',') }},-</span>
                                                        </p>
                                                            <p><span class="ml-2 text-xs text-[#FF2A2A] line-through">Rp.{{ number_format($fs->harga, 0, '.', ',') }},-</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                            </swiper-wrapper>
                                                            <span class="swiper-notification" aria-live="assertive"
                                                                aria-atomic="true"></span>
                                                        </swiper>
                                                    </div>
                                                </app-flash-sale>
                                            </div>
                                        </mat-tab-body>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif-->
            



        
          <div class="col-lg-11 mx-auto mt-4">
                  <div class="tab-content" id="myTabContent">
            
            <div class="tab-pane active" id="gamelainnya" role="tabpanel" aria-labelledby="gamelainnya-tab">
    <div class="mt-2 md:mt-10 grid grid-cols-3 gap-3 sm:grid-cols-4 sm:gap-3 md:grid-cols-5 md:gap-3 lg:grid-cols-6 lg:gap-3 xl:grid-cols-6 xl:gap-5">
        @foreach($kategori as $jsgori)
            <a href="{{ env('APP_URL').'/order/'.$jsgori->kode }}" 
                class="featured-game-card relative hover:shadow-sm hover:cursor-pointer group relative overflow-hidden rounded-2xl hover:ring-primary-500 duration-300 hover:shadow-2xl hover:ring-2 hover:ring-offset-white-500">
                <div class="blur-sharp">
                    <div class="relative h-[9.4rem] sm:h-[14.4rem] md:h-[14.4rem] lg:h-[10.4rem] xl:w-auto">
                        <img alt="{{ $jsgori->nama }}" sizes="100vw" srcset="{{ $jsgori->thumbnail }}" 
                            src="{{ $jsgori->thumbnail }}" decoding="async" data-nimg="fill" 
                            class="object-cover object-center !hover:rounded-3xl" loading="lazy" 
                            style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                    </div>
                </div>
                <div class="cover !absolute bottom-0 m-3 h-full">
                    <div class="flex flex-col h-full justify-between no-underline">
                        <div class="relative p-3 mx-auto my-auto h-15 w-10 lg:h-14 lg:w-14">
                            <img alt="icon-{{ $jsgori->nama }}" sizes="100vw" 
                                srcset="{{ $jsgori->thumbnail }}" 
                                src="{{ $jsgori->thumbnail }}" decoding="async" 
                                data-nimg="fill" class="object-center object-cover" loading="lazy" 
                                style="position: absolute; height: 200%; width: 200%; inset: 0px; color: transparent; top: -70%; filter: brightness(0) invert(1);">
                        </div>
                    </div>
                </div>
                <div class="card-titlexx text-truncatexx text-whitexx">
                    {{ $jsgori->nama }}<br>
                    <font color="#ADAAAA" style="font-weight:normal">{{ $jsgori->sub_nama }}</font>
                </div>
            </a>
        @endforeach
    </div>
    
    <!-- Pagination Links -->
    <div class="mt-6 flex justify-center">
        {{ $kategori->links() }}
    </div>
</div>
      
                    <div class="tab-pane" id="Pulsa" role="tabpanel" aria-labelledby="Pulsa-tab">
                        <div
                            class="mt-2 md:mt-10 grid grid-cols-3 gap-3 sm:grid-cols-4 sm:gap-3 md:grid-cols-5 md:gap-3 lg:grid-cols-6 lg:gap-3 xl:grid-cols-6 xl:gap-5">
                            @foreach($kategori as $jsgori)@if($jsgori->tipe == "pulsa") <a href="{{ env('APP_URL').'/order/'.$jsgori->kode }}"
                                class="featured-game-card relative hover:shadow-sm hover:cursor-pointer  group relative overflow-hidden rounded-2xl  hover:ring-primary-500 duration-300  hover:shadow-2xl hover:ring-2   hover:ring-offset-white-500">
                                <div class="blur-sharp ">
                                    <div
                                        class="relative h-[9.4rem] sm:h-[14.4rem] md:h-[14.4rem] lg:h-[10.4rem] xl:w-auto ">
                                        <img alt="{{ $jsgori->nama }}" sizes="100vw" srcset="{{ url('') }}{{ $jsgori->thumbnail }}"
                                            src="{{ url('') }}{{ $jsgori->thumbnail }}" decoding="async" data-nimg="fill"
                                            class="object-cover object-center !hover:rounded-3xl" loading="lazy"
                                            style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                                    </div>
                                </div>
                                <div class="cover !absolute bottom-0 m-3 h-full">
                                    <div class="flex flex-col h-full justify-between no-underline">
                                        <div class="relative p-3 mx-auto my-auto h-15 w-10 lg:h-14 lg:w-14">
                                            <img alt="icon-mbgs" sizes="100vw"
                                                srcset="https://res.cloudinary.com/dazayhg7s/image/upload/v1741012778/unnamed_1_ogkfjg.png"
                                                src="https://res.cloudinary.com/dazayhg7s/image/upload/v1741012778/unnamed_1_ogkfjg.png" decoding="async"
                                                data-nimg="fill" class="object-center object-cover" loading="lazy"
                                                style="position: absolute; height: 200%; width: 200%; inset: 0px; color: transparent; top: -70%; filter: brightness(0) invert(1);">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-titlexx text-truncatexx text-whitexx">
                        {{ $jsgori->nama }}<br>
                         <font color="#ADAAAA" style="font-weight:normal">{{ $jsgori->sub_nama }}</font>
                     </div>
                            </a>@endif @endforeach
                        </div>
                    </div>
                    
                                      <div class="tab-pane" id="voucher" role="tabpanel" aria-labelledby="voucher-tab">
                        <div
                            class="mt-2 md:mt-10 grid grid-cols-3 gap-3 sm:grid-cols-4 sm:gap-3 md:grid-cols-5 md:gap-3 lg:grid-cols-6 lg:gap-3 xl:grid-cols-6 xl:gap-5">
                            @foreach($kategori as $jsgori)@if($jsgori->tipe == "voucher") <a href="{{ env('APP_URL').'/order/'.$jsgori->kode }}"
                                class="featured-game-card relative hover:shadow-sm hover:cursor-pointer  group relative overflow-hidden rounded-2xl  hover:ring-primary-500 duration-300  hover:shadow-2xl hover:ring-2   hover:ring-offset-white-500">
                                <div class="blur-sharp ">
                                    <div
                                        class="relative h-[9.4rem] sm:h-[14.4rem] md:h-[14.4rem] lg:h-[10.4rem] xl:w-auto ">
                                        <img alt="{{ $jsgori->nama }}" sizes="100vw" srcset="{{ url('') }}{{ $jsgori->thumbnail }}"
                                            src="{{ url('') }}{{ $jsgori->thumbnail }}" decoding="async" data-nimg="fill"
                                            class="object-cover object-center !hover:rounded-3xl" loading="lazy"
                                            style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                                    </div>
                                </div>
                                <div class="cover !absolute bottom-0 m-3 h-full">
                                    <div class="flex flex-col h-full justify-between no-underline">
                                        <div class="relative p-3 mx-auto my-auto h-15 w-10 lg:h-14 lg:w-14">
                                            <img alt="icon-mbgs" sizes="100vw"
                                                srcset="{{ url('') }}{{ !$config ? '' : $jsgori->thumbnail }}"
                                                src="{{ url('') }}{{ !$config ? '' : $jsgori->thumbnail }}" decoding="async"
                                                data-nimg="fill" class="object-center object-cover" loading="lazy"
                                                style="position: absolute; height: 200%; width: 200%; inset: 0px; color: transparent; top: -70%; filter: brightness(0) invert(1);">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-titlexx text-truncatexx text-whitexx">
                        {{ $jsgori->nama }}<br>
                         <font color="#ADAAAA" style="font-weight:normal">{{ $jsgori->sub_nama }}</font>
                     </div>
                            </a>@endif @endforeach
                        </div>
                    </div>
                    
                  <div class="tab-pane" id="liveapp" role="tabpanel" aria-labelledby="liveapp-tab">
                        <div
                            class="mt-2 md:mt-10 grid grid-cols-3 gap-3 sm:grid-cols-4 sm:gap-3 md:grid-cols-5 md:gap-3 lg:grid-cols-6 lg:gap-3 xl:grid-cols-6 xl:gap-5">
                            @foreach($kategori as $jsgori)@if($jsgori->tipe == "liveapp") <a href="{{ env('APP_URL').'/order/'.$jsgori->kode }}"
                                class="featured-game-card relative hover:shadow-sm hover:cursor-pointer  group relative overflow-hidden rounded-2xl  hover:ring-primary-500 duration-300  hover:shadow-2xl hover:ring-2   hover:ring-offset-white-500">
                                <div class="blur-sharp ">
                                    <div
                                        class="relative h-[9.4rem] sm:h-[14.4rem] md:h-[14.4rem] lg:h-[10.4rem] xl:w-auto ">
                                        <img alt="{{ $jsgori->nama }}" sizes="100vw" srcset="{{ url('') }}{{ $jsgori->thumbnail }}"
                                            src="{{ url('') }}{{ $jsgori->thumbnail }}" decoding="async" data-nimg="fill"
                                            class="object-cover object-center !hover:rounded-3xl" loading="lazy"
                                            style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                                    </div>
                                </div>
                                <div class="cover !absolute bottom-0 m-3 h-full">
                                    <div class="flex flex-col h-full justify-between no-underline">
                                        <div class="relative p-3 mx-auto my-auto h-15 w-10 lg:h-14 lg:w-14">
                                            <img alt="icon-mbgs" sizes="100vw"
                                                srcset="{{ url('') }}{{ !$config ? '' : $jsgori->thumbnail }}"
                                                src="{{ url('') }}{{ !$config ? '' : $jsgori->thumbnail }}" decoding="async"
                                                data-nimg="fill" class="object-center object-cover" loading="lazy"
                                                style="position: absolute; height: 200%; width: 200%; inset: 0px; color: transparent; top: -70%; filter: brightness(0) invert(1);">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-titlexx text-truncatexx text-whitexx">
                        {{ $jsgori->nama }}<br>
                         <font color="#ADAAAA" style="font-weight:normal">{{ $jsgori->sub_nama }}</font>
                     </div>
                            </a>@endif @endforeach
                        </div>
                    </div>
                    
                    <div class="tab-pane" id="e-money" role="tabpanel" aria-labelledby="e-money-tab">
                        <div
                            class="mt-2 md:mt-10 grid grid-cols-3 gap-3 sm:grid-cols-4 sm:gap-3 md:grid-cols-5 md:gap-3 lg:grid-cols-6 lg:gap-3 xl:grid-cols-6 xl:gap-5">
                            @foreach($kategori as $jsgori)@if($jsgori->tipe == "e-money") <a href="{{ env('APP_URL').'/order/'.$jsgori->kode }}"
                                class="featured-game-card relative hover:shadow-sm hover:cursor-pointer  group relative overflow-hidden rounded-2xl  hover:ring-primary-500 duration-300  hover:shadow-2xl hover:ring-2   hover:ring-offset-white-500">
                                <div class="blur-sharp ">
                                    <div
                                        class="relative h-[9.4rem] sm:h-[14.4rem] md:h-[14.4rem] lg:h-[10.4rem] xl:w-auto ">
                                        <img alt="{{ $jsgori->nama }}" sizes="100vw" srcset="{{ url('') }}{{ $jsgori->thumbnail }}"
                                            src="{{ url('') }}{{ $jsgori->thumbnail }}" decoding="async" data-nimg="fill"
                                            class="object-cover object-center !hover:rounded-3xl" loading="lazy"
                                            style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                                    </div>
                                </div>
                                <div class="cover !absolute bottom-0 m-3 h-full">
                                    <div class="flex flex-col h-full justify-between no-underline">
                                        <div class="relative p-3 mx-auto my-auto h-15 w-10 lg:h-14 lg:w-14">
                                            <img alt="icon-mbgs" sizes="100vw"
                                                srcset="{{ url('') }}{{ !$config ? '' : $jsgori->thumbnail }}"
                                                src="{{ url('') }}{{ !$config ? '' : $jsgori->thumbnail }}" decoding="async"
                                                data-nimg="fill" class="object-center object-cover" loading="lazy"
                                                style="position: absolute; height: 200%; width: 200%; inset: 0px; color: transparent; top: -70%; filter: brightness(0) invert(1);">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-titlexx text-truncatexx text-whitexx">
                        {{ $jsgori->nama }}<br>
                         <font color="#ADAAAA" style="font-weight:normal">{{ $jsgori->sub_nama }}</font>
                     </div>
                            </a>@endif @endforeach
                        </div>
                    </div>
                    
                    
                    
                    <div class="tab-pane" id="PLN" role="tabpanel" aria-labelledby="PLN-tab">
                        <div
                            class="mt-2 md:mt-10 grid grid-cols-3 gap-3 sm:grid-cols-4 sm:gap-3 md:grid-cols-5 md:gap-3 lg:grid-cols-6 lg:gap-3 xl:grid-cols-6 xl:gap-5">
                            @foreach($kategori as $jsgori)@if($jsgori->tipe == "PLN") <a href="{{ env('APP_URL').'/order/'.$jsgori->kode }}"
                                class="featured-game-card relative hover:shadow-sm hover:cursor-pointer  group relative overflow-hidden rounded-2xl  hover:ring-primary-500 duration-300  hover:shadow-2xl hover:ring-2   hover:ring-offset-white-500">
                                <div class="blur-sharp ">
                                    
                                </div>
                                <div class="cover !absolute bottom-0 m-3 h-full">
                                    <div class="flex flex-col h-full justify-between no-underline">
                                        <div class="relative p-3 mx-auto my-auto h-15 w-10 lg:h-14 lg:w-14">
                                            <img alt="icon-mbgs" sizes="100vw"
                                                srcset="{{ url('') }}{{ !$config ? '' : $jsgori->thumbnail }}"
                                                src="{{  $jsgori->thumbnail }}" decoding="async"
                                                data-nimg="fill" class="object-center object-cover" loading="lazy"
                                                style="position: absolute; height: 200%; width: 200%; inset: 0px; color: transparent; top: -70%; filter: brightness(0) invert(1);">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-titlexx text-truncatexx text-whitexx">
                        {{ $jsgori->nama }}<br>
                         <font color="#ADAAAA" style="font-weight:normal">{{ $jsgori->sub_nama }}</font>
                     </div>
                            </a>@endif @endforeach
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
    </div>

    
<div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark" style="box-shadow:0 0 3rem #000000 !important">
            <div class="modal-body">
                <div class="row" id="textInfo">
                    <div class="col-12 mb-2">
                        <div class="row">
                            <div class="col-12" style="font-size: 12px !important;">
                                <img src='{{ isset($popup->path) ? $popup->path : "" }}' width="100%" class="img-fluid" style="border-radius:15px 15px 0px 0px ;">
                                <div class="card border-0" style="background-color: rgba(72, 77, 82, 0.8);">
                                    <div class="card-body bg-dark pb-1" style="border-radius:0px 0px 15px 15px;">
                                        <h2 class="max-w-xl pt-1 text-center text-sm font-semibold">INFORMATION !!</h2>
                                     <h6 class="max-w-xl pt-1 text-center text-xs custom-text">{!! isset($popup->deskripsi) ? $popup->deskripsi : " <p
                                                class='text-center'>
                                                Selamat datang di ".ENV("APP_NAME")." Selamat berbelanja.</p>" !!}
                                        </h6>
                                        <br>
                                       <div class="row">
                        <div class="col float-start">
                            <div class="form-check mt-2" style="font-size:12px">
                                <label class="form-check-label mt-2" style="font-size:12px !important" for="customCheck1">
                                    <input type="checkbox" class="form-check-input" id="dontShow"> Jangan tampilkan
                                    lagi</label>
                            </div>
                        </div>
                        <div class="col text-end">
                            <button type="button" name="read_popup_news_b2c" style="font-size:13px"
                                class="btn btn-primary btn-sm ml-auto mt-2" data-bs-dismiss="modal"
                                onclick="disablePopup()">Tutup</button>
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



  @include('../footer')
 @endsection @section('js')
 <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.0.8/dist/js/splide.min.js"></script>
 
 
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Splide('#flashsale-slider', {
            type: 'slide',
            perPage: 3,
            perMove: 1,
            autoplay: true,
            pauseOnHover: true,
            gap: '1rem',
            rewind: true,
            disabled: 'prev', // Menonaktifkan tombol "previous slide"
            breakpoints: {
                768: {
                    perPage: 2,
                },
                576: {
                    perPage: 1,
                }
            }
        }).mount();
    });
</script>



<script>
    var delay = (function () {
        var timer = 0;
        return function (callback, ms) {
            clearTimeout(timer);
            timer = setTimeout(callback, ms);
        };
    })();
    $('#searchProds').keyup(function () {
        const data = $(this).val();
        if (data.length < 1) {
            $('.resultsearch').removeClass('show');
            $('.resultsearch li').remove();
        } else {
            delay(function () {
                $.ajax({
                    url: "{{url('/cari/index')}}",
                    method: "POST",
                    data: {
                        data: data
                    },
                    beforeSend: function () {
                        $('.resultsearch li').remove();
                    },
                    success: function (res) {
                        $('.resultsearch').append(res);
                        $('.resultsearch').addClass('show');
                    }
                })
            }, 1000);
        }
    })
</script>

 <script>
       
        const swiper2 = new Swiper(".swiper-testimonial", {
            // Optional parameters
            direction: "horizontal",
            loop: false,
            autoHeight: false,
            centeredSlides: true,
            slidesPerView: 1,
            // Responsive breakpoints
            breakpoints: {
                340: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                640: {
                    slidesPerView: 1,
                    spaceBetween: 40,
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                }
            },
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },

            // If we need pagination
            pagination: {
                el: ".swiper-pagination"
            },

            // Navigation arrows
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            }

            // And if we need scrollbar
            /*scrollbar: {
                    el: '.swiper-scrollbar',
                },*/
        });
    </script>



<script>
    const mySwiper = new Swiper('.my-swiper', {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        speed: 400,
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            modifier: 1,
            slideShadows: true,
        },
        pagination: {
            el: ".swiper-pagination",
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },


    });
</script>

<script>
    let countToDate = new Date();
    const storedCountToDate = localStorage.getItem('countToDate');
    if (storedCountToDate) {
        countToDate = new Date(storedCountToDate);
    } else {
        countToDate.setHours(countToDate.getHours() + 24);
        localStorage.setItem('countToDate', countToDate);
    }

    let previousTimeBetweenDates = Math.ceil((countToDate - new Date()) / 1000);

    setInterval(() => {
        const currentDate = new Date();
        const timeBetweenDates = Math.ceil((countToDate - currentDate) / 1000);

        if (timeBetweenDates <= 0) {
            countToDate = new Date();
            countToDate.setHours(countToDate.getHours() + 24);
            localStorage.setItem('countToDate', countToDate);
        } else if (timeBetweenDates > previousTimeBetweenDates) {
            previousTimeBetweenDates = timeBetweenDates;
        }

        flipAllCards(timeBetweenDates);
    }, 250);

    function flipAllCards(time) {
        let seconds = time % 60;
        let minutes = Math.floor(time / 60) % 60;
        let hours = Math.floor(time / 4600);

        flip(document.querySelector("[data-hours-tens]"), Math.floor(hours / 10));
        flip(document.querySelector("[data-hours-ones]"), hours % 10);
        flip(document.querySelector("[data-minutes-tens]"), Math.floor(minutes / 10));
        flip(document.querySelector("[data-minutes-ones]"), minutes % 10);
        flip(document.querySelector("[data-seconds-tens]"), Math.floor(seconds / 10));
        flip(document.querySelector("[data-seconds-ones]"), seconds % 10);
    }

    function flip(flipCard, newNumber) {
        const topHalf = flipCard.querySelector(".top");
        const startNumber = parseInt(topHalf.textContent);
        if (newNumber === startNumber) return;

        const bottomHalf = flipCard.querySelector(".bottom");
        const topFlip = document.createElement("div");
        topFlip.classList.add("top-flip");
        const bottomFlip = document.createElement("div");
        bottomFlip.classList.add("bottom-flip");

        topHalf.textContent = startNumber;
        bottomHalf.textContent = startNumber;
        topFlip.textContent = startNumber;
        bottomFlip.textContent = newNumber;

        topFlip.addEventListener("animationstart", e => {
            topHalf.textContent = newNumber;
        });
        topFlip.addEventListener("animationend", e => {
            topFlip.remove();
        });
        bottomFlip.addEventListener("animationend", e => {
            bottomHalf.textContent = newNumber;
            bottomFlip.remove();
        });
        flipCard.append(topFlip, bottomFlip);
    }
</script>


<!--FlashSale-->
<script>

    var swiper = new Swiper(".slide-content", {
        loop: true,
        centerSlide: 'false',
        fade: 'true',
        grabCursor: 'true',
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true,
        },

        autoplay: {
            delay: 3000,
        },
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 2.5,
                spaceBetween: 15
            },
            768: {
            slidesPerView: 2.5,
            spaceBetween: 15
        },
        1024: {
            slidesPerView: 2.5,
            spaceBetween: 15

            }
        }
    });
</script>



<script src="/assets/js/part/particles.min.js"></script>
 <script src="/assets/js/part/app.js"></script>
<script type="text/javascript">
    var cookie = document.cookie.split("; ");
    if (cookie.length < 2) {
        $(document).ready(function () {
            $("#popup").modal("show");
        })
    }

    function disablePopup() {
        var checkBox = document.getElementById("dontShow");
        var date = new Date();
        date.setTime(date.getTime() + (1 * 24 * 60 * 60 * 1000));
        if (checkBox.checked) {
            document.cookie = "popup=0; expires=" + date.toGMTString();
        }
    }
</script> @endsection