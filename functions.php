<?php

//// global variable examples

// string using concatenation operator
$testVar = "this is a test variable" . " concatenated";

$a = 1;
$b = 2;

//// anonymous functions
function myAnonFunc(){ // functions in PHP are called "methods"
    echo 'Accessed anonymous method.<BR>';
}

// pass by reference (&) vs. pass by value (default behaviour)
// Variables, i.e. "foo($a)", New statements, i.e. :foo(new foobar())", and References returned from functions, i.e. ":" can be passed by reference.
// By default, function arguments are passed by value (so that if the value of the argument within the function is changed, it does not get changed outside of the function). To allow a function to modify its arguments, they must be passed by reference.
function passByReference(&$thing){ // The &amp; is before the argument $var
   echo "Hello, $thing";
   $thing = 'World ';
}

function passByValue($thing){ // The &amp; is before the argument $var
   echo "Hello, $thing";
   $thing = 'World ';
}

function sum()
{
    $GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];
} 

// anonymous functions in conjunction with "use" keyword (count var passed by reference) create closure
function create_closure($count) {
    return function() use (&$count) {
        return $count--;
    };
}

// inheritance (FYI multiple inheritance, or inheriting characteristics or features from more than one superclass not supported yet see mixins)

/* 
    Classes defined as abstract may not be instantiated, and any class that contains at least one abstract method must also be abstract. 
    Methods defined as abstract simply declare the method's signature - they cannot define the implementation.
    When inheriting from an abstract class, all methods marked abstract in the parent's class declaration must be defined by the child; 
    additionally, these methods must be defined with the same (or a less restricted) visibility.

*/
abstract class Animal {
    // Force Extending class to define this method
    abstract protected function set_color($new_color);
    abstract protected function get_color();

    // Common method
    public function printOut() {
        print $this->get_color() . "\n";
    }
}

// example of a concrete class extending an abstract class
class Cat extends Animal {
    // class member variables are called "properties"
    public $color;
    // Cat class MUST define the set_color and get_color methods
    // example of getter setter functions
    function set_color($new_color) {
        // pseudo variable "$this" is avilable when a method is called within an object context (i.e. "myAnimal = new Animal ()")
        // $this is a special self-referencing variable. You use $this to access properties and to call other methods of the current class.
        $this->color = $new_color;
    }
    function get_color() {
            return $this->color;
    }
    // Cat class can call the printOut(); method
}
// final keyword, which prevents child classes from overriding a method by prefixing the definition with final. If the class itself is being defined final then it cannot be extended.
final class Mo extends Cat {}

// below results in Fatal error: Class Sparky may not inherit from final class (Mo)
//class Sparky extends Mo {} 

class Test
{
    private $foo;

    // Classes which have a constructor method call this method on each newly-created object, so it is suitable for any initialization that the object may need before it is used.
    // Parent constructors are not called implicitly if the child class defines a constructor. In order to run a parent constructor, a call to parent::__construct() within the child constructor is required.
    public function __construct($foo)
    {
        $this->foo = $foo;
    }

    // the destructor method will be called as soon as there are no other references to a particular object, or in any order during the shutdown sequence.
    public function __destruct($foo) {
       print "Destroying " . $this->foo . "\n";
    }

    //// Visibility (access modifiers)

    private function myPrivateFunc()
    {
        echo 'Accessed the private method.<BR>';
    }

    protected function myProtectedFunc()
    {
        echo 'Accessed the protected method.<BR>';
    }

    function myPublicFunc()
    {
        echo 'Accessed the public method.<BR>';
    }    

    public function myPublicPrivateFunc(Test $other)
    {
        echo 'Accessed the public method which accesses the private method.<BR>';

        // We can change the private property:
        $other->foo = 'hello';
        var_dump($other->foo);

        // We can also call the private method:
        $other->myPrivateFunc();
    }

    public function myPublicProtectedFunc(Test $other)
    {
        echo 'Accessed the public method which accesses the protected method.<BR>';

        // We can change the private property:
        $other->foo = 'hello';
        var_dump($other->foo);

        // We can also call the private method:
        $other->myProtectedFunc();
    }   

    //// other stuff

    // cURL
    public function getCurl($url){
        // try-catch-finally example
        try {
            $ch = curl_init($url);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
            return curl_exec($ch);
            curl_close($ch);            
        }
        catch {
            echo "uh oh something went no bueno..."
        }
        finally {
            curl_close($ch);
        }

    }

    // MySQL
    public function mySelect($query){
        // db connection properties
        require 'db.inc';
        $db = new Database();
        // connect to mysql db
        $con = mysql_connect($db->getHost(), $db->getUser(), $db->getPassword());
        //$con = mysql_connect($host, $mysql_user, $mysql_password);
        if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }
        mysql_select_db($db->getDatabase(), $con);
        $result = mysql_query($query);
        mysql_close($con);
        return $result;
    }

    // use keyword
}
?>