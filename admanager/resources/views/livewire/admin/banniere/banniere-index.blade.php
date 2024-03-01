<div wire:init="loadItems">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bannières') }}
        </h2>
    </x-slot>
    <!-- component -->
    <div class="m-5">
      @can('create' , \App\Models\Client::class)
      <x-jet-button wire:click="selectedItem('create',null)"
          class="text-white rounded-lg  ">
          <x-svg.svg-plus class="w-5 h-5"/>
          {{ __('Ajouter') }}
      </x-jet-button>
      @endcan
      @can('deleteAll' , \App\Models\Client::class)
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
        <x-jet-label class="text-xs" for="select" value="{{ __('SortBy Position') }}"/>
        <x-select wire:model="sortby_position" class="mt-1">
            <option value="Popup">Popup</option>
            <option value="Habillage:top">Habillage:top</option>
            <option value="Habillage:right">Habillage:right</option>
            <option value="Habillage:left">Habillage:left</option>
            <option value="Alert">Alert</option>
            <option value="Acceuil:Football">Acceuil:Football</option>
            <option value="Acceuil:Tennis">Acceuil:Tennis</option>
            <option value="Acceuil:Tennis-right">Acceuil:Tennis-right</option>
            <option value="Acceuil:Athltétisme">Acceuil:Athltétisme</option>
            <option value="Acceuil:Boxe">Acceuil:Boxe</option>
            <option value="Acceuil:Boxe-right">Acceuil:Boxe-right</option>
            <option value="Acceuil:Basket">Acceuil:Basket</option>
            <option value="Acceuil:Videos">Acceuil:Videos</option>
            <option value="Acceuil:people-divers">Acceuil:people-divers</option>
            <option value="Newsletter:first">Newsletter:first</option>
            <option value="Newsletter:second">Newsletter:second</option>
            <option value="Newsletter:third">Newsletter:third</option>
            <option value="Newsletter:fourth">Newsletter:fourth</option>
            <option value="Newsletter:fifth">Newsletter:fifth</option>
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
            <th scope="col" class="pl-6  py-4 font-medium text-gray-900">
                <input type="checkbox" class="bg-neutral-50 border-neutral-200 mr-3" wire:model="selecteAll">
            </th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                Titre
            </th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Lien</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Image</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Position</th>
            <th scope="col" class="px-16 py-4 font-medium text-center text-gray-900">Plannification</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Campagnes</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nb vues</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nb click</th>
            <th scope="col" class="px-6  py-4 font-medium text-gray-900">Created At</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-100 border-t border-gray-100">


        @forelse ($bannieres as $banniere)

        <tr class="hover:bg-gray-50">
        <td class="pl-6 py-4">
                <input type="checkbox" wire:model="selectedBannieres" value="{{ $banniere->id }}" class="bg-neutral-50 border-neutral-200 ">
        </td>
        <td class="px-6 py-4 text-gray-900">
            {{ $banniere->titre }}
        </td>
        <td class="px-6 py-4 text-gray-900">
            {{ $banniere->lien }}
        </td>
        <td class="px-6 py-4">
            <div class="w-72 h-48">
                <img 
                class="h-full inline-block w-full object-cover object-center"
                src="{{ asset($banniere->image) }}" 
                alt="">
            </div>
        </td>
        <td class="px-6 py-4 text-gray-900">
            {{ $banniere->position }}
        </td>
        <td class="px-6 py-4 text-gray-900">
            @php
                $plannifications = explode(',', $banniere->plannification);
            @endphp
            @foreach($plannifications as $index => $plannification)
                <div>
                    {{ __('date ') }}{{ $index+1 }} : {{ date('d/m/Y', strtotime(trim($plannification))) }}
                </div>
            @endforeach
        </td>
        
        <td class="px-6 py-4 text-gray-900">
            {{ $banniere->campagne->Libelle }}
        </td>
        <td class="px-6 py-4 text-gray-900">
            {{ $banniere->nb_total_vues }}
        </td>
        <td class="px-6 py-4 text-gray-900">
            {{ $banniere->nb_total_click }}
        </td>
        <td class="px-6  py-4">
            <div class="flex gap-2">
                <span
                class="inline-flex items-center gap-1 rounded-full bg-indigo-50 px-2 py-1 w-32 text-xs font-semibold text-indigo-600"
                >
                {{ date('D jS M Y',strtotime($banniere->created_at)) }} 
                </span>
            </div>
        </td>
        <td class="px-6 py-4">

            <div class="flex gap-4">
                @can('update', $banniere)
                <div class="cursor-pointer" wire:click="selectedItem('update',{{ $banniere->id }})"
                            class="px-2">
                    <x-svg.svg-update class="w-5 h-5 mr-2 transform hover:text-purple-500 hover:scale-110"/>
                </div>
            @endcan



            @can('view', $banniere)
                <div class="cursor-pointer" wire:click="selectedItem('show',{{ $banniere->id }})"
                            class="px-2">
                    <x-svg.svg-show class="w-5 h-5 mr-2 transform hover:text-purple-500 hover:scale-110"/>
                </div>
            @endcan


            @can('delete', $banniere)
                <div class="cursor-pointer" wire:click="selectedItem('delete',{{ $banniere->id }})"
                            class="px-2">
                    <x-svg.svg-delete class="w-5 h-5 mr-2 transform hover:text-purple-500 hover:scale-110"/>
                </div>
            @endcan

            @can('update', $banniere)
            <div class="cursor-pointer" wire:click="selectedItem('duplicate',{{ $banniere->id }})"
                        class="px-2">
                <x-svg.svg-plus class="w-5 h-5 mr-2 transform hover:text-purple-500 hover:scale-110"/>
            </div>
            <a class="hover:text-purple-500" href="{{ route('admin.printPDF', ['itemId' => $banniere['id']]) }}">

                pdf

        </a>
        @endcan

            </div>
        </td>
        </tr>

        @empty
            
        @endforelse

    </tbody>

    </table>
    </div>
    @if(!empty($bannieres))
    <div class="px-4 py-3 border-t bg-gray-50">
        {{ $bannieres->links() }}
    </div>
    @endif
    </div>
    {{-- <livewire:admin.client.client-create  />
    <livewire:admin.client.client-update  />
    <livewire:admin.client.client-show  />
    <livewire:admin.client.client-delete/> --}}
    <livewire:admin.banniere.banniere-create :campagne="$campagne" />
    <livewire:admin.banniere.banniere-update :campagne="$campagne" />
    <livewire:admin.banniere.banniere-show  />
    <livewire:admin.banniere.banniere-duplicate :campagne="$campagne" />
    <livewire:admin.banniere.banniere-delete/>
</div>
