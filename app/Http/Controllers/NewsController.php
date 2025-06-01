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
        // Define category mapping (value => name)
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
            '1583' => 'Program Akuntansi Pajak Program International Business Engineering',
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
            '631' => 'LKM-ID',
            '202' => 'LKM-TR',
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
            '309' => 'Pelantikan LK-TR',
            '549' => 'Pengabdian Masyarakat',
            '128' => 'Pusat Karir',
            '218' => 'Pre-Graduation Day Events',
            '221' => 'Upacara Bendera',
        ];

        $query = News::where('status', 'approved');

        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }

        $news = $query->orderBy('start_date', 'asc')->paginate(10);

        // Transform the category field to include display name
        $news->getCollection()->transform(function ($item) use ($categoryMap) {
            $item->category_display = $categoryMap[$item->category] ?? 'Unknown Category';
            return $item;
        });

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
        $news->youtube_link = preg_replace('/.*(?:youtu\.be\/|v=|\/v\/|embed\/|watch\?v=|&v=)([^&\n?#]+)/', '$1', $news->youtube_link);
        return view('news.complete', compact('news'));
    }

    public function complete(News $news)
    {
        $news->youtube_link = preg_replace('/.*(?:youtu\.be\/|v=|\/v\/|embed\/|watch\?v=|&v=)([^&\n?#]+)/', '$1', $news->youtube_link);
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

    public function drafts()
    {
        $databaseDrafts = News::where('user_id', auth()->id())
                ->where('status', 'draft')
                ->orderBy('created_at', 'desc')
                ->get();

        return view('news.drafts', compact('databaseDrafts'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'summary' => 'required',
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
        $news->summary = $validated['summary'];
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
            'summary' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'youtube_link' => 'nullable|url',
            'category' => 'required',
            'audience' => 'required',
        ]);

        $news = new News();

        if ($request->has('draft_id') && $request->draft_id) {
            $draft = News::find($request->draft_id);
            if ($draft) {
                $news = $draft; 
            }
        }

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