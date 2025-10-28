@extends('layouts.app')

@section('content')

    <h1>Robotics Kits</h1>
    <a href="{{ route('robotics-kits.create') }}">Create New Kit</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kits as $kit)
                <tr>
                    <td>{{ $kit->id }}</td>
                    <td>{{ $kit->name }}</td>
                    <td>{{ $kit->image }}</td>
                    <td>
                        <a href="{{ route('robotics-kits.show', $kit->id) }}">view</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

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