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

            <x-splade-form :default="$student ?? ''"
                           :action=" $student ? route('dashboard.student.update', ['student'=> $student->id]) : route('dashboard.student.store')"
                           method="post">
                <x-splade-file name="image" placeholder="Image" label="Image" filepond preview/>
                <x-splade-input name="name" placeholder="Name" label="Name"/>
                <x-splade-input name="gender" placeholder="Gender" label="Gender"/>
                <x-splade-input name="parents" placeholder="Parents Name" label="Parents"/>
                <x-splade-input name="date_of_birth" placeholder="Date of Birth" label="Date of Birth" date/>
                <x-splade-input name="phone" label="Phone Number" placeholder="Phone Number"/>
                <x-splade-input name="email" placeholder="Email address" label="Email"/>
                <x-splade-select name="address_id" choices label="Address">
                    <option value="">__Select Address__</option>
                    @foreach($addresses as $address)
                        <option value="{{ $address->id }}">{{ $address->city }}</option>
                    @endforeach
                </x-splade-select>
                <x-splade-select name="standard_id" choices label="Standard">
                    <option value="">__Select Standard__</option>
                    @foreach($standards as $standard)
                        <option value="{{ $standard->id }}">{{ $standard->class }}</option>
                    @endforeach
                </x-splade-select>

                <x-splade-submit label="{{$student ? 'Update' : 'Create'}}" class="mt-2" :spinner="false"/>
            </x-splade-form>
        </x-splade-modal>
    </x-section-content>
</x-dashboard-layout>
