<?php

class CPropertytype {

    public $c_propertytype_id;
    public $isactive;
    public $created;
    public $createdby;
    public $updated;
    public $updatedby;
    public $name;
    public $description;

    public static function build($result) {
        $cPropertytype = new CPropertytype();

        $cPropertytype->c_propertytype_id = $result->c_propertytype_id;
        $cPropertytype->isactive = $result->isactive;
        $cPropertytype->created = $result->created;
        $cPropertytype->createdby = $result->createdby;
        $cPropertytype->updated = $result->updated;
        $cPropertytype->updatedby = $result->updatedby;
        $cPropertytype->name = $result->name;
        $cPropertytype->description = $result->description;

        return $cPropertytype;
    }

}
