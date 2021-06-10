<?php

namespace App\Http\Controllers;

use App\Models\Cesta;
use App\Models\Cuenta;
use App\Models\Linea;
use App\Models\Pedido;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Models\User;

class CestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $cuenta = Cuenta::all()->where("user_id", Auth::id());
        $cesta = Cesta::all()->where('id_user', Auth::id());
        $url = 'storage/img/';
        $contador = 0;
        $importe = 0;
        return view('cesta.index')->with('productos', $cesta)->with("url", $url)->with('contador', $contador)->with('user', $user)->with('cuentas', $cuenta)->with('importe', $importe);
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
        //
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
        if ($id == "comprar") {

            $cuenta = Cuenta::all()->where("user_id", Auth::id());
            $cesta = Cesta::all()->where('id_user', Auth::id());
            $pedido = Pedido::all()->where("id_user", Auth::id());
            $idPedido = 0;

            foreach ($pedido as $ped) {
                if ($ped->fecha_pedido == null) {
                    $idPedido = $ped->id;
                }
            }

            $precioPedido = 0;
            foreach ($cesta as $p) {
                // Copiado de los registros de la cesta en la linea para mantener un registro
                $linea = new Linea();
                $linea->id_pedido = $idPedido;
                $linea->id_producto = $p->id_producto;
                $linea->cantidad = $p->cantidad;
                $linea->precio_unidad = $p->precio_unidad;
                $linea->precio_total_producto = $p->precio_total;
                $precioPedido += $p->precio_total;
                $linea->save();

            }

            foreach ($pedido as $ped) {
                if ($ped->fecha_pedido == null) {
                    // Modificacion del pedido actual
                    $ped->precio_total = $precioPedido;
                    $ped->fecha_pedido = Carbon::now()->format('Y-m-d');
                    $ped->save();
                }
            }

            foreach ($cuenta as $cu){
                $cu->saldo -= $precioPedido;
                $cu->save();
            }

            // Creación de un nuevo pedido vacio
            $newPed = new Pedido();
            $newPed->id_user = Auth::id();
            $newPed->save();

            //Borrado de los articulos de la cesta
            Cesta::where("id_user", Auth::id())->delete();

        }

        return redirect()->route('cesta.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == "all") {
            Cesta::where("id_user", Auth::id())->delete();
        } else {
            $delPro = Cesta::findOrFail($id);
            $delPro->delete();
        }

        return redirect()->route('cesta.index');
    }
}
