<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function alldata()
    {
        $data = Customers::all();
        // return $data;
        return view('customerhome', ['customers' => $data]);
    }
    function trashdata()
    {
        $data = Customers::onlyTrashed()->get();
        // return view('trashtable');
        return view('trashtable', ['deleteddata' => $data]);
    }
    function delete($id)
    {
        Customers::destroy($id);
        return redirect('/');
    }
    function restoring($id)
    {
        // return $id;
        $data = Customers::onlyTrashed()->find($id);
        if ($data) {
            $data->restore();
        }
        return redirect('/trash');
    }
    function destroy($id){
        $data=Customers::onlyTrashed()->find($id);
        if($data){
            $data->forceDelete();
        }
        return redirect('/trash');
    }
}
