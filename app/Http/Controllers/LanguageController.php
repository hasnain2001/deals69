<?php

namespace App\Http\Controllers;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function language() {
        $languages = Language::Latest()->get();
        return view('admin.language.index', compact('languages'));
    }

    public function create_language() {
        return view('admin.language.create');
    }

    public function store_language(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10',
            'language_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
              // Create the language entry in the database
        Language::create([
            'name' => $request->name,
            'code' => $request->code,
      
        ]);
        Session::flash('success', 'Language created successfully!');
    
        return back();

    }

    public function edit_language($id) {
        $language = Language::find($id);
        return view('admin.language.edit', compact('language'));
    }

    public function update_language(Request $request, $id) {
        $language = Language::find($id);

        $language->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('admin.lang.lang')->with('success', 'Language updated successfully');
    }

    public function delete_language($id) {
        Language::find($id)->delete();
        return redirect()->back()->with('success', 'Language deleted successfully');
    }
}
