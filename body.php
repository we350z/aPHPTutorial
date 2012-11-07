<P>Body Content</P>
<?php
  // require functions
  require 'functions.php';

  // globals example
  echo "Global Variable example: ";
  sum();
  echo $b;

  // class and inheritance examples
  echo "<BR><BR>Class and inheritance examples: ";
  // To create an instance of a class, the new keyword must be used. 
  // An object will always be created unless the object has a constructor defined that throws an exception on error.
  // Classes should be defined before instantiation (and in some cases this is a requirement).
  $myCat = new Cat;
  $myCat->printOut();
  echo $myCat->set_color("Orange");
  echo $myCat->get_color() ."\n";

  $myMo = new Mo;
  $myMo->printOut();
  echo $myMo->set_color("Grey");
  echo $myMo->get_color() ."\n";

  // pass by value vs. pass by reference
  echo "<BR><BR>Pass by Value vs. Pass by Reference: ";
  $it = 'Computer ';

  // pass by reference - notice what happens on second run
  passByReference($it);  
  passByReference($it);

  // pass by value - the function changes the value of $thing, the $it variable outside of the function is unaffected
  passByValue($it);
  passByValue($it);

  echo "<BR><BR>Associative Array example: <BR>";
  // fun with associative arrays
  $population["SF"] = 750000;
  $population["LA"] = 3819702;
  $population["SF"] = 812826;
  
  foreach($population as $key => $value) {
    echo "City: $key, Population: $value <br />";
  }

  // closure example 
  echo "<BR>Multiple Closure example:<BR>";
  $numberOfClosures = array(10, 20); // numerically indexed array example - PHP's arrays are actually maps (each key is mapped to a value).
  $closure = create_closure($numberOfClosures[0]);
  $closure2 = create_closure($numberOfClosures[1]);
  //echo $closure() + ' ' + $closure(); // this will summate and equal 19 (10 + 9)
  
  foreach ($numberOfClosures as $b) { // foreach loop usage example
    $closureString = "";
    $closureString2 = "";
    $iterations = $b;

    for ($counter = $b; $counter > 0; $counter--) { // for loop usage example, notice that a ; is not needed after the "increment counter" expression
      switch($b) {
        case $numberOfClosures[0]:
          $closureString = (string)$closureString . " " . (string)$closure();
          break;
        case $numberOfClosures[1]:
          $closureString2 = (string)$closureString2 . " " . (string)$closure2();
          break;
      }  
    }
    echo $closureString;
    echo $closureString2;
    echo '<BR>';
  }

  // create a new object instance of the Body class
  $my_test = new Test;  

	// MySQL example

	echo '<BR>MySQL example: ';

  $myResult = $my_test->mySelect("SELECT * FROM account_details");

  echo "<table border='1'>
  <tr>
  <th>Client ID</th>
  <th>Username</th>
  </tr>";

  while ($row = mysql_fetch_array($myResult)) // while loop usage example
  {
    echo "<tr>";
    echo "<td>" . $row['client_id'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";

	// curl example

	echo '<BR>cURL Example: ';
  echo $my_test->getCurl("http://www.znwd.net/uptime.txt");

  // public vs. private function
  // calling a private function will cause the code to stop execution
  //$my_body->myPrivate(); // throws "PHP Fatal error:  Call to private method"
  //Body.myPrivate(); // throws "PHP Fatal error:  Call to private method"

  echo '<BR><BR>Visibility:<BR>';
  //// anonymous access
  // use of public, protected, private access modifier properties is prohibited
  // 
  myAnonFunc();

  //// public access - can be accessed everywhere
  $my_test->myPublicFunc();

  //// protected access - can be accessed only within the class itself and by inherited and parent classes
  //$test = new Test('test'); 
  //$test->myPublicProtectedFunc(new Test('other')); // throws "PHP Fatal error:  Call to undefined method"

  //// private access - ocan only be accessed by the class that defines the member

  // calling a private function will cause the code to stop execution
  //$my_body->myPrivate(); // throws "PHP Fatal error:  Call to private method"
  //Body.myPrivate(); // throws "PHP Fatal error:  Call to private method"
  $test2 = new Test('test');
  $test2->myPublicPrivateFunc(new Test('other'));
?>