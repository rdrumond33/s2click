<?php

namespace App\Http\Controllers;

use App\Donor;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonorController extends Controller
{
    private $produtoModel;
    private $doadorModel;

    function __construct(Product $produto, Donor $doador)
    {
        $this->produtoModel = $produto;
        $this->doadorModel = $doador;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doadores = $this->doadorModel->getDoadores();
        return view('Donor.index', compact('doadores'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doadores = $this->doadorModel->all();
        return view('Donor.create', compact('doadores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validacao = $this->validate($request, [
            'nome'=>'required',
            'endereco'=>'nullable',
            'telefone'=>'nullable',
            'email'=>'email',
            'cpf'=>'nullable|numeric',
            'tipo'

        ]);

        $data = $request->all();

        Donor::create($data);

        return redirect()->route('donor.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function doando($id)
    {

        $doador = $this->doadorModel->getDoadores()->find($id);

        return view('Donor.doando', compact('doador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $doador = Donor::findOrFail($id);

        return view('Donor.edit', compact('doador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nome'=>'required',
            'endereco'=>'nullable',
            'telefone'=>'nullable',
            'email'=>'email',
            'cpf'=>'nullable|numeric',
            'tipo'

        ]);

        $doador = Donor::findOrFail($id);
        $doador->update($request->all());


        return redirect()->route('donor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Donor::destroy($id);
    }


}
