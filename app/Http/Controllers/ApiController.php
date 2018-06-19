<?php

namespace App\Http\Controllers;

use App\Reserve;
use Illuminate\Http\Request;
use App\Donor;
use App\Product;
use App\Patient;
use Illuminate\Support\Facades\DB;


class ApiController extends Controller
{

    public function getDonor()
    {
        $donors = Donor::all();

        return datatables()->of($donors)
            //date('d/F/Y',strtotime())
            ->editColumn('created_at', function ($donors) {
                return date('d/F/Y', strtotime($donors->created_at));
            })->editColumn('nome', function ($donors) {
                return '<a href="donor/product/create/' . $donors->id . '">' . $donors->nome . '</a>';
            })
            ->rawColumns([0])
            ->addColumn('action', function ($donors) {
                return
                    '<a href="donor/product/create/' . $donors->id . '" class="btn btn-xs btn-outline-info "><i class="fas fa-eye" style="font-size: 1.5em"></i></a>' .
                    '<a href="donor/' . $donors->id . '/edit"  class="btn btn-xs btn-outline-info " ><i class="fas fa-pencil-alt" style="font-size: 1.5em"></i></a>' .
                    '<a href="#" onclick="deletDonor(' . $donors->id . ')" class="btn btn-xs btn-outline-info " ><i class="far fa-trash-alt"style="font-size: 1.5em" ></i></a>';

            })->toJson();

    }

    public function getDonorProduct($id)
    {


        $donors = DB::table('donor_product')->where('donor_id', $id);


        return datatables()->of($donors)
            ->editColumn('created_at', function ($donors) {
                return date('F/d/Y', strtotime($donors->created_at));
            })
            ->editColumn('updated_at', function ($donors) {
                return date('F/d/Y', strtotime($donors->updated_at));
            })
            ->addColumn('Produto', function ($donors) {
                return Product::all()->find($donors->product_id)->nome;
            })
            ->removeColumn('donor_id')
            ->removeColumn('product_id')
            ->removeColumn('updated_at')
            ->toJson();
    }

    public function getTableReserva()
    {


        $reservas = Reserve::all();


        return datatables()->of($reservas)
            ->addColumn('NomePaciente', function ($reservas) {
                return Patient::find($reservas->idPaciente)->nome;
            })
            ->addColumn('NomeProduto', function ($reservas) {
                return Product::find($reservas->idProduto)->nome;
            })
            ->addColumn('action', function ($reservas) {
                return
//                    '<a href="patient/' . $pacientes->id . '/Doando" class="btn btn-xs btn-outline-info "><i class="fas fa-eye" style="font-size: 1.5em"></i></a>' .
                    '<a onclick="cancelar(' . $reservas->id . ')"class="btn btn-xs btn-outline-info " ><i class="fas fa-pencil-alt" style="font-size: 1.5em"></i></a>' .
                    '<a onclick="Confirmar(' . $reservas->id . ')" class="btn btn-xs btn-outline-info " ><i class="far fa-trash-alt"style="font-size: 1.5em" ></i></a>';
            })
            ->toJson();

    }

    public function getDatablePatient()
    {
        $pacientes = Patient::all();

        return datatables()->of($pacientes)
            ->addColumn('ultimaDoacao', function ($pacientes) {
                //pegando a ultima doacao
                if (DB::table('patient_product')->where('patient_id',
                    $pacientes->id)->exists()) {
                    $ultimaDoacao = date('d/F/Y',
                        strtotime(DB::table('patient_product')->where('patient_id',
                            $pacientes->id)->orderBy('created_at',
                            'desc')->first()->created_at));
                    return $ultimaDoacao;
                } else {
                    return "";

                }
            })
            ->addColumn('action', function ($pacientes) {
                return
                    '<a href="patient/' . $pacientes->id . '/Doando" class="btn btn-xs btn-outline-info "><i class="fas fa-eye" style="font-size: 1.5em"></i></a>' .
                    '<a href="patient/' . $pacientes->id . '/edit" class="btn btn-xs btn-outline-info " ><i class="fas fa-pencil-alt" style="font-size: 1.5em"></i></a>' .
                    '<a href="#"  onclick="deletPatient(' . $pacientes->id . ')" class="btn btn-xs btn-outline-info " ><i class="far fa-trash-alt"style="font-size: 1.5em" ></i></a>';
            })
            ->toJson();


    }


    public function getDatableProduct()
    {


        $product = Product::all();

        return datatables()->of($product)
            ->addColumn('action', function ($product) {
                return
                    '<a href="product/' . $product->id . '/edit"  class="btn btn-xs btn-outline-info " ><i class="fas fa-pencil-alt" style="font-size: 1.5em"></i></a>' .
                    '<a href="#" onclick="deletproduct(' . $product->id . ')" class="btn btn-xs btn-outline-info " ><i class="far fa-trash-alt" style="font-size: 1.5em"></i> </a>';
            })
            ->editColumn('descricaoProduto', '{!! str_limit($descricaoProduto, 30) !!}')
            ->make(true);///

    }

    public function getDatableProductDoados($idPacinete)
    {

        $pacinete = DB::table('patient_product')->where('patient_id', $idPacinete);


        return datatables()->of($pacinete)
            ->editColumn('created_at', function ($pacinete) {
                return date('F/d/Y', strtotime($pacinete->created_at));
            })
            ->editColumn('updated_at', function ($pacinete) {
                return date('F/d/Y', strtotime($pacinete->updated_at));
            })
            ->addColumn('Produto', function ($pacinete) {
                return Product::all()->find($pacinete->product_id)->nome;
            })
            ->removeColumn('patient_id')
            ->removeColumn('product_id')
            ->removeColumn('updated_at')
            ->toJson();


    }


}
