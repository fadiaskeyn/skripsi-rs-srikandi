<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use App\Repositories\RoomRepository;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    protected RoomRepository $roomRepository;

    public function __construct()
    {

        $this->roomRepository = new RoomRepository;
    
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->roomRepository->getData();
        return view('pages.rooms.index', ['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomRequest $request)
    {
        $validated = $request->validated();
        $this->roomRepository->create($validated);

        return to_route('admin.room.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $this->roomRepository->destroy($room);
        return response()->json(['success' => 'Data berhasil dihapus secara permanent']);
    }
}
