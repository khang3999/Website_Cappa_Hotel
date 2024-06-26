<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Intervention\Image;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function getRoomsByType(String $type)
    {
        $limit = ($type == "standard" ? 3 : 2);
        $rooms = Room::where('type', $type)->limit($limit)->get();
        return response()->json($rooms);
    }
    public function index()
    {
        //
        $rooms = Room::all();
        return Inertia::render('Admin/RoomManagement', ['rooms' => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'adult' => 'required|numeric',
            'children' => 'required|numeric',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Kiểm tra định dạng và kích thước ảnh
            'type' => 'required',
        ]);

        // Lưu vào cơ sở dữ liệu
        $room = new Room();
        $room->name = $request->name;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->adult = $request->adult;
        $room->children = $request->children;
        $room->type = $request->type;
        // Lưu ảnh vào thư mục và lưu đường dẫn vào cơ sở dữ liệu
        $imagePath = $request->file('photo')->store('images', 'public');
        $room->photo = $imagePath;
        $room->save();
        $rooms= Room::all();
        return Inertia::render('Admin/RoomManagement',['rooms'=>$rooms,'message'=>'Create new room successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $room = Room::find($id);
        return Inertia::render('User/RoomDetail', ['room' => $room]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'adult' => 'required|numeric',
            'children' => 'required|numeric',
            'type' => 'required',
        ]);
        $id = $request->id;
        // Lưu vào cơ sở dữ liệu
        $room = Room::find($id);

        // Cập nhật chỉ các trường được gửi từ form
        $room->fill($request->only(['name', 'description', 'price', 'adult', 'children', 'type']));
        $room->save();
        // $name = $request->name;
        // $description = $request->description;
        // $price = $request->price;
        // $adult = $request->adult;
        // $children = $request->children;
        // $type = $request->type;
        // // Lưu ảnh vào thư mục và lưu đường dẫn vào cơ sở dữ liệu
        // $room->update([
        //     'name' => $name,
        //     'description' => $description,
        //     'price' => $price,
        //     'adult' => $adult,
        //     'children' => $children,
        //     'type' => $type
        // ]);
        return redirect()->route("admin.rooms.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $room = Room::find($id);
        $room->delete();
        $rooms = Room::all();
        return Inertia::render('Admin/RoomManagement',['rooms'=>$rooms,'message'=>'Delete successfully!']);
        
    }
}
