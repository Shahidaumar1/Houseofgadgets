<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportProduct implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'master_id'=> $row[0],
            'category_id'=> $row[1],
            'broken_screen_o'=> $row[2],
            'broken_screen_p'=> $row[3],
            'battery_replacement'=> $row[4],
            'screen_battery'=> $row[5],
            'back_plate'=> $row[6],
            'tablet_complete_screen'=> $row[7],
            'tablet_digitiser'=> $row[8],
            'tablet_internal_screen'=> $row[9],
            'computer_fan'=> $row[10],
            'computer_harddrive'=> $row[11],
            'computer_processor'=> $row[12],
            'computer_graphic_card'=> $row[13],
            'computer_motherboard'=> $row[14],
            'computer_ram'=> $row[15],
        ]);
    }
}
