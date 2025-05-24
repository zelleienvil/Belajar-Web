<?php
require_once "koneksi.php";

class Task
{
    public function get_tasks()
    {
        global $koneksi;
        $query = "SELECT * FROM task";
        $data = array();
        $result = $koneksi->query($query);
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        $response = array(
            'status' => 1,
            'message' => 'Get Task List Successfully.',
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function get_task($id = 0)
    {
        global $koneksi;
        $query = "SELECT * FROM task";
        if ($id != 0) {
            $query .= " WHERE id=" . $id . " LIMIT 1";
        }
        $data = array();
        $result = $koneksi->query($query);
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        $response = array(
            'status' => 1,
            'message' => 'Get Task Successfully.',
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function insert_task()
    {
        global $koneksi;
        $arrcheckpost = array('title' => '', 'description' => '', 'completed' => '', 'due_date' => '');
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
        if ($hitung == count($arrcheckpost)) {
            $result = mysqli_query($koneksi, "INSERT INTO task SET
                title = '$_POST[title]',
                description = '$_POST[description]',
                completed = '$_POST[completed]',
                due_date = '$_POST[due_date]'");
            if ($result) {
                $response = array(
                    'status' => 1,
                    'message' => 'Task Added Successfully.'
                );
            } else {
                $response = array(
                    'status' => 0,
                    'message' => 'Task Addition Failed.'
                );
            }
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Parameter Do Not Match'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function update_task($id)
    {
        global $koneksi;
        $arrcheckpost = array('title' => '', 'description' => '', 'completed' => '', 'due_date' => '');
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
        if ($hitung == count($arrcheckpost)) {
            $result = mysqli_query($koneksi, "UPDATE task SET
                title = '$_POST[title]',
                description = '$_POST[description]',
                completed = '$_POST[completed]',
                due_date = '$_POST[due_date]'
                WHERE id='$id'");
            if ($result) {
                $response = array(
                    'status' => 1,
                    'message' => 'Task Updated Successfully.'
                );
            } else {
                $response = array(
                    'status' => 0,
                    'message' => 'Task Update Failed.'
                );
            }
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Parameter Do Not Match'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function delete_task($id)
    {
        global $koneksi;
        $query = "DELETE FROM task WHERE id=" . $id;
        if (mysqli_query($koneksi, $query)) {
            $response = array(
                'status' => 1,
                'message' => 'Task Deleted Successfully.'
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Task Deletion Failed.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
?>
