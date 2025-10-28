@extends('layouts.app')

@section('content')

    <h1>Edit {{ $kit->name }}</h1>
    
    <form action="{{ route('robotics.update', $kit->id) }}" method="POST">
        @csrf
        @method('patch')
        <label>Name *</label>
        <input type="text" name="name" value="{{ $kit->name }}" required />
    
        <input type="submit" value="Update" /> {{-- Cambié "Create" por "Update" --}}
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