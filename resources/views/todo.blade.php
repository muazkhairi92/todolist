<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
</head>
<body>
    <h1>To-Do List</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('todo.create') }}" method="POST">
        @csrf
        <label for="list">New Item:</label>
        <input type="text" id="list" name="list" required>
        <button type="submit">Add</button>
    </form>

    <ul>
        @foreach ($todos as $index => $todo)
            <li>{{ $todo }}
                    @csrf
                    <input type="hidden" name="index" value="{{ $index }}">
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
