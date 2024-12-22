<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return Profile::all();
    }

    public function show(Profile $profile)
    {
        //return Post::findOrFail($id);
        return $profile;
    }

    public function store()
    {
       $dataProfile = [
           'birthed_at' => '1991-01-03',
           'registered_at' => '2024-12-21',
           'address' => 'Murom',
           'phone' => '+79016905886',
           'avatar' => 'no-avatar.png',
           'description' => 'new profile',
           'gender' => 'male',
           'user' => 'Dmitry',
       ];
       return Profile::create($dataProfile);
    }

    public function update(Profile $profile)
    {
        if($profile){
            $dataProfile = [
                'birthed_at' => '2020-12-23',
                'registered_at' => '2024-12-23',
                'address' => 'Moscow',
                'phone' => '+799912345678',
                'avatar' => 'no-avatar.png',
                'description' => 'first profile',
                'gender' => 'male',
                'user' => 'Dmitry2',
            ];
            $profile->update($dataProfile);
            return $profile;
        }
        return false;
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
        return response(['message' => 'deleted'], 200);
    }
}
