<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achievements;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;


class AchievementController extends Controller
{
    public function createAchievements(){
        

        $oneLike = new Achievements();

        $oneLike->title = 'First like';
        $oneLike->info = 'Welcome to you new journey this avhievement is unlocked by liking a recipe';
        $oneLike->icon = 'public/icons/chili-icon.png';
        $oneLike->score = 10;
        $oneLike->save();


    }

    public function index(): Response
    {
        
        return Inertia::render('ProfilePage/Profile', [
            'achievements' => Achievements::with('user:id,name')->latest()->get()
        ]);
    }
}
