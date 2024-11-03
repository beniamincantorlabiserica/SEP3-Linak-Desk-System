<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeskUsage;

class DeskUsageController extends Controller
{
    public function addDeskUsage(Request $request)
    {
        $request->validate([
            'DeskID' => 'required|string|unique:desk_usages,DeskID',
            'HeightSettings' => 'required|numeric',
            'AdjustmentFrequency' => 'required|integer',
            'AdjustmentDuration' => 'required|integer',
        ]);

        $deskUsage = DeskUsage::create([
            'DeskID' => $request->DeskID,
            'HeightSettings' => $request->HeightSettings,
            'AdjustmentFrequency' => $request->AdjustmentFrequency,
            'AdjustmentDuration' => $request->AdjustmentDuration,
        ]);

        return response()->json(['message' => 'Desk usage data added successfully!', 'data' => $deskUsage]);
    }

    public function getDeskUsage()
    {
        $deskUsages = DeskUsage::all();
        return response()->json(['data' => $deskUsages]);
    }
}

