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
            <x-splade-form action="{{route('dashboard.student.search')}}" method="post" class="flex">
                <x-splade-input name="search" placeholder="Search Student"/>
                <x-splade-submit label="Search" class="ml-2"/>
            </x-splade-form>
        </div>
        <div>
            <Link href="{{ route('dashboard.student.create') }}" modal class="bg-black text-white rounded-md p-2">Add Student</Link>
        </div>
    </div>

    {{-- Content --}}
    <x-section-content>
        <x-splade-table :for="$students">
            <x-splade-cell image as="$student">
                <img src="{{asset('storage/'. $student->image)}}" alt="student" style="width: 100px!important; border-radius: 50%;">
            </x-splade-cell>
            <x-splade-cell action as="$student">
                <div class="p-4  h-max w-max">
                    <span class="relative inline-block group">
                      <a class="text-red-500" href="{{ route('dashboard.student.delete', ['student' => $student->id]) }}"><i class="fas fa-trash"></i></a>
                      <span class="tooltip hidden group-hover:inline absolute top-[-30px] left-0  bg-gray-800 text-white px-2 py-1 rounded shadow-md">
                         Delete
                      </span>
                    </span>
                </div>

                <div class="p-4  h-max w-max">
                    <span class="relative inline-block group">
                      <a class="text-blue-500" href="{{ route('dashboard.student.edit', ['student' => $student->id]) }}"> <i class="fas fa-edit"></i></a>
                      <span class="tooltip hidden group-hover:inline absolute top-[-30px] left-0  bg-gray-800 text-white px-2 py-1 rounded shadow-md">
                         Edit
                      </span>
                    </span>
                </div>
                <div class="p-4  h-max w-max">
                    <span class="relative inline-block group">
                      <a class="text-blue-500" href="{{route('dashboard.assignment.student', ['id' => $student->id])}}"> <i class="fas fa-book-open"></i></a>
                      <span class="tooltip hidden group-hover:inline absolute top-[-30px] left-0  bg-gray-800 text-white px-2 py-1 rounded shadow-md">
                         Assignment
                      </span>
                    </span>
                </div>

                <div class="p-4  h-max w-max">
                    <span class="relative inline-block group">
                      <a class="text-blue-500" href="{{route('dashboard.score.student', ['id' => $student->id])}}"> <i class="fa-regular fa-star"></i></a>
                      <span class="tooltip hidden group-hover:inline absolute top-[-30px] left-0  bg-gray-800 text-white px-2 py-1 rounded shadow-md">
                         Score
                      </span>
                    </span>
                </div>
            </x-splade-cell>
        </x-splade-table>
    </x-section-content>
</x-dashboard-layout>
