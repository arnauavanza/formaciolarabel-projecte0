<!DOCTYPE html>
<html>
<head>
    <title>New contact</title>
</head>
<body>
    <h1>New contact</h1>
    <a href="{{ route('contacts.index') }}">Back to list</a>

    <form method="POST" action="{{ route('contacts.store') }}">
        @csrf

        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Phone</label>
            <input type="text" name="phone" value="{{ old('phone') }}">
            @error('phone')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Save</button>
    </form>
</body>
</html>