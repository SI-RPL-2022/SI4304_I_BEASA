<x-app-layout>
    <x-slot name="header">
        <img class="card-img-top" src="{{ $scholarship->cover }}" alt="Card image cap">
    </x-slot>
    <section class="section mt-4">
        <div class="row">
            <h5 class="card-title">{{ $scholarship->title }}</h5>
            <p class="card-text">Domicile :{{ $scholarship->domicile }}</p>
            <p class="card-text">Strata : {{ $scholarship->strata }}</p>
            <p class="card-text">Type : {{ $scholarship->type }}</p>
            <p class="card-text">{{ $scholarship->description }}</p>
            <p>Website : <a href="{{ url($scholarship->link) }}" class="card-text">{{ $scholarship->link }}</a></p>
            <p>Social Media : <a href="{{ url($scholarship->link2) }}" class="card-text">{{ $scholarship->link2 }}</a></p>
            <a href="{{ route('scholarship.signup', $scholarship->id) }}" class="btn btn-primary">Apply</a>
        </div>
    </section>
</x-app-layout>
