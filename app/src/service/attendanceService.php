<?php
class attendanceService
{
    public function timein($user_id)
    {
        try {
            $db = new database();
            if (self::checkDbStatus($db)) {
                if (self::checkValidTimein($user_id) == 200) {
                    $stmt = $db->getCon()->prepare(self::timeinQuery());
                    $stmt->execute(array(self::getDate(), "", self::getDate(), $user_id));
                    $db->close();
                    $_SESSION["timein"] =  self::getDate();
                    return self::getDate();
                } else {
                    return 403;
                }
            }
        } catch (Exception $th) {
            return 501;
        }
    }
    public function timeout($user_id)
    {
        try {
            $db = new database();
            if (self::checkDbStatus($db)) {
                if (self::checkValidTimeout($user_id) == 200) {
                    $stmt = $db->getCon()->prepare(self::timeoutQuery());
                    $stmt->execute(array(self::getDate(), $user_id));
                    $db->close();
                    $_SESSION["timeout"] =  self::getDate();
                    return self::getDate();
                } else {
                    return 403;
                }
            }
        } catch (Exception $th) {
            return 501;
        }
    }
    public function disableTimeRecord($user_id)
    {
        try {
            $db = new database();
            if (self::checkDbStatus($db)) {
                if (self::checkValidTimeout($user_id) == 200) {
                    $stmt = $db->getCon()->prepare(self::disable());
                    $stmt->execute(array($user_id));
                    $db->close();
                    return 201;
                } else {
                    return 403;
                }
            }
        } catch (Exception $th) {
            return 501;
        }
    }

    public static function getDataAttendance()
    {
        try {
            $db = new database();
            if (self::checkDbStatus($db)) {
                $stmt = $db->getCon()->prepare(self::getDataQuery(self::getDateCheck()));
                $stmt->execute(array($_SESSION["current_id"]));
                $tmp = null;
                while ($res = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $tmp = $res['timein'] . "~" . $res['timeout'];
                }
                $db->close();
                return $tmp;
            }
        } catch (Exception $th) {
            return 501;
        }
    }

    // Private Global Functions
    private static function checkDbStatus($db)
    {
        return $db->getStatus() == true ? true : false;
    }
    private static function getDate()
    {
        date_default_timezone_set('Asia/Manila');
        return date('m-d-Y h:i:sa');
    }
    private static function getDateCheck()
    {
        date_default_timezone_set('Asia/Manila');
        return date('m-d-Y');
    }
    private static function checkValidTimein($user_id)
    {
        try {
            $db = new database();
            if (self::checkDbStatus($db)) {
                $stmt = $db->getCon()->prepare(self::checkTimein(self::getDateCheck()));
                $stmt->execute(array($user_id));
                if (count($stmt->fetchAll()) <= 0) {
                    $db->close();
                    return 200;
                } else
                    return 404;
            }
        } catch (Exception $th) {
            return 501;
        }
    }
    private static function checkValidTimeout($user_id)
    {
        try {
            $db = new database();
            if (self::checkDbStatus($db)) {
                $stmt = $db->getCon()->prepare(self::checkTimeout(self::getDateCheck()));
                $stmt->execute(array($user_id));
                if (count($stmt->fetchAll()) > 0) {
                    $db->close();
                    return 200;
                } else
                    return 404;
            }
        } catch (Exception $th) {
            return 501;
        }
    }


    // Query
    private static function checkTimein($date)
    {
        return "SELECT * FROM `attendance` WHERE `created` LIKE '%" . $date . "%' AND `user_id` = ?";
    }
    private static function checkTimeout($date)
    {
        return "SELECT * FROM `attendance` WHERE `timeout` = '' AND `user_id` = ? AND `created` LIKE '%" . $date . "%'";
    }
    private static function timeinQuery()
    {
        return "INSERT INTO `attendance`(`timein`, `timeout`, `created`, `user_id`) VALUES (?,?,?,?)";
    }
    private static function timeoutQuery()
    {
        return "UPDATE `attendance` SET `timeout`=? WHERE `user_id` = ?";
    }
    private static function disable()
    {
        return "UPDATE `attendance` SET `flag`=0 WHERE `user_id` = ?";
    }
    private static function getDataQuery($date)
    {
        return "SELECT * FROM `attendance` WHERE `created` LIKE '%" . $date . "%' AND `user_id` = ?";
    }
}
