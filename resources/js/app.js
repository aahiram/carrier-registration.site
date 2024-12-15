import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// window.Echo.channel('admin-dashboard')
//     .listen('DashboardUpdated', (event) => {
//         console.log('User created: ', event.user);
//         // You can add logic here to refresh the dashboard, e.g., reloading a section of the page
//         // Example: update the list of users, display a notification, etc.
//     });
