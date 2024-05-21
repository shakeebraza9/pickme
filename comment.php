<?php
include("global.php");
global $webClass;
global $dbF;
global $db, $functions;
$dbp = $db;

// Retrieve the data sent from the client-side (JavaScript)
// $data = json_decode(file_get_contents('php://input'), true);

// var_dump($data);
// Extract the data from the client-side
$projectId = $_POST['id'];
$userId = $_POST['user_id'];
$assigned_from = $_POST['assigned_from'];
$message = $_POST['message'];
$senderId = $_POST['senderId'];
date_default_timezone_set('Europe/London');
$time = date('Y-m-d H:i:s'); // Get the current date and time in the 'Europe/London' timezone



$sql = "INSERT INTO chat_comment (project_id, user_id ,sender_id ,assigned_from ,message,time)
        VALUES ($projectId, '$userId', $senderId, $assigned_from , '$message','$time')";


if ($result = $dbF->setRow($sql)) {
    // Success
    $lastId = $dbF->rowLastId;
    // $sql = "SELECT * FROM chat_comment WHERE sender_id = '$senderId' OR user_id = $userId AND `project_id`=$projectId ORDER BY `time` DESC";
    $sql = "SELECT * FROM chat_comment WHERE (sender_id = '$senderId' OR user_id = $userId) AND `project_id` = $projectId ORDER BY `time` DESC";
    $comment = $dbF->getRows($sql);
    $html = "";
    foreach ($comment as $key => $comment_data) {

        $message = $comment_data['message'];
        $sender_id = $comment_data['sender_id'];
        // $time2 = $comment_data['time'];
        // $time = substr($time2, 11);
                                 $time2 = $comment_data['time'];
                                 var_dump($time2);
                $time = substr($time2, 11);
                
                $timestamp = strtotime($time);

                $formattedTime = date('h:i A', $timestamp);
                                 var_dump($formattedTime);
        $username = $functions->webUserName($sender_id);

        $html .=
            '
                    <div class="chat-message" id="'.$projectId.'">
                    ' . $username["acc_name"] . '-<b>' . $message . '</b>
                    <div class="time-message">' . $formattedTime . '</div>
                    </div>
                    
                    ';
    }
    $response = array('status' => 'success', 'message' => 'Message inserted successfully',);
    echo $html;
    // echo json_encode($response);
} else {
    // Error
    $response = array('status' => 'error', 'message' => 'Error inserting message: ');
    echo json_encode($response);
}
