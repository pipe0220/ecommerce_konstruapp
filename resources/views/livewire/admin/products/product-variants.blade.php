<div>
    <section class="rounded-lg border border-gray-100 bg-white shadow-lg">

        <header class="border-b  border-gray-200 px-6 py-2">
            <div class="flex justify-between">
                <h1 class="text-lg font-semibold text-gray-700">
                    Opciones
                </h1>
                <x-button wire:click="$set('openModal',true)">
                    Nuevo
                </x-button>
            </div>
        </header>

        <div class="p-6">

        </div>
    </section>

    <x-dialog-modal wire:model="openModal">
        <x-slot name="title">
            Agregar nueva opción
        </x-slot>

        <x-slot name="content">

        </x-slot>

        <x-slot name="footer">

        </x-slot>
    </x-dialog-modal>

</div>
