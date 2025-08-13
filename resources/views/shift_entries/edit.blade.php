<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Shift Entry') }}
            </h2>
            <a href="{{ route('shift_entries.index') }}" class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition duration-200 flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span>Back to Shift Entries</span>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($errors->any())
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('shift_entries.update', $shiftEntry) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="space-y-6">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Shift Information</h3>
                            
                            <div>
                                <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User</label>
                                <select id="user_id" name="user_id" class="{{ $errors->has('user_id') ? 'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-gray-50 border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500' }} border text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                    <option value="">Select a user</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_id', $shiftEntry->user_id) == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mt-3">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start Date & Time:</label>
                                <div class="flex flex-col md:flex-row md:space-x-4 space-y-3 md:space-y-0">
                                    <div class="w-full md:w-1/2">
                                        <input 
                                            type="date" 
                                            name="start_date" 
                                            id="start-date" 
                                            value="{{ old('start_date', \Carbon\Carbon::parse($shiftEntry->start_time)->format('Y-m-d')) }}" 
                                            class="{{ $errors->has('start_date') ? 'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-gray-50 border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500' }} border text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" 
                                            required 
                                        />
                                        @error('start_date')
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <x-time-picker 
                                            name="start_time" 
                                            id="start-time" 
                                            value="{{ old('start_time', \Carbon\Carbon::parse($shiftEntry->start_time)->format('H:i')) }}" 
                                            placeholder="Select start time" 
                                            :required="true" 
                                            :default-hour="\Carbon\Carbon::parse($shiftEntry->start_time)->format('H')" 
                                            :default-minute="\Carbon\Carbon::parse($shiftEntry->start_time)->format('i')" 
                                            :minute-increment="30" 
                                        />
                                        @error('start_time')
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-3">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End Date & Time:</label>
                                <div class="flex flex-col md:flex-row md:space-x-4 space-y-3 md:space-y-0">
                                    <div class="w-full md:w-1/2">
                                        <input 
                                            type="date" 
                                            name="end_date" 
                                            id="end-date" 
                                            value="{{ old('end_date', \Carbon\Carbon::parse($shiftEntry->end_time)->format('Y-m-d')) }}" 
                                            class="{{ $errors->has('end_date') ? 'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-gray-50 border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500' }} border text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" 
                                            required 
                                        />
                                        @error('end_date')
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full md:w-1/2">
                                        <x-time-picker 
                                            name="end_time" 
                                            id="end-time" 
                                            value="{{ old('end_time', \Carbon\Carbon::parse($shiftEntry->end_time)->format('H:i')) }}" 
                                            placeholder="Select end time" 
                                            :required="true" 
                                            :default-hour="\Carbon\Carbon::parse($shiftEntry->end_time)->format('H')" 
                                            :default-minute="\Carbon\Carbon::parse($shiftEntry->end_time)->format('i')" 
                                            :minute-increment="30" 
                                        />
                                        @error('end_time')
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <label for="shift_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Shift</label>
                                <select id="shift_id" name="shift_id" class="{{ $errors->has('shift_id') ? 'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-gray-50 border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500' }} border text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                                    <option value="">Select a shift</option>
                                    @foreach($shifts as $shift)
                                        <option value="{{ $shift->id }}" {{ old('shift_id', $shiftEntry->shift_id) == $shift->id ? 'selected' : '' }}>{{ $shift->name }}</option>
                                    @endforeach
                                </select>
                                @error('shift_id')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="flex items-center justify-between mt-8">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Update Shift Entry
                            </button>
                            <a href="{{ route('shift_entries.index') }}" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- The time picker component now handles all the scripts and styles --}}
</x-app-layout>
