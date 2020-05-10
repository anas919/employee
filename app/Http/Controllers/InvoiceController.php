<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Invoice;
use App\Invoicedetail;
use App\Client;

class InvoiceController extends Controller
{
    public function index() {
    	$invoices = Invoice::all();
    	$clients = Client::all();

        return view('invoices/index', ['invoices'=>$invoices, 'clients'=>$clients]);
    }
    public function create() {
    	$clients = Client::all();

    	return view('invoices/create', ['clients'=>$clients]);
    }
    public function add(Request $req){
        $invoice = new Invoice();

        $invoice->client_id = $req->client;
        $invoice->status = $req->status;
        $invoice->issue_date = date('Y-m-d',strtotime($req->issue_date));
        $invoice->due_date = date('Y-m-d',strtotime($req->due_date));
        $invoice->invoice_number = $req->invoice_number;
        $invoice->po_number = $req->po_number;
        $invoice->sub_total = $req->sub_total;
        $invoice->grand_total = $req->grand_total;
        if($req->notes != '')
            $invoice->notes = $req->notes;
        if($req->invoice_tax != '')
            $invoice->tax = $req->invoice_tax;
        if($req->invoice_discount != '')
            $invoice->discount = $req->invoice_discount;

        $invoice->save();
        if(isset($req->description)){
            foreach ($req->description as $key => $description) {
                if($req->description[$key] && $req->quantity[$key] && $req->unit_price[$key]) {
                    $invoiceDetail = new Invoicedetail();

                    $invoiceDetail->invoice_id = $invoice->id;
                    $invoiceDetail->description = $req->description[$key];
                    $invoiceDetail->quantity = $req->quantity[$key];
                    $invoiceDetail->unit_price = $req->unit_price[$key];
                    if(isset($req->tax)) {
                        if(array_key_exists($key, $req->tax) && $req->tax[$key] == 'on') {
                            $invoiceDetail->tax = 1;
                        }
                    }
                    if(isset($req->discount)) {
                        if(array_key_exists($key, $req->discount) && $req->discount[$key] == 'on') {
                            $invoiceDetail->discount = 1;
                        }
                    }
                    $invoiceDetail->save();
                }
            }
        }


        return redirect()->route('invoices', Auth::user()->subdomain);
    }
    public function editInvoice(Request $req, $id,$invoice_id){
        $invoice = Invoice::find($invoice_id);
        $clients = Client::all();

        return view('invoices/edit', ['clients'=>$clients, 'invoice'=>$invoice]);
    }
    public function update(Request $req){
        // dd($req);
        $invoice = Invoice::find($req->id);

        $invoice->client_id = $req->client;
        $invoice->status = $req->status;
        $invoice->issue_date = date('Y-m-d',strtotime($req->issue_date));
        $invoice->due_date = date('Y-m-d',strtotime($req->due_date));
        $invoice->invoice_number = $req->invoice_number;
        $invoice->po_number = $req->po_number;
        $invoice->sub_total = $req->sub_total;
        $invoice->grand_total = $req->grand_total;
        if($req->notes != '')
            $invoice->notes = $req->notes;
        if($req->invoice_tax != '')
            $invoice->tax = $req->invoice_tax;
        if($req->invoice_discount != '')
            $invoice->discount = $req->invoice_discount;

        $invoice->save();

        if($req->old_items){
            $old_items = explode(",", $req->old_items);
        }
        if(isset($req->description)){
            foreach ($req->description as $key => $description) {
                if($req->description[$key] && $req->quantity[$key] && $req->unit_price[$key]) {
                    if($req->details && array_key_exists($key, $req->details) && isset($old_items)){
                        if(in_array($req->details[$key], $old_items)) {
                            $invoiceDetail = Invoicedetail::find($req->details[$key]);

                            $invoiceDetail->invoice_id = $invoice->id;
                            $invoiceDetail->description = $req->description[$key];
                            $invoiceDetail->quantity = $req->quantity[$key];
                            $invoiceDetail->unit_price = $req->unit_price[$key];
                            if(isset($req->tax)) {
                                if(array_key_exists($key, $req->tax) && $req->tax[$key] == 'on') {
                                    $invoiceDetail->tax = 1;
                                }
                            }
                            if(isset($req->discount)) {
                                if(array_key_exists($key, $req->discount) && $req->discount[$key] == 'on') {
                                    $invoiceDetail->discount = 1;
                                }
                            }
                            $invoiceDetail->save();
                            $old_items = \array_diff($old_items, [$req->details[$key]]);
                        }
                    }else{
                        $invoiceDetail = new Invoicedetail();

                        $invoiceDetail->invoice_id = $invoice->id;
                        $invoiceDetail->description = $req->description[$key];
                        $invoiceDetail->quantity = $req->quantity[$key];
                        $invoiceDetail->unit_price = $req->unit_price[$key];
                        if(isset($req->tax)) {
                            if(array_key_exists($key, $req->tax) && $req->tax[$key] == 'on') {
                                $invoiceDetail->tax = 1;
                            }
                        }
                        if(isset($req->discount)) {
                            if(array_key_exists($key, $req->discount) && $req->discount[$key] == 'on') {
                                $invoiceDetail->discount = 1;
                            }
                        }
                        $invoiceDetail->save();
                    }
                }
            }
        }
        if(isset($old_items)){
            foreach ($old_items as $item) {
                $invoiceDetail = Invoicedetail::find($item);
                $invoiceDetail->delete();
            }
        }

        session()->flash('success', 'Informations updated successfully');
        return redirect()->route('edit-invoice',['account' => Auth::user()->subdomain, 'invoice_id' => $invoice->id]);
    }
}
