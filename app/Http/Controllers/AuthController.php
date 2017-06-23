<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function getLogin()
  {
    return view('admin.login');
  }

  public function postLogin(Request $request)
  {
    $this->validate($request,
    [
      'txtEmail' => 'required',
      'txtPass' => 'required|min:8|max:100'
    ],
    [
      'txtEmail.required' => 'Bạn chưa nhập email!',
      'txtPass.required' => 'Bạn cần nhập password!',
      'txtPass.min' => 'Mật khẩu > 8 và < 100 ký tự!',
      'txtPass.max' => 'Mật khẩu > 8 và < 100 ký tự!'
    ]);

    if(Auth::attempt(['email'=>$request->txtEmail, 'password'=>$request->txtPass]))
    {
      return redirect()->route('post.index');
    }
    else
    {
      return redirect('admin/login')->with('message','Thông tin đăng nhập chưa đúng!!!');
    }
  }

  public function getLogout()
  {
    Auth::logout();
    
    return redirect('admin/login');
  }
}
