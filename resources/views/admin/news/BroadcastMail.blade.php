<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $news->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #06498c;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
        }
        .footer {
            background-color: #e9ecef;
            padding: 15px;
            text-align: center;
            font-size: 12px;
            color: #666;
            border-radius: 0 0 8px 8px;
        }
        .news-meta {
            background-color: #e7f3ff;
            padding: 10px;
            margin: 15px 0;
            border-left: 4px solid #06498c;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $news->title }}</h1>
    </div>
    
    <div class="content">
        <div class="news-meta">
            <strong>Event Duration:</strong> {{ $news->start_date }} to {{ $news->end_date }}<br>
            <strong>Published:</strong> {{ $news->created_at->format('F d, Y') }}
        </div>
        
        <div class="news-content">
            {!! nl2br(e($news->content)) !!}
        </div>
        
        @if($news->image)
            <div style="text-align: center; margin: 20px 0;">
                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" style="max-width: 100%; height: auto; border-radius: 5px;">
            </div>
        @endif
    </div>
    
    <div class="footer">
        <p>This email was sent from our News Broadcasting System.</p>
        <p>If you no longer wish to receive these emails, please contact your administrator.</p>
    </div>
</body>
</html>