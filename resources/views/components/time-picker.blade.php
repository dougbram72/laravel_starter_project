<div class="relative">
    <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
        </svg>
    </div>
    <input 
        type="text" 
        id="{{ $id }}" 
        name="{{ $name }}" 
        class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
        placeholder="{{ $placeholder }}" 
        value="{{ $value }}" 
        {{ $required ? 'required' : '' }}
        data-time-picker="true"
        data-default-hour="{{ $defaultHour }}"
        data-default-minute="{{ $defaultMinute }}"
        data-minute-increment="{{ $minuteIncrement }}"
    />
</div>

@once
@push('scripts')
<!-- Include timepicker dependencies -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<style>
    /* Force hide AM/PM selector in flatpickr */
    .flatpickr-am-pm, .flatpickr-meridian-toggle {
        display: none !important;
    }
    
    /* Ensure the time input is wide enough */
    .flatpickr-time input.flatpickr-hour,
    .flatpickr-time input.flatpickr-minute {
        font-size: 16px;
        font-weight: bold;
    }
    
    /* Style the time picker to clearly show 24-hour format */
    .flatpickr-calendar.hasTime .flatpickr-time {
        border-top: 1px solid #e6e6e6;
        margin: 0;
        padding: 10px;
    }
</style>

<script>
    // Force locale to use 24-hour format globally
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr.localize({
            time_24hr: true
        });
        
        // Function to hide AM/PM elements
        const hideAmPm = () => {
            document.querySelectorAll('.flatpickr-am-pm, .flatpickr-meridian-toggle').forEach(el => {
                el.style.display = 'none';
            });
        };
        
        // Set up a MutationObserver to hide AM/PM elements if they reappear
        const observer = new MutationObserver(() => {
            hideAmPm();
        });
        
        // Start observing the document for added nodes
        observer.observe(document.body, { childList: true, subtree: true });
        
        // Initialize all time pickers with the x-time-picker class
        document.querySelectorAll('input[id]').forEach(input => {
            if (input.getAttribute('data-time-picker') === 'true') {
                const id = input.id;
                const defaultHour = parseInt(input.getAttribute('data-default-hour') || '9');
                const defaultMinute = parseInt(input.getAttribute('data-default-minute') || '0');
                const minuteIncrement = parseInt(input.getAttribute('data-minute-increment') || '30');
                
                flatpickr('#' + id, {
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: "H:i",
                    time_24hr: true,
                    minuteIncrement: minuteIncrement,
                    defaultHour: defaultHour,
                    defaultMinute: defaultMinute,
                    allowInput: true,
                    disableMobile: true,
                    onOpen: function() {
                        // Ensure AM/PM is hidden when the picker opens
                        setTimeout(hideAmPm, 100);
                    },
                    onChange: function(selectedDates, dateStr) {
                        // Remove any AM/PM indicator from the value
                        const cleanValue = dateStr.replace(/\s(AM|PM)$/i, '');
                        input.value = cleanValue;
                    }
                });
                
                // Format the initial value to ensure it displays in 24-hour format
                input.value = input.value.replace(/\s(AM|PM)$/i, '');
            }
        });
    });
</script>
@endpush
@endonce