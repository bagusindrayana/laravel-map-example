@extends('layouts.app')

@push('styles')
    <link rel="stylesheet"
    href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.6.0/styles/default.min.css">
    <link rel="stylesheet" href="{{ asset('css/dracula.css') }}">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.6.0/highlight.min.js"></script>
    {!! $laravelMap->styles() !!}
    {!! $laravelMap2->styles() !!}
@endpush

@section('content')
    <div class="row">
        <div class="w-full">
            <div class="text-center px-3 lg:px-0 my-8">
                <h1>Mapbox Advance</h1>
                <p>Add search and navigation control</p>
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
            $c = new NavigationControl();
            $c->position = 'bottom-right';
        
            $g = new MapboxGeocoder([
                'zoom'=>4,
                'placeholder'=>'Cari Sesuatu...',
                'marker'=>[
                    'color'=>'blue'
                ]
            ]);
            $laravelMap = new LaravelMap('mapbox',[
                'center'=>[-122.48695850372314, 37.82931081282506],
                'zoom'=>4,
                'style'=>'mapbox://styles/mapbox/streets-v11',
                'container'=>'map',
                'containerStyle'=>'width: 100%; height: 500px;'
            ]);
        
            $laravelMap->scripts = [
                'https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js',
                'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js',
                'https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js',
                'https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js'
            ];
            $laravelMap->styles = [
                'https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css',
                'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css'
            ];
        
            $laravelMap->map->addControl([$c,$g]);
                                </code>
                            </pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="w-full">
            <div class="text-center px-3 lg:px-0 my-8">
                <h1>Mapbox Advance</h1>
                <p>Request Current Location</p>
            </div>
            <div class="flex items-center w-full mx-auto content-end">
                <div
                class="browser-mockup flex flex-1 m-6 md:px-0 md:m-12 bg-white w-1/2 rounded shadow-xl"
                >{!! $laravelMap2->render() !!}
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
                $laravelMap = new LaravelMap('mapbox',[
                    'center'=>[-122.48695850372314, 37.82931081282506],
                    'zoom'=>4,
                    'style'=>'mapbox://styles/mapbox/dark-v10',
                    'container'=>'map',
                    'containerStyle'=>'width: 100%; height: 500px;'
                ]);
        
                $laravelMap->requestCurrentLocation('pos',function($map){
                    $map->addExtra('alert(pos.coords.longitude+","+pos.coords.latitude);');
                    $map->addMarker([
                        new Marker([
                            "lngLat"=>'[pos.coords.longitude,pos.coords.latitude]'
                        ])
                    ]);
        
                    $map->flyTo([
                        'center'=>'[pos.coords.longitude,pos.coords.latitude]',
                        'zoom'=>10
                    ]);
                });
                                </code>
                            </pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>hljs.highlightAll();</script>
    {!! $laravelMap->scripts() !!}
    {!! $laravelMap2->scripts() !!}
@endpush