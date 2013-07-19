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
$txt['ExAt_ui_title'] = 'Expiration date';

// Admin 
$txt['ExAt_setting_pageTitle'] = 'Attachments expiration date';
$txt['ExAt_setting_pageDesc'] = 'From this page you can configure the settings for the attachment expire date modification. <br />Be careful when changing the dates and number of periods, the changes will only be applied to new attachments, old ones will still have their old expiration dates.<br />This mod does not modify old attachments, it will only work with new attachments uploaded after the installation of this mod.<br />You must enable at least 1 period, otherwise the mod will not store any expiration date. Each date period sets a unique permission, you can assign that permission to each membergroup.<br/> Apply all permissions if you want the user to have all the possible optio dates avaliable.';
$txt['ExAt_setting_periods_number'] = 'The number of periods for each expiration date.';
$txt['ExAt_setting_periods_number_sub'] = 'For example, if you chose day, week and month and type 2 on this field, the avaliable fields will be 2 days, 2 weeks and 2 months.<br />If leave empty the mod will use 1 as the period.';
$txt['ExAt_setting_enable'] = 'Enable the mod';
$txt['ExAt_setting_enable_sub'] = 'This sething must be one for the mod to work properly';
$txt['ExAt_setting_'] = 'Day';
$txt['ExAt_setting_'] = 'Week';
$txt['ExAt_setting_'] = 'Month';
$txt['ExAt_setting_'] = 'Year';
$txt['ExAt_setting_enableDay_period'] = 'Enable the Day period';
$txt['ExAt_setting_enableWeek_period']  = 'Enable the Week period';
$txt['ExAt_setting_enableMonth_period']  = 'Enable the Month period';
$txt['ExAt_setting_enableYear_period']  = 'Enable the Year period';


$txt['ExAt_'] = '';
$txt['ExAt_'] = '';
$txt['ExAt_'] = '';
$txt['ExAt_'] = '';
$txt['ExAt_'] = '';
$txt['ExAt_'] = '';
$txt['ExAt_'] = '';
$txt['ExAt_'] = '';