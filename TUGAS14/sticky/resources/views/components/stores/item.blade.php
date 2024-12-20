

<x-card>
                <x-card.header>
                    <x-card.title>{{ $store->name }}</x-card.title>
                    <x-card.description>
                        Created at {{ $store->created_at->format('d F Y') }}
                        @if(!request()->routeIs('stores.mine'))
                            by {{ $store->user->name }}
                        @endif
                    </x-card.description>
                </x-card.header>

               <x-card.content>

               <section>

        <p class="mb-6">
        {{ str($store->description)->limit() }}
        </p>

        <p class="text-yellow-500 text-sm">
        {{ $store->products_count }} {{ str('product')->plural($store->products_count) }}
        </p>

        
    @if(isset($isAdmin))
    @if($store->status == \App\Enums\StoreStatus::PENDING)


    <x-primary-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'modal-{{ $store->id }}')"
    >
    Approve 
    </x-primary-button>


    <x-modal name="modal-{{ $store->id }}" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('stores.approve', $store) }}" class="p-6">
            @csrf
            @method('put')

            <h2 class="text-lg font-medium text-gray-900">
                {{ $store->name }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ $store->description }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ml-3">
                    {{ __('Approve') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
    @endif
    @endif
</section>


               </x-card.content> 
            </x-card>