<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900 leading-tight">
            Our Products
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Flash Messages -->
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded border border-red-300">
                {{ session('error') }}
            </div>
        @endif
        <!-- Use flex with wrap -->
        <div class="flex flex-wrap -mx-3">
            @foreach($products as $product)
            <div class="sm:w-1/2 md:w-1/2 lg:w-1/2 px-3 mb-6" style='width: 30%;'>

                    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-100 transform transition duration-300 hover:shadow-xl hover:border-blue-300 flex flex-col h-full">
                        
                        <div class="flex-1 flex flex-col justify-between">
                            
                            <h5 class="text-xl font-bold text-gray-900 mb-2 truncate">
                                {{ $product->name }}
                            </h5>
                            
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3 h-14">
                                {{ $product->description }}
                            </p>

                            <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center">
                                
                                <span class="text-2xl text-blue-600 font-extrabold">
                                    ${{ number_format($product->price / 100, 2) }}
                                </span>
                                
                                <a href="{{ route('products.show', $product->id) }}" 
                                   class="px-4 py-2 bg-blue-600 text-sm font-semibold rounded hover:bg-blue-700 transition duration-150 shadow">
                                    Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>
