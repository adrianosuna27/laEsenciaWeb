<?php

namespace App\Http\Controllers;

use App\Models\Cesta;
use App\Models\Cuenta;
use App\Models\Pedido;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $pedCount = Pedido::where("id_user", Auth::id())->count();
        if ($pedCount == 0) {
            $newPed = new Pedido();
            $newPed->id_user = Auth::id();
            $newPed->save();
        }

        $cuenta = Cuenta::where("user_id", Auth::id())->count();
        if ($cuenta == 0) {
            $newCue = new Cuenta();
            $newCue->user_id = Auth::id();
            $newCue->save();
        }

        $pro = Producto::all();
        $url = 'storage/img/';
        return view('/home')->with('productos', $pro)->with("url", $url);
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
        $newPro = Producto::findOrFail($id);

        $proCount = Cesta::where("id_user", Auth::id())->where("id_producto", $id)->count();

        if ($proCount != 0) {

            $proBus = Cesta::where("id_user", Auth::id())->where("id_producto", $id)->get();

            foreach ($proBus as $p) {

                $p->cantidad = $p->cantidad + 1;
                $p->precio_total = $p->precio_total + $newPro->precio;
                $p->save();
            }
        } else {

            $newCesta = new Cesta();
            $newCesta->id_user = Auth::id();
            $newCesta->id_producto = $id;
            $newCesta->cantidad = 1;
            $newCesta->precio_unidad = $newPro->precio;
            $newCesta->precio_total = $newPro->precio;
            $newCesta->save();
        }

        return redirect()->route('home.index');
    }

    public function destroy($id)
    {
        $newPro = Producto::findOrFail($id);
        $newPro->delete();
        return redirect()->route('home.index');
    }
}
