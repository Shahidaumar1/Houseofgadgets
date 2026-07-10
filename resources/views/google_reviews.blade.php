<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Reviews</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .review-container { max-width: 600px; margin: 20px auto; }
        .review-card { border: 1px solid #ddd; padding: 10px; margin: 10px 0; border-radius: 5px; }
        .review-author { font-weight: bold; color: #333; }
        .review-rating { color: #f39c12; }
    </style>
</head>
<body>
    <div class="review-container">
        <h1>Google Reviews</h1>

        @if(isset($reviews['result']))
            <h2>{{ $reviews['result']['name'] }}</h2>
            <p>Overall Rating: {{ $reviews['result']['rating'] }}</p>

            @foreach($reviews['result']['reviews'] ?? [] as $review)
                <div class="review-card">
                    <p class="review-author">{{ $review['author_name'] }}</p>
                    <p class="review-rating">Rating: {{ $review['rating'] }} ⭐</p>
                    <p>{{ $review['text'] }}</p>
                </div>
            @endforeach
        @else
            <p>No reviews found.</p>
        @endif
    </div>
</body>
</html>
