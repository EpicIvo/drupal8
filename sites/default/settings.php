<?php
/**
 * @file
 * Platform.sh example settings.php file for Drupal 8.
 */

// Default Drupal 8 settings.
//
// These are already explained with detailed comments in Drupal's
// default.settings.php file.
//
// See https://api.drupal.org/api/drupal/sites!default!default.settings.php/8
$databases = [];
$config_directories = [];
$settings['update_free_access'] = FALSE;
$settings['container_yamls'][] = __DIR__ . '/services.yml';
$settings['file_scan_ignore_directories'] = [
  'node_modules',
  'bower_components',
];

// Install with the 'standard' profile for this example.
//
// As the settings.php file is not writable during install on Platform.sh (for
// good reasons), Drupal will refuse to install a profile that is not defined
// here.
$settings['install_profile'] = 'standard';

// The hash_salt should be a unique random value for each application.
// If left unset, the settings.platformsh.php file will attempt to provide one.
// You can also provide a specific value here if you prefer and it will be used
// instead. In most cases it's best to leave this blank on Platform.sh. You
// can configure a separate hash_salt in your settings.local.php file for
// local development.
// $settings['hash_salt'] = 'change_me';

// Set up a config sync directory.
//
// This is defined inside the read-only "config" directory, deployed via Git.
$config_directories[CONFIG_SYNC_DIRECTORY] = '../config/sync';

// Automatic Platform.sh settings.
if (file_exists(__DIR__ . '/settings.platformsh.php')) {
  include __DIR__ . '/settings.platformsh.php';
}

// Local settings. These come last so that they can override anything.
if (file_exists(__DIR__ . '/settings.local.php')) {
  include __DIR__ . '/settings.local.php';
}
$databases['default']['default'] = array (
  'database' => 'drupal',
  'username' => 'drupal',
  'password' => 'drupal',
  'prefix' => '',
  'host' => 'mariadb',
  'port' => '3306',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
);
$settings['hash_salt'] = 'VdxjzY1dA5pUuxYy0Inx_i_bWs-aJjhrFih-kRUW2DWyyGr7wxdsHH1xnjmxErH13pW_rrWF9w';
ini_set('memory_limit', '128M');
