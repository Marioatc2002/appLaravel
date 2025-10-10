<h1>Courses</h1>
<a href="{{ route('courses.create') }}">Add New Course</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Key</th>
        <th>Name</th>
        <th>Kit</th>
        <th>Actions</th>
    </tr>

    @foreach ($courses as $course)
    <tr>
        <td>{{ $course->id }}</td>
        <td>{{ $course->course_key }}</td>
        <td>{{ $course->course_name }}</td>
        <td>{{ $course->roboticsKit->name ?? 'Sin kit asignado' }}</td>

        <td>
            <a href="{{ route('courses.edit', $course) }}">Edit</a>
            <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
