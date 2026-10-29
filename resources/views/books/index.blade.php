
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Reading List</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f9; margin: 0; padding: 30px; color: #222; }
        .container { max-width: 900px; margin: auto; }
        h1 { color: #5936a5; }
        .btn { display: inline-block; background: #5936a5; color: white; padding: 10px 15px; border-radius: 6px; text-decoration: none; border: 0; cursor: pointer; }
        .book { background: white; padding: 18px; margin: 14px 0; border-radius: 8px; box-shadow: 0 2px 6px #ddd; }
        .muted { color: #666; }
        select { padding: 9px; border-radius: 5px; }
        .success { color: #18733b; }
        .actions { display: flex; gap: 12px; align-items: center; margin-top: 12px; }
        .delete { background: #b42318; }
    </style>
</head>
<body>
<div class="container">
    <h1>📚 My Reading List</h1>
    <p class="muted">Keep track of the books you want to read and have finished.</p>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <a class="btn" href="{{ route('books.create') }}">+ Add a Book</a>

    <form method="GET" action="{{ route('books.index') }}" style="margin-top:20px">
        <label for="status">Filter by status: </label>
        <select name="status" id="status" onchange="this.form.submit()">
            <option value="">All books</option>
            <option value="to-read" {{ request('status') == 'to-read' ? 'selected' : '' }}>To Read</option>
            <option value="reading" {{ request('status') == 'reading' ? 'selected' : '' }}>Reading</option>
            <option value="finished" {{ request('status') == 'finished' ? 'selected' : '' }}>Finished</option>
        </select>
    </form>

    @forelse($books as $book)
        <div class="book">
            <h2>{{ $book->title }}</h2>
            <p>Author: {{ $book->author }}</p>
            <p>Status: <strong>{{ ucfirst(str_replace('-', ' ', $book->status)) }}</strong></p>
            @if($book->notes)
                <p>{{ $book->notes }}</p>
            @endif
            <div class="actions">
                <a class="btn" href="{{ route('books.edit', $book) }}">Edit</a>
                <form method="POST" action="{{ route('books.destroy', $book) }}" onsubmit="return confirm('Delete this book?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn delete" type="submit">Delete</button>
                </form>
            </div>
        </div>
    @empty
       <p style="margin-top:25px">
    @if(request('status'))
        No books found with this status. Try another filter.
    @else
        No books yet. Click "Add a Book" to get started.
    @endif
</p>
    @endforelse
</div>
</body>
</html>

