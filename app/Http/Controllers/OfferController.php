<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Models\Offer;
use Auth;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            $result = Offer::all();
            return $result;
        }

        $offers = $user->offers;
        return $offers;
    }

    public function ignored()
    {
        $user = Auth::user();
        $offers = $user->offers()->where('status', 'ignored')->get();
        return $offers;
    }

    public function gone()
    {
        $user = Auth::user();
        $offers = $user->offers()->where('status', 'gone')->get();
        return $offers;
    }
    public function caught()
    {
        $user = Auth::user();
        $offers = $user->offers()->where('status', 'caught')->get();
        return $offers;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOfferRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOfferRequest $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
