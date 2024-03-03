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


    public function search(Request $request)
    {
        $query = $request->input('query');

        $announces = Announce::where('title', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->get();

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
        return to_route('admin.dashboard')->with('success', 'Announce added successfully !' );
    }

    /**
     * Display the specified resource.
     */
    public function show(Announce $announce)
    {
        return view('announces.show', compact('announce'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announce $announce)
    {
        return view('announces.edit', compact('announce'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnnounceRequest $request, Announce $announce)
    {
        if (Auth::id() === $announce->user_id){
        $AnnounceForm = $request->validated();
        if ($request->hasFile('image')){
            $AnnounceForm['image']  = $request->file('image')->store('Announces', 'public');
        }else{
            unset($AnnounceForm['image']);
        }

            $announce->fill($AnnounceForm)->save();
        return to_route('announce.index')->with('success', 'Announce updated successfully !' );
        }else{
            return to_route('/')->with('error', 'you dont have the ability to edit this announce');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announce $announce)
    {
        if (Auth::id() === $announce->user_id) {
            $announce->delete();
            return to_route('announce.index')->with('success', 'announce deleted successfully');
        }else{
            return to_route('/')->with('error', 'you have dont the ability to delete this announce');
        }
    }
}
