<?php
// This file is part of Stack - http://stack.bham.ac.uk/
//
// Stack is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Stack is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Stack.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Unit tests for STACK_AnsTest_StringSloppy.
 *
 * @copyright  2012 The Open University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


require_once(dirname(__FILE__) . '/../../anstest.class.php');
require_once(dirname(__FILE__) . '/../stringsloppy.class.php');


/**
 * Unit tests for STACK_AnsTest_StringSloppy.
 *
 * @copyright  2012 The Open University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class STACK_AnsTest_StringSloppy_test extends UnitTestCase {

    public function test_is_true_for_equal_strings() {
        $at = new STACK_AnsTest_StringSloppy('hello', 'hello', array());
        $this->assertTrue($at->doAnsTest());
        $this->assertEqual(1, $at->getATMark());
    }

    public function test_is_false_for_unequal_strings() {
        $at = new STACK_AnsTest_StringSloppy('hello', 'heloo', array());
        $this->assertFalse($at->doAnsTest());
        $this->assertEqual(0, $at->getATMark());
    }

    public function test_is_true_for_strings_with_different_case() {
        $at = new STACK_AnsTest_StringSloppy('Hello', 'hello', array());
        $this->assertTrue($at->doAnsTest());
        $this->assertEqual(1, $at->getATMark());
    }

    public function test_is_true_for_nearly_equal_strings() {
        $at = new STACK_AnsTest_StringSloppy('hel lo', 'Hello', array());
        $this->assertTrue($at->doAnsTest());
        $this->assertEqual(1, $at->getATMark());
    }
}
