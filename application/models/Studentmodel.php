<?php
class Studentmodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
        public function addstudentdata($data)
    {
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d H:i:s");
        $data["created"] = $date;
        $this->load->database();
        $addresult = $this->db->insert('studentdata',$data);
        return $addresult;
    }

}
?>