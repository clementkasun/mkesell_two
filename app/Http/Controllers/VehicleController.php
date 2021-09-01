<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('registration.vehicle_view');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $vehicle_save = Vehicle::create([
                    'vehicle_type' => request('vehicle_type'),
                    'vehicle_condition' => request('vehicle_condition'),
                    'vehicle_make_id' => request('vehicle_make_id'),
                    'model' => request('model'),
                    'start_type' => request('start_type'),
                    'manufactured_year' => request('manufactured_year'),
                    'price' => request('price'),
                    'on_going_lease' => request('on_going_lease'),
                    'transmission' => request('transmission'),
                    'fuel_type' => request('fuel_type'),
                    'engine_capacity' => request('engine_capacity'),
                    'millage' => request('millage'),
                    'isAc' => request('isAc'),
                    'isPowerSteer' => request('isPowerSteer'),
                    'isPowerMirroring' => request('isPowerMirroring'),
                    'isPowerWindow' => request('isPowerWindow'),
                    'additional_info' => request('additional_info')
        ]);

        if ($vehicle_save == true) {
            return array('status' => 1, 'msg' => 'Vehicle Data Successfully Saved!');
        } else {
            return array('status' => 0, 'msg' => 'Vehicle Data Saving Is Unsuccessfull!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show() {
        $vehicle_data = Vehicle::all();
        return $vehicle_data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit() {
        $vehicle_data_id = Vehicle::find($id);
        return $vehicle_data_id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $vehicle_data_update = Vehicle::where('id', $id)
                ->update([
                    'vehicle_type' => request('vehicle_type'),
                    'vehicle_condition' => request('vehicle_condition'),
                    'vehicle_make_id' => request('vehicle_make_id'),
                    'model' => request('model'),
                    'start_type' => request('start_type'),
                    'manufactured_year' => request('manufactured_year'),
                    'price' => request('price'),
                    'on_going_lease' => request('on_going_lease'),
                    'transmission' => request('transmission'),
                    'fuel_type' => request('fuel_type'),
                    'engine_capacity' => request('engine_capacity'),
                    'millage' => request('millage'),
                    'isAc' => request('isAc'),
                    'isPowerSteer' => request('isPowerSteer'),
                    'isPowerMirroring' => request('isPowerMirroring'),
                    'isPowerWindow' => request('isPowerWindow'),
                    'additional_info' => request('additional_info')]);
        
        if($vehicle_data_update == true){
            return array('status' => 1, 'msg' => 'Vehicle Data Saved Successfully!');
        }else{
            return array('status' => 0, 'msg' => 'Vehicle Data Saving is Unsuccessfull!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $vehicle_data_delete = Vehicle::find($id)->delete();
        if($vehicle_data_delete == true){
            return array('status' => 1, 'msg' => 'Vehicle Data Deleted Successfully!');
        }else{
            return array('status' => 0, 'msg' => 'Vehicle Data Deleting is Unsuccessfull!');
        }
    }

}
