<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Validator;
use Input;
use Illuminate\Database\Query\Builder;
use DB;
use Sentinel;
use Hash;

class MainController extends Controller
{

    public function index(){
        return view('pages.login');
    }


    public function home(){
        $use = \Auth::user()->id;
        $user = \App\User::where('id','=',$use)->get();
        return view('app', compact('user'));
    }

    public function registerview(){
        return view('pages.signup');
    }

    public function register(){
        $input = new \App\AddAccount(Request::all());
        $current = Carbon::now();
        $current = new Carbon();
        $inttime = strtotime($current);

        $fname = $input['acc_fname'];
        $mname = $input['acc_mname']; 
        $lname = $input['acc_lname'];
        $type = 'ADMIN';
        $pass =  bcrypt($input['password']);
        $acctype = 'ADMIN'.$inttime;
        $account = DB::insert('insert into add_accounts (id, acc_id, acc_fname, acc_mname, acc_lname, acc_type, password, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', array('', $acctype, $fname, $mname, $lname, $type, $pass, $current, $current));
        $id = 'ADMIN'.$inttime;
        \Session::flash('flash_message', 'Your Account ID is'.$id);

        return view('pages.signup');
    }

    public function notifications(){
        return view('pages.notifs');
    }

    public function load(){
        return view('pages.load');
    }

    public function transactions(){
        return view('pages.transactions');
    }

    public function bus(){
        return view('pages.bus');
    }

    public function users(){
        return view('pages.users');
    }

    public function gettransactions(){
        return view('pages.gettransactions');
    }

    public function sales(){
        return view('pages.sales');
    }

    public function logout(){
        return view('pages.login');
    }

    public function deactivatecard(){
        return view('pages.deactivatecard');
    }

    public function addaccount(){
         return view('pages.addaccount');
    }

    public function addaccounts(){
        $input = new \App\AddAccount(Request::all());
        $current = Carbon::now();
        $current = new Carbon();
        $inttime = strtotime($current);

        if (Input::get('acc_type') == 3){
            $fname = $input['acc_fname'];
            $mname = $input['acc_mname']; 
            $lname = $input['acc_lname'];
            $type = $input['acc_type'];
            $pass =  bcrypt($input['password']);
            $acctype = 'COA'.$inttime;
            // $fullname = $fname.' '.$mname. ' '.$lname;
            $pos = 'Co-admin';
            $account = DB::insert('insert into add_accounts (id, acc_id, acc_fname, acc_mname, acc_lname, acc_type, password, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', array('', $acctype, $fname, $mname, $lname, $pos, $pass, $current, $current));
            \Session::flash('flash_message', 'Inserted Co-admin id is:'.$acctype);
        }

        else if (Input::get('acc_type') == 2){
            $fname = $input['acc_fname'];
            $mname = $input['acc_mname']; 
            $lname = $input['acc_lname'];
            $type = $input['acc_type'];
            $pass =  bcrypt($input['password']);
            $acctype = 'TEL'.$inttime;
            // $fullname = $fname.' '.$mname. ' '.$lname;
            $pos = 'Teller';
            $account = DB::insert('insert into add_accounts (id, acc_id, acc_fname, acc_mname, acc_lname, acc_type, password, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', array('', $acctype, $fname, $mname, $lname, $pos, $pass, $current, $current));
            \Session::flash('flash_message', 'Inserted Teller id is:'.$acctype);
        }

        else{}
        
        return view('pages.addaccount');
    }
}

?>