<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Permission') }}: {{ $permission->name }}
            </h2>
            <a href="{{ route('permissions.index') }}" class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition duration-200 flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span>Back to Permissions</span>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Permission Name</label>
                            <input type="text" id="name" name="name" class="{{ $errors->has('name') ? 'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-gray-50 border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500' }} border text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Enter permission name" value="{{ old('name', $permission->name) }}" required />
                            @error('name')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Permission names should follow the format: verb-noun (e.g., 'create-users', 'edit-posts')</p>
                        </div>
                        
                        <div class="mt-6 bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                            <h3 class="text-md font-medium text-gray-900 dark:text-white mb-2">Warning</h3>
                            <p class="text-sm text-amber-600 dark:text-amber-400">
                                Changing a permission name may affect existing roles that use this permission. Make sure you update any affected roles after changing this permission.
                            </p>
                        </div>
                        
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Update Permission') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
            
            @if($permission->roles->count() > 0)
                <div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Roles Using This Permission</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($permission->roles as $role)
                                <div class="flex items-center">
                                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-1 rounded dark:bg-blue-900 dark:text-blue-300">
                                        {{ $role->name }}
                                    </span>
                                    <a href="{{ route('roles.edit', $role->id) }}" class="ml-2 text-xs text-blue-600 dark:text-blue-500 hover:underline">Edit Role</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
