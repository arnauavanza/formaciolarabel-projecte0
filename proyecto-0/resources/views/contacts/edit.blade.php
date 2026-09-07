<!DOCTYPE html>
<html>
<head>
    <title>Edit contact</title>
</head>
<body>
    <h1>Edit contact</h1>
    <a href="{{ route('contacts.show', $contact) }}">Back</a>

    <form method="POST" action="{{ route('contacts.update', $contact) }}">
        @csrf
        @method('PUT')

        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $contact->name) }}" required>
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $contact->phone) }}">
            @error('phone')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Update</button>
    </form>
</body>
</html>