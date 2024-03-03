@extends('layout')
@section('title', 'Dashboard')
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
            <h1 class="font-bold pt-6 text-2xl ml-3">Home announce List</h1>
            <a href="{{ route('announce.create') }}" class="my-4 text-white float-right bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add announce</a>
            <hr />
            @if(Session::has('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">#</th>
                    <th scope="col" class="px-6 py-3">Image</th>
                    <th scope="col" class="px-6 py-3">Title</th>
                    <th scope="col" class="px-6 py-3">Description</th>
                    <th scope="col" class="px-6 py-3">Price</th>
                    <th scope="col" class="px-6 py-3">Type</th>
                    <th scope="col" class="px-6 py-3">Reservation Type</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
                </thead>
                <tbody>
                @if($announces->count() > 0)
                    @foreach($announces as $rs)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                <div class="w-16 h-16">
                                    <img class="object-cover w-full h-full" src="{{ asset('storage/' . $rs->image ) }}" alt="receipt image">
                                </div>
                            </td>
                            <td>
                                {{ $rs->title }}
                            </td>
                            <td>
                                {{ Str::limit($rs->description, 20) }}
                            </td>
                            <td>
                                {{ $rs->price }}
                            </td>
                            <td>
                                {{ $rs->type }}
                            </td>
                            <td>
                                {{ $rs->reservation_type }}
                            </td>
                            <td class="w-36">
                                <div class="h-14 pt-5">
                                    <a href="{{ route('announce.show', $rs->id) }}" class="text-blue-800">Detail</a> |
                                    <a href="{{ route('announce.edit', $rs->id) }}" class="text-green-800 pl-2">Edit</a> |
                                    <form action="{{ route('announce.destroy', $rs->id) }}" method="POST" onsubmit="return confirm('Delete?')" class="float-right text-red-800">
                                        @csrf
                                        @method('DELETE')
                                        <button>Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="5">Announce not found</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
