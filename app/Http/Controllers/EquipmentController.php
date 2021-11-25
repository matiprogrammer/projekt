<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\EquipmentTag;
use App\Models\Tag;

class EquipmentController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth',['except'=>['index']]);   
    }
    
    public function index(Request $request)
    {
        if (request()->tags) {
            $tags = explode(',', request()->tags);
            $equipments = new \Illuminate\Database\Eloquent\Collection;
            $t = Tag::where('name', $tags)->get();
            foreach ($t as $tag) {
                $equipments = $equipments->merge($tag->equipments);
            }
            return view('equipments.index')->with('equipments', $equipments)->with('tags',request()->tags);
        } else {
            $equipments = Equipment::all();
            return view('equipments.index')->with('equipments', $equipments)->with('tags',"");
        }
        
    }

    public function details($id)
    {
        Equipment::find($id);
        return view('equipments.details');
    }

    public function edit($id)
    {
        $equipment = Equipment::find($id);

        return view('equipments.edit')->with('equipment', $equipment);
    }

    public function update(Request $request, $id)
    {
        if ($request->photo != null) {

            $newImageName = time() . '-' . $request->name . '.' . $request->photo->extension();
            $request->photo->move(public_path('images'), $newImageName);
            Equipment::where('id', '=', $id)->update([
                'name' => $request->input('name'),
                'model' => $request->input('model'),
                'desc' => $request->input('desc'),
                'url' => $request->input('url'),
                'quantity' => $request->input('quantity'),
                'photo' => $newImageName,
                'updated_at' => now()
            ]);
        } else {
            Equipment::where('id', '=', $id)->update([
                'name' => $request->input('name'),
                'model' => $request->input('model'),
                'desc' => $request->input('desc'),
                'url' => $request->input('url'),
                'quantity' => $request->input('quantity'),
                'updated_at' => now()
            ]);
        }
        return redirect('/equipments');
    }

    public function destroy(Request $request, $id)
    {
        Equipment::where('id', '=', $id)->delete();
        return redirect('/equipments');
    }

    public function deleteTag($equipment_id, $tag_id)
    {
        EquipmentTag::where('equipment_id', '=', $equipment_id)->where('tag_id', '=', $tag_id)->delete();
        return redirect()->back();
    }

    public function addTag(Request $request, $equipmentId)
    {

        $tag = new Tag();
        $tag->name = $request->input('tag_name');
        $tag->save();

        EquipmentTag::create([
            'equipment_id' => $equipmentId,
            'tag_id' => $tag->id
        ]);

        return redirect()->back();
    }

    public function create()
    {
        return view('equipments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);
        $newImageName = time() . '-' . $request->name . '.' . $request->photo->extension();
        $request->photo->move(public_path('images'), $newImageName);
        Equipment::create([
            'name' => $request->input('name'),
            'model' => $request->input('model'),
            'desc' => $request->input('desc'),
            'url' => $request->input('url'),
            'photo' => $newImageName,
            'quantity' => $request->input('quantity'),
            'created_at' => now()
        ]);
        return redirect('/equipments');
    }
}
