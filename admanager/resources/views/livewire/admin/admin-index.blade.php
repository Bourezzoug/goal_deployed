<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
                <div class="grid grid-cols-3 gap-20">
                    <div class="w-full  max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col items-center pb-10">
                            <img class="w-24 h-24 m-3 rounded-full shadow-lg" src="/storage/avatar.png" alt="Bonnie image"/>
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Adminastrator</h5>
                            <span class="text-sm text-gray-500 dark:text-gray-400">adminstrator</span>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <a href="{{ route('profile.show') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Profil</a>
                            </div>
                        </div>
                    </div>

                    <div class="w-full  max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col items-center pb-10">
                            <img class="w-24 h-24 m-3 " src="/storage/user.png" alt="Bonnie image"/>
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Utilisateurs</h5>
                            <span class="text-sm text-gray-500 dark:text-gray-400">void tous les utilisateurs</span>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <a href="{{ route('admin.user.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Users</a>
                            </div>
                        </div>
                    </div>

                    <div class="w-full  max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col items-center pb-10">
                            <img class="w-24 h-24 m-3" src="/storage/articles.png" alt="Bonnie image"/>
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Articles</h5>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Voir tous les articles</span>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <a href="{{ route('profile.show') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Articles</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="grid lg:grid-cols-3 place-content-center gap-20 lg:mt-10">
                    <div class="w-96 lg:w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col items-center pb-10">
                            <img class="w-24 h-24 m-3 rounded-full " src="/storage/category.png" alt="Bonnie image"/>
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Catégories</h5>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Voir tous les catégories</span>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <a href="{{ route('admin.category.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Category</a>
                            </div>
                        </div>
                    </div>

                    <div class="w-96 lg:w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col items-center pb-10">
                            <img class="w-24  m-3 " src="/storage/lock.png" alt="Bonnie image"/>
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Roles</h5>
                            <span class="text-sm text-gray-500 dark:text-gray-400">voir tous les roles</span>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <a href="{{ route('admin.role.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Roles</a>
                            </div>
                        </div>
                    </div>

                    <div class="w-96 lg:w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col items-center pb-10">
                            <img class="w-24 h-24 m-3" src="/storage/inscrits.png" alt="Bonnie image"/>
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Inscrits</h5>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Voir tous les inscrits</span>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <a href="{{ route('admin.inscrit.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Inscrits</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            
        </div>
    </div>
</div>
