<?php
/**
 * Limerence
 * 
 * BDD/TDD testing library for PHP.
 * 
 * Copyright (c) 2016 Andreas Indal
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 * 
 * @author      Andreas Indal <andreas@rocketship.se>
 * @copyright   Copyright (c) 2016 Andreas Indal
 * @link        https://github.com/andreasindal/limerence
 * @version     0.0.1
 * @license     MIT
 */

namespace Limerence\Behaviour;

/**
 * Expectation.
 * 
 * @author Andreas Indal <andreas@rocketship.se>
 * @package Limerence\Behaviour
 * @since 0.0.1
 */
class Expect
{
    /**
     * @var Limerence\Test\TestRunner
     */
    private $runner;

    /**
     * @var mixed Value to assert
     */
    private $subject;

    /**
     * Create a new assertion.
     * 
     * @param $subject mixed Value to assert
     */
    public function __construct($subject)
    {
        global $limerenceTestRunner;

        $this->runner = $limerenceTestRunner;
        $this->runner->incrementAssertions();
        $this->subject = $subject;
    }

    /**
     * Chainer method.
     * 
     * @return \Limerence\Behaviour\To
     */
    private function to() {
        $to = new To($this->runner, $this->subject);

        return $to;
    }

    public function __get($var) {
        if (method_exists($this, $var)) {
            return $this->{$var}();
        }
    }
}