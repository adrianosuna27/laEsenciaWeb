<?php

namespace App\Http\Controllers;

use App\Models\Linea;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use TCG\Voyager\Models\User;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all()->where("id_user", Auth::id());
        $lineas = Linea::all();
        $contador = 0;
        $pedidoVacio = 0;
        $url = 'storage/img/';
        return view('pedidos.index')->with('pedidos', $pedidos)->with('contador', $contador)->with('pedidoVacio', $pedidoVacio)->with('lineas', $lineas)->with("url", $url);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        $lineas = Linea::all();
        $url = 'storage/img/';
        $user = User::findOrFail(Auth::id());

        $data = compact('lineas', 'pedido','url','user');

        $pdf = PDF::loadView('pdf.index', $data);
        return $pdf->stream();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
