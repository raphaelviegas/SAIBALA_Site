<?php

add_action('rest_api_init', function() {

  // POST: /wp-json/saibala/v1/login
  register_rest_route('saibala/v1', 'login', [
    'methods' => 'POST',
    'callback' => function(WP_REST_Request $request) {
      $params = array_merge([
        'user_login' => null,
        'user_password' => null,
        'remember' => true,
      ], $request->get_params());

      $user = wp_signon($params);

      if (is_wp_error($user)) {
        return new WP_Error('login_errors', $user->get_error_message(), []);
      }

      return $user;
    },
  ]);
});
