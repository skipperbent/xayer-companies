<?php
$key = \Pecee\Registry::GetInstance();
$site = \Pecee\UI\Site::GetInstance();
$auth = \Pecee\Auth::GetInstance();
/* ---------- Configuration start ---------- */

// Your custom namespace
$key->set('AppName', 'Xayer');

// Debug mode enabled
$site->setDebug(TRUE);

/* Database */
$key->set('DBUsername', 'root');
$key->set('DBPassword', '');
$key->set('DBHost', '127.0.0.1');
$key->set('DBDatabase', 'xayer');

/* Site main language */
\Pecee\Locale::GetInstance()->setLocale('da-DK');
\Pecee\Locale::GetInstance()->setDefaultLocale('da-DK');

// Add IP's that are allowed to debug, clear-cache etc.
$auth->setAdminIP('127.0.0.1');
$auth->setAdminIP('::1');
/* ---------- Configuration end ---------- */
