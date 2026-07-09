<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    // POSITION LIST
    public function index()
    {
        $positions = Position::withCount('employees')
            ->latest()
            ->paginate(10);

        return view(
            'positions.index',
            compact('positions')
        );
    }


    // ADD POSITION PAGE
    public function create()
    {
        return view('positions.create');
    }


    // SAVE POSITION
    public function store(Request $request)
    {
        $request->validate([
            'position_name' => [
                'required',
                'string',
                'max:255',
                'unique:positions,position_name'
            ]
        ]);

        $position = new Position();

        $position->position_name =
            $request->position_name;

        $position->status =
            $request->has('status');

        $position->save();


        return redirect()
            ->route('positions.index')
            ->with(
                'success',
                'Position added successfully!'
            );
    }


    // EDIT POSITION PAGE
    public function edit($id)
    {
        $position =
            Position::findOrFail($id);

        return view(
            'positions.edit',
            compact('position')
        );
    }


    // UPDATE POSITION
    public function update(
        Request $request,
        $id
    ) {
        $position =
            Position::findOrFail($id);

        $request->validate([
            'position_name' => [
                'required',
                'string',
                'max:255',
                'unique:positions,position_name,'
                . $position->id
            ]
        ]);

        $position->position_name =
            $request->position_name;

        $position->status =
            $request->has('status');

        $position->save();


        return redirect()
            ->route('positions.index')
            ->with(
                'success',
                'Position updated successfully!'
            );
    }


    // DELETE POSITION
    public function destroy($id)
    {
        $position =
            Position::findOrFail($id);


        // Huwag i-delete kapag ginagamit ng employee
        if (
            $position
                ->employees()
                ->exists()
        ) {

            return redirect()
                ->route('positions.index')
                ->with(
                    'error',
                    'Cannot delete this position because it has assigned employees.'
                );
        }


        $position->delete();


        return redirect()
            ->route('positions.index')
            ->with(
                'success',
                'Position deleted successfully!'
            );
    }
}