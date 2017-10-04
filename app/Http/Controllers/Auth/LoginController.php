<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repository\RegitroRepo;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    protected $repoRegister;
   public function __construct(RegitroRepo $repo)
   {
       $this->repoRegister = $repo;

   }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/convenios';

    public function login(Request $request)
    {
        $logn = $this->repoRegister->ValidLogin($request['email'],$request['password']);
        if($logn != null){
            session(['login'=>$logn]);
            return redirect('/convenios');
        }
        return back();

    }









}
