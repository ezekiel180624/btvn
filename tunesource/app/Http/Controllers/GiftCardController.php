<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GiftCard;

class GiftCardController extends Controller
{
    public function index()
    {
        $gift_cards = GiftCard::all();
        return view('gift-cards.index', compact('gift_cards'));
    }

    public function create()
    {
        return view('gift-cards.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'code' => 'required',
            'amount' => 'required',
            'expiration_date' => 'required',
        ]);

        // Create a new gift card
        $gift_card = new GiftCard();
        $gift_card->code = $request->code;
        $gift_card->amount = $request->amount;
        $gift_card->expiration_date = $request->expiration_date;
        $gift_card->save();

        return redirect()->route('gift-cards.index')->with('success', 'Gift Card created successfully');
    }

    public function edit($id)
    {
        $gift_card = GiftCard::find($id);

        if (!$gift_card) {
            abort(404); // or handle the case where the gift card doesn't exist
        }

        return view('gift-cards.edit', compact('gift_card'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'code' => 'required',
            'amount' => 'required',
            'expiration_date' => 'required',
        ]);

        $gift_card = GiftCard::find($id);

        if (!$gift_card) {
            abort(404); // or handle the case where the gift card doesn't exist
        }

        // Update the gift card
        $gift_card->code = $request->code;
        $gift_card->amount = $request->amount;
        $gift_card->expiration_date = $request->expiration_date;
        $gift_card->save();

        return redirect()->route('gift-cards.index')->with('success', 'Gift Card updated successfully');
    }

    public function show($id)
    {
        $gift_card = GiftCard::find($id);

        if (!$gift_card) {
            abort(404); // or handle the case where the gift card doesn't exist
        }

        return view('gift-cards.show', compact('gift_card'));
    }

    public function destroy($id)
    {
        $gift_card = GiftCard::find($id);

        if (!$gift_card) {
            abort(404); // or handle the case where the gift card doesn't exist
        }

        $gift_card->delete();

        return redirect()->route('gift-cards.index')->with('success', 'Gift Card deleted successfully');
    }
}