<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Post;
use App\Http\Requests\PostCreateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class DashbordController extends Controller {

    public function index(): View {
        // $data = Http::get("http://localhost:5000/");
        return view('dashboard', [
            "posts" => Post::with('category')->paginate(10),
            "categories" => Category::select('id', 'name')->get(),
            // "data" => $data
        ]);
    }

    public function create(PostCreateRequest $request): RedirectResponse {
        $post = Post::create($request->validated());

        $post->save();
        return Redirect::route('dashboard')->with('success', 'Post created successfully');
    }

    public function createCategorie(): View {
        return view('create-categorie');
    }

    public function saveCategorie(Request $request): RedirectResponse {
        $request->validate([
            'name' => ['required','string'],
            "slug" => ['required','string'],
            'image' => 'nullable|mimes:png,jpg,jpeg,webp,gif'
        ]);

        $imageCategorie = Storage::putFile('images', $request->file('image'));
        // Storage::setVisibility($imageCategorie, 'public');

        $categorie = Category::create([
            'name'=> $request->name,
            'slug'=> $request->slug,
            'image' => $imageCategorie
        ]);
        $categorie->save();

        return Redirect::route('dashboard.categorie')->with('success','Categorie created succeffully');
    }
}
