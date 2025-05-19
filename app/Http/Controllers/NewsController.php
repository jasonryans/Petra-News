<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct()
    {
        // Pastikan semua method di controller ini butuh login
        $this->middleware('auth');
    }

    public function NewsList()
    {
        $news = News::where('status', 'approved')->latest()->get();
        return view('news.news_list', compact('news'));
    }

    public function index(Request $request)
    {
        $query = News::where('status', 'approved');

        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }

        $news = $query->latest()->paginate(10);
        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        if ($news->status !== 'approved') {
            return redirect()->route('news.index')->with('error', 'News not found or not approved.');
        }

        return view('news.show', compact('news'));
    }

    public function viewSubmission(News $news)
    {
        return view('news.complete', compact('news'));
    }

    public function complete(News $news)
    {
        return view('news.complete', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function edit($id)
    {        
        $news = News::where('id', $id)->firstOrFail();
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'youtube_link' => 'nullable|url',
            'category' => 'required',
            'audience' => 'required',
        ]);

        $news = News::findOrFail($id);
        $news->title = $validated['title'];
        $news->description = $validated['description'];
        $news->image = $validated['image'];
        $news->start_date = $validated['start_date'];
        $news->end_date = $validated['end_date'];
        $news->youtube_link = $validated['youtube_link'];
        $news->category = $validated['category'];
        $news->audience = $validated['audience'];
        $news->status = 'pending'; 
        $news->user_id = auth()->id();
        $news->updated_at = now();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news_images', 'public');
            $news->image = $path;
        }
        $news->save();

        return redirect()->route('news.index')->with('success', 'News updated successfully!');
    }

    public function history()
    {
        $news = News::where('user_id', auth()->id())
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('news.history', compact('news'));
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
        $news->user_id = auth()->id();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news_images', 'public');
            $news->image = $path;
        }

        $news->save();

        return redirect()->route('news.index')->with('success', 'News submitted for approval!');
    }
}
