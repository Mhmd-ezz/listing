<?php

namespace App\Http\Controllers;

use App\Http\Resources\ListingResource;
use App\Models\Listing;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;

class ListingController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Listing/Index', [
            'listings' => ListingResource::collection(Listing::latest()->paginate(10))
        ]);
    }

    public function show(Listing $listing): Response
    {
        return Inertia::render('Listing/Show', [
            'listing' => ListingResource::make($listing)
        ]);
    }

    public function create(): Response
    {
        return inertia('Listing/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        Listing::create(
            $request->validate([
                'beds' => 'required|numeric|min:1',
                'baths' => 'required|numeric|min:1',
                'area' => 'required|numeric|min:1',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|numeric',
                'price' => 'required|numeric',
            ])
        );
        return redirect()->route('listing.index')->with('success', 'Listing was created!');
    }

    public function edit(Listing $listing)
    {
        return Inertia::render('Listing/Edit', [
            'listing' => ListingResource::make($listing)
        ]);
    }

    public function update(Request $request, Listing $listing): RedirectResponse
    {
        $listing->update(
            $request->validate([
                'beds' => 'required|numeric|min:1',
                'baths' => 'required|numeric|min:1',
                'area' => 'required|numeric|min:1',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|numeric',
                'price' => 'required|numeric',
            ])
        );
        return redirect()->route('listing.index')->with('success', 'Listing was updated!');
    }

    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect()->back()->with('success', 'Listing was deleted!');
    }
}
