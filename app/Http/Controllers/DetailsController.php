<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use Validator;

class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $customer = Customer::latest()->paginate(5);
        return view('customer.index',compact('customer'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return true;
        //
     
       $validator = Validator::make($request->all(),[ 
            'email' => 'required|email|max:255|unique:customer',
            'password' => 'required|min:6|max:25',
            'firstname' => 'required|regex:/^[a-zA-Z]+$/u|max:255|',
            'lastname' => 'required|regex:/^[a-zA-Z]+$/u|max:255|',
            'dob' => 'required|date_format:Y-m-d',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' =>$validator->getMessageBag()->toArray()], 400);
        }
        $data = $request->all();
        $data['password'] = \Hash::make($data['password']);
        Customer::create($data);
        return response()->json(['success' => true, 'message' =>'Data created successfully'], 200);
        // return redirect()->route('customer.index')->with('success','Data created successfully');
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
        $customer = Customer::find($id);
        return view('customer.show',compact('customer'));
    
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
        $customer = Customer::find($id);
         return view('customer.edit',compact('customer'));
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
        $customer = Customer::find($id);
        $rule  = [ 
            'email' => 'required|email|max:255|unique:customer,email,'.$customer->id,
            'firstname' => 'required|regex:/^[a-zA-Z]+$/u|max:255|',
            'lastname' => 'required|regex:/^[a-zA-Z]+$/u|max:255|',
            'dob' => 'required|date_format:Y-m-d',
        ];

        if ($request->get('password') != '') {       
            $rule['password'] = 'min:6|max:25';
        }
        $validator = Validator::make($request->all(), $rule);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' =>$validator->getMessageBag()->toArray()], 400);
        }
        $data = $request->all();
         if ($request->get('password') != '') {       
        $data['']
        } 
        
        
        $customer->update($data);
        return response()->json(['success' => true, 'message' =>'Data updated successfully'], 200);
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
         Customer::find($id)->delete();
        return redirect()->route('customer.index')
                         ->with('success','Data deleted successfully');
    }
}
