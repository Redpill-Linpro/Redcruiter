<?php

abstract class Model
{

    public function save()
    {
        global $db;

        $db->save($this);
    }
}