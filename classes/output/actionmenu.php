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

use \action_menu;
use \action_menu_link;
use \coding_exception;
use \moodle_url;
use \renderable;
use \renderer_base;
use \stdClass;
use \templatable;

/**
 * Class actionmenu
 *
 * @package   local_examples
 * @category  output
 * @copyright 2022 onwards Dez Glidden
 * @author    Dez Glideen <dezglidden@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class actionmenu implements templatable, renderable {

    /**
     * Prepare the data for being passed to the renderer.
     *
     * @param renderer_base $output
     * @return stdClass
     */
    public function export_for_template(renderer_base $output): stdClass {
        $data = new stdClass();
        $data->actionmenus['single']['primary']['default'] = $this->get_single_primary_default($output);
        $data->actionmenus['single']['secondary']['default'] = $this->get_secondary_menu($output);
        $data->actionmenus['sample'] = $this->get_sample_context();
        return $data;
    }

    /**
     * Get the default primary action menu.
     *
     * @param renderer_base $output
     * @return stdClass
     * @throws coding_exception if a string is not found using get_string(). No issue here.
     */
    protected function get_single_primary_default(renderer_base $output): stdClass {
        $url = new moodle_url('/#');
        $icon = null;
        $text = get_string('hownottodoit', 'local_examples');
        $primary = true;
        $attributes = [];
        $link = new action_menu_link($url, $icon, $text, $primary, $attributes);
        return (new action_menu([$link, $this->get_additional_link()]))->export_for_template($output);
    }

    /**
     * Get an action menu with 2 items, using the secondary section of the action_menu template.
     *
     * @param renderer_base $output
     * @return stdClass
     * @throws coding_exception if a string is not found using get_string(). No issue here.
     */
    protected function get_secondary_menu(renderer_base $output): stdClass {
        $url = new moodle_url('/#');
        $icon = new \pix_icon('i/info', 'info');
        $text = get_string('some2ndactionlink', 'local_examples');
        $primary = false;
        $attributes = [];
        $link = new action_menu_link($url, $icon, $text, $primary, $attributes);
        return (new action_menu([$link, $this->get_additional_link()]))->export_for_template($output);
    }

    /**
     * Get a single link for the purpose of reuse.
     *
     * @return action_menu_link
     * @throws coding_exception if a string is not found using get_string(). No issue here.
     */
    private function get_additional_link(): action_menu_link {
        $url = new moodle_url('/#');
        $icon = new \pix_icon('i/info', 'info');
        $text = get_string('some2ndactionlink', 'local_examples');
        $primary = false;
        $attributes = [];
        return new action_menu_link($url, $icon, $text, $primary, $attributes);
    }

    /**
     * Sample context data taken from the action_menu.mustache file.
     *
     * @return array
     */
    protected function get_sample_context(): array {
        return [
            "classes" => "super-css",
            "attributes" => [
                "name" => 'data-isawesome',
                "value" => 'true'
            ],
            "primary" => [
                "items" => ["rawhtml" => "<p>Item in primary menu</p>"]
            ],
            "secondary" => [
                "items" => ["rawhtml" => "<p>Item in secondary menu</p>"]
            ]
        ];
    }

}
