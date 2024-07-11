<x-admin-layout :breadcrumbs="[
    [
        'name'=> 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name'=> 'Familias',
        'route' => route('admin.families.index'),
    ],
    [
        'name'=> 'Nuevo',
    ]
]">

    <div class="card">

        <form action="{{ route('admin.families.store') }}" method="POST">
            @csrf

            <x-validation-errors class="mb-4"/>

            <div class="mb-4">
                <x-label for="name" class="mb-2">
                    Nombre
                </x-label>
                <x-input id="name" class="w-full"
                    placeholder="Ingrese el nombre de la familia"
                    name="name"
                    value="{{ old('name') }}" />
                @error('name')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <x-button>
                    Guardar
                </x-button>
            </div>

        </form>

    </div>

</x-admin-layout>
