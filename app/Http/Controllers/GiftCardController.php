<?php

namespace App\Http\Controllers;

use App\Models\GiftCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GiftCardController extends Controller
{
    public function create()
    {
        return view('giftcards.generate',  ['data' => GiftCard::orderBy('created_at', 'desc')->paginate(10)]);

    }
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Generate Gift Card
    public function generate(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        try {
            $giftCard = GiftCard::create([
                'code' => strtoupper(Str::random(15)),
                'amount' => $request->amount,
            ]);

            return redirect()->back()->with('success', 'Berhasil Membuat Gift Card. Code: ' . $giftCard->code . ', Amount: ' . $giftCard->amount);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal membuat Gift Card. Silakan coba lagi.');
        }
    }

    // Redeem Gift Card
    public function redeem(Request $request)
    {
        $request->validate([
            'code' => 'required|string|exists:gift_cards,code',
        ]);

        $giftCard = GiftCard::where('code', $request->code)->first();
        $user = Auth::user();

        if ($giftCard->is_redeemed) {
            return redirect()->back()->with('error', 'Gift card has already been redeemed');
        }

        // Tidak perlu lagi mengecek username dalam request, kita langsung gunakan user yang sedang login
        $user->balance += $giftCard->amount;
        $user->save();

        $giftCard->is_redeemed = true;
        $giftCard->save();

        return redirect()->back()->with('success', 'Gift card redeemed successfully. New Balance: ' . $user->balance);
    }
    
    
}
