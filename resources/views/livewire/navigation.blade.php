<div x-data="{open: false,}">

    <header class="bg-black">

        <x-container class="px-4 py-4">
            <div class="flex justify-between items-center space-x-8">

                <button class="text-xl md:text-3xl" x-on:click="open = true">
                    <i class="fas fa-bars text-white"></i>
                </button>

                <h1 class="text-white flex items-center">
                    <img src="{{ asset('img/logo app.png') }}" alt="KonstruApp Logo" class="w-10 h-10 mr-2">
                    <a href="/" class="inline-flex flex-col items-start">
                        <span class="text-xl md:text-3xl leading-4 md:leading-6 font-semibold">
                            KonstruApp
                        </span>
                        <span class="text-xs">
                            Tienda online
                        </span>
                    </a>
                </h1>
                <div class="flex-1 hidden md:block ">
                    <x-input oninput="search(this.value)" class="w-full" placeholder="Buscar por producto, tienda o marca"/>
                </div>

                <div class="flex items-center space-x-4 md:space-x-8">

                    <x-dropdown>

                        <x-slot name="trigger">

                            @auth
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <button class="text-xl md:text-3xl">
                                    <i class="fas fa-user text-white"></i>
                                </button>
                            @endauth

                        </x-slot>

                        <x-slot name="content">

                            @guest

                                <div class="px-4 py-2">

                                    <div class="flex justify-center">

                                        <a href="{{route('login')}}" class="btn btn-orange">
                                            Iniciar sesión
                                        </a>

                                    </div>

                                    <p class="text-sm text-center mt-2">
                                        ¿No tienes cuenta? <a href="{{route('register')}}" class="text-orange-500 hover:underline">Registrate</a>
                                    </p>

                                </div>

                            @else

                                <x-dropdown-link href="{{route('profile.show')}}">
                                    Mi perfil
                                </x-dropdown-link>

                                <div class="border-t border-gray-200"></div>

                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}"
                                            @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>

                            @endguest
                        </x-slot>

                    </x-dropdown>

                    <a href="{{route('cart.index')}}" class="relative">
                        <i class="fas fa-shopping-cart text-white text-xl md:text-3xl"></i>

                        <span
                            id="cart-count"
                            class="absolute -top-2 -end-4 inline-flex items-center justify-center w-6 h-6 bg-red-600 rounded-full text-xs font-bold text-white ">
                            {{Cart::instance('shopping')->count()}}
                        </span>
                    </a>
                </div>
            </div>

            <div class="mb-4 md:hidden">
                <x-input oninput="search(this.value)" class="w-full" placeholder="Buscar por producto, tienda o marca"/>
            </div>
        </x-container>
    </header>

    <div x-show="open" x-on:click="open = false" style="display: none" class="fixed top-0 left-0 inset-0 bg-black bg-opacity-25 z-10"></div>

    <div x-show="open" style="display: none" class="fixed top-0 left-0 z-20">
        <div class="flex">

            <div class="w-screen md:w-80 h-screen bg-white">
                <div class="bg-gray-800 px-4 py-3 text-white font-semibold">
                    <div class="flex justify-between items-center">
                        <span class="text-lg">
                            Categorias
                        </span>

                        <button x-on:click="open = false">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="h-[calc(100vh-52px)] overflow-auto">
                    <ul>

                        @foreach ($families as $family)

                            <li wire:mouseover="$set('family_id', {{$family->id}})">
                                <a href="{{route('families.show', $family)}}"
                                    class="flex items-center justify-between px-4 py-4 text-black hover:bg-orange-400">
                                    {{ $family->name }}

                                    <i class="fa-solid fa-angle-right"></i>
                                </a>
                            </li>

                        @endforeach

                    </ul>
                </div>

            </div>

            <div class="w-80 xl:w-[57rem] pt-[52px] hidden md:block">
                <div class="bg-white h-[calc(100vh-52px)] overflow-auto px-6 py-8">

                    <div class="mb-8 flex justify-between items-center">

                        <p class="border-b-[3px] border-orange-500 uppercase text-xl font-semibold pb-1">
                            {{$this->familyName}}
                        </p>

                        <a href="" class="btn btn-orange">
                            Ver todo
                        </a>

                    </div>

                    <ul class="grid  grid-clos-1 xl:grid-cols-3 gap-8">

                        @foreach ($this->categories as $category)

                            <li>
                                <a href="{{route('categories.show',$category)}}" class="text-black font-semibold text-lg">
                                    {{$category->name}}
                                </a>

                                <ul class="mt-4 space-y-2">

                                    @foreach ($category->subcategories as $subcategory)
                                        <li>
                                            <a href="{{route('subcategories.show', $subcategory)}}" class=" text-sm text-black hover:text-orange-600">
                                                {{$subcategory->name}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>

    @push('js')

        <script>

            Livewire.on('cartUpdated', (count) =>{
                document.getElementById('cart-count').innerText = count;
            })

            function search(value){
                Livewire.dispatch('search', {
                    search: value
                })
            }

        </script>
    @endpush

</div>
