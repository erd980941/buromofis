<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{

    public function index()
    {
        $contact = Contact::first();
        return view('admin.contacts.index', compact('contact'));
    }

    public function update(Request $request)
    {
        $contact = Contact::first();
        $contact->update($request->all());
        return redirect()->route('admin.contacts.index')->with('success', 'Contact information updated successfully');
    }
}
