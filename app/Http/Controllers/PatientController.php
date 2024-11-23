<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function register(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'birth_date' => 'required|date',
        'phone_number' => 'required|string|max:15|unique:patients',
        'password' => 'required|string|min:8',
        'address' => 'required|string|max:255',
        'gender' => 'required|in:Male,Female',
        'medical_history' => 'nullable|string',
        'case_number' => 'required|integer|unique:patients,case_number', // Validate case_number as unique
    ]);

    // Create and assign a new Patient instance
    $patient = new Patient();
    $patient->name = $validatedData['name'];
    $patient->birth_date = $validatedData['birth_date'];
    $patient->phone_number = $validatedData['phone_number'];
    $patient->password = Hash::make($validatedData['password']);
    $patient->address = $validatedData['address'];
    $patient->gender = $validatedData['gender'];
    $patient->medical_history = $validatedData['medical_history'] ?? null;
    $patient->case_number = $validatedData['case_number']; // Assign the unique case number

    // Save the patient record
    $patient->save();

    // Return the success response
    return response()->json(['message' => 'Patient registered successfully', 'patient' => $patient], 201);
}



    public function delete($id)
    {
        $patient = Patient::find($id);

            
        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        
        $patient->delete();

           
        return response()->json(['message' => 'Patient deleted successfully'], 200);
    }


    public function update(Request $request, $id)
{
          
    $patient = Patient::find($id);

        
    if (!$patient) {
        return response()->json(['message' => 'Patient not found'], 404);
    }

          
    $data = $request->all();

        
    if (isset($data['password'])) {
        unset($data['password']);         
    }

               
    foreach ($data as $key => $value) {
         
        if (in_array($key, ['name', 'birth_date', 'phone_number', 'address', 'gender', 'medical_history'])) {
            $patient->$key = $value;
        }
    }

      
    $patient->save();

    
    return response()->json(['message' => 'Patient updated successfully', 'patient' => $patient], 200);
}

    


public function login(Request $request)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'phone_number' => 'required|string',
            'password' => 'required|string',
        ]);

        // Find user by phone number
        $user = Patient::where('phone_number', $validatedData['phone_number'])->first();

        // Check if user exists and the password matches
        if (!$user || !Hash::check($validatedData['password'], $user->password)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Generate Sanctum Token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function logout(Request $request)
    {
        // Revoke the token of the authenticated user
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }

    public function refresh(Request $request)
    {
        return response()->json(['message' => 'Sanctum does not use refresh tokens. Please log in again if needed.'], 400);
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
