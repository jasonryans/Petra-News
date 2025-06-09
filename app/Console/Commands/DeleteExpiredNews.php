<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\News;
use Carbon\Carbon;

class DeleteExpiredNews extends Command
{
    protected $signature = 'news:delete-expired';
    protected $description = 'Menghapus berita yang end_date-nya sudah lewat';

    public function handle()
    {
        $now = Carbon::now();

        $expiredNews = News::whereNotNull('end_date')
            ->where('end_date', '<', $now)
            ->get();

        foreach ($expiredNews as $news) {
            $this->info("Menghapus berita: {$news->title} (ID: {$news->id})");
            $news->delete();
        }

        $this->info('Selesai. Total berita yang dihapus: ' . $expiredNews->count());
    }
}
