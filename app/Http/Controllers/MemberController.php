<?php
// Resource Controller //

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return ["result"=>"data list."];
        return Member::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $device = new Member;
        $device->name = $request->name;
        $device->email = $request->email;
        $device->address = $request->address;
        $result = $device->save();
        if ($result) {
            return ["Result" => "Data has been saved."];
        } else {
            return ["Result" => "Operation failed!!"];
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $device = Member::find($request->id);
        $device->name = $request->name;
        $device->email = $request->email;
        $device->address = $request->address;
        $result = $device->save();
        if ($result) {
            return ["Result" => "Data is updated."];
        } else {
            return ["Result" => "Updation failed."];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $device = Member::find($id);
        $result = $device->delete();
        if ($result) {
            return ["result" => "record deleted." . $id];
        } else {
            return ["result" => "record not deleted."];
        }
    }
}
