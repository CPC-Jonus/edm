<?php
class adminService
{
    public function showUsers()
    {
        try {
            $db = new database();
            if (self::checkDbStatus($db)) {
                $stmt = $db->getCon()->prepare(self::loginQuery());
                $stmt->execute();
                return json_encode($stmt->fetchAll());
            } else {
                return 501;
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

    //Query
    private static function loginQuery()
    {
        return "SELECT u.id,u.idnum,u.section,a.timein,a.timeout FROM `users` u LEFT JOIN `attendance` a ON u.idnum = a.user_id WHERE u.flag = 1";
    }
}
