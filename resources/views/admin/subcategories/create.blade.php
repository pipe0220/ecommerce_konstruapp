<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Subcategorias',
        'route' => route('admin.subcategories.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">

{{--<form action="{{ route('admin.subcategories.store') }}" method="POST">

    @csrf

    <div class="card">

        <x-validation-errors class="mb-4"/>


        <div class="mb-4">
            <x-label class='mb-2'>
                Categorias
            </x-label>
            <x-select name="category_id" class="w-full">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        @selected(old('category_id') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </x-select>
        </div>


        <div class="mb-4">
            <x-label for="name" class="mb-2">
                Nombre
            </x-label>
            <x-input id="name" class="w-full"
                placeholder="Ingrese el nombre de la categoria"
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
    </div>

</form>--}}

    @livewire('admin.subcategories.subcategory-create')


</x-admin-layout>
