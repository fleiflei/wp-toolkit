<?php

add_action('admin_bar_menu', function ($wp_admin_bar) {
    // List of allowed users
    $allowedUsers = ['flei']; // Replace with actual usernames

    // Get current user
    $currentUser = wp_get_current_user();

    if ($currentUser->ID > 1) {
        return;
    }

    // Get all logged-in users
    $loggedInUsers = getLoggedInUsers();

    // Add the dropdown menu
    $wp_admin_bar->add_node([
        'id'    => 'logged_in_users',
        'title' => 'Logged In Users',
        'meta'  => [
            'class' => 'logged-in-users-dropdown'
        ]
    ]);

    // Add each logged-in user as a submenu item
    foreach ($loggedInUsers as $user) {

        // time since login
        $now        = new DateTime('now', wp_timezone());
        $lastActive = $user->last_active;
        $humanTime  = human_time_diff($lastActive->getTimestamp(), $now->getTimestamp());


        $wp_admin_bar->add_node([
            'id'     => 'logged_in_user_' . $user->ID,
            'title'  => $user->display_name . ' ( ' . __('seit', 'wp') . ' ' . $humanTime . ')',
            'parent' => 'logged_in_users',
        ]);
    }
}, 500);


add_action('wp_login', function ($currentUser) {
    global $current_user;
    get_currentuserinfo();
    $user = $current_user->user_login;
    update_user_meta($current_user->ID, 'last_active', current_time('mysql'));
}, 10, 2);

add_action('admin_init', function () {
    if (wp_next_scheduled('flei_update_user_activity') === false) {
        global $current_user;
        get_currentuserinfo();
        update_user_meta($current_user->ID, 'last_active', current_time('mysql'));
        wp_schedule_single_event(time() + 60, 'flei_update_user_activity', [$current_user->ID]);
    }

}, 10, 2);

add_action('flei_update_user_activity', function ($user_id) {
    update_user_meta($user_id, 'last_active', current_time('mysql'));
}, 10, 1);


function getLoggedInUsers(): array
{
    $allUsers    = get_users();
    $onlineUsers = [];

    foreach ($allUsers as $idx => $user) {

        $getLastLogin = (get_user_meta($user->ID, 'last_active', true));
        if (empty($getLastLogin)) {
            continue;
        }
        $lastLogin                   = new DateTime($getLastLogin, wp_timezone());
        $allUsers[$idx]->last_active = $lastLogin;

        $minutesSinceLogin = getLoginTimeDifference($lastLogin);

        // this will list every user and whether they logged in within the last 30 minutes
        if ($minutesSinceLogin < 30) {
            $onlineUsers[] = $user;
        }
    }

    return $onlineUsers;
}

function getLoginTimeDifference($lastLogin): int
{
    $since_start = $lastLogin->diff(new DateTime(current_time('mysql')));

    return (int)$since_start->i;
}
