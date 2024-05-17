<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        h1 {
            text-align: center;
            color: #333333;
        }

        form {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        label {
            flex: 1;
            margin-right: 10px;
        }

        input[type="text"] {
            flex: 3;
            padding: 8px;
            border: 1px solid #cccccc;
            border-radius: 4px;
        }

        button {
            flex: 1;
            padding: 8px;
            background-color: #000000;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 5px;
        }

        button:hover {
            background-color: #808080;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #f9f9f9;
            margin: 5px 0;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #cccccc;
        }

        .success {
            color: green;
            text-align: center;
        }

        .error {
            color: red;
            text-align: center;
        }

        .error ul {
            padding: 0;
            list-style-type: none;
        }
    </style>
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
    <div class="container">
        <h1>To-Do List</h1>

        @if (session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('todo.create') }}" method="POST">
            @csrf
            <label for="list">New Todo:</label>
            <input type="text" id="list" name="list" required>
            <button type="submit">Add</button>
        </form>

        <ul>
            @foreach ($todos as $index => $todo)
                <li>{{ $todo }}</li>
            @endforeach
        </ul>
    </div>
</body>
</html>
