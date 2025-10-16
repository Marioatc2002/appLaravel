<h1>Robotics Kits</h1>
<a href="{{ route('robotics-kits.create') }}">Create New Kit</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kits as $kit)
            <tr>
                <td>{{ $kit->id }}</td>
                <td>{{ $kit->name }}</td>
                <td>{{ $kit->image }}</td>
                <td>
                    <a href="{{ route('robotics-kits.show', $kit->id) }}">view</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

