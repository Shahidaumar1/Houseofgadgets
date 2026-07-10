<?php

namespace App\Exports;

use App\Models\DeviceType;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

         $data = [];
         $device_types = DeviceType::all();
         array_push($data,['Device Type','Models','Repairs','Prices']);
         foreach($device_types as $device_type){
                foreach($device_type->modals as $modal){
                    if($modal->device_type_id == $device_type->id){
                        foreach($device_type->repair_types as $repair_type){

                            foreach($repair_type->prices as $price){
                                if($price->modal_id == $modal->id){
                                    $array = [
                                        'Device Types' => $device_type->name,
                                        'Models' => $modal->name,
                                        'Repairs' => $repair_type->name,
                                        'Prices' => $price->price
                                    ];

                                    array_push($data,$array);
                                }

                            }
                        }
                    }
                }

         }


        //  dd($data);

         return collect($data);
    }
}
