<?php
/*
 * $RCSfile: config.inc.php,v1 $
 *
 * Wap-GuestBook - a wap based guestbook
 * Copyright (C) 2004,2005,2009 Chinmay N. Muranjan
 *
 * This file is part of Wap-GuestBook.
 *
 * Wap-GuestBook is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * any later version.
 *
 * Wap-GuestBook is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Wap-GuestBook. If not, see <http://www.gnu.org/licenses/>.
 */

$host = 'localhost';     // Hostname of the MySQL server,in most cases it is 'localhost'.

$user = 'root';          // Database Username which have Read-Write authority over selected database.

$pass = '';       // Database password associated with username.

$database = 'sipmbdb'; // Database name.

$timezone = -5;        // timezone difference. Please refer http://www.worldtimezone.com/ to get GMT timezone difference

$home = "pendaftaran.php";         // Enter VALID URL of your 'Home' page.

// Do not change anything below this line unless you know what is going to be change.

$my_email = "mobildakwah@gmail.com";  // my email address - just to send any BUG if you find.

$order = 'DESC'; // Order in which results to be displayed.

$page_rows = '6'; // No. of results displayed on each page.

$table = 'pendaftaran';   // Table name to be used within selected database,do not modify unless you know what is you are changing.

$sign = "pendaftaran.php"; // Enter VALID URL of your 'Sign In' page.

$post = "post.php";      // Enter VALID URL of your 'Post' page.

$show = "result.wml";    // Enter VALID URL of your 'View Guestbook' page.

$show_inc = "result.php";  // Enter VALID URL of your 'result.inc.php' file

$version = "v1.5";	// Wap_GuestBook's version. DO NOT MODIFY.
?>