<div class="hidden space-x-6  sm:-my-px sm:ml-4 sm:flex">
    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-jet-nav-link>
</div>
@if (auth()->user()->hasPermission('browse_users'))
<div class="hidden space-x-6  sm:-my-px sm:ml-4 sm:flex">
    <x-jet-nav-link href="{{ route('admin.user.index') }}" :active="request()->routeIs('admin.user.index')">
        {{ __('Users') }}
    </x-jet-nav-link>
</div>
@endif
@if (auth()->user()->hasPermission('browse_roles'))
<div class="hidden space-x-6  sm:-my-px sm:ml-4 sm:flex">
    <x-jet-nav-link href="{{ route('admin.role.index') }}" :active="request()->routeIs('admin.role.index')">
        {{ __('Roles') }}
    </x-jet-nav-link>
</div>
@endif
@if (auth()->user()->hasPermission('browse_clients'))
<div class="hidden space-x-6  sm:-my-px sm:ml-4 sm:flex">
    <x-jet-nav-link href="{{ route('admin.client.index') }}" :active="request()->routeIs('admin.client.index')">
        {{ __('Clients') }}
    </x-jet-nav-link>
</div>
@endif
@if (auth()->user()->hasPermission('browse_campagnes'))
<div class="hidden space-x-6  sm:-my-px sm:ml-4 sm:flex">
    <x-jet-nav-link href="{{ route('admin.campagne.index') }}" :active="request()->routeIs('admin.campagne.index')">
        {{ __('Campagnes') }}
    </x-jet-nav-link>
</div>
@endif
@if (auth()->user()->hasPermission('browse_bannieres'))
<div class="hidden space-x-6  sm:-my-px sm:ml-4 sm:flex">
    <x-jet-nav-link href="{{ route('admin.banniere.index') }}" :active="request()->routeIs('admin.banniere.index')">
        {{ __('Bannières') }}
    </x-jet-nav-link>
</div>
@endif
@if (auth()->user()->hasPermission('browse_menu'))
<div class="hidden space-x-6  sm:-my-px sm:ml-4 sm:flex">
    <x-jet-nav-link href="{{ route('admin.menu.index') }}" :active="request()->routeIs('admin.menu.index')">
        {{ __('Media') }}
    </x-jet-nav-link>
</div>
@endif


