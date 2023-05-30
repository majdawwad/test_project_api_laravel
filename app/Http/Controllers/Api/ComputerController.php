<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ComputerResource;
use App\Models\Computer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComputerController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $computers = ComputerResource::collection(Computer::get());

        try {
            if ($computers === false) {
                return $this->ApiResponse([], "no computers", 404);
            } else {
                return $this->ApiResponse($computers, "Computers have been showing successfuly", 200);
            }
        } catch (\Throwable $th) {
            return $this->ApiResponse([], $th, 404);
        }
    }


    public function show($id)
    {
        $computer = Computer::find($id);

        try {
            if ($computer) {
                return $this->ApiResponse(new ComputerResource($computer), "Computer has been showing successfuly", 200);
            } else {
                return $this->ApiResponse(null, "this computer is not found", 404);
            }
        } catch (\Throwable $th) {
            return $this->ApiResponse([], $th, 404);
        }
    }

    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => ['required', 'max:15'],
            'origin' => ['required', 'max:30'],
            'price' => ['required', 'integer']
        ]);

        if ($valid->fails()) {
            return $this->ApiResponse(null, $valid->errors(), 400);
        }

        $computer = Computer::create($request->all());

        try {

            if ($computer) {
                return $this->ApiResponse(new ComputerResource($computer), "Computer has been craeting successfuly", 201);
            } else {
                return $this->ApiResponse(null, "There is a failure in the creating's operation", 400);
            }
        } catch (\Throwable $th) {
            return $this->ApiResponse(['message' => 'There is a wrong!'], $th, 404);
        }
    }

    public function update(Request $request, $id)
    {
        $valid = Validator::make($request->all(), [
            'name' => ['required', 'max:15'],
            'origin' => ['required', 'max:30'],
            'price' => ['required', 'integer']
        ]);

        if ($valid->fails()) {
            return $this->ApiResponse(null, $valid->errors(), 400);
        }

        $computer = Computer::find($id);
        if(!$computer){
            return $this->ApiResponse(null, "this computer is not found", 404);
        }

        $computer->update($request->all());

        try {

            if ($computer) {
                return $this->ApiResponse(new ComputerResource($computer), "Computer has been updating successfuly", 200);
            } else {
                return $this->ApiResponse(null, "There is a failure in the creating's operation", 400);
            }
        } catch (\Throwable $th) {
            return $this->ApiResponse(['message' => 'There is a wrong!'], $th, 404);
        }
    }

    public function destroy($id){

        $computer = Computer::find($id);

        if(!$computer){
            return $this-> apiResponse(null, "this computer is not found", 404);
        }

        $computer->delete($id);

        if($computer){
            return $this->apiResponse([], "Computer has been deleting successfully", 200);
        }
    }
}
