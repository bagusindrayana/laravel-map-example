<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Laravel Map</title>
    <meta name="description" content="laravel package to show and customize maps" />
    <meta name="keywords" content="laravel,map,mapbox,leaflet,laravel map,laravel maps,laravel leaflet,laravel mapbox" />
    <meta name="author" content="bagusindrayana" />


    <link
      href="https://unpkg.com/tailwindcss/dist/tailwind.min.css"
      rel="stylesheet"
    />

    <link
      href="https://unpkg.com/@tailwindcss/custom-forms/dist/custom-forms.min.css"
      rel="stylesheet"
    />
   
    <style>
      @import url("https://rsms.me/inter/inter.css");
      html {
        font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI",
          Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif,
          "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol",
          "Noto Color Emoji";
      }

 

      .button,
      .gradient2 {
        background-color: #f39f86;
        background-image: linear-gradient(315deg, #f39f86 0%, #f9d976 74%);
      }

      /* Browser mockup code
        * Contribute: https://gist.github.com/jarthod/8719db9fef8deb937f4f
        * Live example: https://updown.io
        */

      .browser-mockup {
        border-top: 2em solid rgba(230, 230, 230, 0.7);
        position: relative;
        height: auto;
        width: 100%;
       
      }

      .browser-mockup:before {
        display: block;
        position: absolute;
        content: "";
        top: -1.25em;
        left: 1em;
        width: 0.5em;
        height: 0.5em;
        border-radius: 50%;
        background-color: #f44;
        box-shadow: 0 0 0 2px #f44, 1.5em 0 0 2px #9b3, 3em 0 0 2px #fb5;
      }

      .browser-mockup > * {
        display: block;
      }

      pre,code {
          width: 100%;
          margin: 0 !important;
          height: 100% !important;
          padding: 0 !important;
          background-color: #282a36;
      }

      /* Custom code for the demo */
    </style>
    @stack('styles')
  </head>

  <body >
   
    <div class="container mx-auto h-screen">
        @yield('content')

        <!--Footer-->
        <footer class="bg-white my-12">
            <div class="container mx-auto mt-8 px-8">
            <div class="w-full flex flex-col md:flex-row py-6">
                <div class="flex-1 mb-6">
                    <a
                        class="text-orange-600 no-underline hover:no-underline font-bold text-2xl lg:text-4xl"
                        href="{{ url('') }}"
                    >
                        Laravel<br>
                        Map
                    </a>
                </div>
    
                <div class="flex-1">
                    <p class="uppercase font-extrabold text-gray-500 md:mb-6">Mapbox</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a
                            href="{{ route('mapbox.basic') }}"
                            class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500"
                            >Basic</a
                        >
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a
                            href="{{ route('mapbox.advance') }}"
                            class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500"
                            >Advance</a
                        >
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a
                            href="https://laravel-map-docs.netlify.app/#/mapbox"
                            class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500"
                            >Docs</a
                        >
                        </li>
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase font-extrabold text-gray-500 md:mb-6">Leaflet</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a
                            href="{{ route('leaflet.basic') }}"
                            class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500"
                            >Basic</a
                        >
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a
                            href="{{ route('leaflet.advance') }}"
                            class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500"
                            >Advance</a
                        >
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a
                                href="https://laravel-map-docs.netlify.app/#/leaflet"
                                class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500"
                                >Docs</a
                            >
                            </li>
                    </ul>
                </div>
                {{-- <div class="flex-1">
                    <p class="uppercase font-extrabold text-gray-500 md:mb-6">Js</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a
                            href="#"
                            class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500"
                            >Basic</a
                        >
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a
                            href="#"
                            class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500"
                            >Limitations</a
                        >
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a
                            href="https://laravel-map-docs.netlify.app/#/js"
                            class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500"
                            >Docs</a
                        >
                        </li>
                    </ul>
                </div> --}}
                <div class="flex-1">
                    <p class="uppercase font-extrabold text-gray-500 md:mb-6">
                        Links
                    </p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a
                            href="https://github.com/bagusindrayana"
                            class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500"
                            >Github</a
                        >
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a
                            href="https://www.instagram.com/bagusindrayana"
                            class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500"
                            >Instagram</a
                        >
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a
                            href="https://paypal.me/bagusindrayana"
                            class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500"
                            >Donations</a
                        >
                        </li>
                    </ul>
                </div>
            </div>
            </div>
        </footer>
    </div>

    
    @stack('scripts')
    
  </body>
</html>