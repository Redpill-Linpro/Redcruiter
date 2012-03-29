<?php

class DataBaseManager
{
    private $database;

    public function __construct()
    {
        global $config;

        $this->database = $config['database'];
    }

    public function retrieve($module, $id)
    {
        $result = $this->getAll($module);

        if(!empty($result))
            return $result->$id;

        return new stdClass();
    }

    public function getAll($module)
    {
        $data_set = $this->get();

        if(isset($data_set->$module))
            return $data_set->$module;
        
        return new stdClass();
    }

    public function insert($module, Model $object)
    {
        $id = md5(time());
        $data_set = $this->get();
        $data_set->$module->$id = $object;
        $this->put($data_set);
    }

    public function update($module, Model $object, $id)
    {
        $data_set = $this->get();

        if(!isset($data_set->$module->$id))
            return false;

        foreach ($data_set->$module->$id as $var => $value)
            if(isset($object->$var))
            {

                $data_set->$module->$id->$var = $object->$var;
            }

        $this->put($data_set);

        return true;
    }

    public function delete($module, $id)
    {
        $data_set = $this->get();
        if(isset($data_set->$module->$id))
            unset($data_set->$module->$id);

        $this->put($data_set);
    }

    protected function get()
    {
        $json = '{}';

        if(file_exists($this->database))
            $json = file_get_contents($this->database);

        $objects = json_decode($json);

        return $objects;
    }

    protected function put($objects)
    {
        if(file_exists($this->database))
            file_put_contents($this->database, json_encode($objects));
    }
}