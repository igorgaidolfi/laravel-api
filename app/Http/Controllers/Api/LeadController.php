<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Mail\NewContact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facedes\Mail;

class LeadController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        $validator = Validator::make($data, [
            'name'      => 'required|max:40',
            'surname'   => 'required|max:60',
            'email'     => 'required|max:100',
            'phone'     => 'required|max:20',
            'message'   => 'required',

        ]);

        if($validator->fails()){
            return response()->json([
                'success'   => false,
                'errors'    =>$validator->errors()
            ]); 
        }

        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();

        Mail::to('info@boolfolio.com')->send(new NewContact($new_lead));

        return response()->json([
            'success' => true,
        ]);
    }
}
