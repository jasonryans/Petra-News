<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsApproved;

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the news items for admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the review form for the specified news.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function review(News $news)
    {
        return view('admin.news.review', compact('news'));
    }

    /**
     * Approve the specified news.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function approve(News $news)
    {
        $news->status = 'approved';
        $news->save();

        // kirim email (opsional)
        // Mail::to('user@example.com')->send(new NewsApproved($news));

        return redirect()->route('admin.news.index')->with('success', 'News approved successfully!');
    }

    /**
     * Reject the specified news.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function reject(Request $request, News $news)
    {
        $news->status = 'rejected';
        $news->rejection_memo = $request->input('memo', 'Ditolak tanpa alasan.');
        $news->save();

        return redirect()->route('admin.news.index')->with('error', 'News rejected with memo.');
    }

    /**
     * Take down the specified news.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function takedown(News $news)
    {
        // Change from delete to status change
        $news->status = 'pending';  // Mengembalikan ke status pending, atau bisa diganti ke 'taken_down' jika perlu
        $news->save();
        
        return redirect()->route('admin.news.index')->with('info', 'News has been taken down.');
    }

    /**
     * Clear rejection memo for the specified news.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function clearMemo(News $news)
    {
        $news->rejection_memo = null;
        $news->save();
        return back()->with('success', 'Memo cleared.');
    }

    /**
     * Remove the specified news from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::where('id', $id)->delete();
        return redirect()->route('admin.news.index');
    }
}