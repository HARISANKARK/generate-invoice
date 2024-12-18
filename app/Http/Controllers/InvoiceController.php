<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceService;
use App\Models\Number;
use App\Models\Service;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function downloadInvoice($invoiceId)
    {
        // Get the invoice and related services data
        $invoice = Invoice::find($invoiceId);
        $invoice_services = InvoiceService::where('invoice_id', $invoiceId)->get();

        // Load the HTML view and pass the data
        $pdf = FacadePdf::loadView('invoice-pdf', compact('invoice', 'invoice_services'));

        // Download the PDF
        return $pdf->download('invoice_' . $invoice->invoice_code . '.pdf');
    }

    public function index(Request $request)
    {
        $filters = $request->only(['from','to','customer_id']);

        $invoices = Invoice::join('customers','invoices.customer_id','=','customers.c_id')
            ->filter($filters)
            ->get();

        $from = $reques->from ?? date('Y-m-d');
        $to = $reques->to ?? date('Y-m-d');
        $customers = Customer::orderBy('c_name','asc')->get();

        return view('invoice.index',compact('invoices','from','to','customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $invoice_no = Number::first()->invoice_number;
        $customers = Customer::orderBy('c_name','asc')->get();
        $services = Service::orderBy('s_name','asc')->get();

        return view('invoice.create',compact('customers','services','invoice_no'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try
        {
            if(!empty($request->service_id)){
                $invoice = new Invoice;
                $invoice->invoice_code = $request->invoice_code;
                $invoice->date = $request->date;
                $invoice->customer_id = $request->customer_id;
                $invoice->address = $request->address;
                $invoice->notes = $request->notes;
                $invoice->invoice_amount = $request->invoice_amount;
                $invoice->discount_amount = $request->discount_amount;
                $invoice->enable_vat = ($request->enable_vat == "on") ? 1 : null;
                $invoice->total_vat = $request->total_vat;
                $invoice->grand_total = $request->grand_total;
                $invoice->save();

                for($i=0;$i<count($request->service_id);$i++)
                {
                    $invoice_service= new InvoiceService;
                    $invoice_service->invoice_id= $invoice->iv_id;
                    $invoice_service->service_id= $request->service_id[$i];
                    $invoice_service->price= $request->price[$i];
                    $invoice_service->hour= $request->hour[$i];
                    $invoice_service->total= $request->total[$i];
                    $invoice_service->save();
                }

                DB::table('numbers')->update(['invoice_number' => $request->invoice_code +1]);

                return redirect()->back()->with('success','Invoice Added successfully');
            }else{
                return redirect()->back()->with('danger','Add Atleast one Service');
            }

        }
        catch (\Exception $e)
        {
            // Handle the exception
            Log::error('An error occurred In CustomerController: ' . $e->getMessage());
            // Validation failed
            return redirect()->back()->withInput()->with('danger','Something Went Wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = Invoice::join('customers','invoices.customer_id','=','customers.c_id')
            ->find($id);
        $invoice_services = InvoiceService::join('services','invoice_services.service_id','=','services.s_id')
            ->where('invoice_id',$id)
            ->get();

        return view('invoice.show',compact('invoice','invoice_services'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $invoice = Invoice::join('customers','invoices.customer_id','=','customers.c_id')
            ->find($id);
        $invoice_services = InvoiceService::join('services','invoice_services.service_id','=','services.s_id')
            ->where('invoice_id',$id)
            ->get();

        $customers = Customer::orderBy('c_name','asc')->get();
        $services = Service::orderBy('s_name','asc')->get();

        return view('invoice.edit',compact('customers','services','invoice','invoice_services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
