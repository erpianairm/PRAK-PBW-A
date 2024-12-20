<x-app-layout>
    @slot('title', $store->name)



    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $store->name }} 
        </h2>
    </x-slot>

    <x-container>
        
        <div class="grid grid-cols-4 gap-6">
        @foreach ($products as $product)
        <x-card class="relative">
            <a href="{{ route('products.show', [$store, $product]) }}" class="absolute inset-0 size-full"></a>
        <x-card class="p-6">
            <img src="{{ asset('storage/'.$store->logo) }}" alt="{{ $store->name }}" width="100" class="rounded-lg aspect-square">
            <x-card.header>
                <x-card.title>{{ $product->name }}</x-card.title>
                
                <x-card.description>
                    IDR {{ number_format($product->price, 0, ',', '.') }}
                </x-card.description>


           

            </x-card.header>
            </x-card>
            </x-card>
        @endforeach
</div>

    <div class="mt-6">
    {{ $products->links() }}
    </div>
        
    </x-container>

</x-app-layout>
