<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(20);
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show')
            ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit')
            ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        // Manejar la subida de la foto
        if ($request->hasFile('photo')) {
            // Obtener la ruta de la foto actual
            $currentPhotoPath = public_path('images/profile/' . $user->photo);

            // Verificar si la foto actual existe y eliminarla
            if (file_exists($currentPhotoPath)) {
                unlink($currentPhotoPath);
            }

            // Subir la nueva foto
            $photo = $request->file('photo');
            $photoName = $photo->getClientOriginalName();
            $destinationPath = public_path('images/profile');
            $photo->move($destinationPath, $photoName);
        } else {
            $photoName = $request->originphoto;
        }

        // Asignar los valores del formulario al usuario
        $user->document = $request->document;
        $user->fullname = $request->fullname;
        $user->gender = $request->gender;
        $user->birthdate = $request->birthdate;
        $user->photo = $photoName;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->role = $request->role;

        // Guardar los cambios en el usuario
        if ($user->save()) {
            return redirect('users')->with('message', 'Usuario ' . $user->fullname . ' modificado con éxito');
        }

        // Add a return statement here
        return redirect('users')->with('message', 'Error al modificar el usuario');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
            return redirect('users')
                ->with('message' . 'The user: ' . $user->fullname . ' was successfully deleted!');
        }
        //
    }
}
