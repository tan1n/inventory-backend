<?php

namespace App\Http\Controllers;

use App\Models\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FactoryController extends Controller
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

        $factories = Factory::filter(request(['search']))
                ->sortable()
                ->paginate($row)
                ->appends(request()->query());

        return view('factory.index', ['factories' => $factories,]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('factory.create');
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

        Factory::create($validatedData);

        return Redirect::route('factory.index')->with('success', 'Factory has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Factory $factory)
    {
        return view('factory.show', [
            'factory'=> $factory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factory $factory)
    {
        return view('factory.edit', [
            'factory' => $factory
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Factory $factory)
    {
        $rules = [
            'name' => 'required|string',
            'responsible_person' => 'required|string',
            'contact_no_responsible' => 'required|string',
            'location' => 'required|string',
        ];

        $validatedData = $request->validate($rules);

        Factory::where('id', $factory->id)->update($validatedData);

        return Redirect::route('factory.index')->with('success', 'Factory Details has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Factory $factory)
    {
        Factory::destroy($factory->id);

        return Redirect::route('factory.index')->with('success', 'Factory has been deleted!');
    }
}
