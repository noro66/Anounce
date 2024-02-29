@extends('layout')
@section('title', 'Announce')
@section('content')
    <h3 class="my-10 text-center text-3xl text-gray-900">Edit  Announce</h3>
    <div class="w-lg flex flex-col items-center justify-center">
        <form action="{{ route('announce.update', $announce->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
                <input type="text" id="title" name="title" placeholder="Title" value="{{$announce->title  ?? old('title')  }}" class="mt-1 px-6 py-2 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                <textarea id="description" name="description" placeholder="Description" rows="3" class="mt-1 px-6 py-2 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{$announce->description ?? old('description') }}</textarea>
                @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-700">Type:</label>
                <select id="type" name="type"  class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="" >Select a choice</option>
                    <option @if($announce->type === "room" ) selected @endif  value="room">Room</option>
                    <option @if($announce->type === "house" ) selected @endif  value="house">House</option>
                    <option @if($announce->type === "villa" ) selected @endif  value="villa">Villa</option>
                    <option @if($announce->type === "farm" ) selected @endif  value="farm">Farm</option>
                </select>
                @error('type') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="reservation_type" class="block text-sm font-medium text-gray-700">Reservation Type:</label>
                <select id="reservation_type" name="reservation_type" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="" selected>Select Reservation Type</option>
                    <option @if($announce->reservation_type === "rent" ) selected @endif  value="rent">Rent</option>
                    <option @if($announce->reservation_type === "sell" ) selected @endif  value="sell">Sell</option>
                </select>
                @error('reservation_type') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Price:</label>
                <input type="number" id="price" name="price" placeholder="*****DH" value="{{$announce->price  ?? old('price') }}" class="mt-1 p-2 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('price') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Image:</label>
                <input type="file" id="image"  name="image" class="mt-1 block w-full">
                @error('image') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50">Submit</button>
        </form>
    </div>
@endsection
