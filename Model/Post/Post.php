<?php

class Post {
    public $id;
    public $PostTitle;
    public $CategoryId;
    public $PostDetails;
    public $PostingDate;
    public $UpdationDate;
    public $Is_Active;
    public $PostUrl;
    public $PostImage;

    function __construct($id, $PostTitle, $CategoryId, $PostDetails,$UpdationDate, $Is_Active, $PostUrl, $PostImage) {
        $this->id=$id;
        $this->PostTitle = $PostTitle;
        $this->CategoryId=$CategoryId;
        $this->PostDetails=$PostDetails;
        $this->UpdationDate=$UpdationDate;
        $this->Is_Active=$Is_Active;
        $this->PostUrl=$PostUrl;
        $this->PostImage=$PostImage;
    }

}