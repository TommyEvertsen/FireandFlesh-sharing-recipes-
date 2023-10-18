<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Achievements;
use App\Models\AchievementsV2;
use App\Models\Trophy;

class AchievementSeederV2 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $achievements = [
            [
                'title' => 'First Like',
                'info' => 'This achievement is unlocked by liking a recipe for the first time.',
                'icon' => 'public/icons/cake-cup-color-icon.svg',
                'score' => 10,
            ],
            [
                'title' => 'Ten likes',
                'info' => 'Great job liking 10 recipes, you made som people happy.',
                'icon' => 'public/icons/chili-icon.svg',
                'score' => 30,
            ],

            [
                'title' => 'Created your first Recipe',
                'info' => 'You created your first recipe, continiue sharing your recipes with the world.',
                'icon' => 'public/icons/crab-color-icon.svg',
                'score' => 20,
            ],
            [
                'title' => 'Created 10 recipec',
                'info' => 'Hello Gordon Ramsay! You almost made a cook book by now.',
                'icon' => 'public/icons/green-grapes-icon.svg',
                'score' => 50,
            ],


        ];

        foreach ($achievements as $achievement) {
            Trophy::create($achievement);
        }

    }
}
