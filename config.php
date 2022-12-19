<?php
/**
 * WCMS - WEX Simple CMS
 * https://github.com/vedees/wcms
 * Copyright (C) 2018 Evgenii Vedegis <vedegis@gmail.com>
 * https://github.com/vedees/wcms/blob/master/LICENSE
 */

//! Be sure to change your password!
// Login
$GLOBALS['admin_name'] = 'admin';

// Password
$GLOBALS['admin_password'] = '123456';

//! Edit fields below for personal settings
// Default language: en & ru
$GLOBALS['default_language'] = 'ru';

// Default theme: white & black
$GLOBALS['default_theme'] = 'white';

//! Development settings
// Default code theme: elegant & twilight
$GLOBALS['default_code_theme'] = 'elegant';

// Show tags? <h1> </h1> ... .
// Default: no & yes
$GLOBALS['default_tags_show'] = 'no';

//Bitrix24
// on_off
$GLOBALS['bitrix_enable'] = true;

// Password
$GLOBALS['bitrix_webhook'] = 'https://maics.bitrix24.ru/rest/1/ru51huk2ejb3ni7x/crm.lead.add.json';