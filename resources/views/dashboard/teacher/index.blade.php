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
            <x-splade-form action="{{route('dashboard.teacher.search')}}" method="post" class="flex">
                <x-splade-input name="search" placeholder="Search Teacher"/>
                <x-splade-submit label="Search" class="ml-2"/>
            </x-splade-form>
        </div>

        <Link href="{{ route('dashboard.teacher.create') }}" modal class="bg-black text-white rounded-md p-2">Add Teacher</Link>

    </div>

    <x-section-content>
        <x-splade-table :for="$teachers">
            <x-splade-cell image as="$teacher" >
                <img src="{{ asset('storage/'.$teacher->image) }}" alt="" height="100px">
            </x-splade-cell>
            <x-splade-cell action as="$teacher">
                <div class="p-4  h-max w-max">
                    <span class="relative inline-block group">
                      <a class="text-red-500" href="{{ route('dashboard.teacher.delete', ['teacher' => $teacher->id]) }}"><i class="fas fa-trash"></i></a>
                      <span class="tooltip hidden group-hover:inline absolute top-[-30px] left-0  bg-gray-800 text-white px-2 py-1 rounded shadow-md">
                         Delete
                      </span>
                    </span>
                </div>
                <div class="p-4  h-max w-max">
                    <span class="relative inline-block group">
                      <a class="text-blue-500" href="{{ route('dashboard.teacher.edit', ['id' => $teacher->id]) }}"><i class="fas fa-edit"></i></a>
                      <span class="tooltip hidden group-hover:inline absolute top-[-30px] left-0  bg-gray-800 text-white px-2 py-1 rounded shadow-md">
                         Edit
                      </span>
                    </span>
                </div>
                <div class="p-4  h-max w-max">
                    <span class="relative inline-block group">
                      <a class="text-blue-500" href="{{ route('dashboard.teacher.detail', ['id' => $teacher->id]) }}"><i class="fas fa-info-circle"></i></a>
                      <span class="tooltip hidden group-hover:inline absolute top-[-30px] left-0  bg-gray-800 text-white px-2 py-1 rounded shadow-md">
                         Details
                      </span>
                    </span>
                </div>
            </x-splade-cell>
        </x-splade-table>
    </x-section-content>
</x-dashboard-layout>
