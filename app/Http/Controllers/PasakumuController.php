<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasakumi;

class PasakumuController extends Controller
{
    /**
     * Display a listing of the pasakumi.
     */
    public function index()
    {
        // list using legacy primary key
        $items = Pasakumi::orderBy('ID', 'asc')->get();
        return view('alldata', ['data' => $items]);
    }

    /**
     * Show the form for creating a new pasakumi.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nosaukums'      => 'required|max:45',
            'kategorija'     => 'nullable|max:45',
            'datums'         => 'nullable|date',
            'sakuma_laiks'   => 'nullable',
            'beigu_laiks'    => 'nullable',
            'apraksts'       => 'nullable|max:255',
            'max_dalibnieku' => 'nullable|integer',
            'darbinieks_id'  => 'nullable|integer',
            'telpa_id'       => 'nullable|integer',
        ]);

        $data = new Pasakumi;
        $data->fill($validated);
        $data->save();

        // return to the page the user came from (home or list)
        $previous = url()->previous();
        if (rtrim($previous, '/') === url('/')) {
            return redirect('/')->with('success', 'Dati veiksmīgi saglabāti');
        }
        return redirect('/pasakumi')->with('success', 'Dati veiksmīgi saglabāti');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = Pasakumi::findOrFail($id);
        return view('details', ['data' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Pasakumi::findOrFail($id);
        return view('edit', ['data' => $item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nosaukums'      => 'required|max:45',
            'kategorija'     => 'nullable|max:45',
            'datums'         => 'nullable|date',
            'sakuma_laiks'   => 'nullable',
            'beigu_laiks'    => 'nullable',
            'apraksts'       => 'nullable|max:255',
            'max_dalibnieku' => 'nullable|integer',
            'darbinieks_id'  => 'nullable|integer',
            'telpa_id'       => 'nullable|integer',
        ]);

        $data = Pasakumi::findOrFail($id);
        $data->fill($validated);
        $data->save();

        $previous = url()->previous();
        if (rtrim($previous, '/') === url('/')) {
            return redirect('/')->with('success', 'Dati veiksmīgi atjaunoti');
        }
        return redirect('/pasakumi')->with('success', 'Dati veiksmīgi atjaunoti');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Pasakumi::findOrFail($id)->delete();
        $previous = url()->previous();
        if (rtrim($previous, '/') === url('/')) {
            return redirect('/')->with('success', 'Dati veiksmīgi izdzēsti');
        }
        return redirect('/pasakumi')->with('success', 'Dati veiksmīgi izdzēsti');
    }
}
