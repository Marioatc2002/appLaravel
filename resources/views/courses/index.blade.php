
@extends('layouts.app')



@section('content')

    <div class="flex flex-col justify-between items-center mb-4">
        <x-title>Courses</x-title>
        {{-- Botón para "Añadir Nuevo" con estilos de Tailwind --}}
        <a href="{{ route('courses.create') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
            Add New Course
        </a>
    </div>
    

    <x-card>

        <table class="w-full text-sm text-left text-gray-500">
            
            {{-- Encabezados de la tabla con un fondo gris claro --}}
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Key</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Kit</th>
                    <th scope="col" class="px-6 py-3">Image</th>
                    <th scope="col" class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($courses as $course)
                {{-- Cada fila tiene un borde inferior y un hover sutil --}}
                <tr class="bg-white border-b hover:bg-gray-50">
                    
                    {{-- Celda para el ID --}}
                    <td class="px-6 py-4">
                        {{ $course->id }}
                    </td>
                    
                    {{-- Celda para la Key --}}
                    <td class="px-6 py-4">
                        {{ $course->course_key }}
                    </td>
                    
                    {{-- Celda para el Nombre (con texto más oscuro) --}}
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $course->course_name }}
                    </th>
                    
                    {{-- Celda para el Kit --}}
                    <td class="px-6 py-4">
                        {{ $course->roboticsKit->name ?? 'Sin kit asignado' }}
                    </td>
                    
                    {{-- Celda para la Imagen --}}
                    <td class="px-6 py-4">
                        @if ($course->image && file_exists(public_path('fotosCourses/' . $course->image)))
                            {{-- Imagen redondeada y con tamaño fijo --}}
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ asset('fotosCourses/' . $course->image) }}" alt="Imagen del curso">
                        @else
                            {{-- Estilo para el texto "Sin imagen" --}}
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                Sin imagen
                            </span>
                        @endif
                    </td>
                    
                    {{-- Celda para las Acciones (alineada a la derecha) --}}
                    <td class="px-6 py-4 text-right">
                        {{-- Estilos de enlace azul para "Edit" --}}
                        <a href="{{ route('courses.edit', $course) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                        
                        {{-- Reemplazamos style="display:inline" con la clase "inline" y añadimos margen --}}
                        <form action="{{ route('courses.destroy', $course) }}" method="POST" class="inline ml-4">
                            @csrf
                            @method('DELETE')
                            {{-- Estilos de enlace rojo para el botón "Delete" --}}
                            <x-buttons type="submit" class="font-medium text-red-600 hover:underline">
                                Delete
                            </x-buttons>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </x-card>

@endsection {{-- 3. Cerramos la sección 'content' --}}

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
