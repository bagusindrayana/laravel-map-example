<?php

namespace App\Http\Controllers;

use Bagusindrayana\LaravelMap\LaravelMap;
use Bagusindrayana\LaravelMap\Leaflet\GeoJson;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $leaflet = new LaravelMap('leaflet',[
            'center'=>[55.665957,12.550343],
            'zoom'=>2,
            'container'=>'leaflet-map',
            'containerStyle'=>'width: 100%; height: 500px;'
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
    
        
        return view('welcome',['laravelMap'=>$leaflet]);
    }
}
