<div class="mt-8">


    <div class="grid grid-cols-1 lg:grid-cols-7 gap-6">

        <div class="lg:col-span-5">
            <div class="flex justify-between mb-2">
                <h1 class="text-lg">
                    Carrito de Compras ({{ Cart::count() }} Productos)
                </h1>

                <button class="font-semibold text-black hover:text-orange-500 underline hover:no-underline"
                    wire:click="destroy()">
                    Limpiar carro
                </button>
            </div>

            <div class="card">
                <ul class="space-y-4">
                    @forelse (Cart::content() as $item)
                        <li class="lg:flex">
                            <img class="w-full lg:w-36 aspect-[12/9] object-cover object-center mr-2"
                                src="{{ $item->options->image }}" alt="">

                            <div class="w-80">
                                <p class="text-sm">
                                    <a href="{{ route('products.show', $item->id) }}">
                                        {{ $item->name }}
                                    </a>
                                </p>

                                <button
                                    class="bg-red-300 hover:bg-red-400 text-red-800 text-xs font-semibold rounded px-2.5 py-0.5"
                                    wire:click="remove('{{ $item->rowId }}')">
                                    <i class="fa-solid fa-xmark"></i>
                                    Eliminar
                                </button>

                            </div>

                            <p>
                                COL$/. {{ $item->price }}
                            </p>

                            <div class="ml-auto space-x-3">
                                <button class="btn btn-gray"
                                    wire:click="decrease('{{ $item->rowId }}')">
                                    -
                                </button>

                                <span class="inline-block w-2 text-center">
                                    {{ $item->qty }}
                                </span>

                                <button class="btn btn-gray"
                                    wire:click="increase('{{ $item->rowId }}')">
                                    +
                                </button>
                            </div>

                        </li>
                    @empty
                        <p class="text-center">
                            No hay productos en elcarrito
                        </p>
                    @endforelse
                </ul>
            </div>

        </div>

        <div class="lg:col-span-2">

            <div class="card">
                <div class="flex justify-between font-semibold mb-2">
                    <p>
                        Total:
                    </p>

                    <p>
                        COL$/. {{ Cart::subtotal() }}
                    </p>
                </div>

                <a href="{{route('shipping.index')}}" class="btn btn-orange block w-full text-center">
                    Continuar compra
                </a>

            </div>

        </div>

    </div>


</div>
