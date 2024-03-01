<div>
    @if($showItemModel)
        <x-jet-dialog-modal wire:model="showItemModel">
        <x-slot name="title">
            {{ __('Informations d\'inscrit') }} 
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">

                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Name') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->nom_complet }}</div>
                    </div>
                </div>


                @if ($item->email == null)
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100  text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('Email') }}</div>
                        <div class=" text-sm font-bold z-10">-</div>
                    </div>
                </div>
                @else
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100  text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('Email') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->email }}</div>
                    </div>
                </div>
                @endif

                @if ($item->telephone == null)
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100  text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('Telephone') }}</div>
                        <div class=" text-sm font-bold z-10">-</div>
                    </div>
                </div>
                @else
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100  text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('Telephone') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->telephone }}</div>
                    </div>
                </div>
                @endif

                @if ($item->ville == null)
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100  text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('Ville') }}</div>
                        <div class=" text-sm font-bold z-10">-</div>
                    </div>
                </div>
                @else
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100  text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('Ville') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->ville }}</div>
                    </div>
                </div>
                @endif
                @if ($item->age == null)
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100  text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('Age') }}</div>
                        <div class=" text-sm font-bold z-10">-</div>
                    </div>
                </div>
                @else
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100  text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('Age') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->age }}</div>
                    </div>
                </div>
                @endif
                @if ($item->conditions == null)
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100  text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('Condition') }}</div>
                        <div class=" text-sm font-bold z-10">-</div>
                    </div>
                </div>
                @else
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100  text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('Condition') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->conditions }}</div>
                    </div>
                </div>
                @endif
                @if ($item->newsgoal == null)
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100  text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('Newsgoal') }}</div>
                        <div class=" text-sm font-bold z-10">-</div>
                    </div>
                </div>
                @else
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100  text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('Newsgoal') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->newsgoal }}</div>
                    </div>
                </div>
                @endif
                @if ($item->newspartenaire == null)
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100  text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('Newspartenaire') }}</div>
                        <div class=" text-sm font-bold z-10">-</div>
                    </div>
                </div>
                @else
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100  text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('Newspartenaire') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->newspartenaire }}</div>
                    </div>
                </div>
                @endif



                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100  text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('created_at') }}</div>
                        <div class=" text-sm font-bold z-10 text-indigo-600">{{ date('D jS M Y',strtotime($item->created_at)) }} </div>
                    </div>
                </div>

                @if($item->created_at != $item->updated_at)
                    <div class="col-span-1 md:col-span-2 lg:col-span-2">
                        <div class="relative p-3 bg-gray-100  text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                            <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('updated_at') }}</div>
                            <div class=" text-sm font-bold z-10 text-indigo-600">{{ date('D jS M Y',strtotime($item->created_at)) }} </div>
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
