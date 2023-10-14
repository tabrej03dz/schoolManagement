@seoTitle(__('main.traffics'))

<x-dashboard-layout>
    {{-- Head --}}
    <div class="flex justify-between items-end mb-4 text-slate">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">
                @lang('Addresses')
            </h1>
        </div>
        <div>
    </div>
        <div>
            <Link href="{{ route('dashboard.tAddress.create') }}" modal class="bg-black text-white rounded-md p-2">Add Address</Link>

            <Link href="{{route('dashboard.tAddress.trash')}}" class="bg-black text-white rounded-md p-1">Trash</Link>

        </div>
    </div>

    {{-- Content --}}

    <x-section-content>
        <x-splade-table :for="$addresses">
            <x-splade-cell action as="$address">
                <div class="p-4  h-max w-max">
                    <span class="relative inline-block group">
                        <a class="text-blue-500" href="{{ route('dashboard.tAddress.edit', ['id' => $address->id]) }}"> <i class="fa-regular fa-pen-to-square"></i></a>
                      <span class="tooltip hidden group-hover:inline absolute top-[-30px] left-0  bg-gray-800 text-white px-2 py-1 rounded shadow-md">
                         Edit
                      </span>
                    </span>
                </div>
                <div class="p-4  h-max w-max">
                    <span class="relative inline-block group">
                        <a class="text-red-500" href="{{ route('dashboard.tAddress.delete', ['address' => $address->id]) }}"> <i class="fas fa-trash"></i></a>
                      <span class="tooltip hidden group-hover:inline absolute top-[-30px] left-0  bg-gray-800 text-white px-2 py-1 rounded shadow-md">
                         Delete
                      </span>
                    </span>
                </div>
            </x-splade-cell>
        </x-splade-table>
    </x-section-content>
</x-dashboard-layout>
