<x-dashboard-layout>
    <div class="flex justify-between items-end mb-4 text-slate">
        <div>
            <nav class="fi-breadcrumbs mb-2 hidden sm:block">

            </nav>
            <h1 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">
                @lang('Standard Batch and Subject')
            </h1>
        </div>
        <div>
        </div>
    </div>
{{--    @php dd($standardBatchSubject) @endphp--}}
    <x-section-content>
        <x-splade-modal>

            <x-splade-form :default="$standardBatchSubject ?? ''"
                           :action=" $standardBatchSubject ? route('dashboard.standardBatchSubject.update', ['id'=> $standardBatchSubject]) : route('dashboard.standardBatchSubject.store')"
                           method="post">
                <x-splade-select name="standard_id" choices label="Standard">
                    <option value="">Select Standard</option>

                    @foreach($standards as $standard)
                        <option value="{{ $standard->id }}">{{ $standard->name }}</option>
                    @endforeach
                </x-splade-select>
                <x-splade-select name="batch_id" choices label="Batch">
                    <option value="">Select Teacher</option>

                @foreach($batches as $batch)
                        <option value="{{ $batch->id }}">{{ $batch->name }}</option>
                    @endforeach
                </x-splade-select>

                <x-splade-select name="subject_id" choices label="Subject">
                    <option value="">Select subject</option>
                @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </x-splade-select>

                <x-splade-select name="teacher_id" choices label="Teacher">
                    <option value="">Select Teacher</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name . ' : ' . $teacher->phone }}</option>
                    @endforeach
                </x-splade-select>

                <x-splade-submit label="{{$standardBatchSubject ? 'Update' : 'Create'}}" class="mt-2" :spinner="false"/>
            </x-splade-form>
        </x-splade-modal>
    </x-section-content>
</x-dashboard-layout>
