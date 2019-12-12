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
        $services = Service::all();
        return view('userservices.create', compact('services'));
    }

    public function busca()
    {
        $services = Service::all();
        return view('userservices.busca', compact('services'));
    }

    public function mostrar(Request $request){
        $service_busca = Service::findOrFail($request->input('services'));
        $services = Service::all();
        return view('userservices.busca', compact('services', 'service_busca'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userService = new UserService();
        $userService->user_id = \Auth::user()->id;
        $userService->service_id = $request->input('services');
        $userService->service_value = $request->input('service_value');
        $userService->save();
        return redirect('/profile');
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
    public function edit(int $id)
    {
        //
        $userService = UserService::findOrFail($id);
        $services = Service::all();
        return view('userservices.edit', compact('userService', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserService  $userService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //
        $userService = UserService::findOrFail($id);
        //dd($userService);
        $userService->service_id = $request->input('services');
        $userService->service_value = $request->input('service_value');
        $userService->update();
        return redirect('/profile');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserService  $userService
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
        $userService = UserService::findOrFail($id);
        $userService->delete();
        return redirect('/profile');
    }

    /*public function addService(){
        $services = Service::all();
        return view('users.addservice', compact('services'));
    }*/
}
