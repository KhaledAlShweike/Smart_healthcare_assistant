<?php

namespace App\Http\Controllers;

use App\Models\Image_record;
use App\Models\Medical_record;
use App\Models\Voice_record;
use Illuminate\Http\Request;

class PatientMediaController extends Controller
{
    public function getMultimodalData($id)
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
