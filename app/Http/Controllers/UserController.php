<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Plaza;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class UserController extends AppBaseController
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /** @var UserRepository $userRepository*/
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->paginate(10);
        $plazas = Plaza::all();

        return view('users.index')
            ->with('users', $users)
            ->with('plazas', $plazas);
    }

    /**
     * Show the form for creating a new User.
     */
    public function create()
    {
        $roles = Role::all();
        $plazas = Plaza::all();
        return view('users.create')
            ->with('roles', $roles)
            ->with('plazas', $plazas);
    }

    /**
     * Store a newly created User in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $role = $request->roles;
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != ""){
            $user->password = bcrypt($request->password);
        }
        
        $user->save();
        
        // $user = $this->userRepository->create($input);
        $user->assignRole($role);

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = $this->userRepository->find($id);
        $plazas = Plaza::all();

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.edit')
            ->with('user', $user)
            ->with('roles', $roles)
            ->with('plazas', $plazas);
    }

    /**
     * Update the specified User in storage.
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != "")
            $user->password = bcrypt($request->password);
        $user->plaza_id_asignado = $request->plazas;
        $user->roles()->detach();
        $user->assignRole($request->roles);
        $user->save();
        // $user = $this->userRepository->update($request->all(), $id);

        Flash::success('Usuario actualizado correctamente.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }
}
