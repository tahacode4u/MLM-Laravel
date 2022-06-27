<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="mt-8 text-2xl  flex justify-between">
        <div>Marketing Levels</div>
        <div>
            <x-jet-button wire:click="isAddFormFunction" class="bg-blue-200 hover:bg-blue-700">
                Add New
            </x-jet-button>
        </div>
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
                        <div class="flex items-center">Percentage</div>
                    </th>
                    <th class="px-4 py-2">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($levels as $k => $level)
                    <tr>
                        <td class="border px-4 py-2">{{ ++$k }}</td>
                        <td class="border px-4 py-2">{{ $level->level_name }}</td>
                        <td class="border px-4 py-2">{{ $level->percentage.'%' }}</td>
                        <td class="border px-4 py-2">Edit / Delete</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" align="center">No Data Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $levels->links() }}
    </div>
    <x-jet-dialog-modal wire:model="isAddFormFunction">
        <x-slot name="title">
            {{ __('Add Level') }}
        </x-slot>
        <x-slot name="content">
            
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('isAddFormFunction', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="saveItem()" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>