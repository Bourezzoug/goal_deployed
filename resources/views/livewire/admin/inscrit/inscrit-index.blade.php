<div wire:init="loadItems">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>
    <!-- component -->
    <div class="m-5">
      @can('create' , \App\Models\Inscrit::class)
      <x-jet-button wire:click="selectedItem('create',null)"
          class="text-white rounded-lg  ">
          <x-svg.svg-plus class="w-5 h-5"/>
          {{ __('Ajouter') }}
      </x-jet-button>
      @endcan
      @can('deleteAll' , \App\Models\Inscrit::class)
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
        <x-jet-label class="text-xs" for="select" value="{{ __('SortBy Age') }}"/>
        <x-select wire:model="ageRange" class="mt-1">
            <option value="">{{ __('Tout') }}</option>
            <option value="18-25">{{ __('18 - 25') }}</option>
            <option value="25-35">{{ __('25 - 35') }}</option>
            <option value="35-45">{{ __('35 - 45') }}</option>
            <option value="45+">{{ __('45+') }}</option>
        </x-select>
      </div>

      <div class="col-span-3 md:col-span-2 lg:col-span-1 mr-3">
        <x-jet-label class="text-xs" for="select" value="{{ __('SortBy') }}"/>
        <x-select wire:model="sortBy" class="mt-1">
            <option value="asc">{{ __('ASC') }}</option>
            <option value="desc">{{ __('DESC') }}</option>
        </x-select>
      </div>

      <div class="col-span-3 md:col-span-2 lg:col-span-2 mr-3">
        <x-jet-label class="text-xs" for="startDate" value="{{ __('Start Date') }}"/>
        <x-jet-input wire:model="startDate" type="date" id="startDate" class="block w-full mt-1"
                    autocomplete="off"/>
      </div>
      
      <div class="col-span-3 md:col-span-2 lg:col-span-2 mr-3">
        <x-jet-label class="text-xs" for="endDate" value="{{ __('End Date') }}"/>
        <x-jet-input wire:model="endDate" type="date" id="endDate" class="block w-full mt-1"
                    autocomplete="off"/>
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
            <th scope="col" class="px-2 py-4 font-medium text-gray-900">
              <input type="checkbox" class="bg-neutral-50 border-neutral-200 mr-3" wire:model="selecteAll">
            </th>
            <th scope="col" class="px-2 py-4 font-medium text-gray-900">
                Nom complet
            </th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Email</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Telephone</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Fonction</th>

            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Ville</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Age</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Civilité</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Created At</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-100 border-t border-gray-100">


        @forelse ($inscrits as $inscrit)
        {{-- @unless(Auth::user()->id === $user->id) --}}

        <tr class="hover:bg-gray-50">
          <td class="px-2 py-4">
            <input type="checkbox" wire:model="selectedInscrits" value="{{ $inscrit->id }}" class="bg-neutral-50 border-neutral-200 childCheckbox">

          </td>
          <td>
            @if ($inscrit->nom_complet !== null)
              <span class="inline-flex items-center gap-1 rounded-full bg-neutral-50 px-2 py-1 text-md font-semibold text-indigo-600">
                <span class="h-1.5 w-1.5 rounded-full bg-indigo-600"></span>
                {{ $inscrit->nom_complet }}
              </span>
            @endif
          </td>
          
          <td class="px-6 py-4">
            <span
              class="inline-flex items-center gap-1 rounded-full bg-neutral-50 px-2 py-1 text-md font-semibold text-indigo-600"
            >
              <span class="h-1.5 w-1.5 rounded-full bg-indigo-600"></span>
              {{ $inscrit->email }}
            </span>
          </td>
          <td class="px-6 py-4">
            @if ($inscrit->telephone !== null)
              <span class="inline-flex items-center gap-1 rounded-full bg-neutral-50 px-2 py-1 text-md font-semibold text-neutral-600">
                <span class="h-1.5 w-1.5 rounded-full bg-neutral-600"></span>
                {{ $inscrit->telephone }}
              </span>
            @endif
          </td>
          
          <td class="px-6 py-4">
            @if ($inscrit->fonction !== null)
              <span class="inline-flex items-center gap-1 rounded-full bg-neutral-50 px-2 py-1 text-md font-semibold text-neutral-600">
                <span class="h-1.5 w-1.5 rounded-full bg-neutral-600"></span>
                {{ $inscrit->fonction }}
              </span>
            @endif
          </td>          
          <td class="px-6 py-4">
            @if ($inscrit->ville !== null)
              <span class="inline-flex items-center gap-1 rounded-full bg-neutral-50 px-2 py-1 text-md font-semibold text-neutral-600">
                <span class="h-1.5 w-1.5 rounded-full bg-neutral-600"></span>
                {{ $inscrit->ville }}
              </span>
            @endif
          </td>
          
          <td class="px-6 py-4">
            @if ($inscrit->age !== null)
              <span class="inline-flex items-center gap-1 rounded-full bg-neutral-50 px-2 py-1 text-md font-semibold text-neutral-600">
                
                {{ $inscrit->age }}
              </span>
            @endif
          </td>
          
          <td class="px-6 py-4">
            @if ($inscrit->civilite !== null)
              <span class="inline-flex items-center gap-1 rounded-full bg-neutral-50 px-2 py-1 text-md font-semibold text-neutral-600">
                <span class="h-1.5 w-1.5 rounded-full bg-neutral-600"></span>
                {{ $inscrit->civilite }}
              </span>
            @endif
          </td>
          
          <td class="px-6 py-4">
            <div class="flex gap-2">
              <span
                class="inline-flex items-center gap-1 rounded-full bg-indigo-50 w-32 px-6 py-1 text-xs font-semibold text-indigo-600"
              >
              {{ date('jS M Y',strtotime($inscrit->created_at)) }} 
              </span>
            </div>
          </td>
          <td class="px-6 py-4">

            <div class="flex gap-4">
                @can('update', $inscrit)
                <div class="cursor-pointer" wire:click="selectedItem('update',{{ $inscrit->id }})"
                              class="px-2">
                    <x-svg.svg-update class="w-5 h-5 mr-2 transform hover:text-purple-500 hover:scale-110"/>
                </div>
            @endcan



            @can('view', $inscrit)
                <div class="cursor-pointer" wire:click="selectedItem('show',{{ $inscrit->id }})"
                              class="px-2">
                    <x-svg.svg-show class="w-5 h-5 mr-2 transform hover:text-purple-500 hover:scale-110"/>
                </div>
            @endcan


            @can('delete', $inscrit)
                <div class="cursor-pointer" wire:click="selectedItem('delete',{{ $inscrit->id }})"
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
    @if(!empty($inscrits))
    <div class="px-4 py-3 border-t bg-gray-50">
        {{ $inscrits->links() }}
    </div>
    @endif
    </div>

    <livewire:admin.inscrit.inscrit-create />
    <livewire:admin.inscrit.inscrit-update />
    <livewire:admin.inscrit.inscrit-show />
    <livewire:admin.inscrit.inscrit-delete/>
</div>
