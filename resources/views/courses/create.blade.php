<h1>Create Course</h1>

<form action="{{ route('courses.store') }}" method="POST">
    @csrf
    <label>Course Key</label>
    <input type="text" name="course_key" required><br>

    <label>Course Name</label>
    <input type="text" name="course_name" required><br>

    <label>Robotics Kit</label>
    <select name="robotics_kit_id" required>
        @foreach ($kits as $kit)
            <option value="{{ $kit->id }}">{{ $kit->name }}</option>
        @endforeach
    </select><br>

    <button type="submit">Create</button>
</form>
