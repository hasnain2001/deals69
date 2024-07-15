<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupons;
use App\Models\Stores;
use App\Models\Categories;
use App\Models\Blog;

class CouponsController extends Controller
{
    public function coupon(Request $request) {
        if ($request->ajax()) {
            $coupons = Coupons::all();
            return response()->json($coupons);
        }

      $coupons = Coupons::orderByRaw('CAST(`order` AS SIGNED) asc')->get();

        return view('admin.coupons.index', compact('coupons'));
    }



public function index()
{
    $coupons = Coupons::paginate(35); // Paginate with 35 coupons per page



    return view('coupons', compact( 'coupons'));
}


    public function update(Request $request)
    {
        try {
            $orderData = $request->order;

            // Extract IDs from the order data
            $ids = collect($orderData)->pluck('id')->toArray();

            // Fetch the existing records from the database in the order they were received
            $existingRecords = Coupons::whereIn('id', $ids)->get();

            // Create a map of ID to record for quick lookup
            $recordMap = $existingRecords->keyBy('id');

            foreach ($orderData as $order) {
                // Check if the record exists
                if ($record = $recordMap->get($order['id'])) {
                    // Update the order only if the record exists
                    $record->update(['order' => $order['position']]);
                }
            }

            return response()->json(['status' => 'success', 'message' => 'Update Successfully.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }


    public function openCoupon($couponId)
{
    $coupon = Coupons::find($couponId);
    if ($coupon) {
        // Increment click count
        $coupon->clicks++;
        $coupon->save();

        // Assuming you have a route named 'store.detail' that shows the store detail page
        return redirect()->route('store.detail', ['id' => $coupon->store_id]);
    }
    // Handle case where coupon is not found
    return redirect()->back()->with('error', 'Coupon not found.');
}

public function updateClicks(Request $request)
{
    $couponId = $request->input('coupon_id');
    $coupon = Coupons::find($couponId);
    if ($coupon) {
        $coupon->clicks++;
        $coupon->save();
        return redirect()->back()->with('success', 'Coupon Click added');
    }
    return response()->json(['success' => false, 'message' => 'Coupon not found.']);
}







    public function create_coupon() {
        $stores = Stores::all();
        return view('admin.coupons.create', compact('stores'));
    }

    public function store_coupon(Request $request) {
        Coupons::create([
            'name' => $request->name,
            'description' => $request->description,
            'code' => $request->code,
            'destination_url' => $request->destination_url,
            'ending_date' => $request->ending_date,
            'status' => $request->status,
            'authentication' => isset($request->authentication) ? json_encode($request->authentication) : "No Auth",
            'store' => $request->store,
        ]);

        return redirect()->back()->with('success', 'Coupon Created Successfully');
    }

    public function edit_coupon($id) {
        $coupons = Coupons::find($id);
        $stores = Stores::all();
        return view('admin.coupons.edit', compact('coupons', 'stores'));
    }

    public function update_coupon(Request $request, $id) {
        $coupons = Coupons::find($id);

        $coupons->update([
            'name' => $request->name,
            'description' => $request->description,
            'code' => $request->code,
            'destination_url' => $request->destination_url,
            'ending_date' => $request->ending_date,
            'status' => $request->status,
            'authentication' => isset($request->authentication) ? json_encode($request->authentication) : "No Auth",
            'store' => isset($request->store) ? $request->store : $coupons->store,
        ]);

        return redirect()->back()->with('success', 'Coupon Updated Successfully');
    }

    public function delete_coupon($id) {
        Coupons::find($id)->delete();
        return redirect()->back()->with('success', 'Coupon Deleted Successfully');
    }
}
