<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Fpdf;
use Carbon\Carbon;
use App\Exports\TransactionExport;

class TransactionController extends Controller
{
    public function index(){
        $transaksi = Transaction::where('status_ticket',0)->get();
        return view('transaction.index',compact('transaksi'));
    }

    public function store(Request $request){
        $request->validate([
           'qty' => 'required|numeric',
        ]);

        Transaction::create($request->except('submit'));

        return redirect()->route('transaction.index')->with('success','Transaction has been added !');
    }

    public function destroy($id){
        $transaksi = Transaction::findOrFail($id);
        if(!$transaksi)
            return redirect()->back();

        $transaksi->delete();

        return redirect()->route('transaction.index')->with('success','Transaction has been deleted !');
    }

    public function update(){
        $transaksi = Transaction::where('status_ticket',0);
        $transaksi->update(['status_ticket'=> 1]);
        // return redirect()->back();
        return redirect()->route('transaction.index')->with('success','Transaction has been updated ! Status changed processed');
    }
	
	public function report(){
		
		$pdf = new Fpdf("L","cm","A4");
        $pdf::AddPage();
        $pdf::SetFont('Arial', 'B', 15);
        $pdf::Cell(185,7,'Ticket Sales Report',0,1,'C');
        $pdf::SetFont('Arial', '', 12);
        $pdf::Cell(185,5,'BANTUL',0,1,'C');
        $pdf::SetFont('Arial', '', 12);
        $pdf::Cell(185,5,"Phone : 087784392881 ",0,1,'C');
        $pdf::Line(10,30,190,30);
        $pdf::Line(10,31,190,31);
        $pdf::Cell(30,10,'',0,1);
        $pdf::SetFont('Arial', 'B', 14);
        $pdf::Cell(185,5,'Table Ticket Sold',0,0,'C');
        $pdf::Cell(30,10,'',0,1);
        $pdf::Cell(60,7,'Nama Tiket',1,0);
        $pdf::Cell(25,7,'Qty',1,0);
        $pdf::Cell(40,7,'Harga Tiket',1,0);
        $pdf::Cell(38,7,'Subtotal',1,0);
        $pdf::Cell(30,7,'Tanggal',1,1);
        $transaksi=Transaction::where('status_ticket','1')->get();
		
        foreach($transaksi as $item){
            $pdf::Cell(60,7,$item->ticket->name_ticket,1,0);
            $pdf::Cell(25,7,$item->qty,1,0);
            $harga = str_replace('.','',$item->ticket->price_ticket);
            $pdf::Cell(40,7,"Rp. " . number_format($harga) . ",-",1,0);
            $pdf::Cell(38,7,"Rp. " . number_format($harga*$item->qty) . ",-" ,1,0);
            $pdf::Cell(30,7,\Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %b %Y'),1,1);
       }
        $pdf::Output();
        exit;
    }
    
    public function excel(){
        return (new TransactionExport)->download('sales_ticket.xlsx');
    }
}
