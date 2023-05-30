<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class ComputersController extends Controller
{

    //Array of static data
    // private static function getStaticData()
    // {
    //     return [
    //         ['id' => 1, 'name' => 'LG', 'origin' => 'Koria'],
    //         ['id' => 2, 'name' => 'HP', 'origin' => 'USA'],
    //         ['id' => 3, 'name' => 'Siemens', 'origin' => 'Germany'],
    //         ['id' => 3, 'name' => 'Lenovo', 'origin' => 'France'],
    //     ];
    // }

    public function index()
    {
        return view('computers.index', [
            'computers' => Computer::all(),
        ]);
    }

    public function create()
    {
        return view('computers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'computer-name' => 'required',
            'computer-origin' => 'required',
            'computer-price' => ['required', 'integer'],
        ]);

        $computer = new Computer();
        $computer->name = strip_tags($request->input('computer-name'));
        $computer->origin = strip_tags($request->input('computer-origin'));
        $computer->price = strip_tags($request->input('computer-price'));

        $computer->save();

        return redirect()->route('computers.index');
    }

    public function show(string $id)
    {
        //$computers = self::getStaticData();
        //$index = array_search($id, array_column($computers, 'id'));
        $computer = Computer::findOrFail($id);

        // if ($computer === false) {
        //     abort(404);
        // }

        return view('computers.show', [
            "computer" => $computer,
        ]);
    }

    public function edit(string $id)
    {
        return view('computers.edit', [
            'computer' => Computer::findOrFail($id),
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'computer-name' => 'required',
            'computer-origin' => 'required',
            'computer-price' => ['required', 'integer'],
        ]);

        $update_computer = Computer::findOrFail($id);
        $update_computer->name = strip_tags($request->input('computer-name'));
        $update_computer->origin = strip_tags($request->input('computer-origin'));
        $update_computer->price = strip_tags($request->input('computer-price'));

        $update_computer->save();

        return redirect()->route('computers.show', $id);
    }

   
    public function destroy(string $id)
    {
        $delete_computer = Computer::findOrFail($id);

        $delete_computer->delete();
        return redirect()->route('computers.index');
    }
}
