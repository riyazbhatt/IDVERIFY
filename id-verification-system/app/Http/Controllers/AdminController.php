<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IdVerification;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function bulkImportForm()
    {
        $departments = Department::all();
        $designations = Designation::all();
        return view('admin.bulk_import', compact('departments', 'designations'));
    }

    public function bulkImport(Request $request)
    {
        $request->validate([
            'data' => 'required|array',
            'data.*.image' => 'required|image',
            'data.*.name' => 'required|string',
            'data.*.phone' => 'required|string',
            'data.*.department_id' => 'required|exists:departments,id',
            'data.*.designation_id' => 'required|exists:designations,id',
        ]);

        foreach ($request->data as $item) {
            $imagePath = $item['image']->store('id_images', 'public');
            $uid = Str::uuid()->toString();

            IdVerification::create([
                'image_path' => $imagePath,
                'name' => $item['name'],
                'phone' => $item['phone'],
                'department_id' => $item['department_id'],
                'designation_id' => $item['designation_id'],
                'uid' => $uid,
            ]);
        }

        return redirect()->back()->with('success', 'Bulk import completed successfully.');
    }
}
