<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }

    function check_email($email)
	{
		$this->db->where('email', $email);
		$this->db->where('join_way', 'idpw');
        $query = $this->db->get('ol_user');
		if ($query->num_rows()>0)
			return $query->row_array();
		return 0;
	}
	
	function get_user($email, $pwd)
	{
		$this->db->where('email', $email);
		$this->db->where('pwd', md5($pwd));
        $query = $this->db->get('ol_user');
		return $query->result();
	}
	
	// get user
	function get_user_by_id($id)
	{
		$this->db->where('ol_user.id', $id);
		$this->db->join('ol_company', 'ol_company.ol_user_id = ol_user.id', 'left');
        $query = $this->db->get('ol_user');

		return $query->result();
	}

	function get_company ($where)
	{
		$this->db->where($where);
        $query = $this->db->get('ol_company');
		if ($query->num_rows()>0)
			return $query->row_array();
		return 0;		
	}

	function update_user($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('ol_user', $data);
	}

	function update_company($id, $data)
	{
		$this->db->where('ol_user_id', $id);
		return $this->db->update('ol_company', $data);
	}

	function insert_company($data)
	{
		return $this->db->insert('ol_company', $data);
	}
	
	// insert
	function insert_user($data)
    {
		if ($this->db->insert('ol_user', $data))
		{
			$record['id'] = $this->db->insert_id();

			$subscript['ol_user_id'] = $record['id'];
			$subscript['subscript_plan_id'] = $this->get_subscription_default()['id'];
			$subscript['subscript_date_from'] = date('Y-m-d H:i:s');
			$subscript['subscript_date_to'] = date('Y-m-d H:i:s', strtotime("+1 month", strtotime(date('Y-m-d H:i:s'))));
			$subscript['subscript_total_cnt'] = 50;
			$subscript['remaining_cnt'] = 1000000;
			$subscript['printed_cnt'] = 0;
			$subscript['status'] = 'active';
			$subscript['created'] = date('Y-m-d H:i:s');
			$subscript['activated'] = date('Y-m-d H:i:s');
			$subscript['modified'] = date('Y-m-d H:i:s');
			if ($this->insert_subcription($subscript))
				$record['success'] = true;
			else 
				$record['success'] = false;
		}
		else
			$record['success'] = false;
		return $record;
	}

	function insert_subcription($data)
	{
		$this->db->insert('subscript_list', $data);
		return true;
	}

	function get_subscription_default()
	{
		$this->db->where('is_default_yn', 'y');
        $query = $this->db->get('subscript_plan');
		if ($query->num_rows()>0)
			return $query->row_array();
		return 0;
	}

	function get_subcription($where){
		$this->db->where($where);
        $query = $this->db->get('subscript_list');
		if ($query->num_rows()>0)
			return $query->row_array();
		return 0;
	}

	function get_printed_cnt($userid){
		$query = $this->db->query('select sc.sc_market, count(*) as printed_cnt
									from sales_order so inner join sales_channel sc on so.sales_channel_id = sc.id
									where so.ol_user_id = '.$userid.'
									and exists (select 1 from print_list pl where so.id = pl.sales_order_id)
									group by sc.sc_market;');
		if ($query->num_rows()>0)
			return $query->result_array();
		return 0;
	}

	function get_graph($userid)
	{
		$query = $this->db->query('select DATE_FORMAT(created, "%M") as printed_month, count(*)
									from sales_order 
									where ol_user_id = '.$userid.'
									and print_status = "postprint"
									and created between date_sub(now(), interval 6 month) and now()
									group by printed_month
									order by created');
		if ($query->num_rows()>0)
			return $query->result_array();
		return array();
	}

	function send_email($to_email)
	{
		// iconv_set_encoding("internal_encoding", "UTF-8");
		$email_trim = explode("@", $this->input->post('email'));
		$username = $email_trim[0];
		$from_email = 'no-reply@onlabels.co.kr';
		$subject = 'Verify Your Email Address';
		$message = '<!DOCTYPE html ">
					<html>
					 <head>
					  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
					  <title>OnLabels Registration Confirmation</title>
					  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
					</head>
					<body style="margin: 0; padding: 0;">
					 <table border="0" cellpadding="0" cellspacing="0" width="100%">
					  <tr>
					   <td>
					     <table align="center" border="1" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
					       <tr>
					         <td align="center" bgcolor="#000" style="padding: 10px 0 10px 0;">
					          <img src="'.base_url("assets2/img/logo_white.png").'" alt="OnLabels" width="155" height="34" style="display: block;" />
					         </td>
					       </tr>
					       <tr>
					         <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
					           <table border="0" cellpadding="0" cellspacing="0" width="100%">
					            <tr>
					             <td>
					              안녕하세요 '.$username.' 님,
					             </td>
					            </tr>
					            <tr>
					             <td style="padding: 20px 0 30px 0;">
					              회원님의 인증을 위하여 아래의 링크를 클릭해 주세요. 
					              <br><br>
					              '.base_url("login/verify").'/'.md5($to_email).'
					             </td>
					            </tr>
					            <tr>
					             <td>
					              OnLabels
					             </td>
					            </tr>
					           </table>
					         </td>
					       </tr>
					       <tr>
					         <td bgcolor="#70bbd9" style="padding: 10px 10px 10px 10px;">
					           <table border="0" cellpadding="0" cellspacing="0" width="100%">
					             <td width="75%">
					              &reg; OnLabels © 2017 All rights reserved<br/>
					             </td>
					             <td align="right">
					              <table border="0" cellpadding="0" cellspacing="0">
					               <tr>
					                <td>
					                 <a href="http://www.kakao.com/">
					                  <img src="'.base_url("assets2/img/kakao_LOGO.png").'" alt="Kakao" width="30" height="30" style="display: block;" border="0" />
					                 </a>
					                </td>
					                <td style="font-size: 0; line-height: 0;" width="10">&nbsp;</td>
					                <td>
					                 <a href="http://www.facebook.com/">
					                  <img src="'.base_url("assets2/img/facebook_LOGO.png").'" alt="Facebook" width="30" height="30" style="display: block;" border="0" />
					                 </a>
					                </td>
					               </tr>
					              </table>
					             </td>
					           </table>
					         </td>
					       </tr>
					     </table>
					   </td>
					  </tr>
					 </table>
					</body>
					</html>';
		
		//configure email settings
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		// $config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$config['newline'] = "\r\n"; //use double quotes
		$this->email->initialize($config);
		
		//send mail
		$this->email->from($from_email, 'OnLabels');
		$this->email->to($to_email);
		$this->email->subject($subject);
		$this->email->message($message);
		return $this->email->send();
	}

	function verify_email($key)
	{
		$data = array('status' => 'active');
		$this->db->where('md5(email)', $key);
		return $this->db->update('ol_user', $data);
	}

	function is_verified($key)
	{
		$this->db->where('md5(email)', $key);
		$this->db->where('status', 'active');
        $query = $this->db->get('ol_user');
        // echo $this->db->last_query();
		if ($query->num_rows()>0)
			return true;
		return false;
	}
}