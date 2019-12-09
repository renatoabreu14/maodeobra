<?php

namespace App\Http\Controllers;

use App\Service;
use App\UserService;
use Illuminate\Http\Request;

class UserServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserService  $userService
     * @return \Illuminate\Http\Response
     */
    public function show(UserService $userService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserService  $userService
     * @return \Illuminate\Http\Response
     */
    public function edit(UserService $userService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserService  $userService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserService $userService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserService  $userService
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserService $userService)
    {
        //
    }

    public function addService(){
        $services = Service::all();
        return view('users.addservice', compact('services'));
    }
}
