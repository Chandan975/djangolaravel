<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::any('/django/{any}', function ($any) {
    $url = env('DJANGO_URL') . '/' . $any;
    $response = Http::withHeaders(request()->header())->send(request()->method(), $url, request()->all());
    return $response->body();
})->where('any', '.*');

