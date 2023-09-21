<?php

namespace App\Listeners;

use App\Events\RecipeCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use App\Notifications\NewRecipe;

class SendRecipeCreatedNotifications implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RecipeCreated $event): void
    {
        //
        foreach (User::whereNot('id', $event->recipe->user_id)->cursor() as $user) {
            $user->notify(new NewRecipe($event->recipe));
        }
    }
}
