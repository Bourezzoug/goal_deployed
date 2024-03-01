<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
                <div class="grid lg:grid-cols-3 place-content-center gap-20">
                    
                @if (auth()->user()->hasPermission('browse_roles'))
                    <div class="w-96 lg:w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow  ">
                        <div class="flex flex-col items-center pb-10">
                            <img class="w-24  m-3 " src="/storage/lock.png" alt="Bonnie image"/>
                            <h5 class="mb-1 text-xl font-medium text-gray-900 ">Roles</h5>
                            <span class="text-sm text-gray-500 ">Voir tous les roles</span>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <a href="{{ route('admin.role.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  ">Roles</a>
                            </div>
                        </div>
                    </div>
                @endif
                
                @if (auth()->user()->hasPermission('browse_users'))
                    <div class="w-96 lg:w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow  ">
                        <div class="flex flex-col items-center pb-10">
                            <img class="w-24 h-24 m-3 " src="/storage/user.png" alt="Bonnie image"/>
                            <h5 class="mb-1 text-xl font-medium text-gray-900 ">Utilisateurs</h5>
                            <span class="text-sm text-gray-500 ">Voir tous les utilisateurs</span>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <a href="{{ route('admin.user.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  ">Users</a>
                            </div>
                        </div>
                    </div>
                @endif
                
                @if (auth()->user()->hasPermission('browse_posts'))
                    <div class="w-96 lg:w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow  ">
                        <div class="flex flex-col items-center pb-10">
                            <img class="w-24 h-24 m-3" src="/storage/articles.png" alt="Bonnie image"/>
                            <h5 class="mb-1 text-xl font-medium text-gray-900 ">Articles</h5>
                            <span class="text-sm text-gray-500 ">Voir tous les articles</span>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <a href="{{ route('admin.post.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  ">Articles</a>
                            </div>
                        </div>
                    </div>
                @endif
                
                @if (auth()->user()->hasPermission('browse_inscrits'))
                    <div class="w-96 lg:w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow  ">
                        <div class="flex flex-col items-center pb-10">
                            <img class="w-24 h-24 m-3" src="/storage/inscrits.png" alt="Bonnie image"/>
                            <h5 class="mb-1 text-xl font-medium text-gray-900 ">Inscrits</h5>
                            <span class="text-sm text-gray-500 ">Voir tous les inscrits</span>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <a href="{{ route('admin.inscrit.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  ">Inscrits</a>
                            </div>
                        </div>
                    </div>
                @endif
                

                




                {{-- </div> --}}
                @if (auth()->user()->hasPermission('browse_categories'))
                {{-- <div class="grid lg:grid-cols-3 place-content-center gap-20"> --}}
                    <div class="w-96 lg:w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow  ">
                        <div class="flex flex-col items-center pb-10">
                            <img class="w-24 h-24 m-3 rounded-full " src="/storage/category.png" alt="Bonnie image"/>
                            <h5 class="mb-1 text-xl font-medium text-gray-900 ">Catégories</h5>
                            <span class="text-sm text-gray-500 ">Voir tous les catégories</span>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <a href="{{ route('admin.category.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  ">Category</a>
                            </div>
                        </div>
                    </div>
                @endif
                
                @if (auth()->user()->hasPermission('browse_surveys'))
                    <div class="w-96 lg:w-full  max-w-sm bg-white border border-gray-200 rounded-lg shadow  ">
                        <div class="flex flex-col items-center pb-10">
                            <img class="w-24 h-24 m-3 " src="/storage/survey.png" alt="Bonnie image"/>
                            <h5 class="mb-1 text-xl font-medium text-gray-900 ">Sondages</h5>
                            <span class="text-sm text-gray-500 ">Voir tous les sondages</span>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <a href="{{ route('admin.survey.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  ">Sondage</a>
                            </div>
                        </div>
                    </div>
                @endif


                </div>
            
        </div>
    </div>
</x-app-layout>
