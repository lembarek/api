<?php

namespace Lembarek\Api\Controllers;

use Lembarek\Api\Requests\UpdateUserRequest;
use Lembarek\Api\Requests\CreateUserRequest;
use Lembarek\Auth\Repositories\UserRepositoryInterface;

class UsersController extends Controller
{

    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return $this->userRepo->all();
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  Lembarek\Api\Request\CreateUserRequest  $request
    * @return \Illuminate\Http\Response
    */
    public function store(CreateUserRequest $request)
    {
        $user  = $this->userRepo->create($request->only('username', 'email', 'password'));
        return response($user, 201);
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        return $this->userRepo->find($id);
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
        $user = $this->userRepo->find($id);
        $user->update($request->all());
        $user->save();
        return response($user, 200)
            ->header('Content-Type', 'application/json');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $this->userRepo->find($id)->delete();
        return response('Deleted', 200);
    }
}
