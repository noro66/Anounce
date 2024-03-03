@extends('layout')
@section('title', 'Announce')
@section('content')
    <!-- announcements/cards.blade.php -->
<x-nav-component/>




    <div class="container m-auto p-4">
        <div class="mx-auto max-w-md my-6">
            <form action="{{ route('announces.search') }}" method="GET" class="flex items-center justify-center">
                @csrf
                <label>
                    <input type="text" name="query" placeholder="Search Announces" class="px-4 py-2 border-2 border-gray-200 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </label>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-r-md">Search</button>
            </form>
        </div>

    <div class="grid grid-cols-3 gap-8">

        @foreach($announces as $announce)
            <div class="border w-100 rounded-lg overflow-hidden shadow-lg">
                <img src="{{ asset('storage/' . $announce->image) }}" alt="Announcement Image" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-2">{{ $announce->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ $announce->description }}</p>
                    <div class="flex items-center justify-between">
                        <p class="text-gray-700">Type: {{ $announce->type }}</p>
                        <p class="text-gray-700 font-bold">Price: {{ $announce->price }}</p>
                    </div>
                    <form action="{{route('reservation.create')}}" method="get">
                        @csrf
                        <input type="hidden" name="announce_id" value="{{ $announce->id }}">
                        <button type="submit"  class="mt-4 w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Reserve Now</button></a>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
        </div>


@endsection
