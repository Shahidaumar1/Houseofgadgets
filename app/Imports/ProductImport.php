<?php

namespace App\Imports;


use App\Models\DeviceType;
use App\Models\Modal;
use App\Models\Price;
use App\Models\RepairType;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    public function model(array  $rows)
    {


        $device_type = DeviceType::where('name',  $rows['device_type'])->first();

        if (!$device_type) {
            $device_type = new DeviceType();
            $device_type->name =  $rows['device_type'];
            $device_type->save();
        }

        $modal = Modal::where('name',  $rows['models'])->first();
        if (!$modal) {
            $modal = new Modal();
            $modal->device_type_id = $device_type->id;
            $modal->name =  $rows['models'];
            $modal->save();
        }

        $repair_type = RepairType::where('name',  $rows['repairs'])->first();
        if (!$repair_type) {
            $repair_type = new RepairType();
            $repair_type->name =  $rows['repairs'];
            $repair_type->save();
        }

        $repair_type_exist = $device_type->repair_types->contains($repair_type);
        if (!$repair_type_exist) {
            DB::table('device_type_repair_type')->insert([
                'device_type_id' => $device_type->id,
                'repair_type_id' => $repair_type->id
            ]);
        }



        $price = Price::where('repair_type_id', $repair_type->id)->where('modal_id', $modal->id)->first();
        if (!$price) {
            $price = new Price();
            $price->repair_type_id = $repair_type->id;
            $price->modal_id = $modal->id;
            $price->price =  $rows['prices'];
            $price->save();
        }

        return;
    }
}
