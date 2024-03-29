<?php

class fileDB
{
    private $file_name;
    private $data;

    public function load()
    {
        if (file_exists($this->file_name)) {
            $encoded_string = file_get_contents($this->file_name);
            if ($encoded_string !== false) {
                $this->data = json_decode($encoded_string, true);
            }
        }
    }

    public function getData()
    {
        if ($this->data == null) {
            $this->load();
        }
        return $this->data;
    }

    public function setData($data_array)
    {
        $this->data = $data_array;
    }

    public function save($data)
    {
        $encoded_json = json_encode($data);
        file_put_contents('data.txt', $encoded_json);
    }

    public function createTable($table_name)
    {
        if (!$this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            return true;
        }
        return false;
    }

    public function dropTable($table_name)
    {
        unset($this->data[$table_name]);
    }

    public function tableExists($table_name)
    {
        if (isset($this->data[$table_name])) {
            return true;
        }
        return false;
    }

    public function truncateTable($table_name)
    {
        if ($this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            return true;
        }
        return false;
    }

    public function insertRow($table_name, $row, $row_id = null)
    {
        if ($this->tableExists($table_name)) {
            if ($row_id !== null) {
                $this->data[$table_name][$row_id] = $row;
            } else {
                $this->data[$table_name][] = $row;
            }

            return true;
        }

        return false;
    }

}

?>