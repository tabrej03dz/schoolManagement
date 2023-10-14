@seoTitle(__('main.traffics'))

<x-dashboard-layout>
    {{-- Head --}}
    <div class="flex justify-between items-end mb-4 text-slate">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">
                @lang('Sections')
            </h1>
        </div>
        <div>
    </div>
        <div>
            <Link href="{{ route('dashboard.section.create') }}" modal class="bg-black text-white rounded-md p-1">Add Section</Link>

        </div>
    </div>

    {{-- Content --}}
    <x-section-content>
        <x-splade-table :for="$sections">
            <x-splade-cell action as="$section">
                <Link href="{{ route('dashboard.section.delete', ['section' => $section->id]) }}" class="bg-red-500 text-white rounded-sm p-1">Delete</Link>
                <Link href="{{ route('dashboard.section.edit', ['id' => $section->id]) }}" class="bg-black text-white rounded-sm p-1">Edit</Link>
            </x-splade-cell>
        </x-splade-table>
    </x-section-content>
</x-dashboard-layout>
