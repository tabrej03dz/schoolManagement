@seoTitle(__('main.traffics'))

<x-dashboard-layout>

    {{-- Head --}}
    <div class="flex justify-between items-end mb-4 text-slate">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">
                @lang('Exams')
            </h1>
        </div>
        <div>
    </div>
        <div>

        </div>
    </div>

    {{-- Content --}}
    <x-section-content>
        <x-splade-table :for="$exams">
            <x-splade-cell type as="$exam">
                {{strtoupper($exam->type)}}
            </x-splade-cell>
            <x-splade-cell subject as="$exam">
                {{$exam->subject->name}}
            </x-splade-cell>
            <x-splade-cell standard as="$exam">
                {{$exam->standard->class ?? 'standard not defined'}}
            </x-splade-cell>
            <x-splade-cell action as="$exam">
                <div class="p-4  h-max w-max">
                    <span class="relative inline-block group">
                        <a class="text-red-500" href="{{ route('dashboard.exam.delete', ['exam' => $exam->id]) }}"> <i class="fas fa-trash"></i></a>
                      <span class="tooltip hidden group-hover:inline absolute top-[-30px] left-0  bg-gray-800 text-white px-2 py-1 rounded shadow-md">
                         Delete
                      </span>
                    </span>
                </div>
            </x-splade-cell>
        </x-splade-table>
    </x-section-content>
</x-dashboard-layout>
