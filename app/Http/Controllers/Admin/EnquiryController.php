<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServiceOrder;

class EnquiryController extends Controller
{
    function listEnquiries()
    {
    	return view('admin.enquiry.list', [
    		'enquiries' => ServiceOrder::orderBy('created_at', 'DESC')->paginate()
    	]);
    }

    function viewEnquiry($enquiryID)
    {
    	return view('admin.enquiry.view', [
    		'enquiry' => ServiceOrder::find($enquiryID)
    	]);
    }
}
