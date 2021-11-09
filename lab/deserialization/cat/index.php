<?php
isset($_GET['source']) && die(!show_source(__FILE__));

class Cat
{
    public $name = '(guest cat)';
    function __construct($name)
    {
        $this->name = $name;
    }
    function __wakeup()
    {
        echo "<pre>";
        system("cowsay 'Welcome back, $this->name'");
        echo "</pre>";
    }
}

if (!isset($_COOKIE['cat_session'])) {
    $cat = new Cat("cat_" . rand(0, 0xffff));
    setcookie('cat_session', base64_encode(serialize($cat)));
} else {
    $cat = unserialize(base64_decode($_COOKIE['cat_session']));
}
?>
<p>Hello, <?= $cat->name ?>.</p>
<a href="/?source">source code</a>
