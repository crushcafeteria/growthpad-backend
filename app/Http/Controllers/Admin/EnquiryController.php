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
        $requests = ServiceOrder::all();
        $data = [];

        $requests->each(function ($request, $key) use (&$data) {

            $tmp = $request->toArray();

            // dd($tmp);
            if(is_array($tmp['tools_required'])){
                $tmp['tools_required'] = implode(', ', $tmp['tools_required']);
            }

            if(is_array($tmp['logistics_required'])){
                $tmp['logistics_required'] = implode(', ', $tmp['logistics_required']);
            }

            if(is_array($tmp['vendor_required'])){
                $tmp['vendor_required'] = implode(', ', $tmp['vendor_required']);
            }
            
            $data[$key] = $tmp;
        });

        $requests = $data;
        unset($data);

        Excel::create('service_requests', function ($excel) use ($requests) {
            $excel->sheet('Sheet 1', function ($sheet) use ($requests) {
                $sheet->with($requests, null, 'A1', true);
            });
        })->download('xlsx');

    }
}
