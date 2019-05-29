<?php
class Person{
    
    //The name of the person.
    public $name;
    public $review=array();
    
    //The person's gender.
    protected $gender;
    
    public function __construct($name, $gender) {
        $this->name = $name;
        $this->gender = $gender;
    }

    public function setReview($rev){
        array_push($this->review,$rev);
    }

    
    public function speak(){
        //echo 'Hi, my name is ' . $this->name . '!';
        print_r( $this->review);

    }
    
}

/Connect to the MySQL database using the PDO object.
 $pdo = new PDO('mysql:host=localhost;dbname=serialize', 'root', '');
 
Instantiate object.
$person = new Person('Namal', 'Male');
$person->setReview("Good...");

 
var_dump the object so that we can see what its structure looks like.
var_dump($person);
 
Serialize the object into a string value that we can store in our database.
 $serializedObject = serialize($person);
 
Prepare our INSERT SQL statement.
 $stmt = $pdo->prepare("INSERT INTO objects (name,data) VALUES ('$person->name',?)");
 
Execute the statement and insert our serialized object string.
 $stmt->execute(array(
     $serializedObject
 ));




//Connect to the MySQL database using the PDO object.
$pdo = new PDO('mysql:host=localhost;dbname=serialize', 'root', '');

//Prepare our select statement.
$stmt = $pdo->prepare("SELECT * FROM objects where name='Namal'");

//Execute the statement.
$stmt->execute(array(1));

//Fetch the table row in question.
$row = $stmt->fetch(PDO::FETCH_ASSOC);

//Unserialize the data.
$person = unserialize($row['data']);
//$person=($person)$person;
print_r ($person);
var_dump($person);
$person->setReview("New review...");
$person->speak();


//Lets call the speak method / function on our object.
//$person->speak();
//$person->setReview("New review...");
//$person->speak();






//$person->setReview("New review...");
//$person->speak();
//var_dump($person);

// $serializedObject = serialize($person);
 
// //Prepare our INSERT SQL statement.
// $stmt = $pdo->prepare("INSERT INTO objects (name,data) VALUES ('$person->name',?)");

// //Execute the statement and insert our serialized object string.
// $stmt->execute(array(
//     $serializedObject
// ));



// $stmt = $pdo->prepare("SELECT * FROM objects where name='Namal'");

// //Execute the statement.
// $stmt->execute(array(1));

// //Fetch the table row in question.
// $row = $stmt->fetch(PDO::FETCH_ASSOC);

// //Unserialize the data.
// $person = unserialize($row['data']);

// //Lets call the speak method / function on our object.
// $person->speak();
?>
