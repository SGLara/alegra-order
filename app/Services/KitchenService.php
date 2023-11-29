<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class KitchenService
{
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
