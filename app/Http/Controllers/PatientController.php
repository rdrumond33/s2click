<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Product;
use Illuminate\Validation\Validator;


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


        $teste=$this->validate($request, [

            'nome' => 'required|max:20',
            'cpfPaciente' => 'nullable|numeric|unique:patients',
            'responsavel' => 'nullable|max:150',
            'Cpfresponsavel' => 'nullable|numeric|unique:patients',
            'especiais' => 'nullable',
            'necessidade' => 'nullable',
            'receita' => 'nullable',
            'descricaoProduto' => 'max:150',

        ], [
            'nome.max' => 'Nome deve ter no maximo 20 caracter',
            'cpfPaciente.numeric'=>'cpf do paciente deve ser numerico',
            'cpfPaciente.unique'=>'cpf deve unico',
            'Cpfresponsavel.numeric'=>'cpf do responsavel ser numerico',
            'Cpfresponsavel.unique'=>'cpf deve ser unico',


        ]);
            $this->pacienteModel->addPaciente($request->all());


        return view('home');

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

        $paciente = Patient::findOrFail($id);


        return view('Patient.edit', compact('paciente'));

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

            'nome' => 'required|max:20',
            'cpfPaciente' => 'nullable|numeric',
            'responsavel' => 'nullable|max:150',
            'Cpfresponsavel' => 'nullable|numeric',
            'especiais' => 'nullable',
            'necessidade' => 'nullable',
            'receita' => 'nullable',
            'descricaoProduto' => 'max:150',

        ], [
            'nome.max' => 'Nome deve ter no maximo 20 caracter',
            'cpfPaciente.numeric'=>'cpf do paciente deve ser numerico',
            'cpfPaciente.unique'=>'cpf deve unico',
            'Cpfresponsavel.numeric'=>'cpf do responsavel ser numerico',
            'Cpfresponsavel.unique'=>'cpf deve ser unico',


        ]);
        $patient = Patient::findOrFail($id);
        $patient->update($request->all());


        return redirect()->route('home');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Patient::destroy($id);
    }


    public function doando(Request $request, $idPacinete)
    {
        return view('Patient.recebendoDoacao', compact('idPacinete'));
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

        return view('Patient.recebendoDoacao', compact('idPacinete'));
    }


}
