<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsApproved;

class AdminNewsController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'pending'); // Default to 'pending'
    
        $query = News::query();
        
        if ($status === 'pending') {
            $query->where('status', 'pending');
        } elseif ($status !== 'pending') {
            // Show both approved and rejected items in the "Reviewed" tab
            $query->whereIn('status', ['approved', 'rejected']);
        }
        
        // Order by created_at or updated_at depending on your preference
        $news = $query->orderBy('created_at', 'desc')->get();
        
        return view('admin.news.index', compact('news'));
    }

    public function review(News $news)
    {
        $news->youtube_link = preg_replace('/.*(?:youtu\.be\/|v=|\/v\/|embed\/|watch\?v=|&v=)([^&\n?#]+)/', '$1', $news->youtube_link);
        return view('admin.news.review', compact('news'));
    }

    public function approve(News $news)
    {
        $news->status = 'approved';
        $news->save();

        // kirim email (opsional)
        // Mail::to('user@example.com')->send(new NewsApproved($news));

        return redirect()->route('admin.news.index')->with('success', 'News approved successfully!');
    }

    public function reject(Request $request, News $news)
    {
        $news->status = 'rejected';
        $news->rejection_memo = $request->input('memo', 'Ditolak tanpa alasan.');
        $news->save();

        return redirect()->route('admin.news.index')->with('error', 'News rejected with memo.');
    }

    public function takedown(News $news)
    {
        // // Change from delete to status change
        // $news->status = 'pending';  // Mengembalikan ke status pending, atau bisa diganti ke 'taken_down' jika perlu
        // $news->save();

        $news->delete(); // Atau bisa ganti status menjadi "taken_down" jika tidak ingin hapus permanen
        return back()->with('info', 'News has been taken down.');
        
        return redirect()->route('admin.news.index')->with('info', 'News has been taken down.');
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

    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->role = $request->role;

        if ($request->role === 'penyelenggara') {
            $user->role_expired_at = $request->expired_date;
        } else {
            $user->role_expired_at = null;
        }

        $user->save();

        return redirect()->back()->with('success', 'Role berhasil diperbarui!');
    }
  
    public function akses()
    {
        $users = User::where('role', '!=', 'admin')
                            ->orderByDesc('created_at')
                            ->paginate(10);
        return view('admin.akses', compact('users'));
    }
}