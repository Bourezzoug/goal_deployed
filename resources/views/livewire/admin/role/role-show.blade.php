<div>
    @if($showItemModel)
        <x-jet-dialog-modal wire:model="showItemModel">
        <x-slot name="title">
            {{ __('Informations d\'utilisateur') }} 
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-12 gap-4">

                <div class="col-span-6 lg:col-span-4 mt-6">
                    <div class="relative p-3 bg-gray-100 text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100 text-gray-600  rounded-t-lg">{{ __('Name') }}</div>
                        <div class=" text-sm font-bold z-10">{{ $item->name }}</div>
                    </div>
                </div>


                <div class="col-span-6 lg:col-span-4 mt-6">
                    <div class="relative p-3 bg-gray-100  text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('Key') }}</div>
                        <div class=" text-sm font-bold z-10 {{ $item->color }}">{{ $item->key }}</div>
                    </div>
                </div>



                <div class="col-span-6 lg:col-span-4 mt-6">
                    <div class="relative p-3 bg-gray-100  text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                        <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('created_at') }}</div>
                        <div class=" text-sm font-bold z-10 text-indigo-600">{{ date('D jS M Y',strtotime($item->created_at)) }} </div>
                    </div>
                </div>

                @if($item->created_at != $item->updated_at)
                    <div class="col-span-6 lg:col-span-4 mt-6">
                        <div class="relative p-3 bg-gray-100  text-gray-800  rounded-lg md:rounded-lg sm:rounded-sm">
                            <div class="absolute -top-4 right-3 px-3 pt-1 text-xs font-semibold bg-gray-100  text-gray-600  rounded-t-lg">{{ __('updated_at') }}</div>
                            <div class=" text-sm font-bold z-10 text-indigo-600">{{ date('D jS M Y',strtotime($item->created_at)) }} </div>
                        </div>
                    </div>
                @endif
                <div class="col-span-6 lg:col-span-12 mt-6">
                    <main class="p-5 pl-0 pt-0 bg-light-blue">
                            <div class="flex  items-start w-full">
                                <ul class="flex flex-col">
                                <li class="bg-white my-2 shadow-lg" x-data="inscrit">
                                    <h2
                                    @click="handleClick()"
                                    class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-stone-500 text-white"
                                    >
                                    <span>Inscrit Permission</span>
                                    <svg
                                        :class="handleRotate()"
                                        class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                        viewBox="0 0 20 20"
                                    >
                                        <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                    </svg>
                                    </h2>
                                    <div
                                    x-ref="tab"
                                    :style="handleToggle()"
                                    class="border-l-2 border-stone-600 overflow-hidden max-h-0 duration-500 transition-all"
                                    >
                                    <div>
                                    <div class="lg:flex justify-between items-center px-5 py-5">
                                        <div class="flex items-center">
                                            <input type="checkbox" class="bg-neutral-50 border-neutral-200 mr-2" wire:model="selecteAllInscrit" disabled>
                                            <x-jet-label class="text-xs mr-5" for="inscritPermission" value="{{'All'}}"/>
                                        </div>
                                            @forelse($permissions_inscrit as $key => $value)
                                            @unless ($value == 'deleteAll_inscrits')
                                            <div class="mr-8">
                                                <x-jet-label class="text-xs" for="inscritPermission" value="{{ $value }}"/>
                                                <input id="inscritPermission" type="checkbox" wire:model="selectedInscritsPermission" value="{{ $key }}" class="bg-neutral-50 border-neutral-200" disabled>
                                            </div>
                                            @endunless

                                            @empty
                                            @endforelse
                                        <x-jet-input-error for="inscritPermission" class="mt-2"/>
                                    </div>
                                    </div>
                                </li>
                                </ul>
                        
                            </div>
                        </main>
                    </div>
                    <div class="col-span-6 lg:col-span-12">
                        <main class="p-5 pl-0 pt-0 bg-light-blue">
                                <div class="flex  items-start w-full">
                                    <ul class="flex flex-col">
                                    <li class="bg-white my-2 shadow-lg" x-data="role">
                                        <h2
                                        @click="handleClick()"
                                        class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-stone-500 text-white"
                                        >
                                        <span>Role Permission</span>
                                        <svg
                                            :class="handleRotate()"
                                            class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                            viewBox="0 0 20 20"
                                        >
                                            <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                        </svg>
                                        </h2>
                                        <div
                                        x-ref="tab"
                                        :style="handleToggle()"
                                        class="border-l-2 border-stone-600 overflow-hidden max-h-0 duration-500 transition-all"
                                        >
                                        <div>
                                        <div class="lg:flex justify-between items-center px-5 py-5">
                                            <div class="flex items-center">
                                                <input type="checkbox" class="bg-neutral-50 border-neutral-200 mr-2" wire:model="selecteAllRole" disabled>
                                                <x-jet-label class="text-xs mr-5" for="rolePermission" value="{{'All'}}"/>
                                            </div>
                                                @forelse($permissions_role as $key => $value)
                                                @unless ($value == 'deleteAll_roles')
                                                    <div class="mr-11">
                                                        <x-jet-label class="text-xs" for="rolePermission" value="{{ $value }}"/>
                                                        <input id="rolePermission" type="checkbox" wire:model="selectedRolesPermission" value="{{ $key }}" class="bg-neutral-50 border-neutral-200" disabled>
                                                    </div>
                                                @endunless
                                                @empty
                                                @endforelse
                                            <x-jet-input-error for="rolePermission" class="mt-2"/>
                                        </div>
                                        </div>
                                    </li>
                                    </ul>
                            
                                </div>
                            </main>
                        </div>
                        <div class="col-span-6 lg:col-span-12">
                            <main class="p-5 pl-0 pt-0 bg-light-blue">
                                    <div class="flex  items-start w-full">
                                        <ul class="flex flex-col">
                                        <li class="bg-white my-2 shadow-lg" x-data="user">
                                            <h2
                                            @click="handleClick()"
                                            class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-stone-500 text-white"
                                            >
                                            <span>User Permission</span>
                                            <svg
                                                :class="handleRotate()"
                                                class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                                viewBox="0 0 20 20"
                                            >
                                                <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                            </svg>
                                            </h2>
                                            <div
                                            x-ref="tab"
                                            :style="handleToggle()"
                                            class="border-l-2 border-stone-600 overflow-hidden max-h-0 duration-500 transition-all"
                                            >
                                            <div>
                                            <div class="lg:flex justify-between items-center px-6 py-5">
                                                <div class="flex items-center">
                                                    <input type="checkbox" class="bg-neutral-50 border-neutral-200 mr-2" wire:model="selecteAllUser" disabled>
                                                    <x-jet-label class="text-xs mr-5" for="userPermission" value="{{'All'}}"/>
                                                </div>
                                                    @forelse($permissions_users as $key => $value)
                                                    @unless ($value == 'deleteAll_users')
                                                        <div class="mr-10">
                                                            <x-jet-label class="text-xs" for="userPermission" value="{{ $value }}"/>
                                                            <input id="userPermission" type="checkbox" wire:model="selectedUsersPermission" value="{{ $key }}" class="bg-neutral-50 border-neutral-200" disabled>
                                                        </div>
                                                    @endunless
                                                    @empty
                                                    @endforelse
                                                <x-jet-input-error for="userPermission" class="mt-2"/>
                                            </div>
                                            </div>
                                        </li>
                                        </ul>
                                
                                    </div>
                                </main>
                            </div>
                            <div class="col-span-6 lg:col-span-12">
                                <main class="p-5 pl-0 pt-0 bg-light-blue">
                                        <div class="flex  items-start w-full">
                                            <ul class="flex flex-col">
                                            <li class="bg-white my-2 shadow-lg" x-data="categorie">
                                                <h2
                                                @click="handleClick()"
                                                class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-stone-500 text-white"
                                                >
                                                <span>Catégorie Permission</span>
                                                <svg
                                                    :class="handleRotate()"
                                                    class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                                    viewBox="0 0 20 20"
                                                >
                                                    <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                                </svg>
                                                </h2>
                                                <div
                                                x-ref="tab"
                                                :style="handleToggle()"
                                                class="border-l-2 border-stone-600 overflow-hidden max-h-0 duration-500 transition-all"
                                                >
                                                <div>
                                                <div class="lg:flex justify-between items-center px-7 py-5">
                                                    <div class="flex items-center">
                                                        <input type="checkbox" class="bg-neutral-50 border-neutral-200 mr-2" wire:model="selecteAllCategorie" disabled>
                                                        <x-jet-label class="text-xs mr-5" for="categoriePermission" value="{{'All'}}"/>
                                                    </div>
                                                        @forelse($permissions_cats as $key => $value)
                                                        @unless ($value == 'deleteAll_categories')
                                                            <div class="mr-3">
                                                                <x-jet-label class="text-xs" for="categoriePermission" value="{{ $value }}" />
                                                                <input id="categoriePermission" type="checkbox" wire:model="selectedCategoriesPermission" value="{{ $key }}" class="bg-neutral-50 border-neutral-200" disabled>
                                                            </div>
                                                        @endunless
                                                        @empty

                                                        @endforelse
                                                    <x-jet-input-error for="categoriePermission" class="mt-2"/>
                                                </div>
                                                </div>
                                            </li>
                                            </ul>
                                    
                                        </div>
                                    </main>
                                </div>
                                <div class="col-span-6 lg:col-span-12">
                                    <main class="p-5 pl-0 pt-0 bg-light-blue">
                                            <div class="flex  items-start w-full">
                                                <ul class="flex flex-col">
                                                <li class="bg-white my-2 shadow-lg" x-data="post">
                                                    <h2
                                                    @click="handleClick()"
                                                    class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-stone-500 text-white"
                                                    >
                                                    <span>Article Permission</span>
                                                    <svg
                                                        :class="handleRotate()"
                                                        class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                                        viewBox="0 0 20 20"
                                                    >
                                                        <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                                    </svg>
                                                    </h2>
                                                    <div
                                                    x-ref="tab"
                                                    :style="handleToggle()"
                                                    class="border-l-2 border-stone-600 overflow-hidden max-h-0 duration-500 transition-all"
                                                    >
                                                    <div>
                                                    <div class="lg:flex justify-between items-center px-8 py-5">
                                                        <div class="flex items-center">
                                                            <input type="checkbox" class="bg-neutral-50 border-neutral-200 mr-2" wire:model="selecteAllPost" disabled>
                                                            <x-jet-label class="text-xs mr-5" for="postPermission" value="{{'All'}}"/>
                                                        </div>
                                                            @forelse($permissions_post as $key => $value)
                                                            @unless ($value == 'deleteAll_posts')
                                                                <div class="mr-9">
                                                                    <x-jet-label class="text-xs" for="postPermission" value="{{ $value }}"/>
                                                                    <input id="postPermission" type="checkbox" wire:model="selectedPostsPermission" value="{{ $key }}" class="bg-neutral-50 border-neutral-200" disabled>
                                                                </div>
                                                            @endunless
                                                            @empty
                                                            @endforelse
                                                        <x-jet-input-error for="postPermission" class="mt-2"/>
                                                    </div>
                                                    </div>
                                                </li>
                                                </ul>
                                        
                                            </div>
                                        </main>
                                    </div>
                                    <div class="col-span-6 lg:col-span-12">
                                        <main class="p-5 pl-0 pt-0 bg-light-blue">
                                                <div class="flex  items-start w-full">
                                                    <ul class="flex flex-col">
                                                    <li class="bg-white my-2 shadow-lg" x-data="sondage">
                                                        <h2
                                                        @click="handleClick()"
                                                        class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-stone-500 text-white"
                                                        >
                                                        <span>Sondage Permission</span>
                                                        <svg
                                                            :class="handleRotate()"
                                                            class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                                            viewBox="0 0 20 20"
                                                        >
                                                            <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                                        </svg>
                                                        </h2>
                                                        <div
                                                        x-ref="tab"
                                                        :style="handleToggle()"
                                                        class="border-l-2 border-stone-600 overflow-hidden max-h-0 duration-500 transition-all"
                                                        >
                                                        <div>
                                                        <div class="lg:flex justify-between items-center pl-1.5 py-5">
                                                            <div class="flex items-center">
                                                                <input type="checkbox" class="bg-neutral-50 border-neutral-200 mr-2" wire:model="selecteAllSurvey">
                                                                <x-jet-label class="text-xs mr-5" for="postPermission" value="{{'All'}}"/>
                                                            </div>
                                                                @forelse($permissions_survey as $key => $value)
                                                                @if ($value != 'deleteAll_surveys')
                                                                    <div class="mr-9">
                                                                        <x-jet-label class="text-xs" for="surveyPermission" value="{{ $value }}"/>
                                                                        <input id="surveyPermission" type="checkbox" wire:model="selectedSurveysPermission" value="{{ $key }}" class="bg-neutral-50 border-neutral-200">
                                                                    </div>
                                                                @endif
                                                                @empty
                                                                @endforelse
                                                            <x-jet-input-error for="surveyPermission" class="mt-2"/>
                                                        </div>
                                                        </div>
                                                    </li>
                                                    </ul>
                                            
                                                </div>
                                            </main>
                                        </div>
                                        <div class="col-span-6 lg:col-span-12">
                                            <main class="p-5 pl-0 pt-0 bg-light-blue">
                                                    <div class="flex  items-start w-full">
                                                        <ul class="flex flex-col">
                                                        <li class="bg-white my-2 shadow-lg" x-data="menu">
                                                            <h2
                                                            @click="handleClick()"
                                                            class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-stone-500 text-white"
                                                            >
                                                            <span>Media Permission</span>
                                                            <svg
                                                                :class="handleRotate()"
                                                                class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                                                viewBox="0 0 20 20"
                                                            >
                                                                <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                                            </svg>
                                                            </h2>
                                                            <div
                                                            x-ref="tab"
                                                            :style="handleToggle()"
                                                            class="border-l-2 border-stone-600 overflow-hidden max-h-0 duration-500 transition-all"
                                                            >
                                                            <div>
                                                            <div class="lg:flex justify-between items-center px-62 py-5">
                                                                        <div class="mr-9">
                                                                            <x-jet-label class="text-xs" for="MenuPermission" value="browse_menu"/>
                                                                            <input id="MenuPermission" type="checkbox" wire:model="selectedMenuPermission" value="27" class="bg-neutral-50 border-neutral-200">
                                                                        </div>
                                                                <x-jet-input-error for="MenuPermission" class="mt-2"/>
                                                            </div>
                                                            </div>
                                                        </li>
                                                        </ul>
                                                
                                                    </div>
                                                </main>
                                            </div>

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
