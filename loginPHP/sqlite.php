<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/3
 * Time: 16:30
 */
    class MyDB extends SQLite3
    {
        function __construct()
        {
            $this->open('project.db');
        }
    }
?>