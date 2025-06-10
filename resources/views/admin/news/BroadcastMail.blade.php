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
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .email-container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #06498c;
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
        }
        .content-section {
            padding: 30px;
        }
        .category-badge {
            display: inline-block;
            background-color: #06498c;
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .event-meta {
            background-color: #e7f3ff;
            padding: 20px;
            margin: 20px 0;
            border-left: 4px solid #06498c;
            border-radius: 4px;
        }
        .event-title {
            font-size: 24px;
            margin: 15px 0;
            color: #333;
            font-weight: bold;
        }
        .start-date {
            color: #d49726;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .poster-container {
            text-align: center;
            margin: 25px 0;
            background-color: #1a2526;
            padding: 20px;
            border-radius: 8px;
        }
        .poster-img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .event-details-title {
            font-size: 22px;
            margin: 25px 0 15px 0;
            color: #333;
            border-bottom: 2px solid #06498c;
            padding-bottom: 5px;
        }
        .description-content {
            font-size: 16px;
            margin-bottom: 20px;
            color: #333;
            white-space: pre-wrap;
        }
        .summary-content {
            font-size: 16px;
            margin-bottom: 20px;
            color: #555;
            white-space: pre-wrap;
        }
        .footer {
            background-color: #e9ecef;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
        .youtube-link {
            background-color: #ff0000;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 15px;
        }
        .youtube-link:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>News Update</h1>
            <p style="margin: 10px 0 0 0; font-size: 16px;">You have a new event announcement!</p>
        </div>
        
        <div class="content-section">
            <div class="category-badge">
                {{ $news->category_display ?? 'News Update' }}
            </div>
            
            <h2 class="event-title">{{ $news->title }}</h2>
            
            <div class="event-meta">
                <div class="start-date">
                    <i>📅</i> Event Duration: 
                    {{ \Carbon\Carbon::parse($news->start_date)->format('d M Y') }} - 
                    {{ \Carbon\Carbon::parse($news->end_date)->format('d M Y') }}
                </div>
                <strong>Published:</strong> {{ $news->created_at->format('F d, Y') }}
            </div>

            @if($news->image)
                <div class="poster-container">
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="poster-img">
                </div>
            @endif

            @if($news->summary)
                <h3 class="event-details-title">Event Summary</h3>
                <div class="summary-content">{{ strip_tags($news->summary) }}</div>
            @endif

            @if($news->description)
                <h3 class="event-details-title">Event Details</h3>
                <div class="description-content">{{ strip_tags($news->description) }}</div>
            @endif

            @if($news->youtube_link)
                <div style="text-align: center; margin: 25px 0;">
                    <a href="https://www.youtube.com/embed/{{ $news->youtube_link }}" class="youtube-link">
                        🎥 Watch on YouTube
                    </a>
                </div>
            @endif
        </div>
        
        <div class="footer">
            <p><strong>This email was sent from our News Broadcasting System.</strong></p>
            <p>Stay updated with the latest events and announcements from our organization.</p>
            <p>If you no longer wish to receive these emails, please contact your administrator.</p>
        </div>
    </div>
</body>
</html>