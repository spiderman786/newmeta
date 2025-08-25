<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
$data = $_POST;
if (!empty($data)) {
    $log_entry = json_encode($data) . PHP_EOL;
    $file = 'submissions.log';
    file_put_contents($file, $log_entry, FILE_APPEND | LOCK_EX);
    echo json_encode(['status' => 'success', 'message' => 'Data received']);
} else {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'No data provided']);
}
?>
