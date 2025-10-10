<h1>{{ $kit->name }}</h1>
<p>ID: {{ $kit->id }}</p>
<a href="{{ route('robotics.edit', $kit->id) }}">Edit</a>
<hr>

<h2>Course attached</h2>
<ul>
    @forelse($kit->courses as $course)
        <li>{{ $course->name }}</li>
    @empty
        <li>No courses attached</li>
    @endforelse
</ul>

<form action="{{ route('robotics.destroy', $kit->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
    @csrf
    @method('delete')
    <label>Name *</label>
    <input type="submit" value="Delete" />

</form>





