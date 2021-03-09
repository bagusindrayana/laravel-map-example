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
                <h1>Mapbox Basic</h1>
                <p>Add marker and line</p>
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
            $laravelMap = new LaravelMap('mapbox',[
                'center'=>[-122.48695850372314, 37.82931081282506],
                'zoom'=>15,
                'style'=>'mapbox://styles/mapbox/streets-v11',
                'container'=>'map',
                'containerStyle'=>'width: 100%; height: 500px;',
                'varName'=>'laravelMap'
            ]);
    
    
            
            $laravelMap->map->addEvent('load',function($m){
                $popup = new Popup(['offset'=>25,'text'=>'Hublaaaa']);
                $markers = [
                    new Marker(["lngLat"=>[-122.48369693756104, 37.83381888486939],'popup'=>$popup]),
                    new Marker(["lngLat"=>[-122.48695850372314, 37.82931081282506],'popup'=>$popup]),
                    new Marker(["lngLat"=>[-122.49378204345702, 37.83368330777276],'popup'=>$popup])
                ];
            
                $m->addMarker($markers);
    
                $m->addSource('route',[
                    'type'=>'geojson',
                    'data'=>[
                        'type'=>'Feature',
                        'properties'=>[],
                        'geometry'=>[
                            'type'=>'LineString',
                            'coordinates'=>[
                                [-122.48369693756104, 37.83381888486939],
                                [-122.48348236083984, 37.83317489144141],
                                [-122.48339653015138, 37.83270036637107],
                                [-122.48356819152832, 37.832056363179625],
                                [-122.48404026031496, 37.83114119107971],
                                [-122.48404026031496, 37.83049717427869],
                                [-122.48348236083984, 37.829920943955045],
                                [-122.48356819152832, 37.82954808664175],
                                [-122.48507022857666, 37.82944639795659],
                                [-122.48610019683838, 37.82880236636284],
                                [-122.48695850372314, 37.82931081282506],
                                [-122.48700141906738, 37.83080223556934],
                                [-122.48751640319824, 37.83168351665737],
                                [-122.48803138732912, 37.832158048267786],
                                [-122.48888969421387, 37.83297152392784],
                                [-122.48987674713133, 37.83263257682617],
                                [-122.49043464660643, 37.832937629287755],
                                [-122.49125003814696, 37.832429207817725],
                                [-122.49163627624512, 37.832564787218985],
                                [-122.49223709106445, 37.83337825839438],
                                [-122.49378204345702, 37.83368330777276]
                            ]
                        ]
                    ]
                ]);
                $m->addLayer([
                    'id'=>'route',
                    'type'=>'line',
                    'source'=>'route',
                    'layout'=>[
                        'line-join'=>'round',
                        'line-cap'=>'round',
                    ],
                    'paint'=>[
                        'line-color'=>'#888',
                        'line-width'=>8
                    ]
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

@endpush