<h1>Robotics Kits</h1>

<form action="{{ route('robotics-kits.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <input type="submit"  value="Create">Add Kit</input>

</form>
