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

use \local_examples\local\faker\dropdown as generator;
use \renderable;
use \renderer_base;
use \stdClass;
use \templatable;

/**
 * Class dropdown.
 *
 * @package   local_examples
 * @category  output
 * @copyright 2022 onwards Dez Glidden
 * @author    Dez Glideen <dezglidden@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class dropdown implements templatable, renderable {

    /**
     * Prepare the data for being passed to the renderer.
     *
     * @param renderer_base $output
     * @return stdClass
     */
    public function export_for_template(renderer_base $output): stdClass {
        $data = new stdClass();
        $generator = new generator();
        $data->dropdown = $this->sample();
        $data->heading = $generator->generate_heading();
        $data->leadparagraph = $generator->generate_lead_paragraph();
        $data->contents['content'] = $generator->generate_page_content();
        return $data;
    }

    /**
     * Produces quick and easy data for displaying a simple dropdown.
     *
     * @return array
     */
    protected function sample(): array {
        return [
            'classes' => 'some things',
            'trigger' => [
                'classes' => 'some classes',
                'attributes' => [
                    [
                        'name' => 'data-preference',
                        'value' => 'prefer'
                    ]
                ],
                    'text' => 'Button text'
            ],
            'menu' => [
                'classes' => 'menu-class',
                'attributes' => [
                    [
                        'name' => 'data-key',
                        'value' => 'menu'
                    ]
                ],
                'items' => [
                    ['hasdivider' => false, 'text' => 'First button'],
                    ['hasdivider' => false, 'text' => 'Second button'],
                    ['hasdivider' => true, 'text' => 'Third button'],
                ]
            ]
        ];
    }

}
