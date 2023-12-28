<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOfferRequest;
use App\Models\Category;
use App\Models\Location;
use App\Models\Offer;
use App\Services\Offerservices;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Offerservices $offerservices)
    {
        $this->authorize('viewAny', Offer::class);

        $categories = Category::orderBy('title')->get();
        $locations = Location::orderBy('title')->get();

        $offers = $offerservices->get($request->query());
        
        return view('offers.index',compact('offers','categories','locations'));
    }

     public function myOffers(Request $request, Offerservices $offerservices)
    {
        $this->authorize('viewMy', Offer::class);

        $categories = Category::orderBy('title')->get();
        $locations = Location::orderBy('title')->get();

        $offers = $offerservices->getMine($request->query());
        
        return view('offers.index',compact('offers','categories','locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Offer::class);
        $categories = Category::orderBy('title')->get();
        $locations = Location::orderBy('title')->get();
        return view('offers.create',compact('categories','locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOfferRequest $request, Offerservices $offerservices)
    {
        $this->authorize('create', Offer::class);
        $offerservices->store(
            $request->validated(),
            $request->hasFile('image') ? $request->file('image') : null
        );

        return redirect()->back()->with(['success' => 'Offer created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        return view('offers.show', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer)
    {
        
        $this->authorize('update', $offer);
        $categories = Category::orderBy('title')->get();
        $locations = Location::orderBy('title')->get();
        return view('offers.edit', compact('offer','categories', 'locations'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreOfferRequest $request, Offer $offer,Offerservices $offerservices)
    {
        $this->authorize('update', $offer);

        $offerservices->update(
            $offer,
            $request->validated(),
            $request->hasFile('image') ? $request->file('image') : null
        );

        return redirect()->back()->with(['success' => 'Offer updated']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer,Offerservices $offerservices)
    {   
        $offerservices->destroy($offer);

        return response('Offer deleted');
 
    }
}
