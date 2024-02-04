<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function getContacts()
    {
       $contacts = Contact::all();
         return response()->json(
            [
                'contacts' => $contacts,
                'message' => 'Contacts',
                'status' => 200
            ]
         );
    }

    public function addContact(Request $request)
    {
       $contact = new Contact();
       $contact->name = $request->name;
       $contact->email = $request->email;
       $contact->designation = $request->designation;
       $contact->contact_no = $request->contact_no;
       $contact->save();
       return response()->json([
              'message' => 'Contact added successfully',
              'status' => 200        
       ]);
    }

    public function deleteContact($id)
    {
        $contact = Contact::find($id);
        if($contact){
            $contact->delete();
            return response()->json([
                'message' => 'Contact deleted successfully',
                'status' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Contact not found',
                'status' => 404
            ]);
        }
    }

    public function getSingleContact($id)
    {
        $contact = Contact::find($id);
        if($contact){
            return response()->json([
                'contact' => $contact,
                'message' => 'Contact',
                'status' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Contact not found',
                'status' => 404
            ]);
        }
    }

    public function updateContact(Request $request, $id)
    {
        $contact = Contact::find($id);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->designation = $request->designation;
        $contact->contact_no = $request->contact_no;
        $contact->save();
        return response()->json([
            'message' => 'Contact updated successfully',
            'status' => 200
        ]);
    }
}
