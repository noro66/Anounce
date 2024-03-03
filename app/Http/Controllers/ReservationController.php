<?php

namespace App\Http\Controllers;

use App\Models\Announce;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Auth::user()->reservation;
        return view('reservation.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $announce = $request->input('announce_id');
        return view('reservation.create', compact('announce'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ReservationForm['user_id'] = Auth::id();
        $ReservationForm['announce_id'] = $request->input('announce_id');

//       dd($ReservationForm);
       $re = Reservation::create($ReservationForm);
        return to_route('home')->with('success', 'Reservation added successfully !' );
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        if($reservation->user_id === Auth::id()){
            $createdAt = $reservation->created_at;
            $currentTime = Carbon::now();
            $diff = $currentTime->diffInHours($createdAt);
            if ($diff < 2){
                $reservation->delete();
                to_route('profile');
            }else{
                return to_route('profile')->with('error', 'You cant cancel the reservation because you passed the limit time ...');
            }
        }else{
            return to_route('profile')->with('error', 'You dont have the ability to cancel the reservation ...');
        }
    }
}
