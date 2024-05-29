<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Stores;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Str;

class DemoController extends Controller
{




  
       public function blog_home()
    {
        $blogs = Blog::all(); // Fetch blog data
     $chunks = Stores::inRandomOrder()->limit(25)->get();
        return view('blog', compact('blogs', 'chunks')); // Pass both data to the view
    }

    public function blog() {
        $blogs = Blog::all(); 
        return view('admin.Blog.index', compact('blogs'));
    }
    
    
public function blog_show($title) {
    // Decode the URL-encoded title
    $decodedTitle = str_replace('-', ' ', $title);

    // Retrieve the blog post from the database based on the decoded title
    $blog = Blog::where('title', $decodedTitle)->firstOrFail();
    
    return view('blog-details', compact('blog'));
}









    public function create() {
        return view('admin.Blog.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
      $validatedData = $request->validate([
        'title' => 'required|string|max:255', // Adjust max length as needed
        'content' => 'required|string',
        'category_image' => 'required|image|mimes:jpeg,png,jpg,gif',
        'meta_title' => 'nullable|string|max:65', // Meta title validation
        'meta_description' => 'nullable|string|max:155', // Meta description validation
        'meta_keyword' => 'nullable|string|max:255', // Meta keyword validation
        ]);
    
        // Handle file upload
        if ($request->hasFile('category_image')) {
            $image = $request->file('category_image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $imagePath = 'uploads/'.$imageName;
        } else {
            $imagePath = null;
        }
    
        // Create a new instance of the Blog model and assign values from the request
        $blog = new Blog();
        $blog->title = $request->input('title');
       
        $blog->category_image = $imagePath;
           $blog->meta_title = $request->input('meta_title');
    $blog->meta_description = $request->input('meta_description');
    $blog->meta_keyword = $request->input('meta_keyword');
        // Assign file path to category_image
    
      // Process and manipulate HTML content
// Process and manipulate HTML content
$content = $request->input('content');

// Remove invalid HTML tags (e.g., <o:p>)
$content = preg_replace('/<o:p[^>]*>(.*?)<\/o:p>/', '', $content);

$dom = new \DomDocument();
$dom->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

// Continue with the rest of your code for image processing and saving


$images = $dom->getElementsByTagName("img");
foreach ($images as $img) {
    $image_64 = $img->getAttribute('src');
    $image_parts = explode(';', $image_64);

    if (count($image_parts) > 0) {
        $image_data = explode(',', $image_parts[1]);

        if (count($image_data) > 1) {
            $extension_parts = explode('.', $image_data[0]);
            if (isset($extension_parts[1])) {
                $extension = explode('/', $extension_parts[1])[1];
                $replace = $image_data[0] . ';';
                $image = str_replace($replace, '', $image_data[1]);
                $image = str_replace(' ', '+', $image);
                $imageName = Str::random(10) . '.' . $extension;

                $image_name = "/upload/" . $imageName;
                $path = public_path() . $imageName;

                file_put_contents($path, base64_decode($image));

                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
    }
}


// Save the manipulated HTML content to the database
$blog->content = $dom->saveHTML();
$blog->save();

        session()->flash('<div class="alert alert-info" role="alert">
        blog created succesfully
        </div>');
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Blog created successfully.');
    }


    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.Blog.edit', compact('blog'));
    }

public function update(Request $request, $id)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'title' => 'required',
        'content' => 'required|string',
        'category_image' => 'image|mimes:jpeg,png,jpg,gif',
        'meta_title' => 'nullable|string|max:65', // Meta title validation
        'meta_description' => 'nullable|string|max:155', // Meta description validation
        'meta_keyword' => 'nullable|string|max:255', // Meta keyword validation
    ]);

    // Find the blog post by ID
    $blog = Blog::findOrFail($id);

    // Handle file upload if a new image is provided
    if ($request->hasFile('category_image')) {
        $image = $request->file('category_image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $imageName);
        $imagePath = 'uploads/'.$imageName;
        $blog->category_image = $imagePath;
    }

    // Process and manipulate HTML content
    $content = $request->input('content');

    // Preprocess HTML content if necessary
    // For example, you can remove unwanted tags or encode special characters here

    $dom = new \DomDocument();

    // Suppress errors during HTML loading
    libxml_use_internal_errors(true);

    // Load HTML content into the DOMDocument
    $dom->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

    // Check for any errors during HTML loading
    $errors = libxml_get_errors();
    if (!empty($errors)) {
        // Handle errors (e.g., log them, return an error response)
        // You can also process the HTML content differently based on the errors
    }

    libxml_clear_errors();

    // Save the manipulated HTML content to the database
    $blog->content = $dom->saveHTML();

    // Update meta fields
    $blog->meta_title = $request->input('meta_title');
    $blog->meta_description = $request->input('meta_description');
    $blog->meta_keyword = $request->input('meta_keyword');

    // Save the updated blog instance to the database
    $blog->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Blog updated successfully.');
}

public function destroy($id)
{
    // Find the blog post by ID
    $blog = Blog::findOrFail($id);

    // Delete the blog post
    $blog->delete();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Blog deleted successfully.');
}

    public function index()
    {
        $blogs = Blog::paginate(10); // Paginate your data, specifying the number of items per page
        return view('admin.Blog', compact('blogs'));
    }
}
