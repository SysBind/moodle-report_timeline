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
 * HTML rendering methods are defined here
 *
 * @package     report_timeline
 * @category    output
 * @copyright   5772(2021) Asaf Ohayon
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

class timeline_report implements renderable {
    public function export_for_template() {
        return [];
    }
}

/**
 * Timeline renderer
 */
class report_timeline_renderer extends plugin_renderer_base {
    protected function render_timeline_report(timeline_report $report) {
        $data = $report->export_for_template($this);
        return $this->render_from_template('report_timeline/report', $data);
    }
}
