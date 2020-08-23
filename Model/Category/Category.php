<?php

class Category {
    public $id;
    public $CategoryName;
    public $Description;
    public $PostingDate;
    public $UpdationDate;
    public $Is_Active;

    function __construct($id, $CategoryName, $Description, $PostingDate,$UpdationDate, $Is_Active) {
        $this->id=$id;
        $this->CategoryName = $CategoryName;
        $this->Description=$Description;
        $this->PostingDate=$PostingDate;
        $this->UpdationDate=$UpdationDate;
        $this->Is_Active=$Is_Active;
    }

}