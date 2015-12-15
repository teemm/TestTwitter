<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index()
	{	
		if ($this->session->has_userdata('hidden')) {
			$this->site();
		}else{
			$this->login();
		}
	}
	public function site(){
		$this->lang->load('custom', $this->session->language);
		$this->load->library('pagination');
		$this->load->model('model');
		// $data['coment'] = $this->model->coments();
		$data['tweets'] = $this->model->postBar();

		$this->load->view('include/header');
		$this->load->view('index', $data);
		$this->navbar();
		$this->load->view('include/footer');
	}

	public function reg(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'მეილის', 'required|valid_email|callback_check_email');
		$this->form_validation->set_rules('fname', 'სახელი', 'trim|required|min_length[2]|max_length[100]');
		$this->form_validation->set_rules('lname', 'გვარი', 'trim|required|min_length[2]|max_length[100]');
		$this->form_validation->set_rules('password', 'პაროლის', 'required');
		$this->form_validation->set_rules('ConfirmPassword', 'პაროელის გამეორების', 'required|matches[password]');
		$this->form_validation->set_rules('gender', 'სქესის', 'required');
		$this->form_validation->set_rules('phone', 'ნომრის', 'required');
		$this->form_validation->set_rules('hiddenEmail', 'hiddenEmail', 'required');

		

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('msg_error','error');
			$this->load->view('login');
		}else{
		
			$this->load->model('model');
			$this->model->reg();
			redirect('main/index');
		}
	}
	public function check_email($value){
		if ($value == 'kverna133@gmail.com') {
			 $this->form_validation->set_message('check_email', 'The {field} is alredy ready');
             return FALSE;
		}else{
			return TRUE;
		}
		
	}
	// public function edit_postbar(){
		
	// }
	public function login(){
		$this->load->view('include/header');
		$this->load->view('login');
		$this->load->view('include/footer');

	}
	public function enter(){
		$this->load->model('Model');
		$this->Model->login();
		redirect(base_url());	
	}
	public function logOut(){
		$this->session->unset_userdata('hidden');
		redirect(base_url());
		
	}
	public function navbar(){
		$this->load->model('model');
		$data['navbar'] = $this->model->navbar();
		$this->load->view('nav', $data);

	}
	public function setLanguage($lang){
		$this->session->set_userdata('language', $lang);
		redirect('/Main/site');
	}
	public function info($id){
		$this->load->view('include/header');
		$this->load->view('nav');
		$this->load->model('model') ;
		$data['info'] = $this->model->selectId($id);
		$this->load->view('info',$data);
		$this->load->view('include/footer');
	}
	public function coments(){
 		$this->load->model('model');
		$data['coment'] = $this->model->coments();
		$this->load->view('postBar', $data);
 	}
 	public function insertComent(){
 		if (isset($_POST['coment'])){

			$this->load->library('form_validation');
			$this->form_validation->set_rules('content', 'კომენტარის', 'required');
			$this->load->model('model');
			$data['model'] = $this->model->addComent();
			redirect('main/index');
		}
 	}
	public function UploadPhoto(){
		if ( $_SERVER['REQUEST_METHOD'] != 'POST' && !empty($_POST) ){
			redirect('/main/index');
		}
			$config['upload_path']          = './uploads/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 2000;
	        // $config['max_width']            = 1024;
	        // $config['max_height']           = 768;

			$this->load->library('upload', $config);
			$imageName = '';

			 if ( ! $this->upload->do_upload('imageName'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        // $this->load->view('upload_form', $error);
                        print_r($error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $imageName = $data['upload_data']['file_name'];
                        // $this->load->view('upload_success', $data);
                        print_r($data);
                }
                $this->load->model('model');
				$data['model'] = $this->model->UploadPhoto($imageName);
			
		
	}
	public function addPosts(){

		if (isset($_POST['TweetsUpload']) || isset($_POST['content']))  {

			$this->load->library('form_validation');

			$this->form_validation->set_rules('content', 'თვითის', 'max_length[140]');
			

			if ($this->form_validation->run() === FALSE) {
				$this->session->set_flashdata('msg_error','error');
				$this->site();
			}else{
			
				$this->load->model('model');


				$config['upload_path']          = './uploads/';
		        $config['allowed_types']        = 'gif|jpg|png';
		        $config['max_size']             = 2000;
		        // $config['max_width']            = 1024;
		        // $config['max_height']           = 768;

				$this->load->library('upload', $config);
				$TweetsUpload = '';

				 if ( ! $this->upload->do_upload('TweetsUpload'))
	                {
	                        $error = array('error' => $this->upload->display_errors());

	                        // $this->load->view('upload_form', $error);
	                        print_r($error);
	                }
	                else
	                {
	                        $data = array('upload_data' => $this->upload->data());
	                        $TweetsUpload = $data['upload_data']['file_name'];
	                        // $this->load->view('upload_success', $data);
	                        print_r($data);
	                }
				$this->load->model('model');
				$data['model'] = $this->model->addPosts($TweetsUpload);
				redirect('main/index');
			}
		}
	}
	

}
