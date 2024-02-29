@extends('layout')

@section('title', 'Show Announce')

@section('content')
    <div class="container mx-auto px-4 py-8">
            <div class="flex  items-center justify-between">
           <h1 class="text-2xl font-bold mb-4">Detail Announce</h1>
            <a href="{{route('announce.index')}}" class=" block  px-8 rounded bg-blue-600 text-white py-2 s" >Back</a>
        </div>
        <hr class="border-b border-gray-300 mb-8">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700">Title:</label>
                <div class="mt-2">{{ $announce->title }}</div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Price:</label>
                <div class="mt-2">{{ $announce->price }}</div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Announce Type:</label>
                <div class="mt-2">{{ $announce->type }}</div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Description:</label>
                <div class="mt-2">{{ $announce->description }}</div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Reservation Type:</label>
                <div class="mt-2">{{ $announce->reservation_type }}</div>
            </div>
        </div>
    </div>
@endsection
