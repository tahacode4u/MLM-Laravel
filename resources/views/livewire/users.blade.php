<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="mt-8 text-2xl">
        Users
    </div>

    <div class="mt-6">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Sr No</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Name</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Email</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Referral Code</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Balance</div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $k => $user)
                    <tr>
                        <td class="border px-4 py-2">{{ ++$k }}</td>
                        <td class="border px-4 py-2">{{ $user->name }}</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>
                        <td class="border px-4 py-2">{{ $user->referral_code }}</td>
                        <td class="border px-4 py-2">{{ $user->balance }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" align="center">No Data Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>