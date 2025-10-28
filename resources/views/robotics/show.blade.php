@extends('layouts.app')

@section('content')

    <h1>{{ $kit->name }}</h1>
    <p>ID: {{ $kit->id }}</p>
    <a href="{{ route('robotics.edit', $kit->id) }}">Edit</a>
    <hr>
    
    <h2>Course attached</h2>
    <ul>
        @forelse($kit->courses as $course)
            <li>{{ $course->course_name ?? $course->name }}</li> {{-- Asegúrate de usar el nombre correcto de la columna --}}
        @empty
            <li>No courses attached</li>
        @endforelse
    </ul>
    
    <form action="{{ route('robotics.destroy', $kit->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
        @csrf
        @method('delete')
        <input type="submit" value="Delete" />
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