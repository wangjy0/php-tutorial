<?php

header('Content-type: text/html; charset=utf-8');

$dsn = 'mongodb://127.0.0.1:27017';
// 链接服务器
try {
    $m = new MongoClient($dsn);

    print_r($m->listDBs());
    // 选择一个数据库
    $db = $m->selectDB('db1');

    print_r($db->getCollectionInfo());

    // 选择一个集合（ Mongo 的“集合”相当于关系型数据库的“表”）
    $collection = $db->selectCollection('cartoons');

//     // 插入一个文档（译注：“文档”相当于关系型数据库的“行”）
//     $document = array( "title" => "Calvin and Hobbes", "author" => "Bill Watterson" );
//     $collection->insert($document);

//     // 添加另一个文档，它的结构与之前的不同
//     $document = array( "title" => "机器猫", "online" => false, "contry" => "Japan" );
//     $collection->insert($document);

//     // 查询集合中的所有文档
//     $cursor = $collection->find();

//     // 遍历查询结果
//     foreach ($cursor as $document) {
//     var_dump($document);
//     }
} catch (MongoConnectionException $e) {
    print_r($e->getMessage());
}
