<?php
/* vim:set softtabstop=4 shiftwidth=4 expandtab: */
/**
 *
 * LICENSE: GNU General Public License, version 2 (GPLv2)
 * Copyright 2001 - 2015 Ampache.org
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License v2
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 *
 */

require_once '../lib/init.php';

if (!Access::check('interface','100')) {
    UI::access_denied();
    exit;
}

UI::show_header();

/* Switch on Action */
switch ($_REQUEST['action']) {
    case 'find_duplicates':
        $search_type = $_REQUEST['search_type'];
        $duplicates = Song::find_duplicates($search_type);
        require_once AmpConfig::get('prefix') . UI::find_template('show_duplicate.inc.php');
        require_once AmpConfig::get('prefix') . UI::find_template('show_duplicates.inc.php');
    break;
    default:
        require_once AmpConfig::get('prefix') . UI::find_template('show_duplicate.inc.php');
    break;
} // end switch on action

UI::show_footer();
