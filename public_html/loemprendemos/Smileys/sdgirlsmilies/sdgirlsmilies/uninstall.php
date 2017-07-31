<?php

if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF'))
	require_once(dirname(__FILE__) . '/SSI.php');
elseif(!defined('SMF'))
	die('<b>Error:</b> Cannot install - please verify that you put this file in the same place as SMF\'s index.php and SSI.php files.');

if ((SMF == 'SSI') && !$user_info['is_admin'])
	die('Admin privileges required.');

global $modSettings;

$temp = explode(",", $modSettings['smiley_sets_known']);
foreach ($temp as $tm => $name)
	if (in_array($name, array('sdgirlsmilies'))) unset($temp[$tm]);
$temp = implode(",", $temp);
$smiley_sets_known = $temp;


$temp = explode("\n", $modSettings['smiley_sets_names']);
foreach ($temp as $tm => $name)
	if (in_array($name, array('sdgirl Smileys'))) unset($temp[$tm]);
$temp = implode("\n", $temp);
$smiley_sets_names = $temp;

updateSettings(array(
	'smiley_sets_known' => $smiley_sets_known,
	'smiley_sets_names' => $smiley_sets_names,
	'smiley_sets_default' => 'default')
);

if (SMF == 'SSI')
	echo 'Database changes are complete! Please wait...';

?>