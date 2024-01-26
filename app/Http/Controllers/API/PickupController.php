<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Pickup;
use App\Models\User;
use Illuminate\Http\Request;

class PickupController extends Controller
{
    public function index()
    {
        $pickups = Pickup::with('user')->latest()->get();

        return response([
            'title' => 'List History',
            'data' => $pickups
        ], 200);
    }

    public function store(PostRequest $request)
    {
        $request->validated();
        $pickup = auth()->user()->pickups()->create([
            'detail_location' => $request->detail_location,
            'weight' => $request->weight,
            'type'=> $request->type,
            'description' => $request->description,
            'points' => $request->points=0
        ]);

        $user = User::find(auth()->user()->id);
        $user->points = $user->points + $request->points;
        $user->save();

        return response([
            'message' => 'Pickup success',
            'data' => $pickup
        ], 201);
    }

    public function update(PostRequest $request, $id)
    {
        $request->validated();
        $pickup = Pickup::find($id);
        $pickup->update([
            'detail_location' => $request->detail_location,
            'weight' => $request->weight,
            'type'=> $request->type,
            'description' => $request->description,
            'points' => $request->points
        ]);

        $user = User::find(auth()->user()->id);
        $user->points = $user->points + $pickup->points;
        $user->save();

        return response()->json([
            'message' => 'The data has been successfully updated',
            'data' => $pickup
        ]);
    }

    public function getByUser($user_id)
    {
        $pickup = Pickup::whereUserId($user_id)->latest()->get();

        return response([
            'data' => $pickup
        ], 200);
    }

}
