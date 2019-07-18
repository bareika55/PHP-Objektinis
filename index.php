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

    public function getData($data)
    {
        if ($data == null) {
            return $this->load();
        } else {
            return $data;
        }
    }
    
}

?>