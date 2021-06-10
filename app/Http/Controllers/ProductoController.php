<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Models\User;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $url = 'storage/img/';
        $productos = Producto::all()->where("user_id", Auth::id());
        $contador = 0;
        return view('producto.index')->with('productos', $productos)->with("url", $url)->with('contador', $contador)->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = DB::select('select * from categorias');
        return view('producto.create')->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'nombre.max' => 'Solo se admiten hasta 50 caracteres',
            'nombre.required' => 'Nombre del Articulo Obligatorio',
            'descripcion.max' => 'Solo se admiten hasta 300 caracteres',
            'descripcion.required' => 'Descripción del Articulo Obligatorio',
            'precio.required' => 'Precio del Articulo Obligatorio',
            'precio.integer' => 'Solo se admiten números',
            'imagen.required' => 'Imagen Obligatoria',
            'categoria.required' => 'Categoria Obligatoria',

        ];

        $request->validate([
            'nombre' => ['required', 'string', 'max:50'],
            'descripcion' => ['required', 'string', 'max:300'],
            'categoria' => ['required'],
            'precio' => ['required', 'integer'],
            'imagen' => ['required'],
        ], $messages);

        $newPro = new Producto();
        $newPro->nombre = $request->nombre;
        $newPro->descripcion = $request->descripcion;
        $newPro->id_categoria = $request->categoria;
        $newPro->precio = $request->precio;
        $newPro->user_id = Auth::id();

        $nombreImagen = time() . '_' . $request->file('imagen')->getClientOriginalName();
        $newPro->imagen = $nombreImagen;

        $newPro->save();

        $request->file('imagen')->storeAs('public/img', $nombreImagen);

        return redirect()->route('producto.index');
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
        $categorias = DB::select('select * from categorias');
        $pro = Producto::findOrFail($id);
        $url = 'storage/img/';
        return view('producto.edit')->with('producto', $pro)->with("url", $url)->with('categorias', $categorias);
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
        if($id == "nueva"){
            $user = User::findOrFail(Auth::id());
            $user->bodega = true ;
            $user->nom_bodega = $request->nombre;
            $user->save();
        }else{
            $messages = [
                'nombre.max' => 'Solo se admiten hasta 50 caracteres',
                'nombre.required' => 'Nombre del Articulo Obligatorio',
                'descripcion.max' => 'Solo se admiten hasta 300 caracteres',
                'descripcion.required' => 'Descripción del Articulo Obligatorio',
                'precio.required' => 'Precio del Articulo Obligatorio',
                'precio.integer' => 'Solo se admiten números',
                'categoria.required' => 'Categoria Obligatoria',

            ];

            $request->validate([
                'nombre' => ['required', 'string', 'max:50'],
                'descripcion' => ['required', 'string', 'max:300'],
                'categoria' => ['required'],
                'precio' => ['required', 'integer'],
            ], $messages);

            $newPro = Producto::findOrFail($id);
            $newPro->nombre = $request->nombre;
            $newPro->descripcion = $request->descripcion;
            $newPro->id_categoria = $request->categoria;
            $newPro->precio = $request->precio;
            $newPro->user_id = Auth::id();

            if (is_uploaded_file($request->imagen)) {
                $nombreImagen = time() . '_' . $request->file('imagen')->getClientOriginalName();
                $newPro->imagen = $nombreImagen;
                $request->file('imagen')->storeAs('public/img', $nombreImagen);
            }
            $newPro->save();
        }

        return redirect()->route('producto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newPro = Producto::findOrFail($id);
        $newPro->delete();
        return redirect()->route('producto.index');
    }
}
