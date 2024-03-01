<div >
    @if($showItemModel)
        <x-jet-dialog-modal wire:model="showItemModel" maxWidth='7xl'>
        <x-slot name="title">
            {{ __('Informations d\'article') }} 
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">

                
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Image de l\'article') }}</div>
                        <img 
                        class="h-56 inline-block w-full object-cover object-top justify-center"
                        src="{{ asset($item->image) }}" 
                        alt="">
                    </div>
                </div>

                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Titre') }}</div>
                        <div class=" text-sm font-bold z-10 ">{{ $item->title }}</div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Author') }}</div>
                        <div class=" text-sm font-bold z-10 ">{{ $item->user->name }}</div>
                    </div>
                </div>

                <div class="col-span-1 md:col-span-2 lg:col-span-6">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Contenu') }}</div>
                        <div class=" text-sm font-bold z-10 ">{!! $item->body !!}</div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Extrait') }}</div>
                        <div class=" text-sm font-bold z-10 ">{{ $item->excerpt }}</div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Slug') }}</div>
                        <div class=" text-sm font-bold z-10 ">{{ $item->slug }}</div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Catégorie') }}</div>
                        <div class=" text-sm font-bold z-10 ">{{ $item->category->name }}</div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Status') }}</div>
                        <div
                        class="inline-flex items-center gap-1 rounded-full px-2 py-1 text-xs font-semibold 
                        {{ $item->status === 'Publié' ? 'text-green-600 bg-green-50' : ($item->status === 'Brouillon' ? 'text-yellow-600 bg-yellow-50' : 'text-red-600 bg-red-50') }}"
                      >
                        {{ $item->status }}
                      </div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Meta Description') }}</div>
                        <div class=" text-sm font-bold z-10 ">{{ $item->meta_description ? $item->meta_description : '-' }}</div>
                    </div>
                </div>
                {{-- <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Tags') }}</div>
                        <div class=" text-sm font-bold z-10 ">{{ $item->tags ? $item->tags : '-' }}</div>
                    </div>
                </div> --}}
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('SEO Title') }}</div>
                        <div class=" text-sm font-bold z-10 ">{{ $item->seo_title ? $item->seo_title : '-' }}</div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Nbr de vues') }}</div>
                        <div class=" text-sm font-bold z-10 ">{{ $item->total_viewers_count }}</div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Nbr de vues uniques') }}</div>
                        <div class=" text-sm font-bold z-10 ">{{ $item->unique_viewers_count }}</div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Ordre') }}</div>
                        <div class=" text-sm font-bold z-10 ">{{ $item->ordre ? $item->ordre : '-' }}</div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Source') }}</div>
                        <div class=" text-sm font-bold z-10 ">{{ $item->source ? $item->source : '-' }}</div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Lien de la source') }}</div>
                        <div class=" text-sm font-bold z-10 ">{{ $item->source_link ? $item->source_link : '-' }}</div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-2">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Lien de la video') }}</div>
                        <div class=" text-sm font-bold z-10 ">{{ $item->lien_video ? $item->lien_video : '-' }}</div>
                    </div>
                </div>

                

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
