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
echo "Class Name;". $reflector->getName() . "<br />";

// Get class methods
echo "Methods: " . "<br />";
$methods = $reflector->getMethods();
foreach ($methods as $method) {
    echo "- " . $method->getName() . "<br />";
}

?>