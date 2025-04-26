<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::where('status', 'approved')->latest()->get();
        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'event_date' => 'required|date',
            'image' => 'nullable|image|max:2048',
            'youtube_link' => 'nullable|url',
            'category' => 'required',
            'audience' => 'required',
        ]);

        $news = new News();
        $news->fill($validated);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news_images', 'public');
            $news->image_path = $path;
        }

        $news->save();

        return redirect()->route('news.index')->with('success', 'News submitted for approval!');
    }
}

