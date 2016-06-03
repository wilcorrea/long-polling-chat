<?php

// arquivo cujo conteúdo será enviado ao cliente

set_time_limit(3600);

while (true) {

    $requestedTimestamp = isset($_GET['timestamp']) ? (int)$_GET['timestamp'] : null;
    $id = isset ($_GET['id']) ? $_GET['id'] : null;

    if ($id) {

        $dataFileName = __DIR__ . '/' . $id . '.json';

        if (file_exists($dataFileName)) {

            clearstatcache();

            $modifiedAt = filemtime($dataFileName);

            if ($requestedTimestamp == null || $modifiedAt > $requestedTimestamp) {

                $data = json_decode(file_get_contents($dataFileName));

                $arrData = ['content' => $data, 'timestamp' => $modifiedAt];

                $json = json_encode($arrData);

                echo $json;

                file_put_contents($dataFileName, '');

                break;
            } else {

                sleep(2);
                continue;
            }

        } else {

            sleep(2);
            continue;
        }
    }
}
