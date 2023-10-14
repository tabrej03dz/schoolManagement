<x-dashboard-layout>
    <div class="flex justify-between items-end mb-4 text-slate">
        <div>
            <nav class="fi-breadcrumbs mb-2 hidden sm:block">

            </nav>
            <h1 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">
                @lang('Teachers')
            </h1>
        </div>
        <div>
        </div>
        <Link href="{{ route('dashboard.teacher.create') }}" slideover class="bg-black text-white rounded-md p-1">Add Teacher</Link>
    </div>

    <x-section-content>
        <x-splade-table :for="$details">


            <x-splade-cell batch as="$detail">
                {{$detail->batch->name}}
            </x-splade-cell>

            <x-splade-cell subject as="$detail">
                {{$detail->subject->name}}
            </x-splade-cell>

            <x-splade-cell teaching_by as="$detail">
                {{$detail->teacher->name}}
            </x-splade-cell>
        </x-splade-table>
    </x-section-content>

</x-dashboard-layout>
