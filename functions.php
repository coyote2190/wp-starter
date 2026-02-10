<?php
/**
 * Functions and definitions
 *
 * @package Wordpress Starter Template
 * @since 1.0.0
 */

/**
 * Configuration du thème
 */
function starter_setup()
{
  // Support pour les images mises en avant
  add_theme_support("post-thumbnails");

  // Support pour le titre dynamique
  add_theme_support("title-tag");

  // Support pour le HTML5
  add_theme_support("html5", [
    "search-form",
    "comment-form",
    "comment-list",
    "gallery",
    "caption",
    "style",
    "script",
  ]);

  // Enregistre les menus
  register_nav_menus([
    "main_menu" => __("Menu principal", "starter"),
  ]);
}
add_action("after_setup_theme", "starter_setup");

/**
 * Enqueue des assets (CSS/JS)
 */
function starter_enqueue_assets()
{
  $theme_uri = get_template_directory_uri();
  $theme_dir = get_template_directory();

  // Vérifie si le serveur Vite est lancé (dev mode)
  $vite_running = false;
  $vite_port = 5174;
  if (defined("WP_ENV") && WP_ENV === "development") {
    // Utilise fsockopen au lieu de curl pour une détection plus fiable
    $socket = @fsockopen("localhost", $vite_port, $errno, $errstr, 1);
    if ($socket) {
      $vite_running = true;
      fclose($socket);
    }
  }

  if ($vite_running) {
    // Mode développement avec Vite HMR (serveur lancé)
    add_action("wp_head", function () use ($vite_port) {
      echo "<script type=\"module\" src=\"http://localhost:{$vite_port}/@vite/client\"></script>";
      echo "<script type=\"module\" src=\"http://localhost:{$vite_port}/src/js/main.js\"></script>";
    });
  } else {
    // Mode production - fichiers buildés

    // CSS principal (Tailwind compilé)
    if (file_exists($theme_dir . "/dist/assets/css/main.css")) {
      wp_enqueue_style(
        "starter-style",
        $theme_uri . "/dist/assets/css/main.css",
        [],
        filemtime($theme_dir . "/dist/assets/css/main.css"),
      );
    }

    // JS
    if (file_exists($theme_dir . "/dist/assets/js/main.js")) {
      wp_enqueue_script(
        "starter-js",
        $theme_uri . "/dist/assets/js/main.js",
        [],
        filemtime($theme_dir . "/dist/assets/js/main.js"),
        true,
      );
    }
  }

  // Google Fonts
  wp_enqueue_style(
    "google-fonts",
    "https://fonts.googleapis.com/css2?family=Urbanist:wght@100..900&family=Sacramento&display=swap",
    [],
    null,
  );
}
add_action("wp_enqueue_scripts", "starter_enqueue_assets");

register_nav_menus([
  "primary" => "Menu Principal",
]);

/**
 * ACF Options Pages - Thème
 */
if (function_exists("acf_add_options_page")) {
  // Page parente "Thème"
  acf_add_options_page([
    "page_title" => "Paramètres du thème",
    "menu_title" => "Thème",
    "menu_slug" => "theme-settings",
    "capability" => "edit_posts",
    "icon_url" => "dashicons-admin-customizer",
    "position" => 60,
    "redirect" => false,
  ]);

  // Sous-page "Footer"
  acf_add_options_sub_page([
    "page_title" => "Paramètres Footer",
    "menu_title" => "Footer",
    "menu_slug" => "footer-settings",
    "capability" => "edit_posts",
    "parent_slug" => "theme-settings",
  ]);
}
