<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="mt-8 text-2xl">
        Commissions
    </div>

    <div class="mt-6">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Sr No</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">User Name</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Marketing Level</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Amount</div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($commissions))
                    @foreach ($commissions as $k => $commission)
                    <tr>
                        <td class="border px-4 py-2">{{ ++$k }}</td>
                        <td class="border px-4 py-2">{{ $commission->user->name }}</td>
                        <td class="border px-4 py-2">{{ $commission->marketingLevel->level_name }}</td>
                        <td class="border px-4 py-2">{{ round($commission->amount) }}</td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" align="center">No Data Found</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ (!empty($commissions)) ? $commissions->links():'' }}
    </div>
</div>