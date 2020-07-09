<?php
/* 5. Дан код.
 * Что он выведет на каждом шаге? Почему?
*/

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}

$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();