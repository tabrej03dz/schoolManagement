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
    <x-section-content>
        <x-splade-modal>
            <x-splade-form :default="$teacher" :action="route('dashboard.teacher.update',['teacher'=>$teacher->id])" method="post">
                <x-splade-file name="image" placeholder="Image"/>
                <x-splade-input name="name" placeholder="Name"/>
                <x-splade-input name="gender" placeholder="Gender"/>
                <x-splade-input name="phone" placeholder="Phone"/>
                <x-splade-input name="email" placeholder="Email address" />
                <x-splade-submit label="Update" class="mt-2" :spinner="false" />
            </x-splade-form>
        </x-splade-modal>
    </x-section-content>
</x-dashboard-layout>
