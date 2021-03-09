@extends('layouts.app')

@push('styles')
    <link rel="stylesheet"
    href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.6.0/styles/default.min.css">
    <link rel="stylesheet" href="{{ asset('css/dracula.css') }}">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.6.0/highlight.min.js"></script>
    {!! $laravelMap->styles() !!}
@endpush

@section('content')
    <div class="text-center px-3 lg:px-0">
        <img src="{{ asset('imgs/laravel-map.png') }}" alt="" class="mx-auto" style="width: 400px;">

        <a
        href="https://laravel-map-docs.netlify.app"
        class="button mx-auto lg:mx-0 hover:underline text-gray-800 font-extrabold rounded my-2 md:my-6 py-4 px-8 shadow-lg w-48"
        >
        Docs
    </a>
        <a
        href="https://github.com/bagusindrayana/laravel-map"
        class="inline-block mx-auto lg:mx-0 hover:underline bg-transparent text-gray-600 font-extrabold my-2 md:my-6 py-2 lg:py-4 px-8"
        >View On Github</a
        >
    </div>

    <div class="flex items-center w-full mx-auto content-end">
        <div
        class="browser-mockup flex flex-1 m-6 md:px-0 md:m-12 bg-white w-1/2 rounded shadow-xl"
        >{!! $laravelMap->render() !!}
        </div>
    </div>

    <div class="row">
        <div class="w-full">
            <div class="flex items-center w-full mx-auto content-end">
                <div
                    class="browser-mockup flex flex-1 m-6 md:px-0 md:m-12 bg-white w-1/2 rounded shadow-xl"
                >
                    <pre>
                        <code class="php">
    $leaflet = new LaravelMap('leaflet',[
        'center'=>[55.665957,12.550343],
        'zoom'=>2,
        'container'=>'leaflet-map',
        'containerStyle'=>'width: 100%; height: 400px;'
    ]);
    $leaflet->map->tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',[
        'attribution'=>'&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    ]);

    $leaflet->map->addEvent('load',function($m){

        $str = file_get_contents(url("/geojson/country.json"));
        $json = json_decode($str, true);

        $geoJson = new GeoJson($json);
        $geoJson->bindPopup(function(){
            return 'layer.feature.properties.name';
        });

        $m->giveTo($geoJson);
    
    });
                        </code>
                    </pre>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>hljs.highlightAll();</script>
    {!! $laravelMap->scripts() !!}
@endpush