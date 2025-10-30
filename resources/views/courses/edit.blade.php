
@extends('layouts.app')

@section('content')

    <h1>Edit Course</h1>

    <form action="{{ route('courses.update', $course) }}" method="POST">
        @csrf
        @method('PUT')
    
        <label>Course Key</label>
        <input type="text" name="course_key" value="{{ $course->course_key }}" required><br>
    
        <label>Course Name</label>
        <input type="text" name="course_name" value="{{ $course->course_name }}" required><br>
    
        <label>Robotics Kit</label>
        <select name="robotics_kit_id" required>
            @foreach ($kits as $kit)
                <option value="{{ $kit->id }}" {{ $course->robotics_kit_id == $kit->id ? 'selected' : '' }}>
                    {{ $kit->name }}
                </option>
            @endforeach
        </select><br>
    
        <button type="submit">Update</button>
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
@endsection {{-- 5. Cerramos la sección 'footer' --}}