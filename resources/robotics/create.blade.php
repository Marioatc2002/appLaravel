<h1>Robotics Kits</h1>

<form action="{{ route('robotics-kits.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>


    <label>Image</label>
    <input type="file" name="image" required/>
    <input type="submit" value="Create" />

</form>
