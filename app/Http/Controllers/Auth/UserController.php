<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;
use App\Http\Resources\UserCollectionResorce;

class UserController extends Controller
{
    /**
     * Get authenticated user.
     */
    public $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function current(Request $request)
    {
        return response()->json($request->user());
    }

    public function index()
    {
        $user = $this->userRepo->getAll();
        return UserCollectionResorce::collection($user);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $this->userRepo->store($input);
    }

    public function edit($id)
    {
        $user = $this->userRepo->edit($id);   
        return $user;
    }

    public function update($id, Request $request)
    {
        $data = $request->all();
        $user = $this->userRepo->update($data,$id);  
    }

    public function destroy($id)
    {
        $user = $this->userRepo->destroy($id); 
    }
}