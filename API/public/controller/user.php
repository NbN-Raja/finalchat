<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UsersController {
    public function getUsers(Request $request, Response $response, $args) {
        $users = [
            ['name' => 'John Doe', 'age' => 35],
            ['name' => 'Jane Smith', 'age' => 28],
            ['name' => 'Bob Johnson', 'age' => 42],
        ];

        $response->getBody()->write(json_encode($users));
        return $response->withHeader('Content-Type', 'application/json');
    }
}

// Notification Here 

class notification {
    public function getnotification(Request $request, Response $response, $args) {
        $conn = new mysqli('localhost', 'root', '', 'chat_app_db');
        $sql = "SELECT COUNT(status) as status from `images`";
        $result = mysqli_query($conn, $sql);
    
        $count = 0;
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $count = $row['status'];
            }
        }
        
        $responseBody = ['notificationCount' => $count];
        $response->getBody()->write(json_encode($responseBody));
        return $response->withHeader('Content-Type', 'application/json');
    }
}

?>