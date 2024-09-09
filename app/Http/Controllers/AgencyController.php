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
        $validatedData = $request->validate([
            'agency_name' => 'required|string|max:255',
            'agency_address' => 'required|string|max:255',
            'email_address' => 'required|string|email|max:255|unique:agencies',
            'contact_number' => 'required|string|max:15',
            'landline_number' => 'nullable|string|max:15',
            'geo_coverage' => 'required|in:local,national,international',
            'employee_count' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
            'agency_business_permit' => 'nullable|file|mimes:pdf,jpeg,png,jpg,gif,webp|max:2048',
            'agency_dti_permit' => 'nullable|file|mimes:pdf,jpeg,png,jpg,gif,webp|max:2048',
            'agency_bir_permit' => 'nullable|file|mimes:pdf,jpeg,png,jpg,gif,webp|max:2048'

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
                    $fileName = time() . '-' . $field . '.' . $request->file($field)->extension();
                    $request->file($field)->move(public_path('agencyfiles'), $fileName);
                    $path = 'agencyfiles/' . $fileName;
                } catch (\Exception $e) {
                    Log::error($field . ' upload failed: ' . $e->getMessage());
                    return response()->json([
                        'message' => 'Failed to upload file for ' . $field,
                        'status' => 'error'
                    ], 422);
                }
            }
        }

        // Create the agency record
        try {
            Agency::create([
                'agency_name' => $validatedData['agency_name'],
                'agency_address' => $validatedData['agency_address'],
                'email_address' => $validatedData['email_address'],
                'contact_number' => $validatedData['contact_number'],
                'landline_number' => $validatedData['landline_number'],
                'geo_coverage' => $validatedData['geo_coverage'],
                'employee_count' => $validatedData['employee_count'],
                'agency_business_permit' => $filePaths['agency_business_permit'],
                'agency_dti_permit' => $filePaths['agency_dti_permit'],
                'agency_bir_permit' => $filePaths['agency_bir_permit'],
                'password' => Hash::make($validatedData['password']),
            ]);
        } catch (\Exception $e) {
            Log::error('Database insert failed: ' . $e->getMessage());
            return response()->json([
                'message' => 'Failed to create account.',
                'status' => 'error'
            ], 500);
        }

        return response()->json([
            'message' => 'Account Created Successfully',
            'status' => 'success'
        ], 201);
    }
}
