<?php



function metaData($status = true, $request, $function_code = '', $success_msg = 'success', $error_code = '', $exception = '', $error_message = '')
{
$data = [
'status' => $status,
'success_message' => $success_msg,
'error_message' => $error_message,
'error_exception' => $exception,
'error_code' => $error_code,
'method' => $request->method(),
'url' => $request->fullUrl(),
'function_code' => $function_code,
];

return $data;
}


function errorDesc($e)
{
    return $e->getMessage() . ' ' . $e->getLine() . ' ' . $e->getFile();
}


function merge($array1, $array2)
{
    return  array_merge($array1, $array2);
}
