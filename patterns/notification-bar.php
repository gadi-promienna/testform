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
     echo '<div class="notification-bar">';
     foreach ($notifications as $notification) {
        var_dump($notification);
         echo '<div class="notification-item">';
         echo '<h3>' . esc_html($notification['title']) . '</h3>';
         echo '<p>' . esc_html($notification['message']) . '</p>';
         echo '</div>';
     }
     echo '</div>';
 }
 ?>