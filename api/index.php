<?php

$data = [];

// prepare response
$data['status'] = 'error';
$data['data'] = null;

// request
if(isset($_GET['option'])){
    switch ($_GET['option']) {
        case 'status':
            defineResponse($data, 'API OK');
            break;
        case 'random':
            $min = 0;
            $max = 1000;
            if(isset($_GET['min'])){
                $min = intval($_GET['min']);
            }
            if(isset($_GET['max'])){
                $max = intval($_GET['max']);
            }

            if($min >= $max){
                response($data);
                return;
            }
            defineResponse($data, rand($min,$max));
            break;
    }
}

// emitir response da api
response($data);

function defineResponse(&$data, $message)
{
    $data['status'] = 'success';
    $data['data'] = $message;
}
// construir response
function response($dataResponse)
{
    header('Content-Type:application/json');
    echo json_encode($dataResponse);
}