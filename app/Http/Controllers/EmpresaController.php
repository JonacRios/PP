<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Http\Requests\StoreEmpresaRequest;
use App\Http\Requests\UpdateEmpresaRequest;
use Illuminate\Support\Facades\DB;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = Empresa::all();
        return view('empresa.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmpresaRequest $request)
    {
        try {
        DB::beginTransaction();
            //Tabla producto
            $empresa = new Empresa();
            if ($request->hasFile('img_path')) {
                $name = $empresa->handleUploadImage($request->file('img_path'));
            } else {
                $name = null;
            }

            $empresa->fill([
                'nombre' => $request->nombre,
                'direccion' => $request->direccion,
                'email' => $request->email,
                'img_path' => $name,
                'telefono' => $request->telefono,
                'sitio_web' => $request->sitio_web,
            ]);

            $empresa->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return redirect()->route('empresas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $empresa)
    {
        $empresa = Empresa::find($empresa);
        return view('empresa.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmpresaRequest $request, Empresa $empresa)
    {
        Empresa::find($empresa->id)->update($request->all());
        return redirect()->route('empresas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
       $empresa = Empresa::find($id); 
        if($empresa){
            $empresa->delete();
            return redirect()->route('empresas.index');
        }else {
            return redirect()->route('empresas.index');
        }
    }
}
