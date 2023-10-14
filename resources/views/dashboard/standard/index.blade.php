@seoTitle(__('main.traffics'))

<x-dashboard-layout>

    {{-- Head --}}
    <div class="flex justify-between items-end mb-4 text-slate">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">
                @lang('Standards')
            </h1>
        </div>
        <div>
        </div>
        <div>
            <Link href="{{ route('dashboard.standard.create') }}" modal class="bg-black text-white rounded-md p-2">Add Standard</Link>
        </div>
    </div>

    {{-- Content --}}

    <x-section-content>
        <x-splade-table :for="$standards">
            <x-splade-cell teacher as="$standard">
                <ul>
                    @forelse($standard->teacher as $teacher)
                        <li>{{ $loop->iteration }}. {{ $teacher->name }}</li>
                        @empty
                        No Teachers Added
                    @endforelse
                </ul>
            </x-splade-cell>
            <x-splade-cell action as="$standard">

                <div class="p-4  h-max w-max">
                    <span class="relative inline-block group">
                      <a class="text-red-500" href="{{ route('dashboard.standard.delete', ['standard' => $standard->id]) }}"><i class="fas fa-trash"></i></a>
                      <span class="tooltip hidden group-hover:inline absolute top-[-30px] left-0  bg-gray-800 text-white px-2 py-1 rounded shadow-md">
                         Delete
                      </span>
                    </span>
                </div>

                <div class="p-4  h-max w-max">
                    <span class="relative inline-block group">
                      <a class="text-blue-500" href="{{ route('dashboard.standard.edit', ['id' => $standard->id]) }}"> <i class="fas fa-edit"></i></a>
                      <span class="tooltip hidden group-hover:inline absolute top-[-30px] left-0  bg-gray-800 text-white px-2 py-1 rounded shadow-md">
                         Edit
                      </span>
                    </span>
                </div>

                <div class="p-4  h-max w-max">
                    <span class="relative inline-block group">
                      <a class="text-blue-500" href="{{route('dashboard.student.standard', ['id' => $standard->id])}}"> <i class="fa fa-users"></i></a>
                      <span class="tooltip hidden group-hover:inline absolute top-[-30px] left-0  bg-gray-800 text-white px-2 py-1 rounded shadow-md">
                         Students
                      </span>
                    </span>
                </div>

                <div class="p-4  h-max w-max">
                    <span class="relative inline-block group">
                      <a class="text-blue-500" href="{{route('dashboard.subject.standard', ['id' => $standard->id])}}"> <i class="fa fa-book"></i></a>
                      <span class="tooltip hidden group-hover:inline absolute top-[-30px] left-0  bg-gray-800 text-white px-2 py-1 rounded shadow-md">
                         Subjects
                      </span>
                    </span>
                </div>

                <div class="p-4  h-max w-max">
                    <span class="relative inline-block group">
                        <a class="text-yellow-500" href="{{ route('dashboard.exam.create', ['id' => $standard->id]) }}"><i class="fa-regular fa-calendar-plus"></i></a>
                      <span class="tooltip hidden group-hover:inline absolute top-[-30px] left-0  bg-gray-800 text-white px-2 py-1 rounded shadow-md">
                         Create Exam
                      </span>
                    </span>
                </div>

            </x-splade-cell>
        </x-splade-table>
    </x-section-content>
</x-dashboard-layout>
