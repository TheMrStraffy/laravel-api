<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        $success = true;

        $validator = Validator::make($data,
        [
            'name'=>'required|min:2|max:255',
            'email'=>'required|email|max:255',
            'message'=>'required',
        ],
        [
            'name.required' => 'Name is required',
            'name.min' => 'Name needs to be at least :min characters',
            'name.max' => 'Name needs to be maxiumum :max characters',
            'email.required' => 'Email is required',
            'email.email' => 'Email is not valid',
            'email.max' => 'Email needs to be maxiumum :max characters',
            'message.required' => 'A message is required',
        ]
        );
        if($validator->fails()){
            $success = false;
            $errors = $validator->errors();
            return response()->json(compact('success','errors'));
        }
        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        Mail::to('info@auth.com')->send(new NewContact($new_lead));

        return response()->json(compact('success'));
    }
}
