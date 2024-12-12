<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Categories;
use App\Models\Coupons;
use App\Models\Stores;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function notfound()
    {
        $Coupons = Coupons::whereIn('id', function($query) {
            $query->select(DB::raw('MAX(id)'))
            ->from('coupons')
            ->groupBy('store');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(21);
    return view('errors.404', compact('Coupons')); // Pass both data to the view
    }

        public function blog()
        {
        $blogs = Blog::paginate(4);
        $chunks = Stores::latest()->paginate(30);
        return view('blog', compact('blogs', 'chunks')); // Pass both data to the view
        }

public function blog_deatil($title) {
    // Decode the URL-encoded title
    $decodedTitle = str_replace('-', ' ', $title);
    $chunks = Stores::latest()->paginate(20);
    
    // Retrieve the blog post from the database based on the decoded title
    $blog = Blog::where('slug', $decodedTitle)->first();

    if (!$blog) {
    return redirect('404');
    }

    return view('blog-details', compact('blog', 'chunks'));
}


        public function index() {
        $stores = Stores::latest()->paginate(15);

        $blogs = Blog::latest()->paginate(6);
        $home = Blog::paginate(9);

   $Coupons = Coupons::whereIn('id', function($query) {
    $query->select(DB::raw('MAX(id)'))
        ->from('coupons')
        ->whereNotNull('code')         
        ->where('code', '!=', '')     
        ->groupBy('store');
    })
    ->orderBy('created_at', 'desc')
    ->paginate(21);

        return view('home', compact('stores',  'blogs','Coupons','home'));
        }

        public function coupons(){
            $coupons = Coupons::orderBy('created_at', 'desc')->paginate(10);
            return view('coupons', compact('coupons'));
        }



        public function search(Request $request) {
        $query = $request->input('query');

        // Check if there is a store with a matching name
        $store = Stores::where('name', $query)->first();

        if ($store) {
        // If a store is found, redirect to the store details page
        return redirect()->route('store.details', ['name' => $store->name]);
        }


        // If no store or category is found, display the regular search results page
        $stores = Stores::where('name', 'like', "$query%")->latest()->get();

        return view('search_results', compact('stores'));
        }


        public function stores(Request $request)
        {
        $letter = $request->input('letter');
        $storesQuery = Stores::query();

        if ($letter) {
        $storesQuery->where('name', 'like', $letter.'%');
        }

        $stores = $storesQuery->orderBy('name')->paginate(1000);

        return view('stores', compact('stores'));
        }

        public function StoreDetails($name, Request $request) {
        $slug = Str::slug($name);
        $title = ucwords(str_replace('-', ' ', $slug));
        $store = Stores::where('slug', $title)->first();

        if (!$store) {
        return redirect('404');
        }

        // Sort coupons based on query parameter
        $sort = $request->query('sort', 'all');

        $couponsQuery = Coupons::where('store', $title)->orderByRaw('CAST(`order` AS SIGNED) ASC');

        if ($sort === 'codes') {
        $couponsQuery->whereNotNull('code');
        } elseif ($sort === 'deals') {
        $couponsQuery->whereNull('code');
        }

        $coupons = $couponsQuery->get();

        $codeCount = Coupons::where('store', $title)->whereNotNull('code')->count();
        $dealCount = Coupons::where('store', $title)->whereNull('code')->count();

        $blogs = Blog::all();

        // Fetch related stores
        $relatedStores = Stores::where('category', $store->category)
                ->where('id', '!=', $store->id)
                ->get();

        return view('store_details', compact('store', 'coupons', 'relatedStores', 'blogs', 'codeCount', 'dealCount'));
        }


        public function categories() {
        $categories = Categories::all();
        return view('categories', compact('categories'));
        }


        public function RelatedCategoryStores($name) {
        $slug = Str::slug($name);
        $title = ucwords(str_replace('-', ' ', $slug));

        // Fetch the store
        $category = Categories::where('title', $title)->first();


        if (!$category) {
        return redirect('404');
        }

        // Fetch related coupons and stores
        $stores = Stores::where('category', $title)->get();


        return view('related_categories', compact('category', 'stores' ));
        }


}
