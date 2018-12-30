<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ticket;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transaksi = DB::table('transactions')
                    ->join('tickets','tickets.id','=','transactions.id_ticket')
                    ->join('kategoris','kategoris.id','=','tickets.id_kategori')
                    ->where('status_ticket','=',1)
                    ->get();
        
        return view('home',compact('transaksi'));
    }
}
