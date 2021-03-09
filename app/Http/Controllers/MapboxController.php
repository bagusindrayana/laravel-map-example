<?php

namespace App\Http\Controllers;

use Bagusindrayana\LaravelMap\LaravelMap;
use Bagusindrayana\LaravelMap\MapBox\MapboxGeocoder;
use Bagusindrayana\LaravelMap\MapBox\Marker;
use Bagusindrayana\LaravelMap\MapBox\NavigationControl;
use Bagusindrayana\LaravelMap\MapBox\Popup;
use Illuminate\Http\Request;

class MapboxController extends Controller
{
    public function basic()
    {
       
        $laravelMap = new LaravelMap('mapbox',[
            'center'=>[-122.48695850372314, 37.82931081282506],
            'zoom'=>15,
            'style'=>'mapbox://styles/mapbox/streets-v11',
            'container'=>'map',
            'containerStyle'=>'width: 100%; height: 500px;'
        ]);

        
        $laravelMap->map->addEvent('load',function($m){
            $popup = new Popup(['offset'=>25,'text'=>'Hublaaaa']);
            $markers = [
                new Marker(["lngLat"=>[-122.48369693756104, 37.83381888486939],'popup'=>$popup]),
                new Marker(["lngLat"=>[-122.48695850372314, 37.82931081282506],'popup'=>$popup]),
                new Marker(["lngLat"=>[-122.49378204345702, 37.83368330777276],'popup'=>$popup])
            ];

            //dd($markers);
        
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

        return view('mapbox.basic',compact('laravelMap'));

    }

    public function advance()
    {   
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

        $laravelMap2 = new LaravelMap('mapbox',[
            'center'=>[-122.48695850372314, 37.82931081282506],
            'zoom'=>4,
            'style'=>'mapbox://styles/mapbox/dark-v10',
            'container'=>'map2',
            'containerStyle'=>'width: 100%; height: 500px;',
            'varName'=>'laravelMap2'
        ]);

        $laravelMap2->requestCurrentLocation('pos',function($map){
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

        return view('mapbox.advance',compact('laravelMap','laravelMap2'));
    }
}
