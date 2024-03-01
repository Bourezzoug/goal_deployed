<div wire:init="loadItems">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>
        <!-- component -->
        <div class="m-5">
            
                @can('create', \App\Models\Post::class)
                <x-jet-button 
                class="text-white rounded-lg">
                
                <a href="{{ Route('admin.post.create') }}" class="flex items-center">
                    <x-svg.svg-plus class="w-5 h-5"/>{{ __('Ajouter') }}</a>
                </x-jet-button>
                @endcan
                @can('deleteAll' , \App\Models\Post::class)
            <x-jet-button wire:click.prevent="deleteSelected" onclick="confirm('Vous êtes sure?') || event.stopImmediatePropagation()"
            class="text-white rounded-lg " id="deleteButton">
            <x-svg.svg-delete class="w-5 h-5"/>
                {{ __('Supprimer') }}
            </x-jet-button>
            @endcan
            </div>
            <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
            <div class="flex items-center px-2 py-4">
        
            <div class="col-span-3 md:col-span-2 lg:col-span-1 mr-3">
                <x-jet-label class="text-xs" for="select" value="{{ __('Afficher par page') }}"/>
                <x-select wire:model="perPage" class="mt-1">
                <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                </x-select>
            </div>
        
            <div class="col-span-3 md:col-span-2 lg:col-span-1 mr-3">
                <x-jet-label class="text-xs" for="select" value="{{ __('SortBy') }}"/>
                <x-select wire:model="sortBy" class="mt-1">
                    <option value="asc">{{ __('ASC') }}</option>
                    <option value="desc">{{ __('DESC') }}</option>
                </x-select>
              </div>
            <div class="col-span-3 md:col-span-2 lg:col-span-1 mr-3">
                <x-jet-label class="text-xs" for="select" value="{{ __('SortBy Catégorie') }}"/>
                <x-select wire:model="categories" class="mt-1">
                    <option value="" readonly="true" hidden="true"
                            selected>{{ __('Catégorie') }}</option>
                    @forelse($categorie as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @empty
                    @endforelse
                </x-select>
              </div>
        
              <div class="col-span-3 md:col-span-2 lg:col-span-2">
                <x-jet-label class="text-xs" for="search" value="{{ __('Chercher') }}"/>
                <x-jet-input wire:model="term" id="search" type="text" class="block w-full mt-1"
                            autocomplete="off"/>
            </div>
        
            </div>
            <div class="overflow-x-auto w-full">
            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                        <input type="checkbox" class="bg-neutral-50 border-neutral-200 mr-3" wire:model="selecteAll">
                    </th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Image de l'article</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Date de création</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Catégorie</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nbr de vues</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Source</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100" id="sortable-table">
        
        
                @forelse ($posts as $post)
                {{-- @unless(Auth::user()->id === $user->id) --}}
        
                <tr class="hover:bg-gray-50 draggable-row" data-post-id="{{ $post->id }}" wire:key="post-{{ $post->id }}">
                    <td class="px-6 py-4">
                        <input type="checkbox" wire:model="selectedPosts" value="{{ $post->id }}" class="bg-neutral-50 border-neutral-200 childCheckbox">
                    </td>
                <td class="px-6 py-4">
                    <span
                    class="inline-flex items-center gap-1 rounded-full bg-indigo-50 w-80 px-2 py-1 text-md font-semibold text-indigo-600"
                    >
                    <span class="h-1.5 w-1.5 rounded-full bg-indigo-600"></span>
                    {{ $post->title }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <div class="w-32 h-32">
                        <img 
                        class="h-full inline-block w-full object-cover object-center"
                        src="{{ asset($post->image) }}" 
                        alt="">
                    </div>
                </td>

                <td class="px-6 py-4">
                    <div class="flex gap-2">
                    <span
                        class="inline-flex items-center gap-1 w-32 rounded-full bg-indigo-50 px-2 py-1 text-xs font-semibold text-indigo-600"
                    >
                    {{ date('D jS M Y',strtotime($post->created_at)) }} 
                    </span>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        @if ($post->category_id)
                            <span class="inline-flex items-center gap-1 rounded-full bg-indigo-50 px-2 py-1 text-xs font-semibold text-indigo-600">
                                {{ $post->category->name }}
                            </span>
                        @else
                            <span class="text-xs text-gray-500">No category</span>
                        @endif
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                    <span
                        class="inline-flex items-center gap-1 rounded-full bg-indigo-50 px-2 py-1 text-xs font-semibold text-indigo-600"
                    >
                    

                    <span class="inline-flex items-center gap-1 rounded-full bg-indigo-50 px-2 py-1 text-xs font-semibold text-indigo-600">

                        {{ $post->unique_viewers_count }}

                    </span>



                    </span>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                    <span
                        class="inline-flex items-center gap-1 rounded-full bg-indigo-50 px-2 py-1 text-xs font-semibold text-indigo-600"
                    >
                    {{ $post->source }}



                    </span>
                    </div>
                </td>
                <td class="px-6 py-4">
        
                    <div class="flex gap-4">
                        @can('update', $post)
                        <a class="cursor-pointer" wire:click="selectedItem('update',{{ $post->id }})"
                                    class="px-2">
                            <x-svg.svg-update class="w-5 h-5 mr-2 transform hover:text-purple-500 hover:scale-110"/>
                        </a>
                        @endcan
        
        
        
                    @can('view', $post)
                        <div class="cursor-pointer" wire:click="selectedItem('show',{{ $post->id }})"
                                    class="px-2">
                            <x-svg.svg-show class="w-5 h-5 mr-2 transform hover:text-purple-500 hover:scale-110"/>
                        </div>
                    @endcan
        
                    @can('delete', $post)
                        <div class="cursor-pointer" wire:click="selectedItem('delete',{{ $post->id }})"
                                    class="px-2">
                            <x-svg.svg-delete class="w-5 h-5 mr-2 transform hover:text-purple-500 hover:scale-110"/>
                        </div>
                    @endcan
                    
                    </div>
                </td>
                </tr>
                @empty
                    
                @endforelse
        
            </tbody>
            </table>
            </div>
            @if(!empty($posts))
            <div class="px-4 py-3 border-t bg-gray-50">
                {{ $posts->links() }}
            </div>
            @endif
            </div>
        <livewire:admin.post.post-show />
        {{-- <livewire:admin.post.post-create  /> --}}
        <livewire:admin.post.post-update />
        <livewire:admin.post.post-delete />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
        <script>
            // sortable.js
            // sortable.js
            document.addEventListener('livewire:load', function () {
                const sortableTable = document.getElementById('sortable-table');
                const sortable = new Sortable(sortableTable, {
                    handle: '.draggable-row',
                    animation: 150,
                    onEnd: function (event) {
                        console.log(event); // Check the 'event' object in the console
                        const item = event.item;
                        const postId = item.dataset.postId;
                        const newPosition = event.newIndex + 1; // +1 because order starts from 1

                        // Send the updated order to the Livewire component
                        window.livewire.emit('updatePostOrder', postId, newPosition);
                        console.log(postId, newPosition);
                    },
                });
            });

        </script>

        
</div>