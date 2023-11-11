@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-4 pt-16">
        <!-- Start pouplar-Actors -->
        <x-elements-container title="Popular Actors">
            @foreach ($popularActors['data'] as $actor)
                <x-actor-list-card :actor="$actor" />
            @endforeach
        </x-elements-container>
        <!-- End pouplar-Actors -->
        <!-- Start pagination -->
        <div class="flex justify-center my-4">
            <ul class="flex items-center -space-x-px h-10 text-base">
                <li>
                    <a href="{{ $has_previous ? route('actors.index', ['page' => $current_page - 1]) : '#' }}"
                        class="flex items-center justify-center px-4 h-10 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg {{ $has_previous ? 'hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-gray-700 dark:hover:text-white' : 'cursor-not-allowed opacity-50' }}"
                        @if (!$has_previous) aria-disabled="true" @endif>
                        <span class="sr-only">Previous</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                    </a>
                </li>

                <li>
                    <a href="{{ $has_next ? route('actors.index', ['page' => $current_page + 1]) : '#' }}"
                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg {{ $has_next ? 'hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-gray-700 dark:hover:text-white' : 'cursor-not-allowed opacity-50' }}"
                        @if (!$has_next) aria-disabled="true" @endif>
                        <span class="sr-only">Next</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End pagination -->
    </div>
@endsection
