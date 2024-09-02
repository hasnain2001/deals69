<?php

namespace App\Http\Controllers;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Illuminate\Http\Request;
use App\Models\Categories;


class CategoriesController extends Controller
{
    public function category() {
        $categories = Categories::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create_category() {
        return view('admin.categories.create');
    }

    public function store_category(Request $request) {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'meta_tag' => 'nullable|string|max:255',
            'meta_keyword' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'status' => 'required',
            'authentication' => 'nullable|string',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Initialize $CategoryImage to a default value
        $CategoryImage = 'No Category Image';

        if ($request->hasFile('category_image')) {
            $file = $request->file('category_image');
            $CategoryImage = md5($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
            $filePath = public_path('uploads/categories/' . $CategoryImage);

            // Move the file to the destination folder
            $file->move(public_path('uploads/categories/'), $CategoryImage);

            // Use Imagick to create a new image instance
            $imageInstance = ImageManager::imagick()->read($filePath);

            // Resize the image to fit within 400x300 pixels while preserving aspect ratio
            $imageInstance->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize(); // Prevent upsizing
            });

            // Save the resized image
            $imageInstance->save($filePath);

            // Optimize the image using the optimizer chain
            $optimizer = OptimizerChainFactory::create();
            $optimizer->optimize($filePath);
        }

        // Create the category
        Categories::create([
            'title' => $validatedData['title'],
            'meta_tag' => $validatedData['meta_tag'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
            'status' => $validatedData['status'],
            'authentication' => $validatedData['authentication'] ?? 'No Auth',
            'category_image' => $CategoryImage,
        ]);

        return redirect()->back()->with('success', 'Category Created Successfully');
    }

    public function edit_category($id) {
        $categories = Categories::find($id);
        return view('admin.categories.edit', compact('categories'));
    }

    public function update_category(Request $request, $id) {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'meta_tag' => 'nullable|string|max:255',
            'meta_keyword' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'status' => 'required',
            'authentication' => 'nullable|string',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        $categories = Categories::find($id);

        $CategoryImage = $categories->category_image;

        if ($request->hasFile('category_image')) {
            $file = $request->file('category_image');
            $CategoryImage = md5($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
            $filePath = public_path('uploads/categories/' . $CategoryImage);

            // Move the file to the destination folder
            $file->move(public_path('uploads/categories/'), $CategoryImage);

            // Use Imagick to create a new image instance
            $imageInstance = ImageManager::imagick()->read($filePath);

            // Resize the image to fit within 400x300 pixels while preserving aspect ratio
            $imageInstance->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize(); // Prevent upsizing
            });

            // Save the resized image
            $imageInstance->save($filePath);

            // Optimize the image using the optimizer chain
            $optimizer = OptimizerChainFactory::create();
            $optimizer->optimize($filePath);
        }


        $categories->update([
            'title' => $request->title,
            'meta_tag' => $request->meta_tag,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'status' => $request->status,
            'authentication' => isset($request->authentication) ? $request->authentication : "No Auth",
            'category_image' => isset($CategoryImage) ? $CategoryImage : "No Category Image",
        ]);

        return redirect()->back()->with('success', 'Category Updated Successfully');
    }

    public function delete_category($id) {
        Categories::find($id)->delete();
        return redirect()->back()->with('success', 'Category Deleted Successfully');
    }


public function deleteSelected(Request $request)
{
    $categoryIds = $request->input('selected_categories');

    if ($categoryIds) {
        Categories::whereIn('id', $categoryIds)->delete();
        return redirect()->back()->with('success', 'Selected categories deleted successfully');
    } else {
        return redirect()->back()->with('error', 'No categories selected for deletion');
    }
}



}
