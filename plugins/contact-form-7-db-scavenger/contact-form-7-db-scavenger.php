<?php
/*
 * Plugin Name: Contact Form 7 DB Scavenger
 * Plugin URI: http://#
 * Description: Получает сохранееные данные из CF7 DB и делает выборку по заданным параметрам.
 * Version: 1.0
 * Author: Ostashev Daniil
 * Author URI: http://#
 */

define('CF7DBS_PLUGIN', __FILE__);

define('CF7DBS_PLUGIN_BASENAME', plugin_basename(CF7DBS_PLUGIN));

define('CF7DBS_PLUGIN_NAME', trim(dirname(CF7DBS_PLUGIN_BASENAME), '/'));

define('CF7DBS_PLUGIN_DIR', untrailingslashit(dirname(CF7DBS_PLUGIN)));

define('CF7DBS_PLUGIN_URL', untrailingslashit(plugins_url('', CF7DBS_PLUGIN)));


include_once CF7DBS_PLUGIN_DIR . '/scavenger.php';

?>
