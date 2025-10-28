{{-- 1. "Llamamos" a la plantilla Padre --}}
@extends('layouts.app')

{{-- 2. "Llenamos" el hueco @yield('content') --}}
@section('content')

    <h1>Courses</h1>
    <a href="{{ route('courses.create') }}">Add New Course</a>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Key</th>
            <th>Name</th>
            <th>Kit</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    
        @foreach ($courses as $course)
        <tr>
            <td>{{ $course->id }}</td>
            <td>{{ $course->course_key }}</td>
            <td>{{ $course->course_name }}</td>
            <td>{{ $course->roboticsKit->name ?? 'Sin kit asignado' }}</td>
            <td>
                @if ($course->image && file_exists(public_path('fotosCourses/' . $course->image)))
                    <img src="{{ asset('fotosCourses/' . $course->image) }}" alt="Imagen del curso" width="100">
                @else
                    <span>Sin imagen</span>
                @endif
            </td>
    
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

@endsection {{-- 3. Cerramos la sección 'content' --}}


{{-- 4. "Llenamos" el hueco @yield('footer') (Como pediste) --}}
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