<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ContactController extends Controller
{
    private function data()
    {
        if (!Cookie::has('contact'))
        {
            return [];
        }

        // Terima as JSON
        $data = Cookie::get('contact');
        $data = \json_decode($data);
        return $data;
    }

    public function View()
    {
        return \view('contact');
    }

    public function ActionContact(Request $request)
    {
        $data = $this->data();
        $d = [
            "name" => $request->input('name'),
            "email" => $request->input('email'),
            "phone" => $request->input('phone'),
            "message" => $request->input('message'),
        ];

        $data[] = $d;

        $data = \json_encode($data);
        $c = Cookie::make("contact", $data, 60*24*30);
        Cookie::queue($c);

        // dd($request->all());
        // dd(Cookie::get('contact'));
        $request->session()->flash('status', 'Contact added successfully!');
        return redirect('/contact');
    }

    // public function ContactList(Request $request)
    // {
    //     dd($request->cookie('contact'));
    // }

    public function ContactList(Request $request) {
        // Check if the cookie exists
        // if($request->hasCookie('contact')) {
        //     // Decode the cookie into an array
        //     $contacts = json_decode($request->cookie('contact'), true);
    
        //     // Start the table
        //     $table = "<table>";
        //     $table .= "<tr><th>Name</th><th>Email</th><th>Phone</th><th>Message</th></tr>";
    
        //     // Loop through the contacts
        //     foreach($contacts as $contact) {
        //         $table .= "<tr><td>" . e($contact['name']) . "</td><td>" . e($contact['email']) . "</td><td>" . e($contact['phone']) . "</td><td>" . e($contact['message']) . "</td></tr>";
        //     }
    
        //     // End the table
        //     $table .= "</table>";
    
        //     return $table;
        // } else {
        //     return "No contacts found.";
        // }
        return view('contact-list', [
            'contacts' => $this->data()
        ]);
    }

    public function deleteContact($index, Request $request) {
        $contacts = $this->data();
        array_splice($contacts, $index, 1);
        $cookie = Cookie::make('contact', json_encode($contacts), 60*24*30);
        Cookie::queue($cookie);
        $request->session()->flash('status', 'Contact deleted successfully!');
        return redirect('/contact');
    }
}
