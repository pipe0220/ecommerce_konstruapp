<x-container>
    <div class="card">

        <div class="grid md:grid-cols-2 gap-6">
            <div class="col-span-1">
                <figure>
                    <img src="{{ $this->variant->image }}" class="aspect-[1/1] w-full object-cover object-center" alt="">
                </figure>
            </div>

            <div class="col col-span-1">
                <h1 class="text-xl text-black mb-12">
                    {{ $product->name }}
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
                    COL$/{{ $product->price }}
                </p>

                <div class="flex items-center space-x-6 mb-6" x-data="{
                    qty: @entangle('qty'),
                }">

                    <button class="btn btn-gray" x-on:click="qty = qty - 1" x-bind:disabled="qty == 1">
                        -
                    </button>

                    <span x-text="qty" class="inline-block w-2 text-center"></span>

                    <button class="btn btn-gray" x-on:click="qty = qty + 1">
                        +
                    </button>
                </div>

                <div class="flex flex-wrap">
                    @foreach ($product->options as $option)
                        <div class="mr-4 mb-4">
                            <p class="font font-semibold text-lg mb-2">
                                {{ $option->name }}
                            </p>

                            <ul class="flex items-center space-x-4">
                                @foreach ($option->pivot->features as $feature)
                                    <li>

                                        <@switch($option->type)
                                                @case(1)
                                                    <button
                                                        class="w-20 h-8font-semibold uppercase text-sm rounded-lg {{ $selectedFeatures[$option->id] == $feature['id'] ? 'bg-orange-500 text-white' : 'border border-gray-200 text-black' }} "
                                                        wire:click="$set('selectedFeatures.{{ $option->id }}', {{ $feature['id'] }})">

                                                        {{ $feature['value'] }}
                                                    </button>
                                                    @break
                                                @case(2)
                                                    <div class="p-0.5 border-2 rounded-lg flex items-center -mt-1.5 {{ $selectedFeatures[$option->id] == $feature['id'] ? 'border-orange-500' : 'border-transparent'}}">
                                                        <button class="w-20 h-8 rounded-lg border border-gray-200"
                                                            wire:click="$set('selectedFeatures.{{ $option->id }}', {{ $feature['id'] }})"
                                                            style="background-color: {{$feature['value']}}">
                                                        </button>
                                                    </div>
                                                    @break
                                                @default
                                            @endswitch

                                    </li>
                                @endforeach
                            </ul>

                        </div>
                    @endforeach

                </div>

                <button class="btn btn-orange w-full mb-6"
                    x-wire:click="add_to_cart"
                    wire:loading.attr="disabled">
                    Agregar al carrito
                </button>

                <div class="mb-4 text-sm">
                    {{ $product->description }}
                </div>

                <div class="text-black flex items-center space-x-4">
                    <i class="fa fasolid fa-truck-fast text-2xl"></i>

                    <p>Envio para tu domicilio</p>
                </div>

            </div>
        </div>

    </div>

</x-container>
