<?php
class crud
{
    private $db;
    function __construct($conn)
    {
        $this->db = $conn;
    }
    public function insertuser($first_name, $last_name, $email, $password, $id)
    {

        try {
            $res = $this->checkforemail($email);
            $reid = $this->checkforid($id);

            if ($res['num'] > 0 && $reid['num'] > 0) {
                return false;
            } else {
                $sql = "INSERT INTO users (first_name,last_name,email,password,ID) VALUES (:first_name,:last_name,:email,:password,:id)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':first_name', $first_name);
                $stmt->bindparam(':last_name', $last_name);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':password', $password);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true;
            }
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
            return false;
        }
    }
    public function getusername($email)
    {
        try {
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            return false;
        }
    }
    public function checkforemail($email)
    {

        try {
            $sql = "SELECT count(*) as num from users where email = :email ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (\Throwable $th) {
            return false;
        }
    }
    public function checkforid($id)
    {

        try {
            $sql = "SELECT count(*) as num from users where ID = :id ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (\Throwable $th) {
            return false;
        }
    }
    public function getusers()
    {
        try {
            $sql = "SELECT * FROM users";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt;
        } catch (\Throwable $th) {
            return false;
        }
    }
    public function getuserById($id)
    {
        try {
            $sql = "SELECT * FROM users WHERE ID = :id";  // Use a parameterized query
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);  // Bind the ID parameter to the query
            $stmt->execute();  // Execute the query
            return $stmt->fetch(PDO::FETCH_ASSOC);  // Return the result as an associative array
        } catch (\Throwable $th) {
            return false;  // Return false in case of error
        }
    }
    public function edituser($id, $fname, $lname, $rule)
    {
        try {
            $sql = "UPDATE users SET first_name = :fname , last_name = :lname,  rule = :rule WHERE ID = :id ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':fname', $fname);  // Bind the ID parameter to the query
            $stmt->bindParam(':lname', $lname);
            $stmt->bindParam(':rule', $rule, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
    public function deleteUser($id)
    {
        try {
            $sql = "DELETE FROM users WHERE ID = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (\Throwable $th) {
            return false;
        }
    }
    public function updatepass($id, $newpass)
    {
        try {
            $sql = "UPDATE users SET password = :password WHERE ID = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':password', $newpass, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (\Throwable $th) {
            error_log("Update Password Error: " . $th->getMessage());
            return false;
        }
    }
    public function getplaces()
    {
        try {
            $sql = "SELECT location_name FROM locations"; // Adjust table name if needed
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // returns array of associative arrays
        } catch (\Throwable $th) {
            return false;
        }
    }
    public function insertticket($date, $user_id, $location_id, $ticketid)
    {
        $sql = "INSERT INTO tickets (date, user_id, location_id, ticketid) 
                VALUES (:date, :user_id, :location_id, :ticketid)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':location_id', $location_id);
        $stmt->bindParam(':ticketid', $ticketid);
        return $stmt->execute();
    }


    public function getlocationid($location_name)
    {
        $sql = "SELECT location_id FROM locations WHERE location_name = :location";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':location', $location_name);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $row['location_id'] : null;
    }
    public function getticketbyuserid($id)
    {
        $sql = " SELECT 
            t.ID, t.Date, t.ticketid, u.first_name, l.location_name FROM tickets t
        JOIN users u ON t.user_id = u.id
        JOIN locations l ON t.location_id = l.location_id
        WHERE t.user_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt;
    }
    public function deleteticket($ticketid) {
        $sql = "DELETE FROM tickets WHERE ticketid = :ticketid";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':ticketid', $ticketid);
        return $stmt->execute();
    }
    public function insertpic($id, $imagepath, $location_id){
        $sql = "INSERT INTO photos (image, user_id, location_id) 
                VALUES (:image, :user_id, :location_id)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':image', $imagepath);
        $stmt->bindParam(':user_id', $id);
        $stmt->bindParam(':location_id', $location_id);
        $stmt->execute();
    }
    public function getimg($location_id){
        try {
            $sql = "SELECT image from photos WHERE location_id = :location_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':location_id', $location_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
           return false;
        }

    }
    
}
