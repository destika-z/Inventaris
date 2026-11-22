<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return ['role:admin'];
    }

    public function index(Request $request)
    {
        $search = $request->search;

        $users = User::with('roles')
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            })
            ->oldest()
            ->paginate()
            ->withQueryString();

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User();

        return view('user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|max:50|unique:users,email',
        'role' => 'required|exists:roles,name',
        'password' => [
            'required',
            'confirmed',
            Password::min(8)
                ->letters()
                ->numbers()
                ->symbols(),
        ],
    ], [
        'name.required' => 'Nama wajib diisi.',
        'name.max' => 'Nama maksimal 100 karakter.',

        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email sudah digunakan.',
        'email.max' => 'Email maksimal 50 karakter.',

        'role.required' => 'Role wajib dipilih.',
        'role.exists' => 'Role tidak valid.',

        'password.required' => 'Password wajib diisi.',
        'password.confirmed' => 'Konfirmasi password tidak sesuai.',
    ]);


    // Simpan password asli untuk tampilan admin
    $validated['plain_password'] = $validated['password'];

    // Hash password untuk login
    $validated['password'] = Hash::make($validated['password']);


    $role = $validated['role'];
    unset($validated['role']);


    $user = User::create($validated);


    $user->assignRole($role);


    return redirect()
        ->route('user.index')
        ->with('success', 'Pengguna baru berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, User $user)
{
    $validated = $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|max:50|unique:users,email,' . $user->id,
        'role' => 'required|exists:roles,name',
        'password' => [
            'nullable',
            'confirmed',
            Password::min(8)
                ->letters()
                ->numbers()
                ->symbols(),
        ],
    ], [
        'name.required' => 'Nama wajib diisi.',
        'name.max' => 'Nama maksimal 100 karakter.',

        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email sudah digunakan.',
        'email.max' => 'Email maksimal 50 karakter.',

        'role.required' => 'Role wajib dipilih.',
        'role.exists' => 'Role tidak valid.',

        'password.confirmed' => 'Konfirmasi password tidak sesuai.',
    ]);


    $role = $validated['role'];
    unset($validated['role']);


    if (!empty($validated['password'])) {

        // update password asli
        $validated['plain_password'] = $validated['password'];

        // update password hash
        $validated['password'] = Hash::make($validated['password']);

    } else {

        unset($validated['password']);

    }


    $user->update($validated);


    $user->syncRoles([$role]);


    return redirect()
        ->route('user.index')
        ->with('success', 'Data pengguna berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->id === Auth::id()) {
            return redirect()
                ->route('user.index')
                ->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        $user->delete();

        return redirect()
            ->route('user.index')
            ->with('success', 'Pengguna berhasil dihapus.');
    }
}