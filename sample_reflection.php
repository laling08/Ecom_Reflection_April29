<?php 

class SampleClass {
    private $property1 = "value1";
    private $property2 = "value2";
    private $property3 = "value2";

    public function method1 ($param) {
        return "method1 param: " . $param;
    }

    public function method2 ($param) {
        return "method2 param: " . $param;
    }
}

// Create a ReflectionClass instance
$reflector = new ReflectionClass('SampleClass');

// Get class name
echo "Class Name: ". $reflector->getName() . "<br />";

// Get class methods
echo "Methods: " . "<br />";
$methods = $reflector->getMethods();
foreach ($methods as $method) {
    echo "- " . $method->getName() . "<br />";
}

// Get class properties
echo "Properties: " . "<br />";
$properties = $reflector->getProperties();
foreach ($properties as $property) {
    echo "- " . $property->getName() . "<br />";
}

// Create an instance of the class using Reflection
$instance = $reflector->newInstance();

// Get and invoke a method
$method = $reflector->getMethod('method1');
echo $method->invoke($instance, 'sample method param') . "<br />";

// Access a private property
$property = $reflector->getProperty('property1');
$property->setAccessible(true);
echo "Private property value: {$property->getValue($instance)}";

// Check if the class is intantiable
// Check if the class is an interface
// Check if the class is an abstract class
// etc.

// Use reflection on an object
echo "<br /> Object Reflection: <br />";
// Create an object of the class
$object = new SampleClass();
$reflector = new ReflectionObject($object);
echo "Object Class Name: " .$reflector->getName(). "<br />";

?>