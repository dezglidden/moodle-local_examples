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

use \Faker;

defined('MOODLE_INTERNAL') || die();

require_once(__DIR__ . '/../../../vendor/autoload.php');

/**
 * Faker generator class for the dropdown page.
 *
 * @package local_examples
 * @copyright 2022 onwards Dez Glidden
 * @author    Dez Glideen <dezglidden@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class dropdown extends page {

    /** Guarantees generated content is always the same. Useful for testing. */
    const SEED_KEY = 1234;

    /** Sets the default locale for the Faker provider. */
    const DEFAULT_LOCALE = 'en_GB';

    /**
     * The Faker instance.
     *
     * @var Faker\Generator|null
     */
    protected $faker = null;

    /**
     * The dropdown constructor, setting up our Faker generator.
     */
    public function __construct() {
        $this->faker = Faker\Factory::create(self::DEFAULT_LOCALE);
        $this->faker->seed(self::SEED_KEY);
    }

    /**
     * {@inheritDoc}
     */
    public function generate_heading(): string {
        return $this->faker->words(3, true);
    }

    /**
     * {@inheritDoc}
     */
    public function generate_lead_paragraph(): string {
        return $this->faker->paragraph(7);
    }

    /**
     * {@inheritDoc}
     */
    public function generate_page_content(): string {
        return $this->faker->paragraphs(3, true);
    }

}
