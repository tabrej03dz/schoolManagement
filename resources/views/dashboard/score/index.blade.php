@seoTitle(__('main.traffics'))

<x-dashboard-layout>

    {{-- Head --}}
    <div class="flex justify-between items-end mb-4 text-slate">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">
                @lang('Scores')
            </h1>
        </div>
        <div>
    </div>
        <div>
            <div class="p-4  h-max w-max">
                <span class="relative inline-block group">
                    <a modal class="text-green-500" href="{{ route('dashboard.score.create', ['student_id' => $id]) }}"> <i class="fa-solid fa-plus"></i></a>
                  <span class="tooltip hidden group-hover:inline absolute top-[-30px] left-0  bg-gray-800 text-white px-2 py-1 rounded shadow-md">
                     Add Score
                  </span>
                </span>
            </div>

        </div>
    </div>

    {{-- Content --}}
    <x-section-content>
        <x-splade-table :for="$scores">
            <x-splade-cell student as="$score">
                {{$score->student->name}}
            </x-splade-cell>
            <x-splade-cell exam as="$score">
                {{$score->exam->name}}
            </x-splade-cell>
            <x-splade-cell type as="$score">
                {{$score->exam->type}}
            </x-splade-cell>
            <x-splade-cell action as="$score">
                <div class="p-4  h-max w-max">
                    <span class="relative inline-block group">
                        <a class="text-red-500" href="{{ route('dashboard.score.delete', ['score' => $score->id]) }}"> <i class="fas fa-trash"></i></a>
                      <span class="tooltip hidden group-hover:inline absolute top-[-30px] left-0  bg-gray-800 text-white px-2 py-1 rounded shadow-md">
                         Delete
                      </span>
                    </span>
                </div>
            </x-splade-cell>
        </x-splade-table>
    </x-section-content>
</x-dashboard-layout>
