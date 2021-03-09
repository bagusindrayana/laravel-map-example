<?php

namespace App\Http\Controllers;

use Bagusindrayana\LaravelMap\LaravelMap;
use Bagusindrayana\LaravelMap\Leaflet\Circle;
use Bagusindrayana\LaravelMap\Leaflet\GeoJson;
use Bagusindrayana\LaravelMap\Leaflet\Polygon;
use Illuminate\Http\Request;

class LeafletController extends Controller
{
    public function basic()
    {
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
    
        return view('leaflet.basic',['laravelMap'=>$leaflet]);
    }

    public function advance()
    {
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
            $circle = new Circle([
                'latLng'=>[55.666067,12.551453],
                'color'=>'red',
                'fillColor'=>'#f03',
                'fillOpacity'=>0.5,
                'radius'=>500
            ]);
            $m->giveTo($circle);
    
            $polygon = new Polygon([
                'latLng'=>[
                    [55.665957,12.550343],
                    [55.666067,12.551453],
                    [55.667177,12.552563]
                ],
                'color'=>'blue',
                'fillColor'=>'green',
                'fillOpacity'=>0.5,
            ]);
    
            $m->giveTo($polygon);
            
        });
    
        return view('leaflet.advance',['laravelMap'=>$leaflet]);
    }
}
