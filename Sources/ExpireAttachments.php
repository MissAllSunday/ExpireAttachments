<?php

/**
 *
 * @package Expire Attachments mod
 * @version 1.0
 * @author Jessica González <suki@missallsunday.com>
 * @copyright Copyright (c) 2013, Jessica González
 * @license http://www.mozilla.org/MPL/MPL-1.1.html
 */

if (!defined('SMF'))
	die('No direct access...');

function expire_attachments_admin(&$areas)
{
	global $txt;

	loadLanguage('ExpireAttachments');

	// ManageAttachments.php doesn't have a single hook on it so I can't add this section there... :(
	$areas['config']['areas']['modsettings']['subsections']['attachmentsExpireDate'] = array($txt['ExAt_setting_pageTitle']);
}

function expire_attachments_modify_modifications(&$sub_actions)
{
	global $context;

	$sub_actions['attachmentsExpireDate'] = 'expire_attachments_settings';
	$context[$context['admin_menu_name']]['tab_data']['tabs']['attachmentsExpireDate'] = array();
}

function expire_attachments_settings(&$return_config = false)
{
	global $context, $scripturl, $txt, $modSettings;

	$context['post_url'] = $scripturl . '?action=admin;area=modsettings;save;sa=attachmentsExpireDate';
	$context['settings_title'] = $txt['ExAt_setting_pageTitle'];
	$context['page_title'] = $txt['ExAt_setting_pageTitle'];
	$context[$context['admin_menu_name']]['tab_data'] = array(
		'title' => $context['page_title'],
		'description' => $txt['ExAt_setting_pageDesc'],
	);

	$config_vars = array(
		array('check', 'ExAt_setting_enable', 'subtext' => $txt['ExAt_setting_enable_sub']),
		'',
		array('check', 'ExAt_setting_enableDay_period',),
		array('int', 'ExAt_setting_periodsDay_number', 'size'=> 3,),
		'',
		array('check', 'ExAt_setting_enableWeek_period',),
		array('int', 'ExAt_setting_periodsWeek_number', 'size'=> 3,),
		'',
		array('check', 'ExAt_setting_enableMonth_period',),
		array('int', 'ExAt_setting_periodsMonth_number', 'size'=> 3,),
		'',
		array('check', 'ExAt_setting_enableYear_period',),
		array('int', 'ExAt_setting_periodsYear_number', 'size'=> 3,),
		'',
		array('check', 'ExAt_setting_enableForever_period', 'subtext' => $txt['ExAt_setting_enableForever_period_sub']),
		'',
		array('var_message', 'ExAt_setting_availablePermissions'),
	);

	// Post the current enable periods as permissions
	$ExAt_periods = array('Day', 'Week', 'Month', 'Year');

	foreach ($ExAt_periods as $period)
		if (!empty($modSettings['ExAt_setting_enable'. $period .'_period']))
			$config_vars[] = array('permissions', 'ExAt_'. $period, 0, $txt['permissionname_ExAt_'. $period]);

	// Print the special "forever" permission
	if (!empty($modSettings['ExAt_setting_enableForever_period']))
		$config_vars[] = array('permissions', 'ExAt_Forever', 0, $txt['permissionname_ExAt_Forever']);

	if ($return_config)
		return $config_vars;

	// Safety first!
	if (empty($config_vars))
	{
		$context['settings_save_dont_show'] = true;
		$context['settings_message'] = '<div align="center">' . $txt['modification_no_misc_settings'] . '</div>';

		return prepareDBSettingContext($config_vars);
	}

	if (isset($_GET['save']))
	{
		// If we're enabling a period, its number must be set...
		foreach ($ExAt_periods as $p)
			if (!empty($_POST['ExAt_setting_enable'. $p .'_period']) && (empty($_POST['ExAt_setting_periods'. $p .'_number']) || !is_numeric($_POST['ExAt_setting_periods'. $p .'_number'])))
				$_POST['ExAt_setting_periods'. $p .'_number'] = 1;

		checkSession();
		$save_vars = $config_vars;
		saveDBSettings($save_vars);
		redirectexit('action=admin;area=modsettings;sa=attachmentsExpireDate');
	}

	prepareDBSettingContext($config_vars);
}

	function expire_attachments_timeElapsed($ptime)
	{
		global $txt;

		$etime = $ptime - time();

		if ($etime < 1)
			return $txt['ExAt_setting_now'];

		$a = array(
			12 * 30 * 24 * 60 * 60	=> $txt['ExAt_setting_year'],
			30 * 24 * 60 * 60		=> $txt['ExAt_setting_month'],
			24 * 60 * 60			=> $txt['ExAt_setting_day'],
			60 * 60					=> $txt['ExAt_setting_hour'],
			60						=> $txt['ExAt_setting_minute'],
			1						=> $txt['ExAt_setting_second']
		);

		foreach ($a as $secs => $str)
		{
			$d = $etime / $secs;
			if ($d >= 1)
			{
				$r = round($d);
				return $r . ' ' . $str . ($r > 1 ? $txt['ExAt_setting_s'] .' ' : ' ');
			}
		}
	}
