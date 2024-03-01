<div class="pt-2 pb-3 space-y-1">
    <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-jet-responsive-nav-link>
    @if (auth()->user()->hasPermission('browse_users'))
    <x-jet-responsive-nav-link href="{{ route('admin.user.index') }}" :active="request()->routeIs('admin.user.index')">
        {{ __('Users') }}
    </x-jet-responsive-nav-link>
    @endif
    @if (auth()->user()->hasPermission('browse_categories'))
    <x-jet-responsive-nav-link href="{{ route('admin.category.index') }}" :active="request()->routeIs('admin.category.index')">
        {{ __('Catégories') }}
    </x-jet-responsive-nav-link>
    @endif
    @if (auth()->user()->hasPermission('browse_roles'))
    <x-jet-responsive-nav-link href="{{ route('admin.role.index') }}" :active="request()->routeIs('admin.role.index')">
        {{ __('Roles') }}
    </x-jet-responsive-nav-link>
    @endif
    @if (auth()->user()->hasPermission('browse_inscrits'))
    <x-jet-responsive-nav-link href="{{ route('admin.inscrit.index') }}" :active="request()->routeIs('admin.inscrit.index')">
        {{ __('Inscrits') }}
    </x-jet-responsive-nav-link>
    @endif
    @if (auth()->user()->hasPermission('browse_menu'))
    <x-jet-responsive-nav-link href="{{ route('admin.menu.index') }}" :active="request()->routeIs('admin.menu.index')">
        {{ __('Menu') }}
    </x-jet-responsive-nav-link>
    @endif
    @if (auth()->user()->hasPermission('browse_posts'))
    <x-jet-responsive-nav-link href="{{ route('admin.post.index') }}" :active="request()->routeIs('admin.post.index')">
        {{ __('Articles') }}
    </x-jet-responsive-nav-link>
    @endif
    @if (auth()->user()->hasPermission('browse_surveys'))
    <x-jet-responsive-nav-link href="{{ route('admin.survey.index') }}" :active="request()->routeIs('admin.post.index')">
        {{ __('Sondages') }}
    </x-jet-responsive-nav-link>
    @endif
    @if (auth()->user()->hasPermission('browse_alert'))
    <x-jet-responsive-nav-link href="{{ route('admin.alert.index') }}" :active="request()->routeIs('admin.alert.index')">
        {{ __('Alert') }}
    </x-jet-responsive-nav-link>
    @endif
</div>