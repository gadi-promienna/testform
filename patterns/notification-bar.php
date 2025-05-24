<?php 
/**
 * Title: notification-bar
 * Slug: testform/notification-bar
 * Categories: forms
 * Block Types: core/text
 * Description: A notification bar that can be used to display alerts or messages.
 * Keywords: notification, alert
 * Inserter: yes
 */

 $notifications = get_transient('testform_notifications');

 if ($notifications) {
     echo '<div class="testform-notifications">';
     foreach ($notifications as $notification) {
         echo '<div class="notification-item">';
         echo '<h3><span class="succes-icon">✔️</span>' . esc_html($notification['title']) . '</h3>';
         echo '<p>' . esc_html($notification['message']) . '</p>';
         echo '</div>';
     }
     echo '</div>';
     delete_transient('testform_notifications');
 }
 ?>