@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-4 pt-16 ">
        <!-- Start actor-info -->
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row border-b border-gray-800">
            <div class="flex-none">
                <img src="{{ $actor['profile_path'] }}" alt="profile image"
                    class="hover:opacity-75 transition ease-in-out duration-150 w-64 lg:w-96">

                <ul class="flex items-center mt-4">

                    @if ($actor['facebook'])
                        <li>
                            <a href="{{ $actor['facebook'] }}" title="Facebook">
                                <svg class="fill-current text-gray-400 hover:text-white w-6" viewBox="0 0 448 512">
                                    <path
                                        d="M448 56.7v398.5c0 13.7-11.1 24.7-24.7 24.7H309.1V306.5h58.2l8.7-67.6h-67v-43.2c0-19.6 5.4-32.9 33.5-32.9h35.8v-60.5c-6.2-.8-27.4-2.7-52.2-2.7-51.6 0-87 31.5-87 89.4v49.9h-58.4v67.6h58.4V480H24.7C11.1 480 0 468.9 0 455.3V56.7C0 43.1 11.1 32 24.7 32h398.5c13.7 0 24.8 11.1 24.8 24.7z" />
                                </svg>
                            </a>
                        </li>
                    @endif

                    @if ($actor['instagram'])
                        <li class="ml-6">
                            <a href="{{ $actor['instagram'] }}" title="Instagram">
                                <svg class="fill-current text-gray-400 hover:text-white w-6" viewBox="0 0 448 512">
                                    <path
                                        d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                </svg>
                            </a>
                        </li>
                    @endif

                    @if ($actor['twitter'])
                        <li class="ml-6">
                            <a href="{{ $actor['twitter'] }}" title="Twitter">
                                <svg class="fill-current text-gray-400 hover:text-white w-6" viewBox="0 0 512 512">
                                    <path
                                        d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
                                </svg>
                            </a>
                        </li>
                    @endif
                    @if ($actor['tiktok'])
                        <li class="ml-6">
                            <a href="{{ $actor['tiktok'] }}" title="TikTok">
                                <svg class="fill-current text-gray-400 hover:text-white w-6" viewBox="0 0 512 512">
                                    <path
                                        d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z" />
                                </svg>
                            </a>
                        </li>
                    @endif

                </ul>
            </div>
            <div class="md:ml-24">
                <h2 class="text-4xl mt-4 md:mt-0 font-semibold">{{ $actor['name'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <svg class="fill-current text-gray-400 hover:text-white w-4" viewBox="0 0 448 512">
                        <path
                            d="M448 384c-28.02 0-31.26-32-74.5-32-43.43 0-46.825 32-74.75 32-27.695 0-31.454-32-74.75-32-42.842 0-47.218 32-74.5 32-28.148 0-31.202-32-74.75-32-43.547 0-46.653 32-74.75 32v-80c0-26.5 21.5-48 48-48h16V112h64v144h64V112h64v144h64V112h64v144h16c26.5 0 48 21.5 48 48v80zm0 128H0v-96c43.356 0 46.767-32 74.75-32 27.951 0 31.253 32 74.75 32 42.843 0 47.217-32 74.5-32 28.148 0 31.201 32 74.75 32 43.357 0 46.767-32 74.75-32 27.488 0 31.252 32 74.5 32v96zM96 96c-17.75 0-32-14.25-32-32 0-31 32-23 32-64 12 0 32 29.5 32 56s-14.25 40-32 40zm128 0c-17.75 0-32-14.25-32-32 0-31 32-23 32-64 12 0 32 29.5 32 56s-14.25 40-32 40zm128 0c-17.75 0-32-14.25-32-32 0-31 32-23 32-64 12 0 32 29.5 32 56s-14.25 40-32 40z" />
                    </svg>
                    <span class="ml-2">{{ $actor['birthday'] }} ({{ $actor['age'] }} years old) in
                        {{ $actor['place_of_birth'] }}</span>
                </div>

                <p class="text-gray-300 mt-8">
                    {{ $actor['biography'] }}
                </p>

                <h4 class="font-semibold mt-12">Known For</h4>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
                    @foreach ($actor['castMovies'] as $movie)
                        <div class="mt-4">
                            <a href="{{ route('movies.show', ['id' => $movie['id']]) }}"><img
                                    src="{{ $movie['poster_path'] }}" alt="poster"
                                    class="hover:opacity-75 transition ease-in-out duration-150"></a>
                            <a href="{{ route('movies.show', ['id' => $movie['id']]) }}"
                                class="text-sm leading-normal block text-gray-400 hover:text-white mt-1">{{ $movie['original_title'] }}</a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- End movie-info -->
        <!--  Start ovie-cast -->
        <div class="credits border-b border-gray-800">
            <div class="container mx-auto px-4 py-16">
                <h2 class="text-4xl font-semibold">Credits</h2>
                <ul class="list-disc leading-loose pl-5 mt-8">
                    @foreach ($actor['credits'] as $credit)
                        <li>
                            {{ $credit['release_date'] }} &middot;
                            <strong><a href="{{ route('movies.show', ['id' => $credit['id']]) }}"
                                    class="hover:underline">{{ $credit['original_title'] }}</a></strong>
                            as {{ $credit['character'] }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- End movie-cast -->
    </div>
@endsection
