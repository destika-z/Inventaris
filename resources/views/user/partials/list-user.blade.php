<x-table-list>

    <x-slot name="header">
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Password</th>
            <th>Role</th>
            <th class="text-center">Aksi</th>
        </tr>
    </x-slot>


    @forelse ($users as $index => $user)

        <tr>

            <td>{{ $users->firstItem() + $index }}</td>

            <td>{{ $user->name }}</td>

            <td>{{ $user->email }}</td>

            <td>
                <span class="badge bg-warning text-dark">
                    {{ $user->plain_password ?? '-' }}
                </span>
            </td>

            <td>
                @forelse ($user->roles as $role)

                    <span class="badge bg-primary">
                        {{ ucwords($role->name) }}
                    </span>

                @empty

                    <span class="badge bg-secondary">
                        Tidak ada role
                    </span>

                @endforelse
            </td>


            <td class="text-center">

                <div class="action-buttons justify-content-center">

                    <x-tombol-aksi
                        href="{{ route('user.edit', $user->id) }}"
                        type="edit" />

                    <x-tombol-aksi
                        href="{{ route('user.destroy', $user->id) }}"
                        type="delete" />

                </div>

            </td>

        </tr>


    @empty

        <tr>

            <td colspan="6" class="text-center py-4 text-muted">

                <i class="bi bi-inbox fs-2 d-block mb-2"></i>

                Belum ada data user.

            </td>

        </tr>

    @endforelse


</x-table-list>