<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactRequestEmail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use App\Models\Request as Request_;

class MarketController extends Controller
{
    function listContacts()
    {
        return view('market.list', [
            'contacts' => Contact::orderBy('created_at', 'DESC')->paginate(),
        ]);
    }

    function showAddContactForm()
    {
        return view('market.add-contact');
    }

    function saveContact(ContactRequest $request)
    {

        # Collect request
        $contact = $request->only(['name', 'location', 'county', 'contact_name', 'contact_telephone', 'email', 'goals', 'products', 'positioning', 'market_type', 'total_employees']);

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

        return redirect('market');
    }

    function viewContact($contactID)
    {
        return view('market.view-contact', [
            'contact' => Contact::find($contactID),
        ]);
    }

    function searchContact(Request $request)
    {
        $q = '%' . $request->q . '%';
        $results = Contact::where('name', 'LIKE', $q)->orWhere('location', 'LIKE', $q)->orWhere('contact_name', 'LIKE', $q)->orWhere('products', 'LIKE', $q)->get();

        return view('market.search-results', [
            'contacts' => $results,
        ]);
    }


    function connect(Request $request)
    {
        # Validate data
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return Response::json(['error' => 'Your email is not valid']);
        }

        # Save request
        $connect = Request_::create($request->only(['contact_id', 'names', 'email', 'telephone', 'product']));

        # Send notifications
        Mail::to(collect(config('settings.team')))->send(new ContactRequestEmail($connect->id));

        return Response::json(['status' => 'OK']);
    }
}
