<?php

class ParsedownCheckboxTest extends PHPUnit_Framework_TestCase
{
    public function testCheckbox()
    {
        $markdown = <<<EOF
- [ ] test 1
- [] test 2
- [x] test 3
    - [ ] test 4
    - [x] test 5
- [test](https://markdown.org) 6
- [x](https://markdown.org) test 7
EOF;

        $html = <<<EOF
<ul>
<li><input type="checkbox" /> test 1</li>
<li>[] test 2</li>
<li><input type="checkbox" checked /> test 3
<ul>
<li><input type="checkbox" /> test 4</li>
<li><input type="checkbox" checked /> test 5</li>
</ul></li>
<li><a href="https://markdown.org">test</a> 6</li>
<li><a href="https://markdown.org">x</a> test 7</li>
</ul>
EOF;

        $parsedown = new ParsedownCheckbox();
        $this->assertEquals($html, $parsedown->text($markdown));
    }
}

