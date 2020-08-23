<?php

class Admin {
    public $id;
    public $AdminUserName;
    public $AdminPassword;
    public $AdminEmailId;
    public $Is_Active; 
    public $CreationDate;
    public $UpdationDate;

    function __construct($id, $AdminUserName, $AdminPassword, $AdminEmailId, $Is_Active, $CreationDate, $UpdationDate) {
        $this->id=$id;
        $this->AdminUserName = $AdminUserName;
        $this->AdminPassword=$AdminPassword;
        $this->AdminEmailId=$AdminEmailId;
        $this->Is_Active=$Is_Active;
        $this->CreationDate=$CreationDate;
        $this->UpdationDate=$UpdationDate;
    }

}