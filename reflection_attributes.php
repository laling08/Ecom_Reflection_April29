<?php

#[Attribute]
class SampleAttribute extends \ReflectionAttribute {
    private $attributeParam;

    public function __construct($attributeParam)
    {
        echo "SampleAttribute constructor called with param: " . $attributeParam . "<br />";
        $this->attributeParam  = $attributeParam;
    }
}
#[Attribute]
class Roles {
    private $roles;
    
    public function __construct($roles)
    {
        echo "Roles constructor called with param: " . $roles . "<br />";
        $this->roles = $roles;
    }
    
}
class SampleClass {
    #[SampleAttribute('attribute param: property1')]
    private $property1 = "value1";
    #[SampleAttribute('attribute param: property2')]
    private $property2 = "value2";
    private $property3 = "value2";

    // Access Filtering
    #[Roles('admin')]
    public function method1 ($param) {
        return "method1 param: " . $param;
    }

    public function method2 ($param) {
        return "method2 param: " . $param;
    }
}
// Create a ReflectionClass instance
$reflector = new ReflectionClass('SampleClass');

// Use Property attribute
$property = $reflector->getProperty('property1');
$attributes = $property->getAttributes(SampleAttribute::class);
echo "Property Attributes: " .$attributes[0]->getName() . "<br />";

// You can also instantiate the attribute class if needed
$instance = $attributes[0]->newInstance()[0];



?>