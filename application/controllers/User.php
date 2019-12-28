<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library( 'form_validation');
        $this->load->helper('url');

           }

	public function index()
	{

	}

	public function create_profile(){

//	    $image= $this->do_upload("");

        $data['image'] = null;
        $data['name'] = null;
        if ($this->input->post()){
            $data['image'] = $this->do_upload('image');
            $data["name"]=$_POST["name"];
        }
        $this->load->view('profile',$data);
    }

    public function do_upload($input_name)
    {
        //todo:set unique name to file
        $date = new DateTime();
        $startdata = $date->format('YmdHis');
        $newName = str_replace('/', '', $startdata) . 1;
        $config['file_name'] = $newName;
        $config['upload_path'] = 'application/assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
//        $config['max_size']             = 2048;
//        $config['max_width']            = 1920;
//        $config['max_height']           = 1080;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($input_name))
        {
            $error = array('error' => $this->upload->display_errors());
            return false;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $image = $data['upload_data']['file_name'];
            return $image;
        }
    }
}
