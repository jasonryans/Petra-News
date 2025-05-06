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

    public function reject(Request $request, News $news)
    {
        $news->status = 'rejected';
        $news->rejection_memo = $request->input('memo', 'Ditolak tanpa alasan.');
        $news->save();

        return back()->with('error', 'News rejected with memo.');
    }

    public function takedown(News $news)
    {
        $news->delete(); // Atau bisa ganti status menjadi "taken_down" jika tidak ingin hapus permanen
        return back()->with('info', 'News has been taken down.');
    }

    public function clearMemo(News $news)
    {
        $news->rejection_memo = null;
        $news->save();
        return back()->with('success', 'Memo cleared.');
    }

    public function destroy($id)
    {
        News::where('id', $id)->delete();
        return redirect()->route('admin.news.index');
    }
}
