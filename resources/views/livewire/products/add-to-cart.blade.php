<x-container>
    <div class="card">

        <div class="grid md:grid-cols-2 gap-6">
            <div class="col-span-1">
                <figure>
                    <img src="{{$product->image}}" class="aspect-[1/1] w-full object-cover object-center" alt="">
                </figure>
            </div>

            <div class="col col-span-1">
                <h1 class="text-xl text-black mb-12">
                    {{$product->name}}
                </h1>

                <div class="flex items-center espace-x-2 mb-6">
                    <ul class="flex space-x-1 text-sm">
                        <li>
                            <i class="fa-solid fa-star text-yellow-500"></i>
                        </li>
                        <li>
                            <i class="fa-solid fa-star text-yellow-500"></i>
                        </li>
                        <li>
                            <i class="fa-solid fa-star text-yellow-500"></i>
                        </li>
                        <li>
                            <i class="fa-solid fa-star text-yellow-500"></i>
                        </li>
                        <li>
                            <i class="fa-solid fa-star text-yellow-500"></i>
                        </li>

                        <p class="text-sm text-black">4.7 (55)</p>
                    </ul>

                </div>

                <p class="font-semibold text-2xl text-black mb-4">
                    COL$/{{$product->price}}
                </p>

                <div class="flex items-center space-x-6 mb-6"
                    x-data="{
                        qty: @entangle('qty'),
                    }">

                    <button class="btn btn-gray"
                        x-on:click="qty = qty - 1"
                        x-bind:disabled="qty == 1">
                        -
                    </button>

                    <span x-text="qty" class="inline-block w-2 text-center"></span>

                    <button class="btn btn-gray"
                        x-on:click="qty = qty + 1">
                        +
                    </button>
                </div>

                <button class="btn btn-orange w-full mb-6"
                    wire:click="add_to_cart"
                    wire:loading.attr="disabled">
                    Agregar al carrito
                </button>

                <div class="mb-4 text-sm">
                    {{$product->description}}
                </div>

                <div class="text-black flex items-center space-x-4">
                    <i class="fa fasolid fa-truck-fast text-2xl"></i>

                    <p>Envio para tu domicilio</p>
                </div>

            </div>
        </div>

    </div>

</x-container>
