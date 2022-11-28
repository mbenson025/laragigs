<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;


// all listings
Route::get('/', [ListingController::class, 'index']);

// single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);
