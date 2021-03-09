<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\WelcomeController@index')->name('welcome');

Route::get('/mapbox/basic','App\Http\Controllers\MapboxController@basic')->name('mapbox.basic');
Route::get('/mapbox/advance','App\Http\Controllers\MapboxController@advance')->name('mapbox.advance');

Route::get('/leaflet/basic','App\Http\Controllers\leafletController@basic')->name('leaflet.basic');
Route::get('/leaflet/advance','App\Http\Controllers\leafletController@advance')->name('leaflet.advance');

// Route::get('/multiple',function(){
//     $maps = new LaravelMap([
//         'leaflet'=>[
//              'center'=>[55.665957,12.550343],
//              'zoom'=>15,
//              'container'=>'leaflet-map',
//              'containerStyle'=>'width: 100%; height: 400px;'
//         ],
//         'mapbox'=>[
//              'center'=>[12.550343, 55.665957],
//              'zoom'=>15,
//              'style'=>'mapbox://styles/mapbox/streets-v11',
//              'container'=>'mapbox-map',
//              'containerStyle'=>'width: 100%; height: 400px;',
//              'css'=>[
//                  'https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css',
//                  'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css'
//              ],
//              'js'=>[
//                  'https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js',
//                  'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js',
//                  'https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js',
//                  'https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js'
//              ]
//         ]
//      ]);
 
//      $g = new MapboxGeocoder([
//          'zoom'=>4,
//          'placeholder'=>'Cari Sesuatu...',
//      ]);
//      $maps->map['mapbox-map']->addControl([$g]);
//      $maps->map['leaflet-map']->tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',[
//          'attribution'=>'&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
//      ]);
 
//      return view('multiple',compact('maps'));
// });
