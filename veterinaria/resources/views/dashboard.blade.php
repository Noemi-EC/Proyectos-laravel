<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <div class="flex content-center flex-wrap bg-gray-200 h-48">
                        {{-- nombre de la carpeta.archivo ↓ --}}
                        <a href="{{route('mascota.index')}}">
                            <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                                Administrar Mascotas
                            </button>
                        </a>
                        <a href="{{route('voluntario.index')}}">
                            <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                                Administrar Voluntarios
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
