@extends('layout')
@section('title', 'Resrvation')
@section('content')
    <div class="flex flex-col items-center mt-20">
        <div class="mb-4">
            <a href="{{ route('home') }}" class="px-6 py-2 bg-red-500 text-white rounded-md hover:bg-red-700">Cancel</a>
        </div>
        <div class="max-w-md mx-auto bg-white shadow-md rounded px-8 py-6">
            <form action="{{ route('reservation.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="message" class="block text-gray-700 font-bold mb-2">Confirmation Message: (Optional)</label>
                    <textarea id="message" name="message" rows="4" class="form-textarea border border-gray-300 rounded-md w-full px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Enter your message">
                    </textarea>
                </div>
                <input type="hidden" name="announce_id" value="{{ $announce }}">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none">Submit Reservation</button>
            </form>
        </div>
    </div>


@endsection
