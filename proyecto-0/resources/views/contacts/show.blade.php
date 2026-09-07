<!DOCTYPE html>
<html>
<head>
    <title>{{ $contact->name }}</title>
</head>
<body>
    <h1>{{ $contact->name }}</h1>
    <p>Phone: {{ $contact->phone }}</p>

    <a href="{{ route('contacts.index') }}">Back</a>
    <a href="{{ route('contacts.edit', $contact) }}">Edit</a>
</body>
<form method="POST" action="{{ route('contacts.destroy', $contact) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
</html>