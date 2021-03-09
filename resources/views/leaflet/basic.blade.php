@extends('layouts.app')

@push('styles')
    <link rel="stylesheet"
    href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.6.0/styles/default.min.css">
    <link rel="stylesheet" href="{{ asset('css/dracula.css') }}">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.6.0/highlight.min.js"></script>
    {!! $laravelMap->styles() !!}

@endpush

@section('content')

    


    <div class="row">
        <div class="w-full">
            <div class="text-center px-3 lg:px-0 my-8">
                <h1>Leaflet Basic</h1>
                <p>Add marker</p>
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
                'zoom'=>15,
                'container'=>'leaflet-map',
                'containerStyle'=>'width: 100%; height: 500px;'
            ]);
            
            $leaflet->map->tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',[
                'attribution'=>'&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            ]);
        
            $leaflet->map->addEvent('load',function($m){
    
                $json = [
                    'type'=>'FeatureCollection',
                    'features'=>[
                        [
                            'type'=>'Feature',
                            'geometry'=>[
                                'type'=>'Point',
                                'coordinates'=>[12.550343, 55.665957]
                            ]
                        ],
                        [
                            'type'=>'Feature',
                            'geometry'=>[
                                'type'=>'Point',
                                'coordinates'=>[12.551453, 55.666067]
                            ]
                        ],
                        [
                            'type'=>'Feature',
                            'geometry'=>[
                                'type'=>'Point',
                                'coordinates'=>[12.552563, 55.667177]
                            ]
                        ],
        
                    ]
                ];
                $geoJson = new GeoJson($json);
                $m->giveTo($geoJson);
                
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

@endpush