<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Networks;
use Illuminate\Http\Request;
use App\Models\Stores;

class StoresController extends Controller
{
    
    
       public function top_store() {
        // Fetch all stores with their respective categories
   $storesByCategory = Stores ::table('stores')
        ->select('category', Categories::raw('count(*) as total'))
        ->groupBy('category')
        ->get();

        return view('blog', compact('storesByCategory'));
    }
    public function store() {
        $stores = Stores::get();
        return view('admin.stores.index', compact('stores'));
    }

    public function create_store() {
        $categories = Categories::all();
        $networks = Networks::all();
        return view('admin.stores.create', compact('categories', 'networks'));
    }

    public function store_store(Request $request) {
        if (request()->File('store_image'))
        {
            $file = request()->File('store_image');
            $StoreImage = md5($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
            $file->move('./uploads/store/', $StoreImage);
        }

        Stores::create([
            'name' => $request->name,
            'description' => $request->description,
            'url' => $request->url,
            'destination_url' => $request->destination_url,
            'category' => $request->category,
            'meta_tag' => $request->meta_tag,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'status' => $request->status,
            'authentication' => isset($request->authentication) ? $request->authentication : "No Auth",
            'network' => $request->network,
            'store_image' => isset($StoreImage) ? $StoreImage : "No Store Image",
        ]);

        return redirect()->back()->with('success', 'Store Created Successfully');
    }
    
    public function edit_store($id) {
        $stores = Stores::find($id);
        $categories = Categories::all();
        $networks = Networks::all();
        return view('admin.stores.edit', compact('stores', 'categories', 'networks'));
    }

    public function update_store(Request $request, $id) {
        $stores = Stores::find($id);

        if (request()->File('store_image'))
        {
            $file = request()->File('store_image');
            $StoreImage = md5($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
            $file->move('./uploads/store', $StoreImage);
        }

        $stores->update([
            'name' => $request->name,
            'description' => $request->description,
            'url' => $request->url,
            'destination_url' => $request->destination_url,
            'category' => isset($request->category) ? $request->category : $stores->category,
            'meta_tag' => $request->meta_tag,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'status' => $request->status,
            'authentication' => isset($request->authentication) ? $request->authentication : "No Auth",
            'network' => isset($request->network) ? $request->network : $stores->network,
            'store_image' => isset($StoreImage) ? $StoreImage : "No Store Image",
        ]);

        return redirect()->back()->with('success', 'Store Updated Successfully');
    }

    public function delete_store($id) {
        Stores::find($id)->delete();
        return redirect()->back()->with('success', 'Store Deleted Successfully');
    }
    
}
