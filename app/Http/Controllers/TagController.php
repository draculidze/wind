<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return Tag::all();
    }

    public function show(Tag $tag)
    {
        return $tag;
    }

    public function store()
    {
        return Tag::create();
    }

    public function update(Tag $tag)
    {
        $tag->update();
        return $tag;
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response(['message' => 'deleted'], 200);
    }
}
