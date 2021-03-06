@extends('layouts.app')
@section('page_title')
    Edit this Step
@endsection
@section('content')
    @component('.partials.journeys._journey_edit_container', [ 'step' => $step, 'journey' => $journey])
        @slot('content')
            <h1 class="text-4xl font-bold leading-9 mb-3"><span class="font-bold">Edit Step:</span> {{ $step->title }}</h1>
            <form class="mt-6" method="post" action="{{route('steps.update', $step->id )}}"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @include('.partials.forms.form_errors')
                <label for="title">Step Title*</label>
                <input name="title" class="input" id="title" autocomplete="off" type="text"
                       value="{{ $step->title }}" placeholder="eg. I started school at Harvard.">
                <label for="picture">Step Photo (Optional)</label>
                @if($step->picture)
                    <div class="flex border rounded-md items-end">
                        <img class="rounded-md w-40" src="{{$step->picture_path}}">
                        <div class="p-2 m-2 bottom-0 bg-gray-200 rounded-md right-0 text-sm">Current Picture</div>
                    </div>
                @endif
                <div class="p-2 bg-gray-200 rounded-md text-sm my-2">Photos must be less than 4MB.</div>
                <input name="picture" id="picture" class="input" accept="image/*" type="file">

                <div class="flex">
                    <div class="w-1/2">
                        <label for="date">Approximate Date</label>
                        <input name="date" class="input" id="date" autocomplete="off" type="date"
                               value="@if($step->date){{$step->date->format('Y-m-d')}}@endif">
                    </div>
                    <div class="w-1/2 pl-3">
                        <label for="time">Approximate Time (Optional)</label>
                        <input name="time" class="input" id="time" autocomplete="off" type="time"
                               value="{{ $step->time }}">
                    </div>
                </div>


                <label for="description">Description*</label>
                <textarea rows="6" class="input" autocomplete="off" name="description" id="description"
                          placeholder="Describe what happened at this part of your journey and how it helped you on your path.">{{ $step->description }}</textarea>
                <button type="submit" class="btn btn-primary">Save Changes to Step</button>
            </form>
        @endslot
    @endcomponent
@endsection
