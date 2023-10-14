<x-dashboard-layout>
    <div class="flex justify-between items-end mb-4 text-slate">
        <div>
            <nav class="fi-breadcrumbs mb-2 hidden sm:block">

            </nav>
            <h1 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">
                @lang('Address')
            </h1>
        </div>
        <div>
        </div>
    </div>
    <x-section-content>
        <x-splade-modal>

            <x-splade-form :default="$address ?? ''"
                           :action=" $address ? route('dashboard.tAddress.update', ['address'=> $address->id]) : route('dashboard.tAddress.store')"
                           method="post">
                <x-splade-input name="city" placeholder="City" label="city"/>

                <x-splade-submit label="{{$address ? 'Update' : 'Create'}}" class="mt-2" :spinner="false"/>
            </x-splade-form>
        </x-splade-modal>
    </x-section-content>
</x-dashboard-layout>
