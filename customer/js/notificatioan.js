document.addEventListener('DOMContentLoaded', function() {
    const notificationIcon = document.getElementById('notification-icon');
    const notificationList = document.getElementById('notification-list');
    const notificationCount = document.getElementById('notification-count');

    // Fetch notifications for the logged-in user (replace 1 with the actual user ID)
    const receiverId = 1; // Replace with the actual receiver ID (e.g., from session or cookie)

    function fetchNotifications() {
        fetch(`../controller/notification.php?action=getNotifications&receiver_id=${receiverId}`)
            .then(response => response.json())
            .then(data => {
                updateNotificationCount(data.length);
                populateNotificationList(data);
            });
    }

    function updateNotificationCount(count) {
        notificationCount.textContent = count;
    }

    function populateNotificationList(notifications) {
        let html = '<ul>';
        notifications.forEach(notification => {
            html += `
                <li>
                    <strong>From User ${notification.sender_id}:</strong> ${notification.message}
                    <button onclick="markAsRead(${notification.id})">Mark as Read</button>
                </li>
            `;
        });
        html += '</ul>';
        notificationList.innerHTML = html;
    }

    function markAsRead(notificationId) {
        fetch('notification.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `action=markAsRead&notification_id=${notificationId}`,
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    fetchNotifications(); // Refresh the notification list
                }
            });
    }

    notificationIcon.addEventListener('click', function() {
        fetchNotifications();
        notificationList.style.display = 'block';
    });

    document.addEventListener('click', function(event) {
        if (!notificationIcon.contains(event.target) && !notificationList.contains(event.target)) {
            notificationList.style.display = 'none';
        }
    });

    // Fetch notifications on page load
    fetchNotifications();
});