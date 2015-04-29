<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();

        return $users;
    }

}
