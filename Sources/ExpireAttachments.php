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
	global $context, $scripturl, $txt;

	$context['post_url'] = $scripturl . '?action=admin;area=modsettings;save;sa=attachmentsExpireDate';
	$context['settings_title'] = $txt['ExAt_setting_pageTitle'];
	$context['page_title'] = $txt['ExAt_setting_pageTitle'];
	$context[$context['admin_menu_name']]['tab_data'] = array(
		'title' => $context['page_title'],
		'description' => $txt['ExAt_setting_pageDesc'],
	);


	$config_vars = array(
		array('check', 'ExAt_setting_enable', 'subtext' => $txt['ExAt_setting_enable_sub']),
		array('check', 'ExAt_setting_enableDay_period',),
		array('check', 'ExAt_setting_enableWeek_period',),
		array('check', 'ExAt_setting_enableMonth_period',),
		array('check', 'ExAt_setting_enableYear_period',),
		array('int', 'ExAt_setting_periods_number', 'size'=> 3, 'subtext' => $txt['ExAt_setting_periods_number_sub']),
	);

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
		// We ned to have a defined period soo...
		if (empty($_POST['ExAt_setting_periods_number']))
			$_POST['ExAt_setting_periods_number'] = 1;

		checkSession();
		$save_vars = $config_vars;
		saveDBSettings($save_vars);
		redirectexit('action=admin;area=modsettings;sa=attachmentsExpireDate');
	}

	prepareDBSettingContext($config_vars);
}
