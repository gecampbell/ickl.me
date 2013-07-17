<?php
/**
 * Common functions
 */
define('INIPATH', '/path/to/config.ini');

/**
 * returns the configuration data
 */
function getConfig() {
	return parse_ini_file(INIPATH);
}

