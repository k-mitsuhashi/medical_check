<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * ユーザー一覧
     *
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(Request $request)
    {
        $users = User::getList()->toArray($request);

        return view('user.index')->with(compact('users'));
    }
    /**
     * ユーザー詳細
     *
     * @param Request $request
     * @param array $user
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function detail(Request $request, array $user)
    {
        return view('user.detail')->with(compact('user'));
    }
}
