<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <!-- Mensaje de bienvenida -->
                <div class="text-gray-900 mb-4">
                    {{ __("You're logged in!") }}
                </div>

                <!-- Botón profesional para ir a lista de usuarios -->
                <a href="{{ route('users.index') }}" 
                   class="inline-block px-4 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition">
                    Ver Usuarios
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
