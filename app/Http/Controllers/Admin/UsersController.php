<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;
use Maatwebsite\Excel\Excel;
use Validator;
use Illuminate\Http\Request;
use App\User;
use App\Role;

class UsersController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listUser = User::all();

        return view('admin.user.list',['listUser'=>$listUser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allRole = Role::all();
        return view('admin.user.add',['allRole'=>$allRole]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $user = $this->userService->createUser($request->all());

        if (!$user) {
            throw new \Exception('server error', 500);
        }

        return redirect()->route('user.index')->with('message','Thêm thành công!');
    }

    public function checkEmailAjax(Request $request)
    {
      if ( $request->ajax() ) {
        $emailDb = User::where('email',$request->txtEmail)->get();
        if(count($emailDb) > 0){
          return response(['msg' => 'Email đã tồn tại', 'status' => 'success']);
        } else {
          return response(['msg' => 'Email chưa tồn tại', 'status' => 'failed']);
        }
      }
      return response(['msg' => 'Ajax Checked Fail', 'status' => 'failed']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editUser = User::findOrFail($id);
        $allRole = Role::all();
        return view('admin.user.edit',compact('editUser','allRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->userService->updateUser($request->all(), $id);
        if (!$user) {
            throw new \Exception('server error', 500);
        }

        return redirect()->route('user.index')->with('message','Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroyUser = User::findOrFail($id);
        $destroyUser->delete();

        return redirect()->route('user.index')->with('message','Xóa thành công!');
    }

    public function export()
    {
        $user = User::all();

        Excel::create('users', function ($excel){
            $excel->sheet('users', function ($sheet){
               $sheet->loadView('user.list');
            });
        })->export('csv');
    }
}
