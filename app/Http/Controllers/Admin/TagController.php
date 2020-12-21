<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::paginate(5);
        return view('admin.tags.index')->withTags($tags);
    }


    public function create()
    {
        return view('admin.tags.create');
    }


    public function store(CreateTagRequest $request)
    {
        return redirect()->route('admin.tags.index');
    }


    public function show(Tag $tag)
    {
        //
    }


    public function edit(Tag $tag)
    {
        return view('admin.tags.edit')->withTag($tag);
    }


    public function update(UpdateTagRequest $request, Tag $tag)
    {
        return redirect()->route('admin.tags.index');
    }


    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->back();
    }
}
