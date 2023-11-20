<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    protected UserRepository $userRepository;

    public function __construct()
    {

        $this->userRepository = new UserRepository;

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->userRepository->getData();
        return view('pages.pengguna.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->toArray();
        return view('pages.pengguna.create',['roles' => $roles, 'user' => new User]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $validated = $request->validated();

        $user = $this->userRepository->create($validated);
        $this->assignUserRole($user, $validated['role']);

        return to_route('admin.pengguna.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->toArray();

        return view('pages.pengguna.edit', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $this->userRepository->update($user, $request->validated());

        return back()
            ->with('swals', 'Berhasil mengupdate pengguna');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()
            ->with('swals', 'Berhasil menghapus pengguna');
    }

    protected function assignUserRole(User $user, string $roleName): void
    {
        $role = Role::findByName($roleName);
        $user->assignRole($role);
    }
}
