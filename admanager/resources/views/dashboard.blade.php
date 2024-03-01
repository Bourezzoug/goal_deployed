<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
                <div class="grid lg:grid-cols-3 place-content-center gap-20">


                
                @if (auth()->user()->hasPermission('browse_clients'))
                    <div class="w-96 lg:w-full  max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col items-center pb-10">
                            <img class="w-24 h-24 m-3" src="/storage/clients.png" alt=""/>
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Clients</h5>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Voir tous les clients</span>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <a href="{{ route('admin.client.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Clients</a>
                            </div>
                        </div>
                    </div>
                @endif


                @if (auth()->user()->hasPermission('browse_campagnes'))
                    <div class="w-96 lg:w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col items-center pb-10">
                            <img class="w-24 h-24 m-3" src="/storage/campagne.png" alt="Bonnie image"/>
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Campagnes</h5>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Voir tous les campagnes</span>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <a href="{{ route('admin.campagne.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Campagnes</a>
                            </div>
                        </div>
                    </div>
                @endif
                @if (auth()->user()->hasPermission('browse_bannieres'))

                    <div class="w-96 lg:w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col items-center pb-10">
                            <img class="w-24 h-24 m-3" src="/storage/banner.png" alt="Bonnie image"/>
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Bannières</h5>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Voir tous les bannières</span>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <a href="{{ route('admin.banniere.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Bannières</a>
                            </div>
                        </div>
                    </div>
                @endif


                </div>
            
        </div>
    </div>
</x-app-layout>
