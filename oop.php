<?php

abstract class Director_Abstract
{
    protected
        $Builder = null;
    public function __construct(Builder_Abstract $Builder)
    {
        $this -> Builder = $Builder;
    }
    public function construct()
    {
        $this -> Builder -> BuildPartA();
        $this -> Builder -> BuildPartB();
    }
}
class Director extends Director_Abstract {}
/**
 * Все строители должны соответствовать единому интерфейсу
 */
abstract class Builder_Abstract
{
    public function BuildPartA() {}
    public function BuildPartB() {}
    abstract public function getResult();
}
class Builder extends Builder_Abstract
{
    protected
        $Product = null;
    public function __construct()
    {
        $this -> Product = new Product();
    }
    public function BuildPartA()
    {
        //do something
    }
    public function BuildPartB()
    {
        //do something else
    }
    public function getResult()
    {
        return $this -> Product;
    }
}
class Product {}
$Builder = new Builder();
$Director = new Director($Builder);
$Director -> construct();
$Product = $Builder -> getResult();


