<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceOrder;
use Excel;

class EnquiryController extends Controller
{
    public function listEnquiries()
    {
        return view('admin.enquiry.list', [
            'enquiries' => ServiceOrder::orderBy('created_at', 'DESC')->paginate(),
        ]);
    }

    public function viewEnquiry($enquiryID)
    {
        return view('admin.enquiry.view', [
            'enquiry' => ServiceOrder::find($enquiryID),
        ]);
    }

    public function exportExcel()
    {
        $requests = ServiceOrder::all()->toArray();

        // dd($requests);

        Excel::create('service_requests', function ($excel) use ($requests) {
            $excel->sheet('Sheet 1', function ($sheet) use ($requests) {
                $sheet->with($requests);
            });
        })->download('xlsx');

    }
}
