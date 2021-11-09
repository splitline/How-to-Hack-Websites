<?php
isset($_GET['source']) && die(!show_source(__FILE__));

class Magic
{
    function cast($spell)
    {
        echo "<script>alert('MAGIC, $spell!');</script>";
    }
}

// Useless class?
class Caster
{
    public $cast_func = 'intval';
    function cast($val)
    {
        return ($this->cast_func)($val);
    }
}


class Cat
{
    public $magic;
    public $spell;
    function __construct($spell)
    {
        $this->magic = new Magic();
        $this->spell = $spell;
    }
    function __wakeup()
    {
        echo "Cat Wakeup!\n";
        $this->magic->cast($this->spell);
    }
}

if (isset($_GET['spell'])) {
    $cat = new Cat($_GET['spell']);
} else if (isset($_COOKIE['cat'])) {
    echo "Unserialize...\n";
    $cat = unserialize(base64_decode($_COOKIE['cat']));
} else {
    $cat = new Cat("meow-meow-magic");
}
?>
<pre>
This is your 🐱:
<?php var_dump($cat) ?>
</pre>

<p>Usage:</p>
<p>/?source</p>
<p>/?spell=the-spell-of-your-cat</p>

