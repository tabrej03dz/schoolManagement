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
            <Link href="" modal class="bg-black text-white rounded-md p-1">Back</Link>

            <div class="p-4  h-max w-max">
            <span class="relative inline-block group">
                <a modal class="text-yellow-500" href="{{ route('dashboard.tAddress.index') }}"> <i class="fa-solid fa-angles-left"></i></a>
              <span class="tooltip hidden group-hover:inline absolute top-[-30px] left-0  bg-gray-800 text-white px-2 py-1 rounded shadow-md">
                 Back
              </span>
            </span>
            </div>
        </div>
    </div>

    {{-- Content --}}

    <x-section-content>
        <x-splade-table :for="$addresses">
            <x-splade-cell action as="$address">
                <div class="p-4  h-max w-max">
                    <span class="relative inline-block group">
                        <a class="text-green-500" href="{{ route('dashboard.tAddress.restore', ['id' => $address->id]) }}"> <i class="fa-solid fa-trash-can-arrow-up"></i></a>
                      <span class="tooltip hidden group-hover:inline absolute top-[-30px] left-0  bg-gray-800 text-white px-2 py-1 rounded shadow-md">
                         Restore
                      </span>
                    </span>
                </div>
                <div class="p-4  h-max w-max">
                    <span class="relative inline-block group">
                        <a class="text-red-500" href="{{ route('dashboard.tAddress.delete_permanent', ['id' => $address->id]) }}"> <i class="fas fa-trash"></i></a>
                      <span class="tooltip hidden group-hover:inline absolute top-[-30px] left-0  bg-gray-800 text-white px-2 py-1 rounded shadow-md">
                         Delete Permanently
                      </span>
                    </span>
                </div>
            </x-splade-cell>
        </x-splade-table>
    </x-section-content>
</x-dashboard-layout>
