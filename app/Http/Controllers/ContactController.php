<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only('index');
    }
    /**
     * All Contact
     */
    public function index(){
       return view("contact.index");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        Contact::create([
            'username' => $request->username,
            'email'    => $request->email,
            'content'  => $request->content
        ]);

        return redirect()->back()
                         ->withSuccess("Votre message à été envoyer avec succés");
    }
}
