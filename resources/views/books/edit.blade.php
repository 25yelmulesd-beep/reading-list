
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit a Book</title>
    <style>
        body { font-family: Arial; background: #f4f4f9; padding: 30px; }
        .container { max-width: 600px; margin: auto; background: white; padding: 25px; border-radius: 10px; }
        input, select, textarea { width: 100%; box-sizing: border-box; padding: 11px; margin: 8px 0 18px; }
        button, .btn { background: #5936a5; color: white; padding: 10px 16px; border: 0; border-radius: 5px; text-decoration: none; cursor: pointer; }
        .error { color: #b42318; }
    </style>
</head>
<body>
<div class="container">
    <h1>Edit Book</h1>

    @if($errors->any())
        <ul class="error">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('books.update', $book) }}">
        @csrf
        @method('PUT')

        <label>Book title</label>
        <input name="title" value="{{ old('title', $book->title) }}" placeholder="Enter book title" required>
        <label>Author</label>
       <input name="author" value="{{ old('author', $book->author) }}" placeholder="Enter author name" required>

        <label>Status</label>
        <select name="status" required>
            <option value="to-read" {{ old('status', $book->status) == 'to-read' ? 'selected' : '' }}>To Read</option>
            <option value="reading" {{ old('status', $book->status) == 'reading' ? 'selected' : '' }}>Reading</option>
            <option value="finished" {{ old('status', $book->status) == 'finished' ? 'selected' : '' }}>Finished</option>
        </select>

        <label>Notes (optional)</label>
        <textarea name="notes" rows="4">{{ old('notes', $book->notes) }}</textarea>

        <button type="submit">Update Book</button>
        <a class="btn" href="{{ route('books.index') }}">Cancel</a>
    </form>
</div>
</body>
</html>

