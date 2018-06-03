<?php

namespace App\Http\Controllers;

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
            })
            ->addColumn('action', function ($donors) {
                return '<a href="donor/product/create/'.$donors->id.'" class="btn btn-xs btn-outline-info "><i class="glyphicon glyphicon-edit" style="font-size: 1.5em"></i> </a>' .
                    '<a href="#" onclick="editForm(' . $donors->id . ')" class="btn btn-xs btn-outline-info " ><i class="fas fa-edit" style="font-size: 1em"></i> </a>' .
                    '<a href="#" onclick="deletDonor(' . $donors->id . ')" class="btn btn-xs btn-outline-info " ><i class="far fa-trash-alt" style="font-size: 1em"></i> </a>';
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
            ->addColumn('Nome Produto', function ($donors) {
                return Product::all()->find($donors->product_id)->nome;
            })
            ->removeColumn('donor_id')
            ->removeColumn('product_id')
            ->toJson();
    }


}