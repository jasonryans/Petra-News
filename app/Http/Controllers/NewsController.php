<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function NewsList()
    {
        $news = News::where('status', 'approved')->latest()->get();
        dd($news);
        return view('news.news_list', compact('news'));
    }
    
    public function index()
    {
        $news = News::where('status', 'approved')->latest()->get();
        return view('news.index', compact('news'));
    }

    public function show($id)
    {
        $news = News::where('id', $id)->firstOrFail();
        if ($news->status !== 'approved') {
            return redirect()->route('news.index')->with('error', 'News not found or not approved.');
        }
        return view('news.show', compact('news'));
    }

    public function complete($id)
    {
        $news = News::where('id', $id)->firstOrFail(); 
        // dd($news);
        return view('news.complete', compact('news')); 
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
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'youtube_link' => 'nullable|url',
            'category' => 'required',
            'audience' => 'required',
        ]);

        $news = new News();
        $news->fill($validated);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news_images', 'public');
            $news->image = $path;
        }

        $news->save();

        return redirect()->route('news.index')->with('success', 'News submitted for approval!');
    }
}

