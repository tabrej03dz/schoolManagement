@seoTitle(__('main.traffics'))

<x-dashboard-layout>

    {{-- Head --}}
    <div class="flex justify-between items-end mb-4 text-slate">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">
                @lang('Students')
            </h1>
        </div>
        <div>
        </div>
        <div>

        </div>
    </div>

    {{-- Content --}}
    <x-section-content>
        <x-splade-table :for="$assignments">

        </x-splade-table>
    </x-section-content>
</x-dashboard-layout>
