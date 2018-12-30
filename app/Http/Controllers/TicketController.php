<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Kategori;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::with('kategori')->get();
        
        return view('ticket.index',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Ticket::with('kategori')->get();
        return view('ticket.create',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_ticket' => 'required|min:3',
            'price_ticket' => 'required|numeric',
            'total_ticket' => 'required|numeric',
            'type_ticket' => 'required|min:3',
        ]);

        $ticket = Ticket::create($request->all());

        return redirect()->route('ticket.index')->with('success','Ticket has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        $kategori = Kategori::all();
        return view('ticket.edit',compact('ticket','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ticket' => 'required|min:3',
            'price_ticket' => 'required|numeric',
            'total_ticket' => 'required|numeric',
            'type_ticket' => 'required|min:3',
        ]);

        $ticket = Ticket::findOrFail($id);
        $ticket->update($request->all());

        return redirect()->route('ticket.index')->with('success','Ticket has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        if(!$ticket) return redirect()->back();

        $ticket->delete();

        return redirect()->route('ticket.index')->with('success','Ticket has been deleted');
    }
}
