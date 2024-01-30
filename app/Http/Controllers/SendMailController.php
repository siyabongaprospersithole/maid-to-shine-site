<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\Noreply;
use App\Mail\ToAdmin;

use Illuminate\Validation\ValidationException;

class SendMailController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'fullname' => 'required',
            'email_address' => 'required|email',
            'phone_number' => 'required',
            'message' => 'required',
        ]);


             Mail::to('mj.chiliza@gmail.com')
            ->cc(['zama@maidtoshine.co.za','nzamalusa@gmail.com'])
            ->send(new Toadmin(
                $request->fullname,
                $request->email_address,
                $request->phone_number,
                $request->message
            ));

            Mail::to($request->email_address)->send(new Noreply(
                $request->fullname
            ));

       return response()->json(['status' => 'success']);



    }
}
