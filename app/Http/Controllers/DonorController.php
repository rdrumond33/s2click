<?php

namespace App\Http\Controllers;

use App\Donor;
use App\Product;
use Illuminate\Http\Request;


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

    public function apiDonor()
    {            $donors = Donor::all();

        return datatables()->of($donors)
            ->addColumn('action', function ($donor){
                return '<a href="#"  onclick="teste()" "class="btn btn-xs btn-outline-info produto" id="'.$donor->id.'" style="margin-right: 10px"><i class="fab fa-product-hunt" style=" font-size: 2em" ></i> Produto</a>'.
                    '<a href="#" onclick="teste()" class="btn btn-xs btn-outline-info " ><i class="fas fa-edit" style="font-size: 2em"></i> Editar</a>'.
                    '<a href="#" class="btn btn-xs btn-outline-info " ><i class="far fa-trash-alt" style="font-size: 2em"></i> Deletar</a>'
                    ;
            })->toJson();


//        $doadores = Donor::select(['id','nome','endereco','telefone','email','tipo']);

        //      return Datatables::of($doadores)->make();

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

        $this->doadorModel->addDonor($request->all());

        return view('Donor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doador = $this->doadorModel->getDoadores()->find($id);

        return view('Donor.show', compact('doador'));
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
}
