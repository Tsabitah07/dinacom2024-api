<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Pickup;
use App\Models\User;
class ViewController extends Controller
{
    public function user()
    {
        return view('admin.user', [
            'title' => 'User',
            'no' => 1,
            'users' => User::all()
        ]);
    }

    public function pickup()
    {
        $pickups = Pickup::with('user')->latest()->get();
        return view('admin.pickup', [
            'title' => 'Pickup',
            'no' => 1,
            'pickups' => $pickups
        ]);
    }

    public function home()
    {
        return view('admin.home', [
            'title' => 'Home'
        ]);
    }

    public function showUser($id)
    {
        return view('admin.detail_user', [
            'title' => 'User',
            'user' => User::find($id)
        ]);
    }

    public function showPickup($id,)
    {
        $pickup = Pickup::find($id);
        $user = User::whereUserId($pickup->user_id);
        return view('admin.detail_pickup', [
            'title' => 'Pickup',
            'pickup' => $pickup,
//            'user' => $user
        ]);
    }

    public function edit($id)
    {
        return view('admin.edit', [
            'title' => 'Edit',
            'pickup' => Pickup::find($id)
        ]);
    }

    public function update(PostRequest $request, $id)
    {
        $request->validated();
        $pickup = Pickup::find($id);
        $user = User::find(auth()->user()->id);

        $pickup->update([
            'detail_location' => $request->detail_location,
            'weight' => $request->weight,
            'type'=> $request->type,
            'description' => $request->description,
            'points' => $request->points
        ]);

        $user->points = $user->points + $pickup->points;
        $user->save();

        return redirect('/admin/pickup-list')->with('Success', 'Data berhasil di update');
    }
}
