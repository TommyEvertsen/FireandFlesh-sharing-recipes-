<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
        return Inertia::render('Recipe/Index', [
            'recipes' => Recipe::with('user:id,name')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $validated = $request->validate([
            'message' => 'required|string',
            'title' => 'required|string|max:40',
            'ingridients' => 'required|string',
        ]);

        $request->user()->recipes()->create($validated);

        return redirect(route('recipe.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe): RedirectResponse
    {
        //
        $this->authorize('update', $recipe);

        $validated = $request->validate([
            'message' => 'required|string',
            'title' => 'required|string',
            'ingridients' => 'required|string',
        ]);

        $recipe->update($validated);

        return redirect(route('recipe.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe): RedirectResponse
    {
        //

        $this->authorize('delete', $recipe);

        $recipe->delete();

        return redirect(route('recipe.index'));
    }

    public function like(Recipe $recipe): JsonResponse
{
    $userId = auth()->id();

    //Check if the user is trying to like their own recipe
    if ($recipe->user_id === $userId) {
        return response()->json(['error' => 'You cannot like your own recipe.'], 403);
    }

    $alreadyLiked = DB::table('likes')->where('user_id', $userId)->where('recipe_id', $recipe->id)->exists();

    if (!$alreadyLiked) {
        DB::transaction(function () use ($recipe, $userId) {
            $recipe->increment('likes');
            
            // Saving the like to the database
            DB::table('likes')->insert([
                'user_id' => $userId,
                'recipe_id' => $recipe->id
            ]);
        });

        return response()->json(['success' => true, 'likes' => $recipe->likes]);
    }

    return response()->json(['error' => 'Recipe already liked.'], 409);
}

       
       
}
