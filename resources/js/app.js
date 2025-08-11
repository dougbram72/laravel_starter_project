import './bootstrap';
import 'flowbite';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Initialize dark mode based on user preference
document.addEventListener('DOMContentLoaded', () => {
    // Check if user has dark mode enabled (from database)
    const userPrefersDark = document.body.dataset.darkMode === 'true';
    
    if (userPrefersDark) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
    
    // Handle real-time toggle (without waiting for form submission)
    const darkModeToggle = document.querySelector('input[name="dark_mode"]');
    if (darkModeToggle) {
        darkModeToggle.addEventListener('change', () => {
            if (darkModeToggle.checked) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        });
    }
});

Alpine.start();
