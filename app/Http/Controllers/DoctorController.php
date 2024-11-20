<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DoctorController extends Controller
{


    public function register(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:doctors,email',
        'password' => 'required|string|min:8|confirmed',
        'phone_number' => 'required|string|max:15',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'role' => 'required|string|max:50',
        'specialization' => 'required|string|max:255',
        'clinic_address' => 'required|string|max:255',
    ]);

    if ($request->hasFile('photo')) {
        $validatedData['photo'] = $request->file('photo')->store('photos', 'public');
    }

    // Encrypt the password
    $validatedData['password'] = Crypt::encrypt($validatedData['password']);

    // Save the doctor
    $doctor = Doctor::create($validatedData);

    return response()->json(['message' => 'Doctor registered successfully!', 'doctor' => $doctor], 201);
}



public function login(Request $request)
{
    $validatedData = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string|min:8',
    ]);

    $doctor = Doctor::where('email', $validatedData['email'])->first();

    if (!$doctor) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    // Decrypt and compare the stored password
    if (Crypt::decrypt($doctor->password) !== $validatedData['password']) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    // Generate a token (optional, for API-based authentication)
    $token = $doctor->createToken('doctor-auth-token')->plainTextToken;

    return response()->json([
        'message' => 'Login successful',
        'doctor' => $doctor,
        'token' => $token, // Optional
    ]);
}



}
