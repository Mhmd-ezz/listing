<?php

namespace App\Http\Controllers;

use App\Http\Resources\ListingResource;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;

class ListingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->authorizeResource(Listing::class, 'listing');
    }
    public function index(Request $request): Response
    {
        $filters = $request->only([
            'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
        ]);
        return Inertia::render('Listing/Index', [
            'filters' => $filters,
            'listings' => ListingResource::collection(
                Listing::latest()
                    ->filter($filters)
                    ->paginate(10)
                    ->withQueryString()
            )
        ]);
    }

    public function show(Listing $listing): Response
    {
//        if (Auth::user()->cannot('view', $listing)) {
//            abort(403);
//        }
        $this->authorize('view', $listing);
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
        $request->user()->listings()->create(
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
