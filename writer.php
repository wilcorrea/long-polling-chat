<?php

$id = isset($_POST['id']) ? $_POST['id'] : null;
$message = isset($_POST['message']) ? $_POST['message'] : null;

if ($id && $message) {

    $dataFileName = __DIR__ . '/' . $id . '.json';
    $data = [];
    if (file_exists($dataFileName)) {
        $data = json_decode(file_get_contents($dataFileName));
    }
    $data[] = $message;

    file_put_contents($dataFileName, json_encode($data));
}
