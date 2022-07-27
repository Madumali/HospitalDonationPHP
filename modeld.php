<?php

class Model
{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "db_hospital2";
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
        } catch (\Throwable $th) {
            //throw $th;
            echo "Connection error " . $th->getMessage();
        }
    }

    public function fetch()
    {
        $data = [];

        $query = "SELECT * FROM item_table INNER JOIN donation ON item_table.donationNum = donation.donation_id INNER JOIN  donor_all ON donation.donorName = `donor_all`.`donor_id` INNER JOIN `item_name` ON `item_table`.`item_name`= `item_name`.`code` WHERE `deleted`= 0 ORDER BY `item_id` DESC";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        
        return $data;
    }

    public function date_range($start_date, $end_date)
    {
        $data = [];

        if (isset($start_date) && isset($end_date)) {
            $query = "SELECT * FROM item_table INNER JOIN donation ON item_table.donationNum = donation.donation_id INNER JOIN  donor_all ON donation.donorName = `donor_all`.`donor_id` INNER JOIN `item_name` ON `item_table`.`item_name`= `item_name`.`code` WHERE (`receive_date` BETWEEN '$start_date' AND  '$end_date') AND `deleted`=0 ORDER BY `item_id` DESC ";
            if ($sql = $this->conn->query($query)) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    $data[] = $row;
                }
            }
        }

        return $data;
    }

    public function fetchd()
    {
        $data = [];

        $query = "SELECT * FROM `donor_all` WHERE `delete_status`= 0  ORDER BY donor_id DESC ";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        
        return $data;
    }

    public function date_ranged($start_dated, $end_dated)
    {
        $data = [];

        if (isset($start_dated) && isset($end_dated)) {
            $query = "SELECT * FROM `donor_all` WHERE (`reg_date` BETWEEN '$start_dated' AND  '$end_dated') AND `delete_status`=0";
            if ($sql = $this->conn->query($query)) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    $data[] = $row;
                }
            }
        }

        return $data;
 
 
    }



    public function teamname($type)
    {
        $data = [];
        $qry = "SELECT `don_team_name` FROM `donor` WHERE `don_team_name` IN(
            SELECT `don_team_name`FROM `donor` WHERE`donor_type`='$type' AND `status`= 0  GROUP BY `don_team_name` HAVING COUNT(*)>1
            ) AND `status`= 0 ORDER BY `donor_id` DESC LIMIT 1 ";;
           if ($sql = $this->conn->query($qry)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }


    public function fetch_user()
    {
        $data = [];

        $query = "SELECT * FROM `user` WHERE `deleted_user`=0 ORDER BY `uid` DESC";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        
        return $data;
    }


}