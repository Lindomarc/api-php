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
            defineResponse($data, rand(10,1000));
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