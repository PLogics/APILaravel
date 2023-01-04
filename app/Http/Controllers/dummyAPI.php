<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Validator;


class dummyAPI extends Controller
{
    function getData()
    {
        return ["name" => "anil", "email" => "anil@gmail.com", "address" => "delhi"];
    }
    //if already have data in database then access using
    function getData1($id = null)
    {
        return $id ? Device::find($id) : Device::all(); //device is model
    }
    function add(Request $request)
    {
        $device = new Device;
        $device->name = $request->name;
        $device->member_id = $request->member_id;
        $result = $device->save();
        if ($result) {
            return ["Result" => "Data has been saved."];
        } else {
            return ["Result" => "Operation failed!!"];
        }
    }
    function update(Request $request)
    {
        $device = Device::find($request->id);
        $device->name = $request->name;
        $device->member_id = $request->member_id;
        $result = $device->save();
        if ($result) {
            return ["Result" => "Data is updated."];
        } else {
            return ["Result" => "Updation failed."];
        }
    }
    function search($name)
    {
        // 
        return Device::where("name", "like", "%" . $name . "%")->get();

        // $on=Device::where("name","like","%".$name."%")->get();
        // return response()->json([
        //     'ob'=>$on,
        // ]);
    }
    function delete($id)
    {
        $device = Device::find($id);
        $result = $device->delete();
        if ($result) {
            return ["result" => "record deleted." . $id];
        } else {
            return ["result" => "record not deleted."];
        }
    }
    function testdata(Request $request)
    {
        $rules = array(
            "name" => "required",
            "member_id" => "required|min:1|max:2"
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            // return $validator->errors();
            return response()->json($validator->errors(),401);
        }
        else {
            $device = new Device;
            $device->name = $request->name;
            $device->member_id = $request->member_id;
            $result = $device->save();
            if ($result) {
                return ["Result" => "Data is saved."];
            } else {
                return ["Result" => "Operation failed."];
            }
        }
        // return ["x"=>"y"];
    }
}
