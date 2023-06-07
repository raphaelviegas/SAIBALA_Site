<?php

add_action('rest_api_init', function() {

  // POST: /wp-json/saibala/v1/register
  register_rest_route('saibala/v1', 'register', [
    'methods' => 'POST',
    'callback' => function(WP_REST_Request $request) {
      $params = (object) array_merge([
        'name' => null,
        'birth_year' => null,
        'email' => null,
        'phone' => null,
        'profession' => null,
        'professional_goal' => null,
        'password' => null,
        'password_confirm' => null,
        'accept_terms' => null,
        'accept_news' => null,
      ], $request->get_params());

      $errors = [];

      if (!$params->name) {
        $errors['name'][] = 'Nome é obrigatório';
      }

      if (!$params->birth_year) {
        $errors['birth_year'][] = 'Informe seu ano de nascimento';
      }

      if (!filter_var($params->email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'][] = 'E-mail inválido';
      }
      else if (email_exists($params->email)) {
        $errors['email'][] = 'E-mail já utilizado no sistema';
      }

      if (!$params->phone) {
        $errors['phone'][] = 'Informe seu telefone';
      }

      if (!$params->password) {
        $errors['password'][] = 'Senha é obrigatória';
      }

      if (($params->password_confirm OR $params->password) AND $params->password_confirm != $params->password) {
        $errors['password_confirm'][] = 'Senha e confirmação não batem';
      }
      
      if (!$params->accept_terms) {
        $errors['accept_terms'][] = 'É necessário aceitar os termos para prosseguir';
      }

      if (!empty($errors)) {
        return new WP_Error('register_errors', 'Erros de cadastro', $errors);
      }

      $params->accept_terms = $params->accept_terms ? 1 : null;
      $params->accept_news = $params->accept_news ? 1 : null;

      $params->birth_date = date('Y-m-d', strtotime("{$params->birth_year}-01-01"));
      unset($params->birth_year);

      $params->user_id = wp_create_user($params->email, $params->password, $params->email);

      foreach($params as $name => $value) {
        if (in_array($name, ['user_id', 'name', 'email', 'password', 'password_confirm'])) continue;
        update_user_meta($params->user_id, $name, $value);
      }

      wp_signon([
        'user_login' => $params->email,
        'user_password' => $params->password,
        'remember' => true,
      ]);

      return $params;
    },
  ]);
});
