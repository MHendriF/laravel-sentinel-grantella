<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
// use App\Http\Request;
// use App\Http\Controller\Controller;

class RoomController extends Controller
{
    
    public function index()
    {
    	return view('admins.room');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'     => 'required',
            'type'          => 'required',
            'cost'          => 'required',
            'capacity'      => 'required',
        ]);
        $create = Room::create($request->all());
        return response()->json($create);

    }

    public function update(Request $request, $id)
    {
       $this->validate($request,[
            'name'     => 'required|max:100',
            'type'          => 'required',
            'cost'          => 'required',
            'capacity'      => 'required',
        ]);
        $edit = Room::find($id)->update($request->all());
        return response()->json($edit);
    }
    
    public function destroy($id)
    {
        Room::find($id)->delete();
        return response()->json(['done']);
    }
}
