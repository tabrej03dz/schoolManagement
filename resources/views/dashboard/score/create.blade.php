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
    <x-section-content>
        <x-splade-modal>
            <x-splade-form
                           :action=" route('dashboard.score.store', ['student_id' => $id])"
                           method="post">
                <x-splade-input name="marks" placeholder="Score" label="Score"/>
                <x-splade-select name="exam_id" choices label="Exam" placeholder="Exam">
                    <option value="">__Select Exam__</option>
                    @foreach($exams as $exam)
                        <option value="{{ $exam->id }}">{{ $exam->name.' | '.$exam->type.' | '.$exam->subject->name}}</option>
                    @endforeach
                </x-splade-select>

                <x-splade-submit label="Create" class="mt-2" :spinner="false"/>
            </x-splade-form>
        </x-splade-modal>
    </x-section-content>
</x-dashboard-layout>
