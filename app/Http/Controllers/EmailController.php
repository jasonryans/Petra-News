<?php

namespace App\Http\Controllers;

use App\Mail\BroadcastMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function BroadcastMail()
    {
        $recipients = [
            'ndahmahmudah50@gmail.com',
            'sonaldospurs07@gmail.com',
            'jasonsusilo579@gmail.com',
        ];

        $news = new \App\Models\News();
        $news->name = 'Petra News';

        Mail::to($recipients)->send(new BroadcastMail($news));
        
        return 'email sent successfully';
    }
}