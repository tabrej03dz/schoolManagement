<x-dashboard-layout>
    <div class="flex justify-between items-end mb-4 text-slate">
        <div>
            <nav class="fi-breadcrumbs mb-2 hidden sm:block">

            </nav>
            <h1 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">
                @lang('Student')
            </h1>
        </div>
        <div>
        </div>
    </div>
    @foreach($subjects as $subject)
    @endforeach
    <x-section-content>
        <x-splade-modal>
            <x-splade-form
                           :action=" route('dashboard.exam.store', ['standard_id'=> $subject->standard_id])"
                           method="post">
                <x-splade-input name="name" placeholder="Name" label="Name"/>
                <x-splade-select name="type" choices label="Exam Type" placeholder="Exam Type">
                    <option value="">__Select type__</option>
                    <option value="annual">Annual</option>
                    <option value="half-yearly">Half Yearly</option>
                    <option value="unit-test">Unit Test</option>
                </x-splade-select>
                <x-splade-select name="subject_id" choices label="Subject">
                    <option value="">Select Subject</option>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>

                    @endforeach
                </x-splade-select>
                <x-splade-submit label="Create" class="mt-2" :spinner="false"/>
            </x-splade-form>
        </x-splade-modal>
    </x-section-content>
</x-dashboard-layout>
