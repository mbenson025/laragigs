<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class ListingController extends Controller
{
    //get/show all listings
    public function index() {
        return view('listings.index', [
            // simplePaginate() for previous/next type pagination
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }
    //show single listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //show create form
    public function create() {
        return view('listings.create');
    }

    //store listing data
    public function store(Request $request) {
        // dd($request->file('logo'));
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            //store in folder called "logos" in storage/app/public
            $formFields['logo'] = $request -> file('logo') -> store('logos', 'public');
        }

        Listing::create($formFields);

        //create flash message
        // Session::flash('message', 'Listing created!');

        //->with() used to add a flash message directly on the redirect
        return redirect('/')->with('message', 'Listing created successfully');
    }
}
