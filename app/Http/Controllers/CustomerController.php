<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class CustomerController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view(registration . customer_reg);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        try {
            \DB::transaction(function () {
                request()->validate([
                    'firstName' => 'required|max:50|string',
                    'lastName' => 'sometimes|nullable|max:50|string',
                    'address' => 'sometimes|max:100',
                    'contactNo' => 'required|max: 10',
                    'email' => 'required|email',
                    'nic' => 'required',
                    'roll' => 'integer|required',
                    'password' => 'required|min:6',
                    'city' => 'required|max:255|string'
                        // 'institute' => 'required|integer',
                ]);

                $user = new User();
                $user->email = request('email');
                $user->name = request('firstName');
                $user->last_name = request('lastName');
                $user->address = request('address');
                $user->contact_no = request('contactNo');
                $user->nic = request('nic');
                $user->roll_id = request('roll');
                $user->password = Hash::make(request('password'));
                $user->save();

                $first_name = request('firstName');
                $last_name = request('lastName');
                $cust_name = $first_name . " " . $last_name;

                Customer::create([
                    'cust_name' => $cust_name,
                    'phone_number' => request('contactNo'),
                    'email' => request('email'),
                    'city' => request('city'),
                    'user_id' => $user->id,
                ]);
            });

            return array('status' => 1, 'Successfully Updated the Customer data!');
        } catch (Throwable $e) {
            return array('status' => 0, 'Customer Data Upadation is Unsuccessfull!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show() {
        $customer_data = Customer::User()->get();
        return $customer_data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $customer_id_data = Customer::Where('id', $id)->User()->get();
        return $customer_id_data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        try {
            \DB::transaction(function () {
                request()->validate([
                    'firstName' => 'required|max:50|string',
                    'lastName' => 'sometimes|nullable|max:50|string',
                    'address' => 'sometimes|max:100',
                    'contactNo' => ['nullable', new contactNo],
                    'email' => 'required|email',
                    'nic' => ['sometimes', 'nullable', 'unique:users', new nationalID],
                    'roll' => 'integer|required',
                    'password' => 'required|confirmed|min:6',
                    'city' => 'required|max:255|string'
                        // 'institute' => 'required|integer',
                ]);

                $customer = Customer::find($id);
                $user_id = $customer->user_id;
                $cust_name = request('firstName') + request('lastName');
                $customer->cust_name = $cust_name;
                $customer->phone_number = request('contactNo');
                $customer->email = request('email');
                $customer->city = request('city');
                $customer->save();

                $user = User::where('user_id', $user_id)->first();
                $user->email = request('email');
                $user->name = request('firstName');
                $user->last_name = request('lastName');
                $user->address = request('address');
                $user->contact_no = request('contactNo');
                $user->nic = request('nic');
                $user->roll_id = request('roll');
                $user->password = Hash::make(request('password'));
                $user->save();

                UserController::PrevilagesAdd($user);
            });

            return array('status' => 1, 'Successfully Updated the Customer data!');
        } catch (Throwable $e) {
            return array('status' => 0, 'Customer Data Upadation is Unsuccessfull!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        try {
            \DB::transaction(function () {
                $customer = Customer::find($id);
                $user_id = $customer->user_id;

                Customer::find($id)->delete();
                User::find($user_id)->delete();
            });
            return array('status' => 1, 'Customer Data Deletion is Successfull!');
        } catch (Throwable $e) {
            return array('status' => 0, 'Customer Data Deletion is Unsuccessfull!');
        }
    }

    public function email_nic_exist(Request $request) {
        $email = $request->email;
        $nic = $request->nic;
        $cust_nic = User::where('nic', '=', $nic)->first();
        $user_email = User::where('email', '=', $email)->first();
        $cust_email = Customer::where('email', '=', $email)->first();

        if (is_null($cust_nic) && is_null($user_email) && is_null($cust_email)) {
            return 0;
        } 
        
        if(!is_null($cust_nic) || !is_null($user_email) || !is_null($cust_email)){
            return 1;
        }
    }
}
