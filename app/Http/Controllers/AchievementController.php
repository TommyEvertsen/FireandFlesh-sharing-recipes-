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
    public function index(): Response
    {
        $allAchievemnts = Achievements::all();

        return Inertia::render('ProfilePage/Profile', [
            'achievements' => $allAchievemnts
        ]);
    }
}
