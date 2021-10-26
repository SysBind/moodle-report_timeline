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
 * Displays live view of recent logs
 *
 * This file generates live view of recent logs.
 *
 * @package    report_timeline
 * @copyright  5772(2021) Asaf Ohayon
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


require('../../config.php');

$context = context_system::instance();
require_capability('report/timeline:view', $context);

$coursename = format_string($SITE->fullname, true, ['context' => $context]);
$strtimeline = get_string('timeline', 'report_timeline');
$url = new moodle_url("/report/loglive/index.php", $params);

$PAGE->set_url($url);
$PAGE->set_pagelayout('report');
$PAGE->set_context($context);
$PAGE->set_title("$coursename: $strtimeline");
$PAGE->set_heading("$coursename: $strtimeline");

$output = $PAGE->get_renderer('report_timeline');
echo $output->header();

$report = new timeline_report();

echo $output->render($report);

// Trigger a logs viewed event.
$event = \report_timeline\event\report_viewed::create(['context' => $context]);
$event->trigger();

echo $output->footer();
