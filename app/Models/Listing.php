<?php
    namespace App\Models;

    class Listing {
        public static function all() {
            return [
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
                ];
        }
        // get a single post by id
        public static function find($id) {
            $listings = self::all();

            foreach($listings as $listing) {
                if($listing['id'] == $id) {
                    return $listing;
                }
            }
        }
    }