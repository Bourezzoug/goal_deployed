<div>
    @if($showItemModel)
        <x-jet-dialog-modal wire:model="showItemModel">
        <x-slot name="title">
            {{ __('Informations d\'utilisateur') }} 
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">



                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="relative p-3 bg-gray-100 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('name') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->Libelle }}</div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="relative p-3 bg-gray-100  text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('Date Début') }}</div>
                        <div class=" text-sm font-bold z-10">{{ date('D jS M Y',strtotime($item->date_debut)) }} </div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="relative p-3 bg-gray-100  text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('Date fin') }}</div>
                        <div class=" text-sm font-bold z-10">{{ date('D jS M Y',strtotime($item->date_fin)) }} </div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="relative p-3 bg-gray-100 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Status') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->Status ? 'Oui' : 'Non' }}</div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="relative p-3 bg-gray-100 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Nom Complet') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->client->nom . ' ' . $item->client->prenom }}</div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="relative p-3 bg-gray-100  text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('created_at') }}</div>
                        <div class=" text-sm font-bold z-10">{{ date('D jS M Y',strtotime($item->created_at)) }} </div>
                    </div>
                </div>

                @if($item->created_at != $item->updated_at)
                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <div class="relative p-3 bg-gray-100  text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                            <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('updated_at') }}</div>
                            <div class=" text-sm font-bold z-10">{{ $item->updated_at }}</div>
                        </div>
                    </div>
                @endif

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="closeItemModel" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

        </x-slot>

    </x-jet-dialog-modal>
    @endif

</div>
