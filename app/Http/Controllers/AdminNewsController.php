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

        // Transform category to display name
        $categoryMap = [
            '314' => 'Koperasi Mahasiswa',
            '232' => 'Pelayanan Mahasiswa',
            '231' => 'Pelayanan Gereja',
            '612' => 'Tim Petra Sinergy',
            '22' => 'Majalah Genta',
            '1594' => 'Media Partnership',
            '158' => 'Open House',
            '689' => 'Pemilu Raya',
            '1590' => 'Persekutuan (PERSKI)',
            '1591' => 'GMTK',
            '1613' => 'HPMT Genta',
            '1616' => 'Petra Career Center',
            '741' => 'Upcoming Events',
            '1576' => 'Wisuda',
            '1569' => 'Fakultas Bisnis dan Ekonomi',
            '1571' => 'Prodi Akuntansi',
            '1596' => 'Program Akuntansi Bisnis',
            '1572' => 'Program International Business Accounting (IBAC)',
            '1570' => 'Prodi Akuntansi Pajak',
            '1586' => 'Program International Business Management (IBM)',
            '1580' => 'Program Manajemen Keuangan',
            '1576' => 'Program Manajemen Perhotelan',
            '1603' => 'Fakultas Humaniora dan Industri Kreatif',
            '1609' => 'Program Studi Sastra Inggris',
            '1610' => 'Petra English Theatre',
            '1573' => 'Fakultas Ilmu Komunikasi',
            '1602' => 'Fakultas Keguruan dan Ilmu Pendidikan',
            '560' => 'Fakultas Sastra',
            '1587' => 'Prodi Bahasa Mandarin',
            '190' => 'Fakultas Seni dan Desain',
            '1605' => 'Desain Fashion dan Tekstil',
            '205' => 'Desain Interior',
            '191' => 'Desain Komunikasi Visual',
            '192' => 'Adiwarna',
            '1566' => 'Fakultas Teknik Industri',
            '1567' => 'Informatika',
            '1568' => 'Sistem Informasi Bisnis (SIB)',
            '1574' => 'Fakultas Teknik Sipil dan Perencanaan',
            '1575' => 'Program Studi Teknik Sipil',
            '358' => 'Fakultas Teknologi Industri',
            '1584' => 'Program Studi Teknik Industri',
            '1585' => 'Program International Business Engineering (IBE)',
            '359' => 'Program Studi Teknik Mesin',
            '771' => 'King Sejong Institute',
            '11' => 'Lembaga Kemahasiswaan',
            '234' => 'Himpunan Mahasiswa',
            '399' => 'Himahottra',
            '1607' => 'Himaintra',
            '283' => 'Himainfra',
            '561' => 'Himajaktra',
            '561' => 'Himaketra',
            '561' => 'Himamesra',
            '561' => 'Himatitra',
            '561' => 'Himabamatra',
            '1601' => 'Himasaintra',
            '235' => 'Himamatra',
            '1598' => 'Himatantra',
            '1582' => 'Himatektra',
            '298' => 'Himatitra',
            '329' => 'Himavistra',
            '1593' => 'Himasitra',
            '336' => 'Himaartra',
            '287' => 'Himasintra',
            '904' => 'Himakomtra',
            '76' => 'Achievement',
            '201' => 'Badan Eksekutif Mahasiswa',
            '202' => 'LKMM-TM',
            '1615' => 'Servant Leadership Training',
            '263' => 'UKM',
            '303' => 'BSO',
            '1619' => 'EFM',
            '273' => 'KSR',
            '1617' => 'Matranak',
            '1618' => 'Mena',
            '1595' => 'UKM Paduan Suara',
            '1612' => 'UKM Selam',
            '264' => 'UKM Teater Rumpun Padi',
            '265' => 'Bank Panitia',
            '76' => 'BIG Events',
            '147' => 'Community Outreach Program (COP)',
            '1577' => 'Dies Natalis',
            '388' => 'LKMM-TD',
            '129' => 'Welcome Grateful Generation',
            '159' => 'Open House',
            '75' => 'Events',
            '611' => 'Eksternal',
            '1604' => 'Office of Institutional Advance',
            '309' => 'Pelantikan LK-KBM',
            '549' => 'Pengabdian Masyarakat',
            '128' => 'Pusat Karir',
            '218' => 'Pre-Graduation Day Events',
            '221' => 'Upacara Bendera',
        ];
        $news->category_display = $categoryMap[$news->category] ?? 'Unknown Category';

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