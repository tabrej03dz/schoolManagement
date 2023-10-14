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
{{--@php dd($section) @endphp--}}
            <x-splade-form :default="$section ?? ''"
                           :action=" $section ? route('dashboard.section.update', ['section'=> $section->id]) : route('dashboard.section.store')"
                           method="post">
                <x-splade-input name="name" placeholder="Name" label="Name"/>
                <x-splade-select name="standard_id" choices label="Standard">
                    <option value="">__Select Standard__</option>
                    @foreach($standards as $standard)
                        <option value="{{ $standard->id }}"> {{ $standard->class }} </option>
                    @endforeach
                </x-splade-select>
                <x-splade-select name="batch_id" choices label="Batch" >
                    <option value="">__Select Batch__</option>
                @foreach($batches as $batch)
                        <option value="{{ $batch->id }}"> <?= $batch->name ?> </option>
                    @endforeach
                </x-splade-select>



                <x-splade-submit label="{{$section ? 'Update' : 'Create'}}" class="mt-2" :spinner="false"/>
            </x-splade-form>
        </x-splade-modal>
    </x-section-content>
</x-dashboard-layout>
