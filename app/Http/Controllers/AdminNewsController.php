<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsApproved;

class AdminNewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('admin.news.index', compact('news'));
    }

    public function approve(News $news)
    {
        $news->status = 'approved';
        $news->save();

        // kirim email (opsional)
        // Mail::to('user@example.com')->send(new NewsApproved($news));

        return back()->with('success', 'News approved and sent!');
    }

    public function reject(News $news)
    {
        $news->status = 'rejected';
        $news->save();

        return back()->with('error', 'News rejected.');
    }

    public function destroy($id)
    {
        News::where('id', $id)->delete();
        return redirect()->route('admin.news.index');
    }
}
