<x-maz-sidebar :href="route('home')" :logo="asset('images/logo/logo.png')">

    <!-- Add Sidebar Menu Items Here -->
    <x-maz-sidebar-item name="Home" :link="route('home')" icon="bi bi-grid-fill"></x-maz-sidebar-item>
    @auth
        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'campuss')
            <x-maz-sidebar-item name="Scholarship" :link="route('scholarship')" icon="bi bi-archive-fill"></x-maz-sidebar-item>
        @endif
        @if (Auth::user()->role == 'user')
            <x-maz-sidebar-item name="File" :link="route('file')" icon="bi bi-list-task"></x-maz-sidebar-item>
            <x-maz-sidebar-item name="My Scholarship" :link="route('my')" icon="bi bi-briefcase-fill"></x-maz-sidebar-item>
        @endif
    @endauth
    <x-maz-sidebar-item name="Feedback" :link="route('feedback')" icon="bi bi-file-text-fill"></x-maz-sidebar-item>


</x-maz-sidebar>
