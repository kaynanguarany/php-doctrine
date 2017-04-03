<?php

namespace Src;

/**
 * @Entity @Table(name="product")
 **/
class Product
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
    /** @Column(type="string") **/
    protected $name;

    public function __set ($name, $value){
            $this->$name = $value;
        }

    public function __get ($name){
        return $this->$name;
    }
}
