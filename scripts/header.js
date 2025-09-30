// Enhanced dropdown interactions
document.addEventListener('DOMContentLoaded', function() {
    const authDropdown = document.getElementById('authDropdown');
    const dropdownMenu = document.querySelector('.auth-dropdown-menu');

    if (authDropdown && dropdownMenu) {
        // Add hover effects
        const dropdownOptions = dropdownMenu.querySelectorAll('.dropdown-option');

        dropdownOptions.forEach(option => {
            option.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(5px)';
            });

            option.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
            });
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (!authDropdown.contains(event.target) && !dropdownMenu.contains(event.target)) {
                const bootstrapDropdown = bootstrap.Dropdown.getInstance(authDropdown);
                if (bootstrapDropdown) {
                    bootstrapDropdown.hide();
                }
            }
        });
    }
});