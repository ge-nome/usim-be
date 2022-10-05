<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Lab;
use App\Models\Medical;
use Illuminate\Http\Request;

class MedicalsController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // try {
                $data =  Lab::create([
                    'mat_no' => $request->mat_no,
                    'weight' => $request->weight,
                    'height' => $request->height,
                    'eye_vision' => $request->eye_vision,
                    'blood_press' => $request->blood_press,
                    'hb' => $request->hb,
                    'genotype' => $request->genotype,
                    'hiv' => $request->hiv,
                    'wbc' => $request->wbc,
                    'urine_microscopy' => $request->urine_microscopy,
                    'urinalysis' => $request->urinalysis,
                    'stool_microscopy' => $request->stool_microscopy,
                    'kin_snip' => $request->kin_snip,
                    'pregnancy' => $request->pregnancy,
                    'recomendation' => $request->recomendation,
                    'officer' => $request->officer
                ]);
                return response()->json([
                    'message' => 'update Successful',
                    'data' => $data
                ]);
        // } catch (\Throwable $th) {
        //     return response()->json([
        //         'message' => 'Unable to update student record',
        //         'error' => $th,
        //     ], 406);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        try {
            return Lab::all()->where('mat_no', $request->mat_no)->first();
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'unable to identify student data',
                'error' => $th,
            ], 406);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request)
    {
        // return $request->weight;
        try {
            Lab::where('mat_no', $request->mat_no)
            ->update([
                'mat_no' => $request->mat_no,
                'weight' => $request->weight,
                'height' => $request->height,
                'eye_vision' => $request->eye_vision,
                'blood_press' => $request->blood_press,
                'hb' => $request->hb,
                'genotype' => $request->genotype,
                'hiv' => $request->hiv,
                'wbc' => $request->wbc,
                'urine_microscopy' => $request->urine_microscopy,
                'urinalysis' => $request->urinalysis,
                'stool_microscopy' => $request->stool_microscopy,
                'kin_snip' => $request->kin_snip,
                'pregnancy' => $request->pregnancy,
                'recomendation' => $request->recomendation,
                'officer' => $request->officer
            ]);
            return response()->json([
                'message' => 'Updated successfully',
            ]);
    } catch (\Throwable $th) {
        return response()->json([
            'message' => 'Unable to update student record',
            'error' => $th,
        ], 404);
    }
    }

}
