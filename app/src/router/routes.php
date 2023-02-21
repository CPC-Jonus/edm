<?php
session_start();
require('../database/database.php');
require("../service/userService.php");
require("../service/attendanceService.php");
require("../service/adminService.php");
if (isset($_POST['ch'])) {
    switch ($_POST['ch']) {
        case 'login':
            $service = new userService();
            echo $service->login($_POST['data']);
            break;
        case 'register':
            $service = new userService();
            echo $service->register($_POST['data']);
            break;
        case 'timein':
            $service = new attendanceService();
            echo $service->timein($_SESSION["current_id"]);
            break;
        case 'timeout':
            $service = new attendanceService();
            echo $service->timeout($_SESSION["current_id"]);
            break;
        case 'update':
            $service = new userService();
            echo $service->update($_POST['data']);
            break;
        case 'disable':
            $service = new userService();
            echo $service->disable($_POST['id']);
            break;
        case 'logout':
            session_unset();
            echo 201;
            break;
        case 'close':
            $service = new userService();
            echo $service->close();
            break;
        case 'open':
            $service = new userService();
            echo $service->open();
            break;
        case 'getstatus':
            $service = new userService();
            echo $service->getStatus();
            break;
        case 'getid':
            $service = new userService();
            echo $service->getCurrentId();
            break;
        case 'displayAll':
            $service = new adminService();
            echo $service->showUsers();
            break;
        default:
            echo "Function not found";
            break;
    }
}
