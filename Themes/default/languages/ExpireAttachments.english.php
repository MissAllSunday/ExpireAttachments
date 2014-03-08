<?php

/**
 *
 * @package Expire Attachments mod
 * @version 1.0
 * @author Jessica González <suki@missallsunday.com>
 * @copyright Copyright (c) 2013, Jessica González
 * @license http://www.mozilla.org/MPL/MPL-1.1.html
 */

global $txt;

$txt['ExAt_modName'] = 'Expire Attachments mod';

// UI
$txt['ExAt_ui_selectDate'] = 'Select expiration date';
$txt['ExAt_ui_title'] = ' Expiration date: ';
$txt['ExAt_ui_showDate'] = 'This attachment will expire in ';
$txt['EXAT_ui_legend'] = '[Attachment expired]';
$txt['EXAT_ui_legend_custom'] = '[%s expired]';

// Admin
$txt['ExAt_setting_pageTitle'] = 'Attachments expiration date';
$txt['ExAt_setting_pageDesc'] = 'From this page you can configure the settings for the attachment expire date modification. <br />Be careful when changing the dates and number of periods, the changes will only be applied to new attachments, old ones will still have their old expiration dates.<br />This mod does not modify old attachments, it will only work with new attachments uploaded after the installation of this mod.<br />You must enable at least 1 period, otherwise the mod will not store any expiration date. Each date period sets a unique permission, you can assign that permission to each membergroup.<br/> Apply all permissions if you want the user to have all the possible option dates available.';
$txt['ExAt_setting_periodsDay_number'] = 'The number of periods for the Day period.';
$txt['ExAt_setting_periodsWeek_number'] = 'The number of periods for the Week period.';
$txt['ExAt_setting_periodsMonth_number'] = 'The number of periods for the Month period.';
$txt['ExAt_setting_periodsYear_number'] = 'The number of periods for the Year period.';
$txt['ExAt_setting_enable'] = 'Enable the mod';
$txt['ExAt_setting_enable_sub'] = 'This setting must be one for the mod to work properly';
$txt['ExAt_setting_second'] = 'second';
$txt['ExAt_setting_minute'] = 'minute';
$txt['ExAt_setting_hour'] = 'hour';
$txt['ExAt_setting_day'] = 'day';
$txt['ExAt_setting_week'] = 'week';
$txt['ExAt_setting_month'] = 'month';
$txt['ExAt_setting_year'] = 'year';
$txt['ExAt_setting_now'] = 'now';
$txt['ExAt_setting_forever'] = 'Doesn\'t expire';
$txt['ExAt_setting_forever_js'] = 'Doesn\\\'t expire';
$txt['ExAt_setting_s'] = 's';
$txt['ExAt_setting_enableDay_period'] = 'Enable the Day period';
$txt['ExAt_setting_enableWeek_period']  = 'Enable the Week period';
$txt['ExAt_setting_enableMonth_period']  = 'Enable the Month period';
$txt['ExAt_setting_enableYear_period']  = 'Enable the Year period';
$txt['ExAt_setting_enableForever_period']  = 'The attachment doesn\'t expire';
$txt['ExAt_setting_enableForever_period_sub'] = 'If this setting is enable, a new permission will be set to let users bypass the expiration date altogether.'; 
$txt['ExAt_setting_availablePermissions'] = 'The current available permissions:';

// Permissions
$txt['permissionname_ExAt_Day'] = 'Allow Day period';
$txt['permissionname_ExAt_Week'] = 'Allow Week period';
$txt['permissionname_ExAt_Month'] = 'Allow Month period';
$txt['permissionname_ExAt_Year'] = 'Allow Year period';
$txt['permissionname_ExAt_Forever'] = 'Their attachments doesn\'t expire';
