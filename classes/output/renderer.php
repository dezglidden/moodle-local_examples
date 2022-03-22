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

namespace local_examples\output;

use \moodle_exception;
use \plugin_renderer_base;

/**
 * Class renderer
 *
 * @package   local_examples
 * @category  output
 * @copyright 2022 onwards Dez Glidden
 * @author    Dez Glideen <dezglidden@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class renderer extends plugin_renderer_base {

    /**
     * Render the actionmenu using the corresponding template.
     *
     * @param \local_examples\output\actionmenu $component
     * @return string
     * @throws moodle_exception if the template does not exist. We're good here.
     */
    protected function render_actionmenu(actionmenu $component): string {
        $data = $component->export_for_template($this);
        return $this->render_from_template('local_examples/actionmenu', $data);
    }

}
