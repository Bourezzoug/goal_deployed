<div wire:init="loadItems">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>
    <!-- component -->
    <div class="m-5">
      @can('create' , \App\Models\Role::class)
      <x-jet-button wire:click="selectedItem('create',null)"
          class="text-white rounded-lg ">
          <x-svg.svg-plus class="w-5 h-5"/>
          {{ __('Ajouter') }}
      </x-jet-button>
      @endcan
      @can('deleteAll' , \App\Models\Role::class)
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
                Name
            </th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Key</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Created At</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-100 border-t border-gray-100">


        @forelse ($roles as $role)
        @unless(Auth::user()->role_id === $role->id || $role->id === 1 )

        <tr class="hover:bg-gray-50">
          <td class="px-6 py-4">
            <input type="checkbox" wire:model="selectedRoles" value="{{ $role->id }}" class="bg-neutral-50 border-neutral-200">
          <td class="px-6 py-4">
            <span
            class="inline-flex items-center gap-1 rounded-full  px-2 py-1 text-md font-semibold"
            style="background-color:{{ $role->color }};color:{{ $role->color ? '#FFF' : '#000' }}"
            >
              <span class="h-1.5 w-1.5 rounded-full" style="background-color: #FFF"></span>
              {{ $role->name }}
            </span>
          </td>
          <td class="px-6 py-4" style="color:{{ $role->color }};">{{ $role->key }}</td>
          <td class="px-6 py-4">
            <div class="flex gap-2">
              <span
                class="inline-flex items-center gap-1 rounded-full bg-indigo-50 w-32 px-2 py-1 text-xs font-semibold text-indigo-600"
              >
              {{ date('D jS M Y',strtotime($role->created_at)) }} 
              </span>
            </div>
          </td>
          <td class="px-6 py-4">

            <div class="flex gap-4">
                @can('update', $role)
                <div class="cursor-pointer" wire:click="selectedItem('update',{{ $role->id }})"
                              class="px-2">
                    <x-svg.svg-update class="w-5 h-5 mr-2 transform hover:text-purple-500 hover:scale-110"/>
                </div>
            @endcan



            @can('view', $role)
                <div class="cursor-pointer" wire:click="selectedItem('show',{{ $role->id }})"
                              class="px-2">
                    <x-svg.svg-show class="w-5 h-5 mr-2 transform hover:text-purple-500 hover:scale-110"/>
                </div>
            @endcan


            @can('delete', $role)
                <div class="cursor-pointer" wire:click="selectedItem('delete',{{ $role->id }})"
                              class="px-2">
                    <x-svg.svg-delete class="w-5 h-5 mr-2 transform hover:text-purple-500 hover:scale-110"/>
                </div>
            @endcan

            </div>
          </td>
        </tr>
        @endunless
        @empty
            
        @endforelse

    </tbody>

    </table>
    </div>
    @if(!empty($roles))
    <div class="px-4 py-3 border-t bg-gray-50">
        {{ $roles->links() }}
    </div>
    @endif
    </div>
    <livewire:admin.role.role-create  />
    <livewire:admin.role.role-update  />
    <livewire:admin.role.role-show/>
    <livewire:admin.role.role-delete/>

</div>
