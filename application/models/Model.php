<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 class Model extends CI_Model {
 	public function login(){

 		$this->db->select('email, password');
 		$this->db->from('users');
 		$this->db->where('email', $this->input->post('email', TRUE));
 		$this->db->where('password', sha1($this->input->post('password', TRUE)));
 		if ($this->db->count_all_results() > 0) {
 			$this->session->set_userdata('hidden', $this->input->post('hiddenEmail', TRUE));

 			$this->db->set('hiddenEmail', $this->input->post('hiddenEmail', TRUE));
 			$this->db->where('email' , $this->input->post('email', TRUE));
 			$this->db->update('users');
 		}

 	}
 	public function addComent(){
		$coment = htmlspecialchars($this->input->POST('coment', TRUE));
		$user_id = $this->myId();
		$tweet_id = htmlspecialchars($this->input->post('hiddenComent', TRUE));

		$this->db->set('user_id', $user_id);
		$this->db->set('content', $coment);
		$this->db->set('tweet_id', $tweet_id);
		$this->db->insert('tweetcoments');

 	}
 	public function reg(){
			$email = htmlspecialchars($this->input->POST('email', TRUE));
			$phone = htmlspecialchars($this->input->POST('phone', TRUE));
			$fname = htmlspecialchars($this->input->POST('fname', TRUE));
			$lname = htmlspecialchars($this->input->POST('lname', TRUE));
			$password =htmlspecialchars(sha1( $this->input->POST('password', TRUE)));
			$gender = htmlspecialchars($this->input->POST('gender', TRUE));
			$hiddenEmail = htmlspecialchars($this->input->POST('hiddenEmail', TRUE));

			

			//insert into news (title content) values ($title,$content);
			$this->db->set('email', $email);
			$this->db->set('phone', $phone);
			$this->db->set('fname', $fname);
			$this->db->set('lname', $lname);
			$this->db->set('password',$password);
			$this->db->set('gender', $gender);
			$this->db->set('hiddenEmail', $hiddenEmail);
			$this->db->insert('users');

			$this->session->set_userdata('hidden', $hiddenEmail);
 	}

 	public function navbar(){
 		$this->db->select('name');
 		$this->db->from('category');
 		$query = $this->db->get()->result_array();


 		if ($this->db->count_all_results()>0) {
 			return $query;
 		}
 	}
 	// public function edit_postbar($id){
 		
 	// }
 	public function postBar(){
 		$config['base_url'] = 'http://localhost/twitter/main/site/postbar';
		$config['total_rows'] = $this->db->count_all_results('tweets');
		$config['per_page'] = 5;
		$config['num_links'] = 1;

		$config['use_page_numbers'] = TRUE;
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"> <a href="#!">';
		$config['cur_tag_close'] = '</a></li>';


		$this->pagination->initialize($config); 


		$skip = $this->uri->segment(4);
 		$this->db->select('tweets.id, tweets.content, tweets.tweet_image_name, users.hiddenEmail, tweets.add_date, users.fname, users.lname, tweets.user_id');
 		$this->db->from('tweets');
 		$this->db->join('users', 'users.id = tweets.user_id' );
 		$this->db->order_by('id', 'desc');
 		$this->db->limit($config['per_page'], $skip);
 		$query = $this->db->get()->result_array();
 		foreach ($query as $key => $value) {
 			$query[$key]['comments']=$this->coments($value['id']);
 		}
 		if ($this->db->count_all_results()>0) {
	 	return $query;
 		}	
 	}
 	public function delete($id){
 		$this->db->where('id',$id);
 		$this->db->delete('tweets');

 		$this->db->where('tweet_id',$id);
 		$this->db->delete('tweetcoments');
 	}
 	public function Search($arg){
 		$this->db->select('fname, lname');
 		$this->db->like('fname', $arg);
 		return  $row = $this->db->get('users')->result_array();
 	}
 	public function coments($tweet_id){
 		 $this->db->select('tweets.id as tweetId, users.hiddenEmail, users.fname, users.lname, users.id as userId, tweetcoments.id as CommentId, tweetcoments.content, tweetcoments.user_id, tweetcoments.add_date');
	 	 $this->db->join('tweets', 'tweets.id = tweetcoments.tweet_id');
	 	 $this->db->join('users', 'users.id = tweetcoments.user_id');
	 	 $this->db->where('tweetcoments.tweet_id', $tweet_id);
		 $coment = $this->db->get('tweetcoments')->result_array();
		 return $coment;

 	}
 	public function selectId($user_id){
		$this->db->select('users.id, users.fname, users.image_name, users.phone, users.hiddenEmail, users.lname, users.gender, users.email, users.password, tweets.user_id');
		$this->db->from('users');
		$this->db->join('tweets', 'users.id = tweets.user_id');
		// $this->db->join('profile_pic', 'users.image_name = profile_pic.image');

		$this->db->where('tweets.user_id', $user_id);
		$info = $this->db->get()->row_array();
		return $info;
	}
	public function UploadPhoto($imageName){
		$this->db->set('image_name', $imageName);
		$this->db->insert('users_images');
		redirect('main/info');
	}
	// public function ProfileImages(){
	// 	$this->db->select('profile_pic.user_id, profile_pic.image, profile_pic.id, users.id');
	// 	// $this->db->where('user_id', $user_id);
	// 	$this->db->join('users', 'users.id = profile_pic.user_id');
	// 	$this->db->order_by('user_id', 'desc');
	// 	$pics = $this->db->get('profile_pic')->row_array();
	// 	return $pics;
	// }
	public function addPosts($TweetsUpload=''){
		$content = htmlspecialchars($this->input->POST('content', TRUE));
		$user_id = $this->myId();

		$this->db->set('tweet_image_name', $TweetsUpload);
		$this->db->set('content', $content);
		$this->db->set('user_id', $user_id);
		$this->db->insert('tweets');

	}
	public function myId(){
		return $this->db->select('id')->where('hiddenEmail',$this->session->hidden)->get('users')->result_array()[0]['id'];
	}
 }
 ?>