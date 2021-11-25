<?php

namespace App\Models;

class RentalEquipment
{
    private Equipment $equipment;
    private Rental $rental;

    public function setRental(Rental $rental)
    {
        $this->rental = $rental;
    }

    public function setEquipment(Equipment $equipment)
    {
        $this->equipment = $equipment;
    }

    public function rental()
    {
        return $this->rental;
    }

    public function equipment()
    {
        return $this->equipment;
    }
}
