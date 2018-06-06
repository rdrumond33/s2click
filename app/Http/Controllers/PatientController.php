<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Product;


use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{


    private $pacienteModel;

    function __construct(Patient $paciente)
    {
        $this->pacienteModel = $paciente;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = $this->pacienteModel->allPaciente();
        return view('Patient.index', compact('pacientes'));
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
        // Adicionando o Paciente no banco de dados

        $this->pacienteModel->addPaciente($request->all());
        $pacientes = $this->pacienteModel->allPaciente();

        return view('Patient.index', compact('pacientes'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function doando(Request $request, $idPacinete)
    {
        return view('Patient.Doando', compact('idPacinete'));
    }

    public function doandoProduto(Request $request, $idPacinete)
    {
//        dd($request->all(),$idPacinete);

        // request esta vindo o id e quantidade
        $quantidade = $request->amount;

        //pego a quantidade da tabela
        $quantidadeTabelaProduto = Product::all()->find($request->idProduto)->amount;

        // pego qual dodador fez a doação
        $Patient = Patient::all()->find($idPacinete);

        $Patient->products()->attach($request->idProduto, ['quantidadeDoada' => $request->amount]);

        // faço o cadastro do produto
        $produtos = Product::all()->find($request->idProduto)->update([
            'amount' => $quantidadeTabelaProduto - $quantidade
        ]);

//        dd($produtos);

        return view('Patient.Doando', compact('idPacinete'));
    }




}
