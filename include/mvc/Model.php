<?php

abstract class Model
{

    public function retrieve($id)
    {
        global $db;
    }

    public function save()
    {
        global $db;

        $db->save($this);
    }
}