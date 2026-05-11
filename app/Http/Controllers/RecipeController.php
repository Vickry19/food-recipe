<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $recipes = Recipe::when($search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%");
        })->latest()->paginate(6);

        return view('recipes.index', compact('recipes'));
    }

    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }

    public function admin()
{
    $recipes = Recipe::latest()->paginate(5);

    $categories = [
        'Makanan ',
        'Dessert',
        'Minuman',
        'Seafood',
        'Junk Food',
        'Healthy Food',
        'Cemilan',
    ];

    return view('recipes.admin', compact(
            'recipes',
            'categories'
    ));
}

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
{
    $request->validate([

        'title' => 'required',

        'category' => 'required',

        'ingredients' => 'required',

        'instructions' => 'required',

        'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'

    ], [

        'title.required' => 'Nama makanan wajib diisi',

        'category.required' => 'Kategori wajib dipilih',

        'ingredients.required' => 'Bahan-bahan wajib diisi',

        'instructions.required' => 'Langkah memasak wajib diisi',

        'image.required' => 'Gambar wajib diupload',

    ]);

    $imageName = time().'.'.$request->image->extension();

    $request->image->move(
        public_path('images'),
        $imageName
    );

    Recipe::create([

        'title' => $request->title,

        'category' => $request->category,

        'ingredients' => $request->ingredients,

        'instructions' => $request->instructions,

        'image' => $imageName

    ]);

    return redirect()
        ->route('recipes.admin')
        ->with('success', 'Resep berhasil ditambahkan');
}

    public function edit(Recipe $recipe)
    {
        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, Recipe $recipe)
{
    $request->validate([
        'title' => 'required',
        'category' => 'required',
        'ingredients' => 'required',
        'instructions' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    // default gunakan gambar lama
    $imageName = $recipe->image;

    // jika upload gambar baru
    if ($request->hasFile('image')) {

        // hapus gambar lama jika ada
        if (
            $recipe->image &&
            file_exists(public_path('images/' . $recipe->image))
        ) {

            unlink(public_path('images/' . $recipe->image));

        }

        // upload gambar baru
        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(
            public_path('images'),
            $imageName
        );
    }

    // update data
    $recipe->update([
        'title' => $request->title,
        'category' => $request->category,
        'ingredients' => $request->ingredients,
        'instructions' => $request->instructions,
        'image' => $imageName
    ]);

    return redirect()
        ->route('recipes.admin')
        ->with('success', 'Resep berhasil diupdate');
}

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return redirect()->route('recipes.admin')
            ->with('success', 'Resep berhasil dihapus');
    }
    
}