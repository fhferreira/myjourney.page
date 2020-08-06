@extends('layouts.app')
@section('page_title')
    Your Journeys
@endsection
@section('content')
    <section class="py-40">
        <div class="container px-6 mx-auto">
            <div class="md:flex items-center justify-between">
                <div class="mb-6">
                    <h1 class="text-5xl mb-3">Your Journeys</h1>
                    <p>View the Journeys you've created.</p>
                </div>
                <a href="{{ route('journeys.create') }}" class="btn btn-cta">Write Journey</a>
            </div>
            <div class="mt-6">
                @forelse($journeys as $journey)
                    <div class="rounded-md w-full lg:flex mb-6 bg-white shadow-sm border border-black p-5">
                        <div class="md:w-40 py-3">
                            @if($journey->picture)
                                <img src="{{$journey->picture_path}}" class="w-full rounded">
                            @else
                                <img src="/images/devjourney.svg" class="w-full rounded">
                            @endif
                        </div>
                        <div class="lg:px-6 lg:w-2/3">
                            <h2 class="text-4xl mb-3">{{ $journey->title }}</h2>
                            <p>{{ $journey->introduction }}</p>
                        </div>
                        <div class="lg:w-1/3 py-4">
                            <a target="_blank" href="{{route('journeys.show', $journey->slug)}}"
                               class="icon-button mb-1"><img class="w-4 mr-2" src="/images/external.svg"> View</a>
                            <a href="{{route('journeys.edit', $journey->slug)}}" class="icon-button mb-1"><img
                                    class="w-4 mr-2" src="/images/edit.svg">Edit</a>
                            <a href="{{route('journeys.steps.create', $journey->slug)}}" class="icon-button mb-1"><img
                                    class="w-4 mr-2" src="/images/add.svg">Add Steps</a>
                            <modal-component>
                                <template v-slot:header>Are you sure you want to delete this Journey?</template>
                                <template v-slot:opener>
                                    <div class="icon-button">
                                        <img class="w-4 mr-2" src="/images/bin.svg">Delete Journey
                                    </div>
                                </template>
                                <form class="mt-2" method="post"
                                      action="{{ route('journeys.destroy', $journey->slug) }}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Yes, Delete Journey</button>
                                </form>
                            </modal-component>

                            <publish-journey-component :journey="{{ $journey }}"></publish-journey-component>
                            <make-public-component :journey="{{ $journey }}"></make-public-component>
                        </div>
                    </div>
                @empty
                    <div class="rounded-md bg-white shadow-sm border border-black p-6 pb-8">
                        <h2 class="text-4xl mb-6">Bummer, you haven't created any journeys yet. Want to add one?</h2>
                        <a class="btn btn-cta" href="{{ route('journeys.create') }}">Write a Journey</a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
