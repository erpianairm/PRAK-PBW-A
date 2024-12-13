<x-app-layout>
    @slot('title', 'Home')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    
        <x-container>

        <div class="bg-stone-100 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    {{ __("You're logged in!") }}
                </div>
            </div>

        </x-container>
           
    </div>
</x-app-layout>
