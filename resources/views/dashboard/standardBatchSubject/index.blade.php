@seoTitle(__('main.traffics'))

<x-dashboard-layout>
    {{-- Head --}}
    <div class="flex justify-between items-end mb-4 text-slate">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">
                @lang('Standard Batch and Subjects')
            </h1>
        </div>
        <div>
        </div>
        <div>
            <Link href="{{ route('dashboard.standardBatchSubject.create') }}" modal class="bg-black text-white rounded-md p-2">Add Standard</Link>
        </div>
    </div>


{{--    asdlkfalskd--}}

    {{-- Content --}}

    <x-section-content>
        <x-splade-table :for="$standardBatchSubjects">
            <x-splade-cell batch as="$standardBatchSubject">
                {{$standardBatchSubject->batch->name}}
{{--                <ul>--}}
{{--                    @forelse($standardBatchSubject->batch as $batch)--}}
{{--                        <li>{{ $batch}}</li>--}}
{{--                    @empty--}}
{{--                        No Batch Added--}}
{{--                    @endforelse--}}
{{--                </ul>--}}
            </x-splade-cell>

            <x-splade-cell subject as="$standardBatchSubject">
                {{$standardBatchSubject->subject->name}}
{{--                <ul>--}}
{{--                    @forelse($standardBatchSubject->subject as $subject)--}}
{{--                        <li>{{ $subject }}</li>--}}
{{--                    @empty--}}
{{--                        No Batch Added--}}
{{--                    @endforelse--}}
{{--                </ul>--}}
            </x-splade-cell>

            <x-splade-cell teacher as="$standardBatchSubject">
                {{$standardBatchSubject->teacher->name}}
            </x-splade-cell>
            <x-splade-cell action as="$standardBatchSubject">
                <div class="p-4  h-max w-max">
                    <span class="relative inline-block group">
                      <a class="text-red-500" href="{{ route('dashboard.standardBatchSubject.delete', ['id' => $standardBatchSubject->id]) }}"> <i class="fas fa-trash"></i></a>
                      <span class="tooltip hidden group-hover:inline absolute top-[-30px] left-0  bg-gray-800 text-white px-2 py-1 rounded shadow-md">
                         Delete
                      </span>
                    </span>
                </div>

                <div class="p-4  h-max w-max">
                    <span class="relative inline-block group">
                      <a class="text-blue-500" href="{{ route('dashboard.standardBatchSubject.edit', ['id' => $standardBatchSubject->id]) }}"> <i class="fas fa-edit"></i></a>
                      <span class="tooltip hidden group-hover:inline absolute top-[-30px] left-0  bg-gray-800 text-white px-2 py-1 rounded shadow-md">
                         Edit
                      </span>
                    </span>
                </div>
            </x-splade-cell>
        </x-splade-table>
    </x-section-content>
</x-dashboard-layout>
