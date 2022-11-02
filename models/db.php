<?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=test; dbname=bookdb", "root", "");
    } catch (PDOException $err) {
        $err->getMessage(); 
    }


    //Extra function here to maintain DRY code. 
    function queryDB($query) {
        global $db; 
        return $db->query($query); 
    }


    //Return all rows from a table
    function query($query) {
        return queryDB($query)->fetchAll(PDO::FETCH_ASSOC); 
    }

    //Return single row from table
    function queryOne($query) {
        return queryDB($query)->fetch(PDO::FETCH_ASSOC); 
    }


    //Function to insert into database. 
    function insert($tableName, $columnNames, $insertValues) {

        if(count($columnNames) != count($insertValues)) return; 

        //Get the arrays ready to be used in insert. Change them to strings
        $columnNames = implode(', ', array_map(fn($el) => "`$el`", $columnNames));
        $insertValues = implode(', ', array_map(fn($el) => "'$el'", $insertValues));

        queryDB("INSERT INTO `$tableName` ($columnNames) VALUES ($insertValues)"); 
    }
