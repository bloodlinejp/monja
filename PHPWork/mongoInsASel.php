<?php
// DB接続
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Insert
$bulk = new MongoDB\Driver\BulkWrite;
$bulk->insert(['name' => '田中', 'address' => '大阪', 'tel' => '123-1234-1234']);
$manager->executeBulkWrite('mytestdb.test', $bulk);

// Select
$filter = [];
$options = [
	'projection' => ['_id' => 0],
	'sort' => ['_id' => -1]
];
$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery('mytestdb.test', $query);

// Select結果表示
foreach($cursor as $document){
	var_dump($document);
}
?>

