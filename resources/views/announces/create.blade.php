@extends('layout')
@section('title', 'Announce')
@section('content')
    <div class="flex  items-center justify-evenly">
        <h1 class="text-2xl font-bold mb-4">Create Announce :   </h1>
        <a href="{{route('announce.index')}}" class=" block  px-8 rounded bg-blue-600 text-white py-2 s" >Back</a>
    </div>
    <div class="w-lg flex flex-col items-center justify-center">
        <form action="{{ route('announce.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
                <input type="text" id="title" name="title" placeholder="Title" value="{{ old('title') }}" class="mt-1 px-6 py-2 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                <textarea id="description" name="description" placeholder="Description" rows="3" class="mt-1 px-6 py-2 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('description') }}</textarea>
                @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-700">Type:</label>
                <select id="type" name="type" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="" selected>Select a choice</option>
                    <option value="room">Room</option>
                    <option value="house">House</option>
                    <option value="villa">Villa</option>
                    <option value="farm">Farm</option>
                </select>
                @error('type') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="reservation_type" class="block text-sm font-medium text-gray-700">Reservation Type:</label>
                <select id="reservation_type" name="reservation_type" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="" selected>Select Reservation Type</option>
                    <option value="rent">Rent</option>
                    <option value="sell">Sell</option>
                </select>
                @error('reservation_type') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Price:</label>
                <input type="number" id="price" name="price" placeholder="*****DH" value="{{ old('price') }}" class="mt-1 p-2 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
