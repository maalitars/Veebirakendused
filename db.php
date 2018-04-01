<?php
/* Realiseerib andmebaasi */
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'accounts';

$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
Class Dtb
{
    private static $connection;
    /**
     * Dtb constructor.
     */
    public function __construct()
    {
    }
    /**
     * @return mixed
     */

    public function getConnection()
    {
        if (self::$connection===null){
            $data =file("dbFile.txt", true);
            self::$connection =  mysqli_connect(trim($data[0]), trim($data[1]), trim($data[2]), trim($data[3]));
        }
        return self::$connection;
    }

    public function isUser($uid, $ipaddr)
    {
        $query = mysqli_prepare(self::getConnection(), "SELECT * FROM  accounts.user WHERE accounts.user.fb_id = ? ;");
        mysqli_stmt_bind_param($query, 's', $uid);
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows>0) {
            mysqli_stmt_free_result($query);
            mysqli_stmt_close($query);
            mysqli_free_result($result);
            $query2 = mysqli_prepare($this->getConnection(), "
            UPDATE accounts.user_info AS B
            INNER JOIN accounts.user AS A ON A.k_id = B.k_id
            SET B.ip_addr = ?, B.lastLogin = CURRENT_TIMESTAMP 
            
            WHERE A.fb_id = ?;");
            mysqli_stmt_bind_param($query2, 'ss', $ipaddr, $uid);
            mysqli_stmt_execute($query2);
            mysqli_stmt_free_result($query2);
            mysqli_stmt_close($query2);
            return true;
        } else {
            mysqli_stmt_free_result($query);
            mysqli_stmt_close($query);
            mysqli_free_result($result);
            return false;
        }
    }
    public function insertUser($uid, $username, $email, $ipaddr)
    {
        $query = mysqli_prepare(self::getConnection(), "INSERT INTO  accounts.user VALUES (NULL , ?, ? ,? ) ");
        mysqli_stmt_bind_param($query, 'sss', $uid, $username, $email);
        mysqli_stmt_execute($query);
        mysqli_stmt_free_result($query);
        mysqli_stmt_close($query);
        $query2 = mysqli_prepare(self::getConnection(), "INSERT INTO accounts.user_info VALUES (? , CURRENT_TIMESTAMP , ?) ");
        mysqli_stmt_bind_param($query2, 'is', mysqli_insert_id(self::getConnection()), $ipaddr);
        mysqli_stmt_execute($query2);
        mysqli_stmt_free_result($query2);
        mysqli_stmt_close($query2);
        mkdir("uploads/" . $uid, 0777, true);
    }

}
