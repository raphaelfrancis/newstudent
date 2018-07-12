<?php
class Studentcontroller extends CI_Controller
{
public function __constructor()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

    }


public function index()
{
	$this->load->view('addstudentdata');
	
}
public function addstudentdata()
{
    
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('studentname', 'Studentname', 'required');
    $this->form_validation->set_rules('studentage', 'Studentage', 'required');
    $this->form_validation->set_rules('studentgender', 'Studentgender', 'required');
    $this->form_validation->set_rules('studentaddress', 'Studentaddress', 'required');
    $this->form_validation->set_rules('studentrollno', 'Studentrollno', 'required');

    if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('studentregistration');
        }

    $this->load->model("Studentmodel");
    $this->load->helper(array('form', 'url'));
    $data = array();
    $data["name"] = trim(htmlentities($this->input->post('studentname')));
    $data["age"] = trim(htmlentities($this->input->post('studentage')));
    $data["gender"] = trim(htmlentities($this->input->post('studentgender')));
    $data["address"] = trim(htmlentities($this->input->post('studentaddress')));
    $data["rollno"] = trim(htmlentities($this->input->post('studentrollno')));
    //$data = array("name"=>$name,"age"=>$age,"gender"=>$gender,"address"=>$address,"rollno"=>$rollno);
    $insertdata = $this->Studentmodel->addstudentdata($data);
    echo json_encode($insertdata);
           
}

	
}
?>