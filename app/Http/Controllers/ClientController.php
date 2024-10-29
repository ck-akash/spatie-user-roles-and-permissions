<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::get();
        return view('client.index', ['clients' => $clients]);
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:clients,name'
            ]
        ]);

        Client::create([
            'name' => $request->name
        ]);

        return redirect('clients')->with('status','Client Created Successfully');
    }

    public function edit(Client $client)
    {
        return view('client.edit', ['client' => $client]);
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:clients,name,'.$client->id
            ]
        ]);

        $client->update([
            'name' => $request->name
        ]);

        return redirect('clients')->with('status','Client Updated Successfully');
    }

    public function destroy($clientId)
    {
        $client = Client::find($clientId);
        $client->delete();
        return redirect('clients')->with('status','Client Deleted Successfully');
    }
}
