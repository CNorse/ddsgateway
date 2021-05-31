<?php

namespace App\Http\Controllers;

//use App\users;
// <-- your model
use Illuminate\Http\Response; // <-- handling http response in lumen
use App\Traits\ApiResponser; // <-- use of standized our code for API response
use Illuminate\Http\Request; // <-- handling http request in lumen
use DB; // <-- if your not using lumen eloquent you can use DB component in lumen
use App\Service\User1Service; // user Services


Class User1Controller extends Controller {

    use ApiResponser;
    /**
     * 
     * @var User1Service
     */
    // private $request;

    public $user1Service;
    

    /*
    *
    * @return void 
    */

    public function __construct(User1Service $user1Service){
        $this->user1Service = $user1Service;
    }
    

    /**
     * Return the list of users
     * @return Illuminate\Http\Response
     */

    public function index(){
        return $this->successResponse($this->user1Service->obtainUsers());
    }

    public function add(Request $request)
    {
        return $this->successResponse($this->user1Service->createUser($request->all(), Response::HTTP_CREATED));
    }

    /**
    * Obtains and show one user
    * @return Illuminate\Http\Response
    */
    
    public function show($id)
    {
        return $this->successResponse($this->user1Service->obtainUser($id));
    }

    /**
    * Update an existing author
    * @return Illuminate\Http\Response
    */

    public function update(Request $request, $id)
    {
        return $this->successResponse($this->user1Service->editUser($request->all(), $id));
    }

    /**
    * Remove an existing user
    * @return Illuminate\Http\Response
    */

    public function delete($id)
    {
        return $this->successResponse($this->user1Service->deleteUser($id));
    }
}

 
