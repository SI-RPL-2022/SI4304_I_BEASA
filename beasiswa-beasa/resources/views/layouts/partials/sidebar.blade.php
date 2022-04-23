<x-maz-sidebar :href="route('home')" :logo="asset('images/logo/logo.png')">

    <!-- Add Sidebar Menu Items Here -->
    <x-maz-sidebar-item name="Home" :link="route('home')" icon="bi bi-grid-fill"></x-maz-sidebar-item>
    @auth
        @if (Auth::user()->role == 'admin')
            <x-maz-sidebar-item name="Scholarship" :link="route('scholarship')" icon="bi bi-archive-fill"></x-maz-sidebar-item>
        @endif
    @endauth

</x-maz-sidebar>
