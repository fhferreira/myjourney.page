@extends('layouts.app')
@section('page_title')
    Write your Journey
@endsection
@section('content')
    <section class="mt-10 mx-auto max-w-screen-xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 xl:mt-28">
        <div class="text-center">
            <h1 class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
                Write
                <br class="xl:hidden">
                <span class="text-yellow-600">Your Journey</span>
            </h1>
        </div>
    </section>
    <section class="pb-10">
        <div class="max-w-7xl py-16  mt-1 min-h-screen mx-auto pb-12 px-4 sm:px-6 lg:px-8">
            <div class="lg:max-w-screen-lg  mx-auto">
                <form class="mt-6 px-4 py-6 pb-8 bg-white rounded-md border" method="post" action="/journeys" enctype="multipart/form-data">
                    @csrf
                    @include('.partials.forms.form_errors')
                    <label for="title">Journey Title</label>
                    <input name="title" class="input" id="title" autocomplete="off" type="text"
                           value="{{ old('title') }}" placeholder="eg. How we traveled to the sixth galaxy of the jyrono universe." autofocus>
                    <label for="picture">Journey Photo</label>
                    <div class="p-2 bg-gray-200 rounded-md text-sm mb-2">Photo must be less than 4MB.</div>
                    <input name="picture" id="picture" class="input" accept="image/*" type="file"
                           value="{{ old('picture') }}" >
                    <div>
                        <label for="anonymous">Do you want this Journey to be anonymous?</label>
                        <select name="is_anonymous" id="anonymous" class="input form-select">
                            <option value="1">Yes, make this journey by anonymous</option>
                            <option value="0" selected>No, share myself as the author.</option>
                        </select>
                    </div>

                    <label for="introduction">Journey Introduction</label>
                    <textarea rows="6" class="input" autocomplete="off" name="introduction" id="introduction"
                              placeholder="You can enter anything here, but this serves as an introduction to your journey at the top of your journey page.">{{ old('introduction') }}</textarea>
                    <button type="submit" class="btn btn-primary">Begin Sharing</button>
                </form>
            </div>
        </div>


    </section>
@endsection
