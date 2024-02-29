@extends('layout')
@section('title', 'Announce')
@section('content')
    <div>
        <h1 class="font-bold text-2xl ml-3">Home announce List</h1>
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
                <th scope="col" class="px-6 py-3">type</th>
                <th scope="col" class="px-6 py-3">reservation_type</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
            </thead>
            <tbody>
            @if($announces->count() > 0)
                @foreach($announces as $rs)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td>
                            <div class="w-16 h-16">
                                <img class="object-cover w-full h-full" src="{{ asset('storage/' . $rs->image ) }}" alt="receipt image">
                            </div>
                        </td>

                        <td>
                            {{ $rs->title }}
                        </td>
                        <td>
                            {{Str::limit($rs->description, 20)}}
                        </td>
                        <td>
                            {{ $rs->price }}
                        </td>
                        <td>
                            {{ $rs->type }}
                        </td>
                        <td>
                            {{ $rs->reservation_type}}
                        </td>
                        <td class="w-36">
                            <div class="h-14 pt-5">
                                <a href="{{ route('announce.show', $rs->id) }}" class="text-blue-800">Detail</a> |
                                <a href="{{ route('announce.edit', $rs->id)}}" class="text-green-800 pl-2">Edit</a> |
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
                    <td class="text-center" colspan="5">announce not found</td>
                </tr>
            @endif
            </tbody>
        </table>



    </div>
@endsection
