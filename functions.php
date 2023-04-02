<?php
function loadTemplate($fileName, $templateVars) {
	   extract($templateVars);
        ob_start();
        require $fileName;
        $contents = ob_get_clean();
        return $contents;       
}

function insert($pdo, $table, $record){
    $keys = array_keys($record);
    
    $values =  implode(', ',$keys);
    $colonVals = implode(', :', $keys);

    $query = 'INSERT INTO ' . $table . ' (' . $values . ') VALUES (:' . $colonVals . ')';
    $stmt = $pdo->prepare($query);
    $stmt->execute($record);
}

function update($pdo, $table, $record, $primaryKey) {
    $query = 'UPDATE ' . $table . ' SET ';
    $parameters = [];
    foreach ($record as $key => $value) {
        $parameters[] = $key . ' = :' .$key;
    }
    $query .= implode(', ', $parameters);
    $query .= ' WHERE ' . $primaryKey . ' = :primaryKey';
    $record['primaryKey'] = $record[$primaryKey];
    $stmt = $pdo->prepare($query);
    $stmt->execute($record);
   }

   function save($pdo, $table, $record, $primaryKey) {
    if (empty($record[$primaryKey])) {
    unset($record[$primaryKey]);
    }
    try {
    insert($pdo, $table, $record);
    }
    catch (Exception $e) {
    update($pdo, $table, $record, $primaryKey);
    }
}

function find($pdo, $table, $field, $value){
    $stmt = $pdo->prepare('SELECT * FROM ' . $table .' WHERE ' . $field . ' = :value');
    $values = [
        'value'=>$value
    ];

    $stmt->execute($values);

    return $stmt->fetchAll();

}



function findJob($pdo, $table, $field, $value){
    $stmt = $pdo->prepare('SELECT * FROM ' . $table .' WHERE ' . $field . ' = :value AND closingDate > :date');
    $date = new DateTime;
    $values = [
        'value'=>$value,
        'date' => $date->format('Y-m-d')
    ];

    $stmt->execute($values);

    return $stmt->fetchAll();

}

function delete($pdo, $table, $field, $id) {
	$stmt = $pdo->prepare('DELETE FROM ' . $table . ' WHERE ' .$field.' = :id');
	$criteria = [
		'id' => $id
	];
	$stmt->execute($criteria);
}

function findAll($pdo, $table){
    $stmt = $pdo->prepare('SELECT * FROM '. $table);

    $stmt->execute();

    return $stmt->fetchAll();

}

function closingDateJobs($pdo, $table, $orderField){
    $stmt=$pdo->prepare('SELECT * FROM ' . $table. ' WHERE archived = 0 ORDER BY ' .$orderField. ' LIMIT 10');
    $stmt->execute();
    return $stmt->fetchAll();
}

function findAnd($pdo, $table, $field1, $value1, $field2, $value2){
    $stmt = $pdo->prepare('SELECT * FROM ' . $table .' WHERE ' . $field1 . ' = :value1 AND ' .$field2. ' = :value2' );
    $values = [
        'value1'=>$value1,
        'value2'=>$value2
    ];

    $stmt->execute($values);

    return $stmt->fetchAll();

}