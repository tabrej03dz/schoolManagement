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
        </div>
    </div>

    <x-test name="Vineet" :kuchbhi="['asdasd']"></x-test>

    <x-section-content>
        <x-splade-modal>
            <x-splade-form :default="$teacher ?? ''"
                           :action=" $teacher ? route('dashboard.teacher.update', ['teacher'=> $teacher->id])
                           : route('dashboard.teacher.store')"
                           method="post">
                <x-splade-file name="image" placeholder="Image" label="Image" filepond preview/>
                <x-splade-input name="name" placeholder="Name" label="Name"/>
                <x-splade-input name="gender" placeholder="Gender" label="Gender"/>
                <x-splade-input name="phone" label="Phone Number" placeholder="Phone Number"/>
                <x-splade-input name="email" placeholder="Email address" label="Email"/>
                <x-splade-select name="address_id" choices label="Address">
                    <option value="">__Select Address__</option>
                    @foreach($addresses as $address)
                        <option value="{{ $address->id }}">{{ $address->city }}</option>
                    @endforeach
                </x-splade-select>
                <x-splade-submit label="{{$teacher ? 'Update' : 'Create'}}" class="mt-2" :spinner="false"/>
            </x-splade-form>
        </x-splade-modal>
    </x-section-content>
</x-dashboard-layout>
