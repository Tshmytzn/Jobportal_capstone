<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AgencyController extends Controller
{
    /**
     * Store a newly created agency in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function RegisterAgency(Request $request)
    {
        // Validate the form data
        $request->validate([
            'agency_name' => 'required|string|max:255',
            'agency_address' => 'required|string|max:255',
            'email_address' => 'required|string|email|max:255|unique:agencies',
            'contact_number' => 'required|string|max:15',
            'landline_number' => 'nullable|string|max:15',
            'geo_coverage' => 'required|in:local,national,international',
            'employee_count' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
            'agency_business_permit' => 'nullable|file|mimes:pdf,jpeg,png,jpg,gif|max:2048', // Validate file
            'agency_dti_permit' => 'nullable|file|mimes:pdf,jpeg,png,jpg,gif|max:2048', // Validate file
            'agency_bir_permit' => 'nullable|file|mimes:pdf,jpeg,png,jpg,gif|max:2048', // Validate file
        ]);

        // Handle file uploads
        $filePaths = [
            'agency_business_permit' => null,
            'agency_dti_permit' => null,
            'agency_bir_permit' => null,
        ];

        foreach ($filePaths as $field => &$path) {
            if ($request->hasFile($field)) {
                try {
                    $fileName = time() . '-' . $field . '.' . $request->$field->extension();
                    $request->$field->move(public_path('uploads'), $fileName);
                    $path = 'uploads/' . $fileName;
                } catch (\Exception $e) {
                    Log::error($field . ' upload failed: ' . $e->getMessage());
                    return redirect()->back()->withErrors([$field => 'Failed to upload file.']);
                }
            }
        }

        // Create the agency record
        try {
            Agency::create([
                'agency_name' => $request->input('agency_name'),
                'agency_address' => $request->input('agency_address'),
                'email_address' => $request->input('email_address'),
                'contact_number' => $request->input('contact_number'),
                'landline_number' => $request->input('landline_number'),
                'geo_coverage' => $request->input('geo_coverage'),
                'employee_count' => $request->input('employee_count'),
                'agency_business_permit' => $filePaths['agency_business_permit'],
                'agency_dti_permit' => $filePaths['agency_dti_permit'],
                'agency_bir_permit' => $filePaths['agency_bir_permit'],
                'agency_image' => $filePaths['agency_image'],
                'password' => Hash::make($request->input('password')),
            ]);
        } catch (\Exception $e) {
            Log::error('Database insert failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Failed to create agency.']);
        }

        return redirect()->route('login')->with('success', 'Agency created successfully.');
    }

}
