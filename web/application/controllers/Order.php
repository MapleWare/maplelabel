<?php
class Order extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','html'));
		$this->load->library('session');
		$this->load->database();
		$this->load->model('user_model');
		$this->load->model('order_model', 'orders');
		$this->load->model('printlabels_model', 'print_label');

		$this->load->library('fpdflibrary','fpdf');
	}
	
	function index()
	{
		if ($this->session->userdata('uid') !== null)
		{
			$details = $this->user_model->get_user_by_id($this->session->userdata('uid'));
			$data['uname'] = $details[0]->username;
			$data['uemail'] = $details[0]->email;
			$data['print_labels'] = $this->print_label->get_print_labels();
			$this->load->view('new_order_view', $data);	
		}
		else redirect(base_url());
	}


	public function generate() 
	{	
		$pdf = new tFPDF('L','mm','A4');
		$pdf->AddPage();
		$pdf->AddFont('NanumBarunGothic','','NanumBarunGothic.ttf',true);
		$pdf->AddFont('NanumBarunGothicBold','','NanumBarunGothicBold.ttf',true);
		$pdf->SetLineWidth(0.2);
		$pdf->SetFillColor(255);
		//$pdf->RoundedRect(8, 8, 132, 190, 0, 'DF'); // 


		// lines
		$pdf->SetLineWidth(0.7);
		$pdf->Line(13,13.5,13,19.5); // header line

		$pdf->SetDrawColor(169,169,169);
		$pdf->SetLineWidth(0.4);
		$pdf->Line(13,27,135,27); // top
		$pdf->Line(13,27,13,193); // left
		$pdf->Line(135,27,135,193); // right
		$pdf->Line(13,193,135,193); // bottom

		$pdf->Line(38,27,38,42); // first row
		$pdf->Line(95,27,95,42); 
		$pdf->Line(13,42,135,42); 

		$pdf->Line(13,72,135,72); // second row

		$pdf->Line(13,84,135,84); // third row
		$pdf->Line(38,72,38,84);
		$pdf->Line(70,72,70,84);
		$pdf->Line(95,72,95,84); 

		$pdf->Line(13,96,135,96); // fourth row
		$pdf->Line(38,84,38,96);

		$pdf->Line(38,96,38,111); // repeat first row
		$pdf->Line(95,96,95,111); 
		$pdf->Line(13,111,135,111); 

		$pdf->Line(13,141,135,141); // second row

		$pdf->Line(13,153,135,153); // third row
		$pdf->Line(38,141,38,153);
		$pdf->Line(70,141,70,153);
		$pdf->Line(95,141,95,153); 

		$pdf->Line(13,165,135,165); // fourth row
		$pdf->Line(38,153,38,165);


		$pdf->SetDrawColor(0);
		$pdf->SetLineWidth(0.2);
		$pdf->SetXY(13,14);
		$pdf->SetFont('Arial','B',20);
		$pdf->Cell(79,6,' AIR MAIL Small Packet',0,0,'L');

		$pdf->SetXY(13,32);
		$pdf->SetFont('Arial','B',18);
		$pdf->Cell(25,5,'FROM',0,1,'C');

		$pdf->SetXY(13,101);
		$pdf->SetFont('Arial','B',18);
		$pdf->Cell(25,5,'TO',0,1,'C');

		// custom text
		$pdf->SetXY(38,32);
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(57,5,'  ',0,1,'C');

		$pdf->SetXY(95,32);
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(40,5,'  ',0,1,'C');

		$pdf->SetXY(16,45);
		$pdf->SetFont('Arial','',16);
		$pdf->MultiCell(116,8,' 
		 ',0,'L');
		//$pdf->Cell(118,5,'Maplestore',1,1,'L');

		$pdf->SetXY(13,76);
		$pdf->SetFont('Arial','',14);
		$pdf->Cell(25,4,'Post Code',0,1,'C');

		$pdf->SetXY(38,76);
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(32,5,'  ',0,1,'C');

		$pdf->SetXY(70,76);
		$pdf->SetFont('Arial','',14);
		$pdf->Cell(25,4,'Country',0,1,'C');

		$pdf->SetXY(95,76);
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(40,5,'  ',0,1,'C');

		$pdf->SetXY(13,88);
		$pdf->SetFont('Arial','',14);
		$pdf->Cell(25,4,'TEL',0,1,'C');

		$pdf->SetXY(41,88);
		$pdf->Cell(91,4,'  ',0,1,'L');

		// second
		$pdf->SetXY(38,101);
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(57,5,'  ',0,1,'C');

		$pdf->SetXY(95,101);
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(40,5,'  ',0,1,'C');

		$pdf->SetXY(16,114);
		$pdf->SetFont('Arial','',16);
		$pdf->MultiCell(116,8,' 
		 ',0,'L');

		$pdf->SetXY(13,145);
		$pdf->SetFont('Arial','',14);
		$pdf->Cell(25,4,'Post Code',0,1,'C');

		$pdf->SetXY(38,145);
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(32,5,'  ',0,1,'C');

		$pdf->SetXY(70,145);
		$pdf->SetFont('Arial','',14);
		$pdf->Cell(25,4,'Country',0,1,'C');

		$pdf->SetXY(95,145);
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(40,5,'  ',0,1,'C');

		$pdf->SetXY(13,157);
		$pdf->SetFont('Arial','',14);
		$pdf->Cell(25,4,'TEL',0,1,'C');

		$pdf->SetXY(41,157);
		$pdf->Cell(91,4,' ',0,1,'L');


		////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////


		//reset 
		$pdf->SetLineWidth(0.2);
		$pdf->SetFillColor(255);
		//$pdf->RoundedRect(157, 8, 132, 190, 0, 'DF');

		// vertical line
		$pdf->SetLineWidth(0.7);
		$pdf->Line(162,13.5,162,24.5);

		$pdf->SetXY(162,13);
		$pdf->SetFont('Arial','B',20);
		$pdf->Cell(37,6,' CUSTOMS',0,0,'L');
		$pdf->SetXY(162,19.5);
		$pdf->Cell(53,6,' DECLARATION',0,0,'L');

		$pdf->SetXY(162,26);
		$pdf->SetFont('NanumBarunGothic','',16);
		$pdf->Cell(27,6,' 세관신고서',0,0,'L');

		$pdf->SetXY(192,13);
		$pdf->SetFont('Arial','B',35);
		$pdf->Cell(96,12,'CN22 ',0,1,'R');

		// vertical line
		$pdf->Line(162,38,162,40.5);

		$pdf->SetXY(162,37.5);
		$pdf->SetFont('NanumBarunGothic','',10);
		$pdf->Cell(39,4,' May be opened officialy',0,1,'L');
		$pdf->SetXY(162,42);
		$pdf->Cell(38,4,' 공개적으로 개봉될 수 있음',0,0,'L');

		// table
		$pdf->SetDrawColor(169,169,169);
		$pdf->SetLineWidth(0.4);
		$pdf->Line(162,49,284,49); // top
		$pdf->Line(162,49,162,193); // left
		$pdf->Line(162,193,284,193); // bottom
		$pdf->Line(284,49,284,193); // right

		$pdf->Line(162,64,284,64); // 1st row
		$pdf->Line(236,49,236,56); // 1st row vertical line
		$pdf->Line(162,78,284,78); // 2nd row 
		$pdf->Line(162,93,284,93); // 3rd row

		$pdf->Line(236,78,236,148); // 3rd row vertical line A
		$pdf->Line(260,78,260,148); // 3rd row vertical line B

		$pdf->Line(162,108,284,108); // 4th row
		$pdf->Line(162,131,284,131); // 5th row
		$pdf->Line(162,148,284,148); // 6th row
		//$pdf->Line(161,183,283,183); // 7th row


		$pdf->SetDrawColor(0);
		$pdf->SetLineWidth(0.2);

		$pdf->SetXY(163,49);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(45,7,'Designated operator',0,0,'L');
		$pdf->SetXY(237,50.5);
		$pdf->SetFont('Arial','B',10);
		$pdf->MultiCell(27,4,'Important! See instructions on the back',0,'L');

		// table 2nd line
		$pdf->SetDrawColor(169,169,169);
		$pdf->SetTextColor(68,68,68);
		$pdf->SetXY(169,66);
		$pdf->SetFont('NanumBarunGothicBold','',10);
		$pdf->Cell(17,5,'Gift(선물)',0,0,'L');
		// checkbox
		$pdf->Line(164,65.5,169,65.5); // top
		$pdf->Line(164,70.5,169,70.5); // bottom
		$pdf->Line(164,65.5,164,70.5); // left
		$pdf->Line(169,65.5,169,70.5); // right

		$pdf->SetXY(169,72);
		$pdf->Cell(29,5,'Documents(서류)',0,0,'L');
		// checkbox
		$pdf->Line(164,71.5,169,71.5); // top
		$pdf->Line(164,76.5,169,76.5); // bottom
		$pdf->Line(164,71.5,164,76.5); // left
		$pdf->Line(169,71.5,169,76.5); // right

		$pdf->SetXY(226,66);
		$pdf->Cell(49,5,'Commercial Sample(상업샘플)',0,0,'L');
		// checkbox
		$pdf->Line(221,65.5,226,65.5); // top
		$pdf->Line(221,70.5,226,70.5); // bottom
		$pdf->Line(221,65.5,221,70.5); // left
		$pdf->Line(226,65.5,226,70.5); // right

		$pdf->SetXY(226,72);
		$pdf->Cell(20,5,'Other(기타)',0,0,'L');
		// checkbox
		$pdf->Line(221,71.5,226,71.5); // top
		$pdf->Line(221,76.5,226,76.5); // bottom
		$pdf->Line(221,71.5,221,76.5); // left
		$pdf->Line(226,71.5,226,76.5); // right

		// table 3rd line
		$pdf->SetXY(163,79);
		$pdf->SetFont('NanumBarunGothic','',10);
		$pdf->MultiCell(72,4,'Quantity and detailed description of contents(1)',0,'L');
		$pdf->SetXY(163,87);
		$pdf->SetFont('NanumBarunGothic','',9);
		$pdf->Cell(72,4.5,'내용증명, 수량 등 자세한 설명',0,0,'L');

		$pdf->SetXY(238,79);
		$pdf->SetFont('NanumBarunGothic','',10);
		$pdf->MultiCell(20,4,'Weight    (in kg)(2)',0,'C');
		$pdf->SetXY(238,87.5);
		$pdf->SetFont('NanumBarunGothic','',9);
		$pdf->Cell(20,3,'무게',0,0,'C');

		$pdf->SetXY(262,79);
		$pdf->SetFont('NanumBarunGothic','',10);
		$pdf->MultiCell(20,4,'Value (3)',0,'C');
		$pdf->SetXY(262,83.5);
		$pdf->SetFont('NanumBarunGothic','',9);
		$pdf->Cell(20,3,'가격',0,0,'C');
		// table 4th line 
		// blank

		// table 5th line
		$pdf->SetXY(163,109);
		$pdf->SetFont('NanumBarunGothic','',10);
		$pdf->MultiCell(72,4,'For commercial items only if know, HS tarif number(4) and country of origin of goods(5)',0,'L');
		$pdf->SetXY(163,121);
		$pdf->SetFont('NanumBarunGothic','',9);
		$pdf->MultiCell(72,4,'상업물품인 경우 원산지 및 HS코드(상품분류번호) 기입 ',0,'L');

		$pdf->SetXY(238,109);
		$pdf->SetFont('NanumBarunGothic','',10);
		$pdf->MultiCell(20,4,'Total Weight (in kg)(6)',0,'C');
		$pdf->SetXY(238,121.5);
		$pdf->SetFont('NanumBarunGothic','',9);
		$pdf->Cell(20,3,'총무게',0,0,'C');

		$pdf->SetXY(262,109);
		$pdf->SetFont('NanumBarunGothic','',10);
		$pdf->MultiCell(20,4,'Total Value (7)',0,'C');
		$pdf->SetXY(262,117.5);
		$pdf->SetFont('NanumBarunGothic','',9);
		$pdf->Cell(20,3,'총가격',0,0,'C');

		//$pdf->SetStyle("p","courier","N",12,"10,100,250",15);


		// table 6th line
		$pdf->SetXY(163,149);
		$pdf->SetFont('NanumBarunGothic','',11);
		$pdf->MultiCell(120,4.2,'I. the undersinged, whose name and address are given on the item, ceritify that the particulars given in this declaration are correct and that this item dose not contain any dangerous article or articles prohibited by legislation or by postal or customs regulations',0,'L');
		$pdf->SetXY(163,172);
		$pdf->MultiCell(120,4.5,'신고 서에 시고한 물품이 정확하며, 법류, 유편 및 관세법에 규정된 금지물품이나 위험물품을 포함하지 않음을 증명합니다',0,'L');
		$pdf->SetXY(163,184.5);
		$pdf->SetTextColor(0);
		$pdf->SetFont('Arial','B',17);
		$pdf->MultiCell(120,5,'Date and senders signature(8)',0,'L');

		$pdf->Output('form1.pdf','I');

	}

	public function ajax_list()
    {
        $list = $this->orders->get_orders();       
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $orders) {
       // print_r($data);die;
        $no++;
        $row = array();
        //$row[] = '<input type="checkbox" value="'.$orders->sc_ordered_id.'" class="form-group tick">';
        $row[] = '<input type="checkbox" id="'.$no.'" value="'.$orders->sc_ordered_id.'" class="form-group tick">';
        $row[] = substr($orders->sc_ordered_id, -7);
        $row[] = date("Y.m.d h:i A",strtotime($orders->ordered_date));
        
        $row[] = $orders->sc_market;
        
        $row[] = $orders->order_title."<br>수량 : ".$orders->cnt."개 <br>가격 : ".$orders->amount.
        '<br><br><a class="collapse_tbl" role="button" data-toggle="collapse" href="#no'.$no.'" aria-expanded="false" aria-controls="#'.$no.'">
													<span class="fa fa-caret-right"> </span> 배송정보
												</a>
												<div class="collapse out" id="no'.$no.'">
													주문자	:  '.$orders->seller_first_name.' '.$orders->seller_last_name.' <br/>
													연략처   :  - <br/>
													Email  : - <br/>
													주소<br/>
														 '.$orders->seller_street1.' <br/>
														 '.$orders->seller_street2.'<br/>
														 '.$orders->seller_country.'<br/>
													</div>';
        
        $row[] = $orders->order_user_name."<br>"."피드백 : ".$orders->feedback_score."점 주문수 : ".$orders->cnt."회";
        $row[] = '<span><a href=""><img src="'.base_url("assets2/img/icon-1.png").'"></a></span>
				  <span><a href=""><img src="'.base_url("assets2/img/icon-2.png").'"></a></span>
				  <span><a href=""><img src="'.base_url("assets2/img/icon-3.png").'"></a></span>';

        $data[] = $row;

        //$_POST['draw']='';
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->orders->count_all(),
            "recordsFiltered" => $this->orders->count_filtered(),
            "data" => $data,
        );
        //output to json format
       echo json_encode($output);
    }


}