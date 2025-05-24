<?php
require_once "method.php";
$obj_task = new Task();
$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case 'GET':
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            $obj_task->get_task($id);
        } else {
            $obj_task->get_tasks();
        }
        break;

    case 'POST':
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            $obj_task->update_task($id);
        } else {
            $obj_task->insert_task();
        }
        break;

    case 'DELETE':
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            $obj_task->delete_task($id);
        } else {
            header("HTTP/1.0 400 Bad Request");
            echo json_encode(['status'=>0, 'message'=>'ID parameter missing']);
        }
        break;

    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}
?>
