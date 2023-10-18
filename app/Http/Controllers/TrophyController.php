<?php

namespace App\Http\Controllers;

use App\Models\Trophy;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;



class TrophyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $allAchievements = Trophy::all();

        return Inertia::render('ProfilePage/Profile', [
            'achievements' => $allAchievements
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Trophy $trophy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trophy $trophy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trophy $trophy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trophy $trophy)
    {
        //
    }
}
