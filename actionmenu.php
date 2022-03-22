<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Request handler for displaying action menu examples.
 *
 * @package   local_examples
 * @copyright 2022 onwards Dez Glidden
 * @author    Dez Glideen <dezglidden@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . "/../../config.php");

require_login();

$PAGE->set_context(context_system::instance());
$PAGE->set_url(new moodle_url('/local/examples/actionmenu.php'));
$PAGE->set_pagelayout('standard');
$PAGE->set_title($PAGE->course->fullname);
$PAGE->set_heading(get_string('actionmenuexamples', 'local_examples'));

$component = new \local_examples\output\actionmenu();
$output = $PAGE->get_renderer('local_examples');

echo $output->header();
echo $output->render($component);
echo $output->footer();
