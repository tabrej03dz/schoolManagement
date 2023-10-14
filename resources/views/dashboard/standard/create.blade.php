<x-dashboard-layout>
    <div class="flex justify-between items-end mb-4 text-slate">
        <div>
            <nav class="fi-breadcrumbs mb-2 hidden sm:block">

            </nav>
            <h1 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">
                @lang('Standard')
            </h1>
        </div>
        <div>
        </div>
    </div>
    <x-section-content>
        <x-splade-modal>

            <x-splade-form :default="$standard ?? ''"
                           :action=" $standard ? route('dashboard.standard.update', ['standard'=> $standard->id]) : route('dashboard.standard.store')"
                           method="post">
                <x-splade-input name="class" placeholder="Class" label="Class"/>
                <x-splade-select name="teacher_id" choices label="Teacher">
                    <option value="">Select Teacher</option>

                <x-splade-select name="subject_id" choices label="Subject">
                    <option value="">Select subject</option>
                @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </x-splade-select>

                <x-splade-submit label="{{$standard ? 'Update' : 'Create'}}" class="mt-2" :spinner="false"/>
            </x-splade-form>
        </x-splade-modal>
    </x-section-content>
</x-dashboard-layout>
