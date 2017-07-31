<?php

if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF'))
	require_once(dirname(__FILE__) . '/SSI.php');
elseif(!defined('SMF'))
	die('<b>Error:</b> Cannot install - please verify that you put this file in the same place as SMF\'s index.php and SSI.php files.');

if ((SMF == 'SSI') && !$user_info['is_admin'])
	die('Admin privileges required.');

global $modSettings;

$smiley_sets_known = $modSettings['smiley_sets_known'] . ',sdgirlsmilies';

$temp = explode("\n", $modSettings['smiley_sets_names']);
$temp[] = 'sdgirl Smileys';
$temp = implode("\n", $temp);
$smiley_sets_names = $temp;

updateSettings(array(
	'smiley_sets_known' => $smiley_sets_known,
	'smiley_sets_names' => $smiley_sets_names,
	'smiley_sets_default' => 'sdgirlsmilies')
);

if (SMF == 'SSI')
	echo 'Database changes are complete! Please wait...';

?>