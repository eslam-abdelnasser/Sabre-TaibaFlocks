<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PackageUser;
class BankTransferController extends Controller
{
    //

    public function index(){

        $package_user =  PackageUser::where(['payment_method' => 0 , 'status' => 2])->get();

        return view('admin.bank-transfer.index')->withPackageUser($package_user);
    }

    public function BankStatus(Request $request ,$id){

//        dd($id);
        $this->validate($request,[
            'account_number' => 'required'
        ]);
        $package = PackageUser::find($id);

        if (isset($package)){
            $package->message = $request->account_number ;
            $package->status = 1 ;
            $package->save();

            session()->flash('message', 'Status has been changed successfully');
        }

        return redirect()->back();

    }

    public function paid(){
        $package_user =  PackageUser::where(['payment_method' => 0 , 'status' => 1])->get();

        return view('admin.bank-transfer.paid')->withPackageUser($package_user);
    }
}
