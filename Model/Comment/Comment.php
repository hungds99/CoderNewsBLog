<?php

class Comment {
    public $id;
    public $name;
    public $email;
    public $comment;
    public $postingDate;
    public $status;

    function __construct($id, $name, $email, $comment,$postingDate, $status) {
        $this->id=$id;
        $this->name = $name;
        $this->email=$email;
        $this->comment=$comment;
        $this->postingDate=$postingDate;
        $this->status=$status;
    }

}