<div wire:init="loadItems">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Botola Pro') }}
        </h2>
    </x-slot>
    <!-- component -->
    <div class="m-5">
      <x-jet-button wire:click="selectedItem('create',null)"
          class="text-white rounded-lg">
          <x-svg.svg-plus class="w-5 h-5"/>
          {{ __('Ajouter') }}
      </x-jet-button>
      <x-jet-button wire:click.prevent="deleteSelected" onclick="confirm('Vous êtes sure?') || event.stopImmediatePropagation()"
      class="text-white rounded-lg " id="deleteButton">
        <x-svg.svg-delete class="w-5 h-5"/>
        {{ __('Supprimer') }}
      </x-jet-button>
    </div>

<div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
    <div class="flex items-center px-2 py-4">

        <div class="col-span-3 md:col-span-2 lg:col-span-1 mr-5">
        <x-jet-label class="text-xs" for="select" value="{{ __('Afficher par page') }}"/>
        <x-select wire:model="perPage" class="mt-1">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
        </x-select>
        </div>
    
        <div class="col-span-3 md:col-span-2 lg:col-span-1 mr-5">
        <x-jet-label class="text-xs" for="select" value="{{ __('SortBy') }}"/>
        <x-select wire:model="sortBy" class="mt-1">
            <option value="asc">{{ __('ASC') }}</option>
            <option value="desc">{{ __('DESC') }}</option>
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
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Logo</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Win</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Draw</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Lose</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Points</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-100 border-t border-gray-100" id="new-sortable-table">


        @forelse ($botola as $botola)

        <tr class="hover:bg-gray-50 draggable-row" data-botola-id="{{ $botola->id }}" wire:key="botola-{{ $botola->id }}">
          <td class="px-6 py-4">
            <input type="checkbox" wire:model="selectedCategories" value="{{ $botola->id }}" class="bg-neutral-50 border-neutral-200">
          </td>
          <td class="px-6 py-4">
            <div >
                <img 
                class="h-24 inline-block w-24"
                src="{{ asset($botola->logo) }}" 
                alt="">
            </div>
        </td>
          <td class="px-6 py-4">
            <span
            class="inline-flex items-center gap-1 rounded-full bg-gray-50 px-2 py-1 text-md font-semibold " >
            <span class="h-1.5 w-1.5 rounded-full bg-gray-600"></span>
            {{ $botola->name }}
            </span>
          </td>


        <td class="px-6 py-4">
            <span
            class="inline-flex items-center gap-1 rounded-full bg-gray-50 px-2 py-1 text-md font-semibold " >
            <span class="h-1.5 w-1.5 rounded-full bg-gray-600"></span>
            {{ $botola->win }}
            </span>
          </td>
        <td class="px-6 py-4">
            <span
            class="inline-flex items-center gap-1 rounded-full bg-gray-50 px-2 py-1 text-md font-semibold " >
            <span class="h-1.5 w-1.5 rounded-full bg-gray-600"></span>
            {{ $botola->draw }}
            </span>
          </td>
        <td class="px-6 py-4">
            <span
            class="inline-flex items-center gap-1 rounded-full bg-gray-50 px-2 py-1 text-md font-semibold " >
            <span class="h-1.5 w-1.5 rounded-full bg-gray-600"></span>
            {{ $botola->lose }}
            </span>
          </td>
        <td class="px-6 py-4">
            <span
            class="inline-flex items-center gap-1 rounded-full bg-gray-50 px-2 py-1 text-md font-semibold " >
            <span class="h-1.5 w-1.5 rounded-full bg-gray-600"></span>
            {{ $botola->points }}
            </span>
          </td>
          <td class="px-6 py-4">

            <div class="flex gap-4">
                <div class="cursor-pointer" wire:click="selectedItem('update',{{ $botola->id }})"
                              class="px-2">
                    <x-svg.svg-update class="w-5 h-5 mr-4 transform hover:text-purple-500 hover:scale-110"/>
                </div>




                <div class="cursor-pointer" wire:click="selectedItem('delete',{{ $botola->id }})"
                              class="px-2">
                    <x-svg.svg-delete class="w-5 h-5 mr-4 transform hover:text-purple-500 hover:scale-110"/>
                </div> 

        @empty
            
        @endforelse

    </tbody>

    </table>
    </div>
    {{-- @if(!empty($botola))
    <div class="px-4 py-3 border-t bg-gray-50">
        {{ $botola->links() }}
    </div>
    @endif --}}
    </div>

    
    <div wire:click="test">...</div>

    <livewire:admin.botola.botola-create   />
    <livewire:admin.botola.botola-update   />
    {{-- <livewire:admin.api.api-delete   /> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <script>
        document.addEventListener('livewire:load', function () {
            const sortableTable = document.getElementById('new-sortable-table'); // Change the ID to match your new table
            const sortable = new Sortable(sortableTable, {
                handle: '.draggable-row',
                animation: 150,
                onEnd: function (event) {
                    console.log(event);
                    const item = event.item;
                    const itemId = item.dataset.botolaId; // Updated to use data-botola-id
                    const newPosition = event.newIndex + 1;
    
                    window.livewire.emit('updateItemOrdre', itemId, newPosition);
                    console.log(itemId, newPosition);
                },
            });
        });
    </script>
</div>
