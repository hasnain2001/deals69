<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Categories;
use App\Models\Coupons;
use App\Models\Stores;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Return_;

class SearchController extends Controller
{
    public function search(Request $request) {
        // Validate and sanitize input
        $query = trim($request->input('query'));

        if (empty($query)) {
            return redirect()->back()->with('error', 'Search query cannot be empty.');
        }

        // Fetch stores matching the query for autocomplete (retrieving both name and slug)
        $stores = Stores::where('name', 'like', "$query%")->get(['name', 'slug']);

        // Check if there is a single store matching the query exactly
        $store = Stores::where('name', $query)->first();

        if ($store) {
            // If a single store is found, redirect to its details page
            return redirect()->route('store_details', ['slug' => Str::slug($store->slug)]);
        }

        // Check if any stores were found for autocomplete or list
        if ($stores->isEmpty()) {
            return view('search_results', ['stores' => $stores, 'message' => 'No stores found.']);
        }

        return view('search_results', ['stores' => $stores]);
    }



        public function searchResults(Request $request)
        {
            $query = $request->input('query');

            // Fetch stores matching the query for autocomplete
            $stores = Stores::where('name', 'like', "$query%")->get();

            // Check if there is a single store matching the query exactly
            $store = Stores::where('name', $query)->first();

            if ($store) {
                // If a single store is found, check if the slug is present and valid
                $slug = Str::slug($store->slug); // Assuming $store->slug contains the slug

                if (!empty($slug)) {
                    // Redirect to the store details page with the valid slug
                    return redirect()->route('store_details', ['slug' => $slug]);
                } else {
                    // Handle the case where slug is empty or not available
                    return redirect()->route('not-found')->with('error', 'Store slug is missing or invalid.');
                }
            } else {
                // If no store is found, redirect to an error page or route
                return redirect()->route('not-found')->with('error', 'Store not found');
            }
        }







        public function searchSuggestions(Request $request)
        {
        $query = $request->input('query');
        $relatedSearches = Stores::where('name', 'like', $query . '%')->pluck('name')->toArray();
        return response()->json(['relatedSearches' => $relatedSearches]);
        }


}
