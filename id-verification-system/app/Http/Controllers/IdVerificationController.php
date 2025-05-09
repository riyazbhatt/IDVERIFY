<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IdVerification;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class IdVerificationController extends Controller
{
    public function showVerificationPage()
    {
        $departments = Department::all();
        $designations = Designation::all();
        return view('id_verification.verify', compact('departments', 'designations'));
    }

    public function submitVerification(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'department_id' => 'required|exists:departments,id',
            'designation_id' => 'required|exists:designations,id',
            'photo' => 'required|string', // base64 image string
        ]);

        // Decode base64 image and store
        $imageData = $request->photo;
        $imageData = str_replace('data:image/png;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $imageName = 'id_photos/' . Str::uuid() . '.png';
        Storage::disk('public')->put($imageName, base64_decode($imageData));

        $uid = Str::uuid()->toString();

        $idVerification = IdVerification::create([
            'image_path' => $imageName,
            'name' => $request->name,
            'phone' => $request->phone,
            'department_id' => $request->department_id,
            'designation_id' => $request->designation_id,
            'uid' => $uid,
        ]);

        // Generate QR code and save
        $qrCodePath = 'qr_codes/' . $uid . '.png';
        Storage::disk('public')->put($qrCodePath, QrCode::format('png')->size(200)->generate($uid));

        return redirect()->route('id_verification.receipt', ['uid' => $uid]);
    }

    public function showReceipt($uid)
    {
        $idVerification = IdVerification::where('uid', $uid)->firstOrFail();
        $qrCodeUrl = Storage::url('qr_codes/' . $uid . '.png');
        $photoUrl = Storage::url($idVerification->image_path);

        return view('id_verification.receipt', compact('idVerification', 'qrCodeUrl', 'photoUrl'));
    }
}
