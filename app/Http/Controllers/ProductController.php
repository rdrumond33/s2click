<?php

namespace App\Http\Controllers;

use App\Donor;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Validator;
use Illuminate\Validation\Rule;

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
    public function create()
    {

        return view('Product.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'nome' => 'required|max:20',
            'marca' => 'required',
            'descricaoProduto' => 'max:150',

        ], [
            'nome.max' => 'Nome deve ter no maximo 20 caracter',
        ]);

        $data = $request->all();

        Product::create($data);

        return redirect()->route('home');


    }

    public function storeAdd(Request $request, $id)
    {

        $this->validate($request, [
            'nome' => 'required|max:20',
            'marca' => 'required',
            'descricaoProduto' => 'max:150',

        ], [
            'nome.max' => 'Nome deve ter no maximo 20 caracter',
        ]);

        $data = $request->all();

        Product::create($data);

        $doador = Donor::find($id);

        return redirect()->route('Donor.Product.Show', $id);


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
        $product = Product::findOrFail($id);

        return view('Product.edit', compact('product'));

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
        $teste = $this->validate($request, [
            'nome' => 'required|max:20',
            'marca' => 'required',
            'descricaoProduto' => 'max:150',

        ], [
            'nome.max' => 'Nome deve ter no maximo 20 caracter',
        ]);

        $produto = Product::findOrFail($id);
        $produto->update($request->all());


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
        Product::destroy($id);

    }

    public function RelacinarDonorProduct(Request $request, $idDoador)
    {
        // request esta vindo o id e quantidade
        $quantidade = $request->amount;

        //pego a quantidade da tabela
        $quantidadeTabelaProduto = Product::all()->find($request->state)->amount;

        // pego qual dodador fez a doação
        $doador = Donor::all()->find($idDoador);

        if ($quantidade <= 0) {

            return view('Donor.doando', compact('doador'));

        } else {



            // faço o cadastro do produto
            $produtos = Product::all()->find($request->state)->update([
                'amount' => $quantidadeTabelaProduto + $quantidade
            ]);

            $doador->products()->attach($request->state, ['quantidade' => $request->amount]);

            return view('Donor.doando', compact('doador'));
        }

    }

    public function apiProduto()
    {


    }


}
