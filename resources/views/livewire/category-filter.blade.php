<div>
    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="font-semibold text-black uppercase ">{{$category->name}}</h1>
            <div class="grid grid-cols-2 border border-Amber-200 divide-x divide-Amber-200 text-Orange-400">
                <i class="fas fa-border-all p-3 cursor-pointer {{ $view == 'grid' ? 'text-black':''}}" wire:click ="$set('view','grid')"></i>
                <i class="fas fa-th-list p-3 cursor-pointer {{ $view == 'list' ? 'text-black':''}}" wire:click ="$set('view', 'list')"></i>
            </div>
        </div>
    </div>
    <div class=" grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <aside>
            <h2 class="font-semibold text-center mb-2">Subcategorias</h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($category->subcategories as $subcategory)
                    <li class="py-2 text-sm">
                        <a class="cursor-pointer hover:text-Orange-500 capitalize {{ $subcategoria == $subcategory->name ?'text-Orange-500 text-font-semibold':''}}" wire:click="$set('subcategoria','{{$subcategory->name}}')">
                            {{ $subcategory->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
            
            <h2 class="font-semibold text-center mt-4 mb-2">Marcas</h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($category->brands as $brand)
                    <li class="py-2 text-sm">
                        <a class="cursor-pointer hover:text-Orange-500 capitalize {{ $marca == $brand->name ? 'text-Orange-500 text-font-semibold':''}}" wire:click="$set('marca','{{$brand->name}}')">
                            {{ $brand->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
            <x-jet-button class="mt-4" wire:click="limpiar">
                Eliminar filtros
            </x-jet-button>
        </aside>
        <div class="md:col-span-2 lg:col-span-4">
            @if ($view == 'grid')
                <ul class="grid grid:cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($products as $product)
                        <li class="bg-white rounded-lg shadow">
                            <article>
                                <figure>
                                    <img class="h-48 w-56 object-cover object-center" src="{{ Storage::url($product->images->first()->url)}}" alt="">
                                </figure>
                                <div class="py-4 px-6">
                                    <h1 class="text-lg font-semibold">
                                        <a href="{{ route('products.show', $product)}}">
                                            {{Str::limit($product->name,20)}}
                                        </a>
                                    </h1>
                                    <p class="font-bold text-black">
                                        BS {{$product->price}}
                                    </p>
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul>
            @else
                <ul>
                    @foreach ($products as $product)
                        <li class="bg-white rounded-lg shadow mb-6">
                            <article class="flex">
                                <figure>
                                    <img class="h-48 w-56 object-cover object-center" src="{{ Storage::url($product->images->first()->url)}}" alt="">
                                </figure>
                                <div class="flex-1 py-4 px-6 flex flex-col">
                                    <div class="flex justify-between">
                                        <div>
                                            <h1 class="text-lg text-black">{{$product->name}}</h1>
                                            <p class=" text-black">Bs {{$product->price}}</p>
                                        </div>
                                        <div class="flex items-center">
                                            <ul class="flex text-sm">
                                                <li>
                                                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                                                </li>
                                                <li>
                                                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                                                </li>
                                                <li>
                                                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                                                </li>
                                                <li>
                                                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                                                </li>
                                                <li>
                                                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                                                </li>
                                            </ul>
                                            <span class="text-black text-sm">(24)</span>
                                        </div>
                                        
                                    </div>
                                    <div class="mt-auto mb-3">
                                        <x-danger-enlace href="{{route('products.show', $product)}}"> Mas informacion

                                        </x-danger-enlace>

                                    </div>
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul>
            @endif
            <div class="mt-4">
                {{$products->links()}}
            </div>
        </div>
    </div>
</div>
