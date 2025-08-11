<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create New Permission') }}
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
                    <form method="POST" action="{{ route('permissions.store') }}">
                        @csrf
                        
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Permission Name</label>
                            <input type="text" id="name" name="name" class="{{ $errors->has('name') ? 'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-gray-50 border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500' }} border text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Enter permission name" value="{{ old('name') }}" required />
                            @error('name')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Permission names should follow the format: verb-noun (e.g., 'create-users', 'edit-posts')</p>
                        </div>
                        
                        <div class="mt-6 bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                            <h3 class="text-md font-medium text-gray-900 dark:text-white mb-2">Permission Naming Guidelines</h3>
                            <ul class="list-disc list-inside text-sm text-gray-600 dark:text-gray-400 space-y-1 ml-2">
                                <li>Use verb-noun format (e.g., <code class="bg-gray-100 dark:bg-gray-600 px-1 py-0.5 rounded">create-posts</code>, <code class="bg-gray-100 dark:bg-gray-600 px-1 py-0.5 rounded">edit-users</code>)</li>
                                <li>Use lowercase with hyphens between words</li>
                                <li>Be specific about the resource and action</li>
                                <li>Consider using CRUD actions: create, read, update, delete</li>
                            </ul>
                        </div>
                        
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Create Permission') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
