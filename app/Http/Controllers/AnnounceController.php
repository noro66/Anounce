<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnounceRequest;
use App\Models\Announce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnounceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announces = Announce::all();
        return view('announces.index', compact('announces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('announces.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnnounceRequest $request)
    {

        $AnnounceForm = $request->validated();
        $AnnounceForm['image']  = $request->file('image')->store('Announces', 'public');
        $AnnounceForm['user_id'] = Auth::id();
        Announce::create($AnnounceForm);
        return to_route('announce.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
