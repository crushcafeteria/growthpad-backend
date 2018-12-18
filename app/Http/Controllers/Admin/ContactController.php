<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function listContacts()
    {
        return view('admin.contact.list', [
            'contacts' => Contact::orderBy('created_at', 'DESC')->paginate(),
        ]);
    }

    function editContact($contactID)
    {
        return view('admin.contact.edit', [
            'contact' => Contact::find($contactID),
        ]);
    }

    function updateContact(ContactRequest $request)
    {

        # Collect request
        $contact = $request->only(['name', 'location', 'county', 'contact_name', 'contact_telephone', 'email', 'goals', 'products', 'positioning', 'market_type', 'total_employees', 'lng', 'lat']);

        # Upload picture @todo delete old picture from storage
        if ($request->picture) {
            $contact['picture'] = $request->file('picture')->store('contact_pictures', 'public');
        }

        # Post processing
        $contact['products'] = explode(',', $contact['products']);
        $contact['contact_telephone'] = explode(',', $contact['contact_telephone']);
        $contact['email'] = explode(',', $contact['email']);

        Contact::find($request->id)->update($contact);;

        Session::flash('successbox', ['You have successfully updated a marketplace contact']);

        return redirect('admin/contacts');
    }

    function viewContact($contactID)
    {
        return view('admin.contact.view', [
            'contact' => Contact::find($contactID),
        ]);
    }

    function showAddContactForm()
    {
        return view('admin.contact.add');
    }

    function saveContact(ContactRequest $request)
    {

        # Collect request
        $contact = $request->only(['name', 'location', 'county', 'contact_name', 'contact_telephone', 'email', 'goals', 'products', 'positioning', 'market_type', 'total_employees', 'lng', 'lat']);

        dd($contact);

        # Upload picture
        if ($request->picture) {
            $contact['picture'] = $request->file('picture')->store('contact_pictures', 'public');
        }

        # Post processing
        $contact['products'] = explode(',', $contact['products']);
        $contact['contact_telephone'] = explode(',', $contact['contact_telephone']);
        $contact['email'] = explode(',', $contact['email']);

        Contact::create($contact);

        Session::flash('successbox', ['You have successfully added a new market contact']);

        return redirect('admin/contacts');
    }

    function showRequests()
    {
        return view('admin.contact.show-requests', [
            'requests' => Request::paginate(10),
        ]);
    }

    function searchContacts(Request $request)
    {
        $q = '%' . $request->q . '%';
        $contacts = Contact::where('name', 'LIKE', $q)->get()->take(10);

        return view('admin.contact.component.table', [
            'contacts' => $contacts,
        ]);
    }

    function renderMap()
    {
        $locations = [];
        Contact::whereNotNull('lng')->get()->each(function ($contact) use (&$locations) {
            $locations[] = [
                'lon'   => $contact->lng,
                'lat'   => $contact->lat,
                'title' => $contact->name,
                'zoom'  => 12,
                'html'  => view('admin.contact.component.map-infobox', [
                    'contact' => $contact,
                ])->render(),
            ];
        });

        return view('admin.contact.map', [
            'locations' => $locations,
        ]);
    }
}
