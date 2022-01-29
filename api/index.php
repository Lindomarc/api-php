<?php

$data = [];

// request
if(isset($_GET['option'])){
    switch ($_GET['option']) {
        case 'status':
            $data['status'] = 'success';
            $data['data'] = 'API OK';            
            break;
        default:
            $data['status'] = 'ERROR';
            break;
    }
} else {
    $data['status'] = 'ERROR';
}

// emitir response da api
response($data);

// construir response
function response($dataResponse)
{
    header('Content-Type:application/json');
    echo json_encode($dataResponse);
}