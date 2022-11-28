<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;


// all listings
Route::get('/', [ListingController::class, 'index']);

// single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Common Resource Routes:
//
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing
