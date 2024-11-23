<?php

<<<<<<< HEAD
namespace App\Http\Controllers;

=======
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
>>>>>>> 11108f1273b7ea9f4965ae82f275cbc6d21399dd
use App\Models\Image_record;
use App\Models\Medical_record;
use App\Models\Voice_record;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PatientMediaController extends Controller
{
    public function getMultimodalData($id): JsonResponse
    {
        $medicalRecords = Medical_record::where('patient_id', $id)->get();
        $imageRecords = Image_record::where('patient_id', $id)->get();
        $voiceRecords = Voice_record::whereIn('medical_record_id', $medicalRecords->pluck('id'))->get();

        return response()->json([
            'medicalRecords' => $medicalRecords,
            'imageRecords' => $imageRecords,
            'voiceRecords' => $voiceRecords,
        ]);
    }
}
