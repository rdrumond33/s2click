<?php

namespace App\Http\Controllers;

use App\Donor;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;
use function PHPSTORM_META\type;

class ProductController extends Controller
{


    private $produtoModel;
    private $doadorModel;
    private $quantidadetotal;


    function __construct(Product $produto, Donor $doador)
    {
        $this->produtoModel = $produto;
        $this->doadorModel = $doador;
        $this->quantidadetotal = 0;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $this->produtoModel->addProduct($request->all());

        $doador = $this->doadorModel->getDoadores()->find($id);

        return view('Donor.show', compact('doador'));
    }


    public function RelacinarDonorProduct(Request $request, $idDoador)
    {
        // request esta vindo o id e quantidade
        $quantidade = $request->amount;

        //pego a quantidade da tabela
        $quantidadeTabelaProduto = Product::all()->find($request->state)->amount;

        // pego qual dodador fez a doação
        $doador = Donor::all()->find($idDoador);

        // faço o cadastro do produto
        $produtos = Product::all()->find($request->state)->update([
            'amount' => $quantidadeTabelaProduto + $quantidade
        ]);

        $doador->products()->attach($request->state, ['quantidade' => $request->amount]);

        return view('Donor.show', compact('doador'));
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
}
