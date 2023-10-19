<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $row = (int) request('row', 10);

        if ($row < 1 || $row > 100) {
            abort(400, 'The per-page parameter must be an integer between 1 and 100.');
        }

        $warehouses = Warehouse::filter(request(['search']))
                ->sortable()
                ->paginate($row)
                ->appends(request()->query());

        return view('warehouse.index', ['warehouses' => $warehouses,]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('warehouse.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'responsible_person' => 'required|string',
            'contact_no_responsible' => 'required|string',
            'location' => 'required|string',
        ];

        $validatedData = $request->validate($rules);

        Warehouse::create($validatedData);

        return Redirect::route('warehouse.index')->with('success', 'Warehouse has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Warehouse $warehouse)
    {
        return view('warehouse.show', [
            'warehouse'=> $warehouse
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warehouse $warehouse)
    {
        return view('warehouse.edit', [
            'warehouse' => $warehouse
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        $rules = [
            'name' => 'required|string',
            'responsible_person' => 'required|string',
            'contact_no_responsible' => 'required|string',
            'location' => 'required|string',
        ];

        $validatedData = $request->validate($rules);

        Warehouse::where('id', $warehouse->id)->update($validatedData);

        return Redirect::route('warehouse.index')->with('success', 'Warehouse Details has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warehouse $warehouse)
    {
        Warehouse::destroy($warehouse->id);

        return Redirect::route('warehouse.index')->with('success', 'Warehouse has been deleted!');
    }
}
