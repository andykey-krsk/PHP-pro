<?php

/* 7. Дан код.
 * Что он выведет на каждом шаге? Почему?
 * */

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A;
$b1 = new B;
$a1->foo(); //1
$b1->foo(); //1
$a1->foo(); //2
$b1->foo(); //2

/*Код аналогичен коду из из задания 6.
Здесь только объекты созданы альтернативной формой без ().
*/