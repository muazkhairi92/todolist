<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <script>
        window.addEventListener('beforeunload', function() {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "{{ route('clear_flag') }}", false);
            xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            xhr.send(JSON.stringify({}));
        });
    </script>
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
