<?php

class Circle {
    private $_radius;

    function __construct($radius) {
        $this->_radius = $radius;
    }
}

class BigCircle extends Circle
{
    
}

class SmallCircle extends Circle
{

}

class Rectangle {}

class BigRectangle extends Rectangle
{
    
}

class SmallRectangle extends Rectangle
{

}

class ShapeFactory
{
    private $_circle;
    private $_rectangle;

    function __construct(Circle $circle, Rectangle $rectangle) {
        $this->_circle = $circle;
        $this->_rectangle = $rectangle;
    }

    function getCircle() {
        return clone $this->_circle;
    }

    function getRectangle() {
        return clone $this->_rectangle;
    }
}

$factory = new ShapeFactory(new BigCircle(18), new SmallRectangle);

// var_dump($factory->getCircle());
// var_dump($factory->getRectangle());

$circles = array();
for ($i=0; $i < 5; $i++) { 
    $circles[] = $factory->getCircle(5);
}
print_r($circles);
?>