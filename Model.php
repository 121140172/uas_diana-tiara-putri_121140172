<?php
require_once 'DB.php';
class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = DB::getInstance()->getConnection();
    }
}
