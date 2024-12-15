<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CarMake;
use App\Models\CarModel;

use App\Http\Resources\CarMake as CarMakeResource;
use App\Http\Resources\CarModel as CarModelResource;
class CarsController extends Controller
{
    public function getCarMakes()
    {
        $carMake = CarMake::all();
        $success['status'] = 'success';
        $success['api_status'] = 200;
        $success['message'] = '';
        $success['carMake'] = CarMakeResource::collection($carMake);
        return response()->json($success, 200);
    }

    public function getCarModels(Request $request)
    {
        $carModel = CarModel::where('make_id', $request->make_id)->get();
        $success['status'] = 'success';
        $success['api_status'] = 200;
        $success['message'] = '';
        $success['carModel'] = CarModelResource::collection($carModel);
        return response()->json($success, 200);
    }

}
