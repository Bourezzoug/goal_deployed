<div>
    @if($showItemModel)
        <x-jet-dialog-modal wire:model="showItemModel">
        <x-slot name="title">
            {{ __('Informations du bannière') }} 
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">



                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="relative p-3 bg-gray-100 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('name') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->titre }}</div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="relative p-3 bg-gray-100 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Lien') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->lien }}</div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-6">
                    <div class="relative p-3 bg-gray-100 text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Image de l\'article') }}</div>
                        <img 
                        class="h-56 inline-block w-full object-cover object-top justify-center"
                        src="{{ asset($item->image) }}" 
                        alt="">
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="relative p-3 bg-gray-100  text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('Position') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->position }} </div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="relative p-3 bg-gray-100  text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('Campagne') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->campagne->Libelle }} </div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="relative p-3 bg-gray-100  text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('Nb click') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->nb_total_click }}</div>
                    </div>
                </div>

                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="relative p-3 bg-gray-100  text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('Nb vue') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->nb_total_vues }}</div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="relative p-3 bg-gray-100  text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('Nb click unique') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->nb_unique_click }}</div>
                    </div>
                </div>

                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="relative p-3 bg-gray-100  text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('Nb vue unique') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->nb_unique_vues }}</div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="relative p-3 bg-gray-100  text-gray-800 dark:text-gray-200 rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('Plannification') }}</div>
                        <div class=" text-sm font-bold z-10">
                            @php
                            $plannifications = explode(',', $item->plannification);
                        @endphp
                        @foreach($plannifications as $index => $plannification)
                            <div>
                                {{ __('date ') }}{{ $index+1 }} : {{ date('d/m/Y', strtotime(trim($plannification))) }}
                            </div>
                        @endforeach
                        </div>
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
