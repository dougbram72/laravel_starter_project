<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <a href="{{ route('shift_entries.daily', ['date' => $date->copy()->subDay()->format('Y-m-d')]) }}" class="text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 p-2 rounded-full">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ $date->format('l - M j Y') }}
            </h2>
            <a href="{{ route('shift_entries.daily', ['date' => $date->copy()->addDay()->format('Y-m-d')]) }}" class="text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 p-2 rounded-full">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 flex justify-between">
                <a href="{{ route('shift_entries.index') }}" class="text-gray-700 dark:text-gray-300 hover:underline flex items-center">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                    All Shift Entries
                </a>
                <a href="{{ route('shift_entries.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 focus:outline-none inline-flex items-center">
                    <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"></path>
                    </svg>
                    Add New Shift Entry
                </a>
            </div>

            @if($shift_entries->isEmpty())
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                        <p class="text-lg">No shift entries found for this date.</p>
                        <p class="mt-2">Try selecting a different date or <a href="{{ route('shift_entries.create') }}" class="text-blue-600 dark:text-blue-400 hover:underline">create a new shift entry</a>.</p>
                    </div>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($shift_entries as $group => $entries)
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-4 bg-gray-50 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white">{{ $group }}</h3>
                            </div>
                            <div class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($entries as $entry)
                                    <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <div class="font-medium text-gray-900 dark:text-white">{{ $entry->shift_name }}</div>
                                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                                    {{ \Carbon\Carbon::parse($entry->start_time)->format('g:i A') }} - 
                                                    {{ \Carbon\Carbon::parse($entry->end_time)->format('g:i A') }}
                                                    @if(\Carbon\Carbon::parse($entry->start_time)->format('Y-m-d') !== \Carbon\Carbon::parse($entry->end_time)->format('Y-m-d'))
                                                        <span class="ml-2 bg-blue-100 text-blue-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Next Day</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="flex items-center">
                                                @if($entry->user)
                                                    <div class="bg-gray-100 dark:bg-gray-600 rounded-full px-3 py-1 text-sm font-medium text-gray-800 dark:text-gray-200">
                                                        {{ $entry->user->name }}
                                                    </div>
                                                @else
                                                    <div class="bg-yellow-100 dark:bg-yellow-900 rounded-full px-3 py-1 text-sm font-medium text-yellow-800 dark:text-yellow-200">
                                                        Unassigned
                                                    </div>
                                                @endif
                                                <div class="ml-3 flex space-x-1">
                                                    <a href="{{ route('shift_entries.edit', $entry) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                        </svg>
                                                    </a>
                                                    <form action="{{ route('shift_entries.destroy', $entry) }}" method="POST" class="inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300" onclick="return confirm('Are you sure you want to delete this shift entry?')">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
