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
        ]);

           
        $patient = new Patient();
        $patient->name = $validatedData['name'];
        $patient->birth_date = $validatedData['birth_date'];
        $patient->phone_number = $validatedData['phone_number'];
        $patient->password = Hash::make($validatedData['password']);    
        $patient->address = $validatedData['address'];
        $patient->gender = $validatedData['gender'];
        $patient->medical_history = $validatedData['medical_history'] ?? null;

      
        $patient->save(); 
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

            
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'phone_number' => 'nullable|string|max:15|unique:patients,phone_number,' . $id,
            'password' => 'nullable|string|min:8',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|in:Male,Female',
            'medical_history' => 'nullable|string',
        ]);

           
        if (isset($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']); // تشفير كلمة المرور
        }

        $patient->update($validatedData);

           
        return response()->json(['message' => 'Patient updated successfully', 'patient' => $patient], 200);
    }

    public function login(Request $request)
    {
        
        $validatedData = $request->validate([
            'phone_number' => 'required|string',
            'password' => 'required|string',
        ]);

           
        $credentials = $request->only('phone_number', 'password');

        try {
                
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['message' => 'Invalid phone number or password'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['message' => 'Could not create token'], 500);
        }

      
        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'patient' => auth('api')->user(),       
        ], 200);
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
