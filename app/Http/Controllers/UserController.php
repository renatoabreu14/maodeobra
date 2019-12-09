<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct(){
        $this->middleware('auth')->except('create', 'store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:150',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'whatsapp' => 'required'
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->whatsapp = $request->input('whatsapp');
        $user->save();
        return redirect('/users');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect("/users");
    }

    public function profile(){
        return view('users.profile');
    }

    public function editFoto(){
        return view('users.editfoto');
    }

    public function updateFoto(Request $request){
        $arquivo = $request->file('fotoperfil');
        $user = User::findOrFail(\Auth::user()->id);


        $canvas = Image::canvas(300, 300);
        $image = Image::make($arquivo->getRealPath())->resize(300, 300, function ($constraint){
            $constraint->aspectRatio();
        });
        $canvas->insert($image, 'center');
        $user->foto = $canvas->encode('data-url');
        $user->update();
        \Auth::login($user);
        return view('users.profile');
    }
}
