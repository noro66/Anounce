@extends('layout')
@section('title', 'Reservation Dashboard')
@section('content')
    {{--        @dd($announces->title)--}}
    <div class="flex justify-between pr-6">
        <div class="bg-gray-900 text-white h-screen p-5 pt-8 w-72">
            <div class="pt-4 pb-3 border-t border-gray-700">
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-white">{{ Auth::user()->name }}</div>
                        <div class="text-sm font-medium leading-none text-gray-400">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <div class="mt-3 px-2 space-y-1">
                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Your Profile</a>
                    <a href="{{ route('announce.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Announces</a>
                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Sign out</a>
                </div>
            </div>
        </div>
        <div class="w-full px-4" >
            <h1 class="font-bold pt-6 text-2xl ml-3">My reservations List</h1>
            <hr />
            @if(Session::has('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    {{ Session::get('success') }}
                </div>
            @elseif(Session::has('error'))
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif
                @if($reservations->count() > 0)
                    @foreach($reservations as $rs)
                    <div class="bg-gray-100 shadow-md rounded-lg overflow-hidden">
                        <div class="px-6 py-4">
                            <h5 class="font-bold text-xl mb-2">Reservation Details</h5>
                            <p class="text-gray-700 mb-2"><span class="font-semibold">Reservaiton ID:</span> [{{$rs->id}}]</p>
                            <p class="text-gray-700 mb-2"><span class="font-semibold">Announce  Title :   </span>{{$rs->announces->title}}</p>
                            <p class="text-gray-700 mb-4"><span class="font-semibold">Created At:</span> {{$rs->created_at}}</p>
                            <form action="{{route('reservation.destroy', $rs->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="reservation_id" value="{{$rs->id}}">
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Cancel Reservation</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="5">Announce not found</td>
                    </tr>
                @endif
        </div>
    </div>
@endsection
