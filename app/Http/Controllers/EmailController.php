<?php

namespace App\Http\Controllers;

use App\Email;
use Illuminate\Http\Request;
use Validator;
class EmailController extends Controller
{
    public function create()
    {
        return view('contactus');
    }

    public function contactus(Request $request)
    {
        $data=$request->all();
        $v = Validator::make($data,[
            'sujet'=>'required|string',
            'e-mail'=>'required|email',
            'description'=>'max:200'
        ]);
        if($v->fails()){
            $v->errors()->add('message','Erreur lors de l\'envoi!!');
            return back()->with([
                'faild'=>true,
                'errors'=>$v->errors()
            ]);
        }
        Email::create($data);

        Mail::send('email',
                array(
                    'name' => $request->get('name'),
                    'e-mail' => $request->get('e-mail'),
                    'description' => $request->get('description')
                ), function($message)
                    {
                        $message->from('Youremail@gmail.com');
                        $message->to('YourEmail@gmail.com', 'Admin')->subject('Message');
                }
    );
        return back()->with('success','Merci de nous avoir contacter');
    }

}
