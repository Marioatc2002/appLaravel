@extends('layouts.app')

@section('content')

    <h1>Robotics Kits</h1>

    <form action="{{ route('robotics-kits.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    
    
        <label>Image</label>
        <input type="file" name="image" required/>
        <input type="submit" value="Create" />
    
    </form>

@endsection

@section('footer')
    <footer>
        <p>
            Unam RoboticaCursos Todos los derechos reservados &copy; 
        </p>
        <div>
            <h2>Redes sociales</h2>
            <ul>
                <li><a href="https://www.facebook.com/unamrobotica">Facebook</a></li>
                <li><a href="https://twitter.com/unamrobotica">Twitter</a></li>
                <li><a href="https://www.instagram.com/unamrobotica">Instagram</a></li>
            </ul>
        </div>
    </footer>
@endsection