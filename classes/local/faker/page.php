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

namespace local_examples\local\faker;

/**
 * Abstract class page.
 *
 * @package   local_examples
 * @copyright 2022 onwards Dez Glidden
 * @author    Dez Glideen <dezglidden@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class page {

    /**
     * Generate the heading for the page.
     *
     * @return string
     */
    abstract public function generate_heading(): string;

    /**
     * Generate a lead paragraph.
     *
     * @return string
     */
    abstract public function generate_lead_paragraph(): string;

    /**
     * Generate the page content.
     *
     * @return string
     */
    abstract public function generate_page_content(): string;

}
