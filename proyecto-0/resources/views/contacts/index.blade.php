<!DOCTYPE html>
<html>
<head>
    <title>Contacts</title>
</head>
<body>
    <h1>Contacts</h1>
    <a href="{{ route('contacts.create') }}">New contact</a>

    <ul>
        @forelse ($contacts as $contact)
            <li>
                <a href="{{ route('contacts.show', $contact) }}">
                    {{ $contact->name }} — {{ $contact->phone }}
                </a>
            </li>
        @empty
            <li>No contacts yet.</li>
        @endforelse
    </ul>
</body>
</html>