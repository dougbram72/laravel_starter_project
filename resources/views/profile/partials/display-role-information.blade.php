<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Role Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Your assigned role in the system.') }}
        </p>
    </header>

    <div class="mt-6">
        <div class="flex items-center">
            <div class="text-sm text-gray-900 dark:text-gray-100">
                <span class="font-medium">Current Role:</span>
                @if(auth()->user()->roles->count() > 0)
                    <span class="ml-2 px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full dark:bg-blue-900 dark:text-blue-300">
                        {{ auth()->user()->roles->first()->name }}
                    </span>
                @else
                    <span class="ml-2 px-3 py-1 bg-gray-100 text-gray-800 text-xs font-medium rounded-full dark:bg-gray-700 dark:text-gray-300">
                        No role assigned
                    </span>
                @endif
            </div>
        </div>
        
        <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
            <p>Roles determine what actions you can perform in the system. Contact an administrator if you need your role changed.</p>
        </div>
    </div>
</section>
