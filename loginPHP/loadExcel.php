<?php
    require('excel_reader.php');
    $data = new Spreadsheet_Excel_Reader();
    $data->setOutputEncoding('utf-8');
    $data->read("problem.xls");
    $result = '';
    for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
        for($i=1;$i <= $data->sheets[0]['numRows']; $i++) {
            $result = $result.$data->sheets[0]['cells'][$i][$j] . ';';
        }
    }
    echo $result;