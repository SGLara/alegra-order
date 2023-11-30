<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Http\Resources\OrderIndexResource;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Services\KitchenService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrderController extends Controller
{
    public function __construct(private KitchenService $kitchenService)
    {
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return OrderIndexResource::collection(Order::all());
    }

    /**
     * @return OrderResource
     */
    public function store()
    {
        $recipe = $this->kitchenService->getRecipe();

        $order = Order::create([
            'recipe_id' => $recipe['id'],
            'status' => 'completed'
        ]);

        $order = collect($order->toArray())
            ->merge([
                'recipe' => $recipe
            ]);

        return OrderResource::make($order);
    }
}
