<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Product;
use App\Reserve;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {






        $data = $request->all();

        if (Patient::findOrFail($request->idPaciente) == null) {
            return view('home');
        } else {

            //        $timestamp = Carbon::parse($request->get('dataReserva'))->timestamp;

            Reserve::create($data);



            DB::table('users')->where([
                ['Responsavel', '=', $request->Responsavel],
                ['created_at', '>', '1'],
            ])->get();


            $idProduto = Reserve::where('Responsavel',$request->Responsavel);
            $teste= $idProduto->where('created_at', '>',  $idProduto->created_at)->get();
            dd($teste);
            $amount = Reserve::where('Responsavel',$request->Responsavel)->get();
            $quantidadeTabelaProduto = Product::all()->find($idProduto->idProduto)->amount;


            Product::all()->find($idProduto)->update([
                'amount' => $quantidadeTabelaProduto - $amount->amount
            ]);

            return view('home');

        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Reserve $reserve
     * @return \Illuminate\Http\Response
     */
    public function show(Reserve $reserve)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reserve $reserve
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserve $reserve)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Reserve $reserve
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserve $reserve)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reserve $reserve
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reserve::destroy($id);

    }

    public function cancelar($id)
    {
        $idProduto = Reserve::find($id)->idProduto;
        $amount = Reserve::find($id)->quantidade;
        $quantidadeTabelaProduto = Product::all()->find($idProduto)->amount;

        Product::all()->find($idProduto)->update([
            'amount' => $quantidadeTabelaProduto + $amount
        ]);

        Reserve::destroy($id);

    }
}
