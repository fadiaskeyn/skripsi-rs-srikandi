<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Interface\UserRepositoryInterface;
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
        $roles = Role::select('id','name')->get();
        return view('pages.pengguna.create',['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {

        $validated = $request->validated();

        $user = $this->userRepository->create($validated);
        $this->assignUserRole($user, $validated['role']);

        return to_route('pengguna.index');

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    protected function assignUserRole(User $user, string $roleName): void
    {
        $role = Role::findByName($roleName);
        $user->assignRole($role);
    }
}
