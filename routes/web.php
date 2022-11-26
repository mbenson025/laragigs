<?php

use Illuminate\Http\Request;
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


// //takes in content - response takes in status/headers
// Route::get('/test-route', function() {
//     return response('<h1>test route</h1>', 200)
//     ->header('Content-Type', 'text/plain')
//     ->header('key', 'value');
// });

// //wildcard {} - posts/12 outputs 'Post 12'
// Route::get('/posts/{id}', function($id){
//     //die and dump
//     // dd($id);
//     //die, dump and debug
//     // ddd($id);
//     return response('Post ' . $id);
// }) -> where('id', '[0-9]+');

// Route::get('/search', function(Request $request) {
//     return $request -> name . ' ' . $request->city;
// });

Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest Listings',
        'listings' => [
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'
            ],
            [
                'id' => 2,
                'title' => 'Listing Two',
                'description' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore'
            ]
        ]
    ]);
});
