<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AppointmentController extends Controller
{
    public function showBookingForm()
    {
        return view('appointment.booking');
    }

    public function bookAppointment(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'parentage' => 'required|string',
            'phone' => 'required|string',
            'email' => 'nullable|email',
            'aadhar_card_number' => 'required|string',
            'aadhar_card_image' => 'required|image',
        ]);

        $imagePath = $request->file('aadhar_card_image')->store('aadhar_cards', 'public');
        $uid = Str::uuid()->toString();

        Appointment::create([
            'name' => $request->name,
            'parentage' => $request->parentage,
            'phone' => $request->phone,
            'email' => $request->email,
            'aadhar_card_number' => $request->aadhar_card_number,
            'aadhar_card_image_path' => $imagePath,
            'uid' => $uid,
        ]);

        return redirect()->back()->with('success', 'Appointment booked successfully. Your UID is ' . $uid);
    }
}
