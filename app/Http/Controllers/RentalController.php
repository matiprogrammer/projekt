<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\Equipment;
use App\Models\RentalEquipment;
use App\Models\User;

class RentalController extends Controller
{
    public function index()
    {
    }

    public function create($equipment_id)
    {
        return view('rental.create')->with('equipment', Equipment::find($equipment_id));
    }

    public function store(Request $request)
    {
        Rental::create([
            'user_id' => 1,
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'equipment_id' => $request->input('equipment_id'),
            'quantity' => $request->input('quantity')
        ]);
        return redirect('/equipments');
    }

    public function showUserRentals($user_id)
    {
        $rentals = Rental::where('user_id', '=', $user_id)->get();
        // foreach ($rentals as $rental) {
        //     $equipment = Equipment::find($rental->equipment_id);
        //     $re = new RentalEquipment;
        //     $re->setRental($rental);
        //     $re->setEquipment($equipment);
        //     $rentalEquipmentArray[] = $re;
        // }
        $user=User::find($user_id);
        return view('rental.userRental')->with('rentals', $rentals)->with('user', $user);
    }

    public function returnRental($rental_id)
    {
        Rental::find($rental_id)->delete();
        return redirect()->back();
    }
}
