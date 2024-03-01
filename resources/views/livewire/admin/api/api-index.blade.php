<div wire:init="loadItems">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
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
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Équipe 1</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Équipe 2</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Logo équipe 1</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Logo équipe 2</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Heure du match</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Résultat du match</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-100 border-t border-gray-100">


        @forelse ($matches as $matche)

        <tr class="hover:bg-gray-50">
          <td class="px-6 py-4">
            <input type="checkbox" wire:model="selectedApis" value="{{ $matche->id }}" class="bg-neutral-50 border-neutral-200">
          </td>
          <td class="px-6 py-4">
            <span
            class="inline-flex items-center gap-1 rounded-full bg-gray-50 px-2 py-1 text-md font-semibold " >
            <span class="h-1.5 w-1.5 rounded-full bg-gray-600"></span>
            {{ $matche->equipe1_name }}
            </span>
          </td>
          <td class="px-6 py-4">
            <span
            class="inline-flex items-center gap-1 rounded-full bg-gray-50 px-2 py-1 text-md font-semibold " >
            <span class="h-1.5 w-1.5 rounded-full bg-gray-600"></span>
            {{ $matche->equipe2_name }}
            </span>
          </td>
          <td class="px-6 py-4">
            <div >
                <img 
                class="h-24 inline-block w-24"
                src="{{ asset($matche->logo_equipe_1) }}" 
                alt="">
            </div>
        </td>
          <td class="px-6 py-4">
            <div >
                <img 
                class="h-24 inline-block w-24"
                src="{{ asset($matche->logo_equipe_2) }}" 
                alt="">
            </div>
        </td>
        <td class="px-6 py-4">
            <span
            class="inline-flex items-center gap-1 rounded-full bg-gray-50 px-2 py-1 text-md font-semibold " >
            <span class="h-1.5 w-1.5 rounded-full bg-gray-600"></span>
            {{ $matche->heure_match }}
            </span>
          </td>
        <td class="px-6 py-4">
            <span
            class="inline-flex items-center gap-1 rounded-full bg-gray-50 px-2 py-1 text-md font-semibold " >
            <span class="h-1.5 w-1.5 rounded-full bg-gray-600"></span>
            {{ $matche->resultat_match }}
            </span>
          </td>
          {{-- <td class="px-6 py-4">
            <div class="flex gap-2">
              <span
                class="inline-flex items-center gap-1 rounded-full bg-indigo-50 px-2 py-1 w-32  text-xs font-semibold text-indigo-600"
              >
              {{ date('D jS M Y',strtotime($category->created_at)) }} 
              </span>
            </div>
          </td> --}}
          <td class="px-6 py-4">

            <div class="flex gap-4">
                <div class="cursor-pointer" wire:click="selectedItem('update',{{ $matche->id }})"
                              class="px-2">
                    <x-svg.svg-update class="w-5 h-5 mr-4 transform hover:text-purple-500 hover:scale-110"/>
                </div>




                <div class="cursor-pointer" wire:click="selectedItem('delete',{{ $matche->id }})"
                              class="px-2">
                    <x-svg.svg-delete class="w-5 h-5 mr-4 transform hover:text-purple-500 hover:scale-110"/>
                </div> 
{{-- 
            </div>
          </td>
        </tr> --}}
        @empty
            
        @endforelse

    </tbody>

    </table>
    </div>
    {{-- @if(!empty($categories))
    <div class="px-4 py-3 border-t bg-gray-50">
        {{ $categories->links() }}
    </div>
    @endif --}}
    </div>

    {{-- <livewire:admin.category.category-create :categories="$categories"  />
    <livewire:admin.category.category-update :categories="$categories" />
    <livewire:admin.category.category-show />
    <livewire:admin.category.category-delete/> --}}
    <livewire:admin.api.api-create   />
    <livewire:admin.api.api-update   />
    <livewire:admin.api.api-delete   />
</div>
