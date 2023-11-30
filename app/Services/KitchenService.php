<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class KitchenService
{
    public function getRecipes(): Collection
    {
        $response = Http::kitchen()
            ->get('/recipes');

        if ($response->clientError()) {
            $response->throw();
        }

        return $response->json(key: 'data');
    }

    public function getRecipe(): Collection
    {
        $response = Http::kitchen()
            ->post('/recipes');

        if ($response->clientError()) {
            $response->throw();
        }

        return collect($response->json(key: 'data'));
    }
}
