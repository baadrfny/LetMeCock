<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'recipe_id' => 'required|exists:recipes,id',
        ]);

        $userId = auth()->id();
        $recipeId = $request->recipe_id;

        $alreadyExists = Favorite::where('user_id', $userId)
                                 ->where('recipe_id', $recipeId)
                                 ->exists();

        if ($alreadyExists) {
            return redirect()->back()->with('error', 'This recipe is already in your favorites!');
        }
        // ----------------------------------------

        Favorite::create([
            'user_id' => $userId,
            'recipe_id' => $recipeId,
        ]);

        return redirect()->back()->with('success', 'Recipe added to favorites!');
    }
}