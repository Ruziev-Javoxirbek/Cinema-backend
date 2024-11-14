<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Session;


class BookingController extends Controller
{
    public function index()
    {
        $bookings = auth()->user()->sessions()->withPivot('quantity', 'price')->get();
        return view('bookings.index', compact('bookings'));
    }

    public function showBookingForm($sessionId)
    {
        $session = Session::findOrFail($sessionId);
        return view('bookings.create', compact('session'));
    }

    public function storeBooking(Request $request, $sessionId)
    {
        $session = Session::findOrFail($sessionId);

        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $session->available_seats,
        ]);

        $totalCost = $request->quantity * $session->ticket_price;

        // Сохраняем бронирование
        $session->users()->attach(auth()->id(), [
            'quantity' => $request->quantity,
            'price' => $totalCost,
        ]);

        // Обновляем количество доступных мест
        $session->available_seats -= $request->quantity;
        $session->save();

        return redirect()->route('bookings.index')->with('success', 'Бронирование успешно создано!');
    }
}
