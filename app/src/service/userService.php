<?php
class userService
{
    public function login($data)
    {
        try {
            $db = new database();
            if (self::checkDbStatus($db)) {
                parse_str($data, $value);
                if (self::checkCredentials($value)) {
                    $stmt = $db->getCon()->prepare(self::loginQuery());
                    $stmt->execute(array($value["idnum"], md5(md5($value["password"]))));
                    if (count($stmt->fetchAll()) > 0) {
                        $db->close();
                        self::id($data);
                        return 200;
                    } else
                        return 404;
                } else
                    return 403;
            } else {
                return 501;
            }
        } catch (Exception $th) {
            return 501;
        }
    }
    public function register($data)
    {
        try {
            $db = new database();
            if (self::checkDbStatus($db)) {
                parse_str($data, $value);
                $stmt = $db->getCon()->prepare(self::registerQuery());
                $stmt->execute(array($value["idnum1"], md5(md5($value["password1"])), $value["address"], $value["email"], $value["contact"], $value["section"], self::getDate(), self::getDate(), "user"));
                $db->close();
                return 201;
            } else {
                return 501;
            }
        } catch (Exception $th) {
            return 501;
        }
    }
    public function update($data)
    {
        try {
            $db = new database();
            if (self::checkDbStatus($db)) {
                if ($_SESSION["current_id"] != 0) {
                    parse_str($data, $value);
                    $stmt = $db->getCon()->prepare(self::updateQuery());
                    $stmt->execute(array($value["idnum"], $value["address"], $value["email"], $value["contact"], $value["section"], self::getDate(), $_SESSION["current_id"]));
                    if (count($stmt->fetchAll()) > 0) {
                        $db->close();
                        return 200;
                    } else
                        return 404;
                } else
                    return 403;
            } else {
                return 501;
            }
        } catch (Exception $th) {
            return 501;
        }
    }
    public function disable($id)
    {
        try {
            $db = new database();
            if (self::checkDbStatus($db)) {
                if ($_SESSION["current_id"] != 0) {
                    $stmt = $db->getCon()->prepare(self::resetQuery());
                    $stmt->execute(array(md5(md5("password")), $id));
                    if (count($stmt->fetchAll()) > 0) {
                        $db->close();
                        return 200;
                    } else
                        return 404;
                } else
                    return 403;
            } else {
                return 501;
            }
        } catch (Exception $th) {
            return 501;
        }
    }
    public function close()
    {
        $_SESSION["tmp_open"] = 403;
        $_SESSION["tmp_close"] = 200;
        return 201;
    }
    public function open()
    {
        $_SESSION["tmp_open"] = 200;
        $_SESSION["tmp_close"] = 403;
        return 201;
    }
    public function getStatus()
    {
        return $_SESSION["tmp_open"];
    }
    public function getCurrentId()
    {
        return $_SESSION["current_id"] . "~" . attendanceService::getDataAttendance();
    }

    // Private Global Functions
    private static function checkDbStatus($db)
    {
        return $db->getStatus() == true ? true : false;
    }
    private static function getDate()
    {
        date_default_timezone_set('Asia/Manila');
        return date('m-d-Y');
    }
    private static function id($data)
    {
        try {
            $db = new database();
            if (self::checkDbStatus($db)) {
                parse_str($data, $value);
                $stmt = $db->getCon()->prepare(self::getId());
                $stmt->execute(array($value["idnum"], md5(md5($value["password"]))));
                $tmp = false;
                while ($res = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $_SESSION["current_id"] = $res['idnum'];
                    $tmp = true;
                }
                $db->close();
                return $tmp;
            } else {
                return false;
            }
        } catch (Exception $th) {
            return false;
        }
    }
    private static function checkCredentials($value)
    {
        if ($value["idnum"] != "" && $value["password"] != "")
            return true;
        else
            return false;
    }

    // Query
    private static function getId()
    {
        return "SELECT * FROM `users` WHERE `idnum` = ? AND `password` = ?";
    }
    private static function loginQuery()
    {
        return "SELECT * FROM `users` WHERE `idnum` = ? AND `password` = ? AND `flag` = 1";
    }
    private static function registerQuery()
    {
        return "INSERT INTO `users`(`idnum`, `password`, `address`, `email`, `contact`, `section`, `created`, `updated`, `type`) VALUES (?,?,?,?,?,?,?,?,?)";
    }
    private static function updateQuery()
    {
        return "UPDATE `users` SET `idnum`= ?,`address`= ?,`email`= ?,`contact`= ?,`section`= ?,`updated`= ? WHERE `id` = ?";
    }
    private static function resetQuery()
    {
        return "UPDATE `users` SET `password` = ? WHERE `id` = ?";
    }
    private static function disableQuery()
    {
        return "UPDATE `users` SET `flag`= 0 WHERE `id` = ?";
    }
}
