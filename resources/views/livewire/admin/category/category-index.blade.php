<div wire:init="loadItems">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>
    <!-- component -->
    <div class="m-5">
      @can('create' , \App\Models\Category::class)
      <x-jet-button wire:click="selectedItem('create',null)"
          class="text-white rounded-lg">
          <x-svg.svg-plus class="w-5 h-5"/>
          {{ __('Ajouter') }}
      </x-jet-button>
      @endcan
      @can('deleteAll' , \App\Models\Category::class)
      <x-jet-button wire:click.prevent="deleteSelected" onclick="confirm('Vous êtes sure?') || event.stopImmediatePropagation()"
      class="text-white rounded-lg " id="deleteButton">
        <x-svg.svg-delete class="w-5 h-5"/>
        {{ __('Supprimer') }}
      </x-jet-button>
      @endcan
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
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">
              
                Name
            </th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Order</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Slug</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Posts</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Created At</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-100 border-t border-gray-100">


        @forelse ($categories as $category)

        <tr class="hover:bg-gray-50">
          <td class="px-6 py-4">
            <input type="checkbox" wire:model="selectedCategories" value="{{ $category->id }}" class="bg-neutral-50 border-neutral-200">
          </td>
          <td class="px-6 py-4">
            <span
            class="inline-flex items-center gap-1 rounded-full bg-gray-50 px-2 py-1 text-md font-semibold " style="{{ $category->color }}"
          >
            <span class="h-1.5 w-1.5 rounded-full bg-gray-600"></span>
            {{ $category->name }}
          </span>
          </td>
          <td class="px-6 py-4" >{{ $category->order }}</td>
          <td class="px-6 py-4" >{{ $category->slug }}</td>
          <td class="px-6 py-4" >

        @if($category->id == 8)
        @php

        // Assuming you have a database connection established
        
        // Query to count the sum of posts
        $count = DB::table('categories')
            ->join('posts', 'categories.id', '=', 'posts.category_id')
            ->where('categories.parent_id', '=', 8)
            ->count();
        
        // Output the count
        echo $count;
        @endphp
        @else
            {{ count($category->post) }}
        @endif
          </td>

          <td class="px-6 py-4">
            <div class="flex gap-2">
              <span
                class="inline-flex items-center gap-1 rounded-full bg-indigo-50 px-2 py-1 w-32  text-xs font-semibold text-indigo-600"
              >
              {{ date('D jS M Y',strtotime($category->created_at)) }} 
              </span>
            </div>
          </td>
          <td class="px-6 py-4">

            <div class="flex gap-4">
                @can('update', $category)
                <div class="cursor-pointer" wire:click="selectedItem('update',{{ $category->id }})"
                              class="px-2">
                    <x-svg.svg-update class="w-5 h-5 mr-4 transform hover:text-purple-500 hover:scale-110"/>
                </div>
            @endcan



            @can('view', $category)
                <div class="cursor-pointer" wire:click="selectedItem('show',{{ $category->id }})"
                              class="px-2">
                    <x-svg.svg-show class="w-5 h-5 mr-4 transform hover:text-purple-500 hover:scale-110"/>
                </div>
            @endcan


            @can('delete', $category)
                <div class="cursor-pointer" wire:click="selectedItem('delete',{{ $category->id }})"
                              class="px-2">
                    <x-svg.svg-delete class="w-5 h-5 mr-4 transform hover:text-purple-500 hover:scale-110"/>
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
    @if(!empty($categories))
    <div class="px-4 py-3 border-t bg-gray-50">
        {{ $categories->links() }}
    </div>
    @endif
    </div>

    {{-- <livewire:admin.user.user-create :roles="$roles" />
    <livewire:admin.user.user-update :roles="$roles" />
    <livewire:admin.user.user-delete/> --}}
    <livewire:admin.category.category-create :categories="$categories"  />
    <livewire:admin.category.category-update :categories="$categories" />
    <livewire:admin.category.category-show />
    <livewire:admin.category.category-delete/>
  </div>
