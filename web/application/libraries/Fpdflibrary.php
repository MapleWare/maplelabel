<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'third_party/fpdf/tfpdf.php';

class Fpdflibrary extends tFPDF {

    // public function __construct() {
        
    //     //$pdf = new tFPDF();
    //     // $pdf->AddPage();
    //     // $CI =& get_instance();
    //     // $CI->fpdf = $pdf;
    // }

    function __construct($orientation='P', $unit='mm', $size='A4')
    {
        parent::__construct($orientation, $unit, $size);
    }

    function pdf1x1($pdf, $order)
    {
        $pdf->AddPage();    
        $pdf->AddFont('NanumBarunGothic','','NanumBarunGothic.ttf',true);
        $pdf->AddFont('NanumBarunGothicBold','','NanumBarunGothicBold.ttf',true);
        $pdf->SetLineWidth(0.2);
        $pdf->SetFillColor(255);
        $pdf->RoundedRect(8, 8, 132, 190, 0, 'DF'); // 

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
        $pdf->Cell(57,5,$order['seller_company_name'],0,1,'C');

        $pdf->SetXY(95,32);
        $pdf->SetFont('Arial','B',16);

        $seller_country_code = 'KR';
        if (strtolower($order['seller_country']) !== 'south korea')
            $seller_country_code = $order['seller_country'];
        $pdf->Cell(40,5,$seller_country_code,0,1,'C');

        $pdf->SetXY(16,45);
        $pdf->SetFont('Arial','',16);

if (!empty($order['seller_street2'])) :
        $pdf->MultiCell(116,8,$order['seller_street1'].'
'.$order['seller_street2'].'
'.$order['seller_city'].' '.$order['seller_stateorprovice'],0,'L');
else :
            $pdf->MultiCell(116,8,$order['seller_street1'].'
'.$order['seller_city'].' '.$order['seller_stateorprovice'],0,'L');
endif;
        //$pdf->Cell(118,5,'Maplestore',1,1,'L');

        $pdf->SetXY(13,76);
        $pdf->SetFont('Arial','',14);
        $pdf->Cell(25,4,'Post Code',0,1,'C');

        $pdf->SetXY(38,76);
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(32,5,$order['seller_postal_code'],0,1,'C');

        $pdf->SetXY(70,76);
        $pdf->SetFont('Arial','',14);
        $pdf->Cell(25,4,'Country',0,1,'C');

        $pdf->SetXY(95,76);
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,5,$order['seller_country'],0,1,'C');

        $pdf->SetXY(13,88);
        $pdf->SetFont('Arial','',14);
        $pdf->Cell(25,4,'TEL',0,1,'C');

        $pdf->SetXY(41,88);
        $pdf->Cell(91,4,$order['seller_phone_no'],0,1,'L');

        // second
        $pdf->SetXY(38,101);
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(57,5,$order['name'],0,1,'C');

        $pdf->SetXY(95,101);
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,5,$order['country_code'],0,1,'C');


        $pdf->SetXY(16,114);
        $pdf->SetFont('Arial','',16);

if (!empty($order['street2'])) :
        $pdf->MultiCell(116,8,$order['street1'].'
'.$order['street2'].'
'.$order['city_name'].' '.$order['stateorprovince'],0,'L');
else :
            $pdf->MultiCell(116,8,$order['street1'].'
'.$order['city_name'].' '.$order['stateorprovince'],0,'L');
endif;
        $pdf->SetXY(13,145);
        $pdf->SetFont('Arial','',14);
        $pdf->Cell(25,4,'Post Code',0,1,'C');

        $pdf->SetXY(38,145);
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(32,5,$order['postal_code'],0,1,'C');

        $pdf->SetXY(70,145);
        $pdf->SetFont('Arial','',14);
        $pdf->Cell(25,4,'Country',0,1,'C');

        $pdf->SetXY(95,145);
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,5,$order['country_name'],0,1,'C');

        $pdf->SetXY(13,157);
        $pdf->SetFont('Arial','',14);
        $pdf->Cell(25,4,'TEL',0,1,'C');

        $pdf->SetXY(41,157);
        $pdf->Cell(91,4,$order['shipto_phone_no'],0,1,'L');


        ////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////


        //reset 
        $pdf->SetLineWidth(0.2);
        $pdf->SetFillColor(255);
        $pdf->RoundedRect(157, 8, 132, 190, 0, 'DF');

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

        // text for quantiy
        $pdf->SetFont('NanumBarunGothicBold','',9);
        $pdf->SetXY(164,95);
        $pdf->MultiCell(70,11,$order['cnt'].'x '.$order['order_title'],0,'L');

        $pdf->SetXY(238,79);
        $pdf->SetFont('NanumBarunGothic','',10);
        $pdf->MultiCell(20,4,'Weight    (in kg)(2)',0,'C');
        $pdf->SetXY(238,87.5);
        $pdf->SetFont('NanumBarunGothic','',9);
        $pdf->Cell(20,3,'무게',0,0,'C');

        // text for weight
        $pdf->SetFont('NanumBarunGothicBold','',9);
        $pdf->SetXY(238,95);
        $pdf->MultiCell(20,11,$order['item_weight'].' '.$order['item_weight_unit'],0,'C');

        $pdf->SetXY(262,79);
        $pdf->SetFont('NanumBarunGothic','',10);
        $pdf->MultiCell(20,4,'Value (3)',0,'C');
        $pdf->SetXY(262,83.5);
        $pdf->SetFont('NanumBarunGothic','',9);
        $pdf->Cell(20,3,'가격',0,0,'C');
        // table 4th line 
        
        // text for price
        $pdf->SetFont('NanumBarunGothicBold','',9);
        $pdf->SetXY(262,95);
        $pdf->MultiCell(20,11,$order['item_price'].' '.$order['item_price_currency'],0,'C');

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

        // text for total weight
        $pdf->SetFont('NanumBarunGothicBold','',9);
        $pdf->SetXY(238,133);
        $pdf->MultiCell(20,13,number_format(($order['cnt'] * $order['item_weight']),2).' '.$order['item_weight_unit'],0,'C');

        $pdf->SetXY(262,109);
        $pdf->SetFont('NanumBarunGothic','',10);
        $pdf->MultiCell(20,4,'Total Value (7)',0,'C');
        $pdf->SetXY(262,117.5);
        $pdf->SetFont('NanumBarunGothic','',9);
        $pdf->Cell(20,3,'총가격',0,0,'C');

        // text for total price
        $pdf->SetFont('NanumBarunGothicBold','',9);
        $pdf->SetXY(262,133);
        $pdf->MultiCell(20,13,number_format(($order['cnt'] * $order['item_price']),2).' '.$order['item_price_currency'],0,'C');

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
    }

    function pdf1x2($pdf, $order)
    {
        $pdf->AddPage();
        $pdf->SetAutoPageBreak(false);
        $pdf->AddFont('NanumBarunGothic','','NanumBarunGothic.ttf',true);
        $pdf->AddFont('NanumBarunGothicBold','','NanumBarunGothicBold.ttf',true);

        $this->createAirMail2Form(0, $pdf, $order);
        $this->createAirMail2Form(146, $pdf, $order);

        $this->createCustomsDeclaration2Form(0, $pdf, $order);
        $this->createCustomsDeclaration2Form(146, $pdf, $order);
    }

    function createAirMail2Form($xToAdd = 0, $pdf, $order)
    {
        $pdf->SetDrawColor(0);
        $pdf->SetLineWidth(0.2);
        $pdf->SetFillColor(255);
        $pdf->RoundedRect(8, 8+$xToAdd, 95, 135, 0, 'DF'); // 
        // lines
        $pdf->SetLineWidth(0.5);
        $pdf->Line(12,11+$xToAdd,12,15+$xToAdd); // header line
        $pdf->SetDrawColor(169,169,169);
        $pdf->SetLineWidth(0.4);
        $pdf->Line(12,20+$xToAdd,99,20+$xToAdd); // top
        $pdf->Line(12,20+$xToAdd,12,141+$xToAdd); // left
        $pdf->Line(99,20+$xToAdd,99,141+$xToAdd); // right
        $pdf->Line(12,141+$xToAdd,99,141+$xToAdd); // bottom
        $pdf->Line(12,31+$xToAdd,99,31+$xToAdd); // first row
        $pdf->Line(30,20+$xToAdd,30,31+$xToAdd); 
        $pdf->Line(70,20+$xToAdd,70,31+$xToAdd); 
        $pdf->Line(12,53+$xToAdd,99,53+$xToAdd); // second row
        $pdf->Line(12,62+$xToAdd,99,62+$xToAdd); // third row
        $pdf->Line(30,53+$xToAdd,30,62+$xToAdd);
        $pdf->Line(53,53+$xToAdd,53,62+$xToAdd);
        $pdf->Line(70,53+$xToAdd,70,62+$xToAdd); 
        $pdf->Line(12,71+$xToAdd,99,71+$xToAdd); // fourth row
        $pdf->Line(30,62+$xToAdd,30,71+$xToAdd);
        $pdf->Line(12,82+$xToAdd,99,82+$xToAdd); // repeat first row
        $pdf->Line(30,71+$xToAdd,30,82+$xToAdd); 
        $pdf->Line(70,71+$xToAdd,70,82+$xToAdd);
        $pdf->Line(12,104+$xToAdd,99,104+$xToAdd); // second row
        $pdf->Line(12,113+$xToAdd,99,113+$xToAdd); // third row
        $pdf->Line(30,104+$xToAdd,30,113+$xToAdd);
        $pdf->Line(53,104+$xToAdd,53,113+$xToAdd);
        $pdf->Line(70,104+$xToAdd,70,113+$xToAdd); 
        $pdf->Line(12,122+$xToAdd,99,122+$xToAdd); // fourth row
        $pdf->Line(30,113+$xToAdd,30,122+$xToAdd);

        $pdf->SetDrawColor(0);
        $pdf->SetLineWidth(0.2);
        $pdf->SetXY(13,11.5+$xToAdd);
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(60,4,'AIR MAIL Small Packet',0,0,'L');
        $pdf->SetXY(12,23.5+$xToAdd);
        $pdf->SetFont('Arial','B',13);
        $pdf->Cell(18,4,'FROM',0,1,'C');
        $pdf->SetXY(12,74.5+$xToAdd);
        $pdf->SetFont('Arial','B',13);
        $pdf->Cell(18,4,'TO',0,1,'C');
        // custom text
        $pdf->SetXY(30,23.5+$xToAdd);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,4,$order['seller_company_name'],0,1,'C');
        $pdf->SetXY(70,23.5+$xToAdd);
        $pdf->SetFont('Arial','B',12);
        $seller_country_code = 'KR';
        if (strtolower($order['seller_country']) !== 'south korea')
            $seller_country_code = $order['seller_country'];
        $pdf->Cell(29,4,$seller_country_code,0,1,'C');
        $pdf->SetXY(14,33+$xToAdd);
        $pdf->SetFont('Arial','',11);

        if (!empty($order['seller_street2'])) :
        $pdf->MultiCell(83,5,$order['seller_street1'].'
'.$order['seller_street2'].'
'.$order['seller_city'].' '.$order['seller_stateorprovice'],0,'L');
        else :
        $pdf->MultiCell(83,5,$order['seller_street1'].'
'.$order['seller_city'].' '.$order['seller_stateorprovice'],0,'L');
        endif;

        $pdf->SetXY(12,56+$xToAdd);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(18,3,'Post Code',0,1,'C');
        $pdf->SetXY(30,56+$xToAdd);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(23,3,$order['seller_postal_code'],0,1,'C');
        $pdf->SetXY(53,56+$xToAdd);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(17,3,'Country',0,1,'C');
        $pdf->SetXY(70,56+$xToAdd);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(29,3,$order['seller_country'],0,1,'C');
        $pdf->SetXY(12,65+$xToAdd);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(18,3,'TEL',0,1,'C');
        $pdf->SetXY(32,65+$xToAdd);
        $pdf->Cell(65,3,$order['seller_phone_no'],0,1,'L');
        // second
        $pdf->SetXY(30,74.5+$xToAdd);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,4,$order['name'],0,1,'C');
        $pdf->SetXY(70,74.5+$xToAdd);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(29,4,$order['country_code'],0,1,'C');
        $pdf->SetXY(14,84+$xToAdd);
        $pdf->SetFont('Arial','',11);

        if (!empty($order['street2'])) :
        $pdf->MultiCell(83,5,$order['street1'].'
'.$order['street2'].'
'.$order['city_name'].' '.$order['stateorprovince'],0,'L');
        else :
        $pdf->MultiCell(83,5,$order['street1'].'
'.$order['city_name'].' '.$order['stateorprovince'],0,'L');
        endif;
        $pdf->SetXY(12,107+$xToAdd);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(18,3,'Post Code',0,1,'C');
        $pdf->SetXY(30,107+$xToAdd);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(23,3,$order['postal_code'],0,1,'C');
        $pdf->SetXY(53,107+$xToAdd);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(17,3,'Country',0,1,'C');
        $pdf->SetXY(70,107+$xToAdd);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(29,3,$order['country_name'],0,1,'C');
        $pdf->SetXY(12,116+$xToAdd);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(18,3,'TEL',0,1,'C');
        $pdf->SetXY(32,116+$xToAdd);
        $pdf->Cell(65,3,$order['shipto_phone_no'],0,1,'L');
    }

    function createCustomsDeclaration2Form($yToAdd = 0, $pdf, $order)
    {
        $pdf->SetDrawColor(0);
        $pdf->SetLineWidth(0.2);
        $pdf->SetFillColor(255);
        $pdf->RoundedRect(107, 8+$yToAdd, 95, 135, 0, 'DF');
        // vertical line
        $pdf->SetLineWidth(0.5);
        $pdf->Line(111,12+$yToAdd,111,20+$yToAdd);
        $pdf->Line(111,29+$yToAdd,111,31+$yToAdd);
        $pdf->SetLineWidth(0.2);
        $pdf->SetXY(111.5,12+$yToAdd);
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(26,4,'CUSTOMS',0,0,'L');
        $pdf->SetXY(111.5,16.5+$yToAdd);
        $pdf->Cell(37,4,'DECLARATION',0,0,'L');
        $pdf->SetXY(111,21+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',11);
        $pdf->Cell(20,4,'세관신고서',0,0,'L');
        $pdf->SetXY(111,12+$yToAdd);
        $pdf->SetFont('Arial','B',25);
        $pdf->Cell(88,7,'CN22',0,1,'R');
        $pdf->SetXY(111,28.5+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',8);
        $pdf->Cell(32,3,'May be opened officialy',0,1,'L');
        $pdf->SetXY(111,32+$yToAdd);
        $pdf->Cell(31,3,'공개적으로 개봉될 수 있음',0,0,'L');
        // table
        $pdf->SetDrawColor(169,169,169);
        $pdf->SetLineWidth(0.4);
        $pdf->Line(111,37+$yToAdd,198,37+$yToAdd); // top
        $pdf->Line(111,37+$yToAdd,111,140+$yToAdd); // left
        $pdf->Line(111,140+$yToAdd,198,140+$yToAdd); // bottom
        $pdf->Line(198,37+$yToAdd,198,140+$yToAdd); // right
        $pdf->Line(111,49+$yToAdd,198,49+$yToAdd); // 1st row
        $pdf->Line(164,37+$yToAdd,164,43+$yToAdd); // 1st row vertical line
        $pdf->Line(111,59+$yToAdd,198,59+$yToAdd); // 2nd row 
        $pdf->Line(111,70+$yToAdd,198,70+$yToAdd); // 3rd row
        $pdf->Line(164,59+$yToAdd,164,114+$yToAdd); // 3rd row vertical line A
        $pdf->Line(181,59+$yToAdd,181,114+$yToAdd); // 3rd row vertical line B
        $pdf->Line(111,85+$yToAdd,198,85+$yToAdd); // 4th row
        $pdf->Line(111,102+$yToAdd,198,102+$yToAdd); // 5th row
        $pdf->Line(111,114+$yToAdd,198,114+$yToAdd); // 6th row
        $pdf->SetDrawColor(0);
        $pdf->SetLineWidth(0.2);
        $pdf->SetXY(111,38+$yToAdd);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(33,3,'Designated operator',0,0,'L');
        $pdf->SetXY(164.5,38+$yToAdd);
        $pdf->SetFont('Arial','B',8);
        $pdf->MultiCell(27,3,'Important! See instructions on the back',0,'L');
        // table 2nd line
        $pdf->SetDrawColor(169,169,169);
        $pdf->SetTextColor(68,68,68);
        $pdf->SetXY(116,50.5+$yToAdd);
        $pdf->SetFont('NanumBarunGothicBold','',8);
        $pdf->Cell(14,3,'Gift(선물)',0,0,'L');
        // // checkbox
        $pdf->Line(113,50.5+$yToAdd,116,50.5+$yToAdd); // top
        $pdf->Line(113,53.5+$yToAdd,116,53.5+$yToAdd); // bottom
        $pdf->Line(113,50.5+$yToAdd,113,53.5+$yToAdd); // left
        $pdf->Line(116,50.5+$yToAdd,116,53.5+$yToAdd); // right
        $pdf->SetXY(116,54.5+$yToAdd);
        $pdf->Cell(24,3,'Documents(서류)',0,0,'L');
        // // checkbox
        $pdf->Line(113,54.5+$yToAdd,116,54.5+$yToAdd); // top
        $pdf->Line(113,57.5+$yToAdd,116,57.5+$yToAdd); // bottom
        $pdf->Line(113,54.5+$yToAdd,113,57.5+$yToAdd); // left
        $pdf->Line(116,54.5+$yToAdd,116,57.5+$yToAdd); // right
        $pdf->SetXY(152,50.5+$yToAdd);
        $pdf->Cell(40,3,'Commercial Sample(상업샘플)',0,0,'L');
        // // checkbox
        $pdf->Line(149,50.5+$yToAdd,152,50.5+$yToAdd); // top
        $pdf->Line(149,53.5+$yToAdd,152,53.5+$yToAdd); // bottom
        $pdf->Line(149,50.5+$yToAdd,149,53.5+$yToAdd); // left
        $pdf->Line(152,50.5+$yToAdd,152,53.5+$yToAdd); // right
        $pdf->SetXY(152,54.5+$yToAdd);
        $pdf->Cell(17,3,'Other(기타)',0,0,'L');
        // // checkbox
        $pdf->Line(149,54.5+$yToAdd,152,54.5+$yToAdd); // top
        $pdf->Line(149,57.5+$yToAdd,152,57.5+$yToAdd); // bottom
        $pdf->Line(149,54.5+$yToAdd,149,57.5+$yToAdd); // left
        $pdf->Line(152,54.5+$yToAdd,152,57.5+$yToAdd); // right
        // table 3rd line
        $pdf->SetXY(111.5,60+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',8);
        $pdf->MultiCell(53,3,'Quantity and detailed description
    of contents(1)',0,'L');

        $pdf->SetXY(113,74+$yToAdd);
        $pdf->SetFont('NanumBarunGothicBold','',7);
        $pdf->MultiCell(49,4,$order['cnt'].'x '.$order['order_title'],0,'L');

        $pdf->SetXY(111.5,66.3+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',7);
        $pdf->Cell(53,3,'내용증명, 수량 등 자세한 설명',0,0,'L');
        $pdf->SetXY(164,60+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',8);
        $pdf->MultiCell(17,3,'Weight    (in kg)(2)',0,'C');

        $pdf->SetXY(165,74+$yToAdd);
        $pdf->SetFont('NanumBarunGothicBold','',7);
        $pdf->MultiCell(15,3,$order['item_weight'].' '.$order['item_weight_unit'],0,'C');

        $pdf->SetXY(164,66.3+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',7);
        $pdf->Cell(17,3,'무게',0,0,'C');
        $pdf->SetXY(181,60+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',8);
        $pdf->MultiCell(17,3,'Value (3)',0,'C');
        $pdf->SetXY(181,63.3+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',7);
        $pdf->Cell(17,3,'가격',0,0,'C');

        $pdf->SetXY(182,74+$yToAdd);
        $pdf->SetFont('NanumBarunGothicBold','',7);
        $pdf->MultiCell(15,3,$order['item_price'].' '.$order['item_price_currency'],0,'C');

        // table 5th line
        $pdf->SetXY(111.5,86+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',8);
        $pdf->MultiCell(53,3,'For commercial items only if know,
    HS tarif number(4)
    and country of origin of goods(5)',0,'L');
        $pdf->SetXY(111.5,95.3+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',7);
        $pdf->MultiCell(53,2.8,'상업물품인 경우 원산지 및 
    HS코드(상품분류번호) 기입 ',0,'L');
        $pdf->SetXY(164,86+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',8);
        $pdf->MultiCell(17,3,'Total Weight (in kg)(6)',0,'C');
        $pdf->SetXY(164,95.3+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',7);
        $pdf->Cell(17,3,'총무게',0,0,'C');

        $pdf->SetXY(165,105.5+$yToAdd);
        $pdf->SetFont('NanumBarunGothicBold','',7);
        $pdf->MultiCell(15,3,number_format(($order['cnt'] * $order['item_weight']),2).' '.$order['item_weight_unit'],0,'C');

        $pdf->SetXY(181,86+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',8);
        $pdf->MultiCell(17,3,'Total Value (7)',0,'C');
        $pdf->SetXY(181,92.3+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',7);
        $pdf->Cell(17,3,'총가격',0,0,'C');

        $pdf->SetXY(182,105.5+$yToAdd);
        $pdf->SetFont('NanumBarunGothicBold','',7);
        $pdf->MultiCell(15,3,number_format(($order['cnt'] * $order['item_price']),2).' '.$order['item_price_currency'],0,'C');

        // table 6th line
        $pdf->SetXY(111.5,115+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',7);
        $pdf->MultiCell(87,3,'I. the undersinged, whose name and address are given on the item, ceritify that the particulars given in this declaration are correct and that this item dose not contain any dangerous article or articles prohibited by legislation or by postal or customs regulations',0,'L');
        $pdf->SetXY(111.5,127.5+$yToAdd);
        $pdf->MultiCell(86,3,'신고 서에 시고한 물품이 정확하며, 법류, 유편 및 관세법에 규정된 금지물품이나위험물품을 포함하지 않음을 증명합니다',0,'L');
        $pdf->SetXY(111.5,134+$yToAdd);
        $pdf->SetTextColor(0);
        $pdf->SetFont('Arial','B',9);
        $pdf->MultiCell(87,5,'Date and senders signature(8)',0,'L');
    }

    function pdf2x2($pdf, $order)
    {
        $pdf->AddPage();
        $pdf->SetAutoPageBreak(false);
        $pdf->AddFont('NanumBarunGothic','','NanumBarunGothic.ttf',true);
        $pdf->AddFont('NanumBarunGothicBold','','NanumBarunGothicBold.ttf',true);

        $this->createAirMail3Form(8, 4, $pdf, $order);
        $this->createAirMail3Form(8, 105, $pdf, $order);
        $this->createAirMail3Form(148, 4, $pdf, $order);
        $this->createAirMail3Form(148, 105, $pdf, $order);

        $this->createCustomsDeclaration3Form(8, 4, $pdf, $order);
        $this->createCustomsDeclaration3Form(148, 4, $pdf, $order);
        $this->createCustomsDeclaration3Form(8, 105, $pdf, $order);
        $this->createCustomsDeclaration3Form(148, 105, $pdf, $order);
    }

    function createAirMail3Form($xToAdd = 0, $yToAdd = 0, $pdf, $order)
    {
        $pdf->SetDrawColor(0);
        $pdf->SetLineWidth(0.1);
        $pdf->SetFillColor(255);
        $pdf->RoundedRect(2+$xToAdd, 2+$yToAdd, 66, 96, 0, 'DF'); // 
        // lines
        $pdf->SetLineWidth(0.2);
        $pdf->Line(4+$xToAdd,4.4+$yToAdd,4+$xToAdd,6.9+$yToAdd); // header line
        $pdf->SetDrawColor(169,169,169);
        $pdf->Line(4+$xToAdd,10+$yToAdd,66+$xToAdd,10+$yToAdd); // top
        $pdf->Line(4+$xToAdd,10+$yToAdd,4+$xToAdd,96+$yToAdd); // left
        $pdf->Line(66+$xToAdd,10+$yToAdd,66+$xToAdd,96+$yToAdd); // right
        $pdf->Line(4+$xToAdd,96+$yToAdd,66+$xToAdd,96+$yToAdd); // bottom

        $pdf->Line(4+$xToAdd,18+$yToAdd,66+$xToAdd,18+$yToAdd); // first row
        $pdf->Line(16+$xToAdd,10+$yToAdd,16+$xToAdd,18+$yToAdd);
        $pdf->Line(46+$xToAdd,10+$yToAdd,46+$xToAdd,18+$yToAdd);
        $pdf->Line(4+$xToAdd,34+$yToAdd,66+$xToAdd,34+$yToAdd); // second row
        $pdf->Line(4+$xToAdd,40+$yToAdd,66+$xToAdd,40+$yToAdd); // third row
        $pdf->Line(16+$xToAdd,34+$yToAdd,16+$xToAdd,40+$yToAdd);
        $pdf->Line(32+$xToAdd,34+$yToAdd,32+$xToAdd,40+$yToAdd);
        $pdf->Line(46+$xToAdd,34+$yToAdd,46+$xToAdd,40+$yToAdd); 
        $pdf->Line(4+$xToAdd,46+$yToAdd,66+$xToAdd,46+$yToAdd); // fourth row
        $pdf->Line(16+$xToAdd,40+$yToAdd,16+$xToAdd,46+$yToAdd);
        $pdf->Line(4+$xToAdd,54+$yToAdd,66+$xToAdd,54+$yToAdd); // repeat first row
        $pdf->Line(16+$xToAdd,46+$yToAdd,16+$xToAdd,54+$yToAdd); 
        $pdf->Line(46+$xToAdd,46+$yToAdd,46+$xToAdd,54+$yToAdd);
        $pdf->Line(4+$xToAdd,70+$yToAdd,66+$xToAdd,70+$yToAdd); // second row
        $pdf->Line(4+$xToAdd,76+$yToAdd,66+$xToAdd,76+$yToAdd); // third row
        $pdf->Line(16+$xToAdd,70+$yToAdd,16+$xToAdd,76+$yToAdd);
        $pdf->Line(32+$xToAdd,70+$yToAdd,32+$xToAdd,76+$yToAdd);
        $pdf->Line(46+$xToAdd,70+$yToAdd,46+$xToAdd,76+$yToAdd); 
        $pdf->Line(4+$xToAdd,82+$yToAdd,66+$xToAdd,82+$yToAdd); // fourth row
        $pdf->Line(16+$xToAdd,76+$yToAdd,16+$xToAdd,82+$yToAdd);

        $pdf->SetDrawColor(0);
        $pdf->SetLineWidth(0.2);
        $pdf->SetXY(4+$xToAdd,4.8+$yToAdd);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(37,2,'AIR MAIL Small Packet',0,0,'L');
        $pdf->SetXY(4+$xToAdd,12.8+$yToAdd);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(12,2.5,'FROM',0,1,'C');
        $pdf->SetXY(4+$xToAdd,48.5+$yToAdd);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(12,2.5,'TO',0,1,'C');
        // custom text
        $pdf->SetXY(16+$xToAdd,12.8+$yToAdd);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(30,2.7,$order['seller_company_name'],0,1,'C');
        $pdf->SetXY(46+$xToAdd,12.8+$yToAdd);
        $pdf->SetFont('Arial','B',8);
        $seller_country_code = 'KR';
        if (strtolower($order['seller_country']) !== 'south korea')
            $seller_country_code = $order['seller_country'];
        $pdf->Cell(20,2.7,$seller_country_code,0,1,'C');
        $pdf->SetXY(5+$xToAdd,20+$yToAdd);
        $pdf->SetFont('Arial','',8);
        if (!empty($order['seller_street2'])) :
        $pdf->MultiCell(60,4,$order['seller_street1'].'
'.$order['seller_street2'].'
'.$order['seller_city'].' '.$order['seller_stateorprovice'],0,'L');
        else :
        $pdf->MultiCell(60,4,$order['seller_street1'].'
'.$order['seller_city'].' '.$order['seller_stateorprovice'],0,'L');
        endif;
        $pdf->SetXY(4+$xToAdd,35.8+$yToAdd);
        $pdf->SetFont('Arial','',7);
        $pdf->Cell(12,2.5,'Post Code',0,1,'C');
        $pdf->SetXY(16+$xToAdd,35.8+$yToAdd);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(16,2.7,$order['seller_postal_code'],0,1,'C');
        $pdf->SetXY(32+$xToAdd,35.8+$yToAdd);
        $pdf->SetFont('Arial','',7);
        $pdf->Cell(14,2.7,'Country',0,1,'C');
        $pdf->SetXY(46+$xToAdd,35.8+$yToAdd);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(20,2.7,$order['seller_country'],0,1,'C');
        $pdf->SetXY(4+$xToAdd,41.7+$yToAdd);
        $pdf->SetFont('Arial','',7);
        $pdf->Cell(12,2.5,'TEL',0,1,'C');
        $pdf->SetXY(18+$xToAdd,41.8+$yToAdd);
        $pdf->Cell(46,2,$order['seller_phone_no'],0,1,'L');
        // // second
        $pdf->SetXY(16+$xToAdd,48.5+$yToAdd);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(30,2.7,$order['name'],0,1,'C');
        $pdf->SetXY(46+$xToAdd,48.5+$yToAdd);
        $pdf->Cell(20,2.7,$order['country_code'],0,1,'C');
        $pdf->SetXY(5+$xToAdd,56+$yToAdd);
        $pdf->SetFont('Arial','',8);

        if (!empty($order['street2'])) :
        $pdf->MultiCell(60,4,$order['street1'].'
'.$order['street2'].'
'.$order['city_name'].' '.$order['stateorprovince'],0,'L');
        else :
        $pdf->MultiCell(60,4,$order['street1'].'
'.$order['city_name'].' '.$order['stateorprovince'],0,'L');
        endif;
        $pdf->SetXY(4+$xToAdd,71.7+$yToAdd);
        $pdf->SetFont('Arial','',7);
        $pdf->Cell(12,2.5,'Post Code',0,1,'C');
        $pdf->SetXY(16+$xToAdd,71.7+$yToAdd);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(16,2.7,$order['postal_code'],0,1,'C');
        $pdf->SetXY(32+$xToAdd,71.7+$yToAdd);
        $pdf->SetFont('Arial','',7);
        $pdf->Cell(14,2.7,'Country',0,1,'C');
        $pdf->SetXY(46+$xToAdd,71.7+$yToAdd);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(20,2.7,$order['country_name'],0,1,'C');
        $pdf->SetXY(4+$xToAdd,77.7+$yToAdd);
        $pdf->SetFont('Arial','',7);
        $pdf->Cell(12,2.5,'TEL',0,1,'C');
        $pdf->SetXY(18+$xToAdd,77.7+$yToAdd);
        $pdf->Cell(46,2,$order['shipto_phone_no'],0,1,'L');
    }

    function createCustomsDeclaration3Form($xToAdd = 0, $yToAdd = 0, $pdf, $order)
    {
        $pdf->SetDrawColor(0);
        $pdf->SetLineWidth(0.1);
        $pdf->SetFillColor(255);
        $pdf->RoundedRect(72+$xToAdd, 2+$yToAdd, 66, 96, 0, 'DF');
        // vertical line
        $pdf->SetLineWidth(0.2);
        $pdf->Line(74+$xToAdd,5+$yToAdd,74+$xToAdd,10.5+$yToAdd);
        $pdf->Line(74+$xToAdd,16+$yToAdd,74+$xToAdd,17.5+$yToAdd);
        $pdf->SetLineWidth(0.2);
        $pdf->SetXY(74+$xToAdd,5+$yToAdd);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,2.5,'CUSTOMS',0,0,'L');
        $pdf->SetXY(74+$xToAdd,8+$yToAdd);
        $pdf->Cell(28,2.5,'DECLARATION',0,0,'L');
        $pdf->SetXY(74+$xToAdd,11+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',8);
        $pdf->Cell(20,3,'세관신고서',0,0,'L');
        $pdf->SetXY(74+$xToAdd,5+$yToAdd);
        $pdf->SetFont('Arial','B',18);
        $pdf->Cell(62,6,'CN22',0,1,'R');
        $pdf->SetXY(74+$xToAdd,15.5+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',6);
        $pdf->Cell(25,2.5,'May be opened officialy',0,1,'L');
        $pdf->SetXY(74+$xToAdd,18.1+$yToAdd);
        $pdf->Cell(24,2.5,'공개적으로 개봉될 수 있음',0,0,'L');
        // table
        $pdf->SetDrawColor(169,169,169);
        $pdf->SetLineWidth(0.2);
        $pdf->Line(74+$xToAdd,22+$yToAdd,136+$xToAdd,22+$yToAdd); // top
        $pdf->Line(74+$xToAdd,22+$yToAdd,74+$xToAdd,95+$yToAdd); // left
        $pdf->Line(74+$xToAdd,95+$yToAdd,136+$xToAdd,95+$yToAdd); // bottom
        $pdf->Line(136+$xToAdd,22+$yToAdd,136+$xToAdd,95+$yToAdd); // right

        $pdf->Line(74+$xToAdd,30+$yToAdd,136+$xToAdd,30+$yToAdd); // 1st row
        $pdf->Line(112+$xToAdd,22+$yToAdd,112+$xToAdd,25+$yToAdd); // 1st row vertical line
        $pdf->Line(74+$xToAdd,37+$yToAdd,136+$xToAdd,37+$yToAdd); // 2nd row 
        $pdf->Line(74+$xToAdd,45+$yToAdd,136+$xToAdd,45+$yToAdd); // 3rd row
        $pdf->Line(112+$xToAdd,37+$yToAdd,112+$xToAdd,77+$yToAdd); // 3rd row vertical line A
        $pdf->Line(124+$xToAdd,37+$yToAdd,124+$xToAdd,77+$yToAdd); // 3rd row vertical line B
        $pdf->Line(74+$xToAdd,56+$yToAdd,136+$xToAdd,56+$yToAdd); // 4th row
        $pdf->Line(74+$xToAdd,68+$yToAdd,136+$xToAdd,68+$yToAdd); // 5th row
        $pdf->Line(74+$xToAdd,77+$yToAdd,136+$xToAdd,77+$yToAdd); // 6th row
        $pdf->SetDrawColor(0);
        $pdf->SetLineWidth(0.2);
        $pdf->SetXY(74+$xToAdd,23+$yToAdd);
        $pdf->SetFont('Arial','B',7);
        $pdf->Cell(26,2.5,'Designated operator',0,0,'L');
        $pdf->SetXY(112+$xToAdd,23+$yToAdd);
        $pdf->SetFont('Arial','B',6);
        $pdf->MultiCell(22,2,'Important! See instructions on the back',0,'L');
    //  // table 2nd line
        $pdf->SetDrawColor(169,169,169);
        $pdf->SetTextColor(68,68,68);
        $pdf->SetXY(77+$xToAdd,31+$yToAdd);
        $pdf->SetFont('NanumBarunGothicBold','',6);
        $pdf->Cell(11,2,'Gift(선물)',0,0,'L');
    //  // // checkbox
        $pdf->Line(75+$xToAdd,31+$yToAdd,77+$xToAdd,31+$yToAdd); // top
        $pdf->Line(75+$xToAdd,33+$yToAdd,77+$xToAdd,33+$yToAdd); // bottom
        $pdf->Line(75+$xToAdd,31+$yToAdd,75+$xToAdd,33+$yToAdd); // left
        $pdf->Line(77+$xToAdd,31+$yToAdd,77+$xToAdd,33+$yToAdd); // right
        $pdf->SetXY(77+$xToAdd,34+$yToAdd);
        $pdf->Cell(19,2,'Documents(서류)',0,0,'L');
    //  // // checkbox
        $pdf->Line(75+$xToAdd,34+$yToAdd,77+$xToAdd,34+$yToAdd); // top
        $pdf->Line(75+$xToAdd,36+$yToAdd,77+$xToAdd,36+$yToAdd); // bottom
        $pdf->Line(75+$xToAdd,34+$yToAdd,75+$xToAdd,36+$yToAdd); // left
        $pdf->Line(77+$xToAdd,34+$yToAdd,77+$xToAdd,36+$yToAdd); // right
        $pdf->SetXY(104+$xToAdd,31+$yToAdd);
        $pdf->Cell(31,2,'Commercial Sample(상업샘플)',0,0,'L');
    //  // // checkbox
        $pdf->Line(102+$xToAdd,31+$yToAdd,104+$xToAdd,31+$yToAdd); // top
        $pdf->Line(102+$xToAdd,33+$yToAdd,104+$xToAdd,33+$yToAdd); // bottom
        $pdf->Line(102+$xToAdd,31+$yToAdd,102+$xToAdd,33+$yToAdd); // left
        $pdf->Line(104+$xToAdd,31+$yToAdd,104+$xToAdd,33+$yToAdd); // right
        $pdf->SetXY(104+$xToAdd,34+$yToAdd);
        $pdf->Cell(13,2,'Other(기타)',0,0,'L');
        // // checkbox
        $pdf->Line(102+$xToAdd,34+$yToAdd,104+$xToAdd,34+$yToAdd); // top
        $pdf->Line(102+$xToAdd,36+$yToAdd,104+$xToAdd,36+$yToAdd); // bottom
        $pdf->Line(102+$xToAdd,34+$yToAdd,102+$xToAdd,36+$yToAdd); // left
        $pdf->Line(104+$xToAdd,34+$yToAdd,104+$xToAdd,36+$yToAdd); // right
    //  // table 3rd line
        $pdf->SetXY(74+$xToAdd,38+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',6);
        $pdf->MultiCell(38,2.1,'Quantity and detailed description
    of contents(1)',0,'L');
        $pdf->SetXY(74+$xToAdd,42.5+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',5);
        $pdf->Cell(38,2,'내용증명, 수량 등 자세한 설명',0,0,'L');

        $pdf->SetXY(75+$xToAdd,48+$yToAdd);
        $pdf->SetFont('NanumBarunGothicBold','',5);
        $pdf->MultiCell(36,2.1,$order['cnt'].'x '.$order['order_title'],0,'L');

        $pdf->SetXY(112+$xToAdd,38+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',6);
        $pdf->MultiCell(12,2.1,'Weight    (in kg)(2)',0,'C');
        $pdf->SetXY(112+$xToAdd,42.5+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',5);
        $pdf->Cell(12,2.1,'무게',0,0,'C');

        $pdf->SetXY(113+$xToAdd,48+$yToAdd);
        $pdf->SetFont('NanumBarunGothicBold','',5);
        $pdf->MultiCell(10,2.1,$order['item_weight'].' '.$order['item_weight_unit'],0,'C');

        $pdf->SetXY(124+$xToAdd,38+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',6);
        $pdf->MultiCell(12,2.1,'Value (3)',0,'C');
        $pdf->SetXY(124+$xToAdd,40.4+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',5);
        $pdf->Cell(12,2.1,'가격',0,0,'C');

        $pdf->SetXY(125+$xToAdd,48+$yToAdd);
        $pdf->SetFont('NanumBarunGothicBold','',5);
        $pdf->MultiCell(10,2.1,$order['item_price'].' '.$order['item_price_currency'],0,'C');

    //  // table 5th line
        $pdf->SetXY(74+$xToAdd,57+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',6);
        $pdf->MultiCell(38,2.1,'For commercial items only if know,
    HS tarif number(4)
    and country of origin of goods(5)',0,'L');
        $pdf->SetXY(74+$xToAdd,63.6+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',5);
        $pdf->MultiCell(38,2.1,'상업물품인 경우 원산지 및 
    HS코드(상품분류번호) 기입 ',0,'L');
        $pdf->SetXY(112+$xToAdd,57+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',6);
        $pdf->MultiCell(12,2.1,'Total Weight (in kg)(6)',0,'C');

        $pdf->SetXY(113+$xToAdd,70.5+$yToAdd);
        $pdf->SetFont('NanumBarunGothicBold','',5);
        $pdf->MultiCell(10,2.1,number_format(($order['cnt'] * $order['item_weight']),2).' '.$order['item_weight_unit'],0,'C');

        $pdf->SetXY(112+$xToAdd,63.6+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',5);
        $pdf->Cell(12,2.1,'총무게',0,0,'C');
        $pdf->SetXY(124+$xToAdd,57+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',6);
        $pdf->MultiCell(12,2.1,'Total Value (7)',0,'C');
        $pdf->SetXY(124+$xToAdd,61.5+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',5);
        $pdf->Cell(12,2.1,'총가격',0,0,'C');

        $pdf->SetXY(125+$xToAdd,70.5+$yToAdd);
        $pdf->SetFont('NanumBarunGothicBold','',5);
        $pdf->MultiCell(10,2.1,number_format(($order['cnt'] * $order['item_price']),2).' '.$order['item_price_currency'],0,'C');

    //  // table 6th line
        $pdf->SetXY(74+$xToAdd,77.5+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',5.4);
        $pdf->MultiCell(61,2,'I. the undersinged, whose name and address are given on the item, ceritify that the particulars given in this declaration are correct and that this item dose not contain any dangerous article or articles prohibited by legislation or by postal or customs regulations',0,'L');
        $pdf->SetXY(74+$xToAdd,86.2+$yToAdd);
        $pdf->SetFont('NanumBarunGothic','',4.8);
        $pdf->MultiCell(61,2,'신고 서에 시고한 물품이 정확하며, 법류, 유편 및 관세법에 규정된 금지물품이나위험물품을 포함하지 않음을 증명합니다',0,'L');
        $pdf->SetXY(74+$xToAdd,91.5+$yToAdd);
        $pdf->SetTextColor(0);
        $pdf->SetFont('Arial','B',7);
        $pdf->MultiCell(61,2,'Date and senders signature(8)',0,'L');
    }

    function RoundedRect($x, $y, $w, $h, $r, $style = '')
    {
        $k = $this->k;
        $hp = $this->h;
        if($style=='F')
            $op='f';
        elseif($style=='FD' || $style=='DF')
            $op='B';
        else
            $op='S';
        $MyArc = 4/3 * (sqrt(2) - 1);
        $this->_out(sprintf('%.2F %.2F m',($x+$r)*$k,($hp-$y)*$k ));
        $xc = $x+$w-$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2F %.2F l', $xc*$k,($hp-$y)*$k ));

        $this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);
        $xc = $x+$w-$r ;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-$yc)*$k));
        $this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);
        $xc = $x+$r ;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2F %.2F l',$xc*$k,($hp-($y+$h))*$k));
        $this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);
        $xc = $x+$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$yc)*$k ));
        $this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
        $this->_out($op);
    }

    function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
    {
        $h = $this->h;
        $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c ', $x1*$this->k, ($h-$y1)*$this->k,
            $x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
    }

    function SetDash($black=null, $white=null)
    {
        if($black!==null)
            $s=sprintf('[%.3F %.3F] 0 d',$black*$this->k,$white*$this->k);
        else
            $s='[] 0 d';
        $this->_out($s);
    }

    var $wLine; // Maximum width of the line
    var $hLine; // Height of the line
    var $Text; // Text to display
    var $border;
    var $align; // Justification of the text
    var $fill;
    var $Padding;
    var $lPadding;
    var $tPadding;
    var $bPadding;
    var $rPadding;
    var $TagStyle; // Style for each tag
    var $Indent;
    var $Space; // Minimum space between words
    var $PileStyle; 
    var $Line2Print; // Line to display
    var $NextLineBegin; // Buffer between lines 
    var $TagName;
    var $Delta; // Maximum width minus width
    var $StringLength; 
    var $LineLength;
    var $wTextLine; // Width minus paddings
    var $nbSpace; // Number of spaces in the line
    var $Xini; // Initial position
    var $href; // Current URL
    var $TagHref; // URL for a cell

    // Public Functions

    function WriteTag($w, $h, $txt, $border=0, $align="J", $fill=false, $padding=0)
    {
        $this->wLine=$w;
        $this->hLine=$h;
        $this->Text=trim($txt);
        $this->Text=preg_replace("/\n|\r|\t/","",$this->Text);
        $this->border=$border;
        $this->align=$align;
        $this->fill=$fill;
        $this->Padding=$padding;

        $this->Xini=$this->GetX();
        $this->href="";
        $this->PileStyle=array();        
        $this->TagHref=array();
        $this->LastLine=false;

        $this->SetSpace();
        $this->Padding();
        $this->LineLength();
        $this->BorderTop();

        while($this->Text!="")
        {
            $this->MakeLine();
            $this->PrintLine();
        }

        $this->BorderBottom();
    }


    function SetStyle($tag, $family, $style, $size, $color, $indent=-1)
    {
         $tag=trim($tag);
         $this->TagStyle[$tag]['family']=trim($family);
         $this->TagStyle[$tag]['style']=trim($style);
         $this->TagStyle[$tag]['size']=trim($size);
         $this->TagStyle[$tag]['color']=trim($color);
         $this->TagStyle[$tag]['indent']=$indent;
    }


    // Private Functions

    function SetSpace() // Minimal space between words
    {
        $tag=$this->Parser($this->Text);
        $this->FindStyle($tag[2],0);
        $this->DoStyle(0);
        $this->Space=$this->GetStringWidth(" ");
    }


    function Padding()
    {
        if(preg_match("/^.+,/",$this->Padding)) {
            $tab=explode(",",$this->Padding);
            $this->lPadding=$tab[0];
            $this->tPadding=$tab[1];
            if(isset($tab[2]))
                $this->bPadding=$tab[2];
            else
                $this->bPadding=$this->tPadding;
            if(isset($tab[3]))
                $this->rPadding=$tab[3];
            else
                $this->rPadding=$this->lPadding;
        }
        else
        {
            $this->lPadding=$this->Padding;
            $this->tPadding=$this->Padding;
            $this->bPadding=$this->Padding;
            $this->rPadding=$this->Padding;
        }
        if($this->tPadding<$this->LineWidth)
            $this->tPadding=$this->LineWidth;
    }


    function LineLength()
    {
        if($this->wLine==0)
            $this->wLine=$this->w - $this->Xini - $this->rMargin;

        $this->wTextLine = $this->wLine - $this->lPadding - $this->rPadding;
    }


    function BorderTop()
    {
        $border=0;
        if($this->border==1)
            $border="TLR";
        $this->Cell($this->wLine,$this->tPadding,"",$border,0,'C',$this->fill);
        $y=$this->GetY()+$this->tPadding;
        $this->SetXY($this->Xini,$y);
    }


    function BorderBottom()
    {
        $border=0;
        if($this->border==1)
            $border="BLR";
        $this->Cell($this->wLine,$this->bPadding,"",$border,0,'C',$this->fill);
    }


    function DoStyle($tag) // Applies a style
    {
        $tag=trim($tag);
        $this->SetFont($this->TagStyle[$tag]['family'],
            $this->TagStyle[$tag]['style'],
            $this->TagStyle[$tag]['size']);

        $tab=explode(",",$this->TagStyle[$tag]['color']);
        if(count($tab)==1)
            $this->SetTextColor($tab[0]);
        else
            $this->SetTextColor($tab[0],$tab[1],$tab[2]);
    }


    function FindStyle($tag, $ind) // Inheritance from parent elements
    {
        $tag=trim($tag);

        // Family
        if($this->TagStyle[$tag]['family']!="")
            $family=$this->TagStyle[$tag]['family'];
        else
        {
            reset($this->PileStyle);
            while(list($k,$val)=each($this->PileStyle))
            {
                $val=trim($val);
                if($this->TagStyle[$val]['family']!="") {
                    $family=$this->TagStyle[$val]['family'];
                    break;
                }
            }
        }

        // Style
        $style="";
        $style1=strtoupper($this->TagStyle[$tag]['style']);
        if($style1!="N")
        {
            $bold=false;
            $italic=false;
            $underline=false;
            reset($this->PileStyle);
            while(list($k,$val)=each($this->PileStyle))
            {
                $val=trim($val);
                $style1=strtoupper($this->TagStyle[$val]['style']);
                if($style1=="N")
                    break;
                else
                {
                    if(strpos($style1,"B")!==false)
                        $bold=true;
                    if(strpos($style1,"I")!==false)
                        $italic=true;
                    if(strpos($style1,"U")!==false)
                        $underline=true;
                } 
            }
            if($bold)
                $style.="B";
            if($italic)
                $style.="I";
            if($underline)
                $style.="U";
        }

        // Size
        if($this->TagStyle[$tag]['size']!=0)
            $size=$this->TagStyle[$tag]['size'];
        else
        {
            reset($this->PileStyle);
            while(list($k,$val)=each($this->PileStyle))
            {
                $val=trim($val);
                if($this->TagStyle[$val]['size']!=0) {
                    $size=$this->TagStyle[$val]['size'];
                    break;
                }
            }
        }

        // Color
        if($this->TagStyle[$tag]['color']!="")
            $color=$this->TagStyle[$tag]['color'];
        else
        {
            reset($this->PileStyle);
            while(list($k,$val)=each($this->PileStyle))
            {
                $val=trim($val);
                if($this->TagStyle[$val]['color']!="") {
                    $color=$this->TagStyle[$val]['color'];
                    break;
                }
            }
        }
         
        // Result
        $this->TagStyle[$ind]['family']=$family;
        $this->TagStyle[$ind]['style']=$style;
        $this->TagStyle[$ind]['size']=$size;
        $this->TagStyle[$ind]['color']=$color;
        $this->TagStyle[$ind]['indent']=$this->TagStyle[$tag]['indent'];
    }


    function Parser($text)
    {
        $tab=array();
        // Closing tag
        if(preg_match("|^(</([^>]+)>)|",$text,$regs)) {
            $tab[1]="c";
            $tab[2]=trim($regs[2]);
        }
        // Opening tag
        else if(preg_match("|^(<([^>]+)>)|",$text,$regs)) {
            $regs[2]=preg_replace("/^a/","a ",$regs[2]);
            $tab[1]="o";
            $tab[2]=trim($regs[2]);

            // Presence of attributes
            if(preg_match("/(.+) (.+)='(.+)'/",$regs[2])) {
                $tab1=preg_split("/ +/",$regs[2]);
                $tab[2]=trim($tab1[0]);
                while(list($i,$couple)=each($tab1))
                {
                    if($i>0) {
                        $tab2=explode("=",$couple);
                        $tab2[0]=trim($tab2[0]);
                        $tab2[1]=trim($tab2[1]);
                        $end=strlen($tab2[1])-2;
                        $tab[$tab2[0]]=substr($tab2[1],1,$end);
                    }
                }
            }
        }
         // Space
         else if(preg_match("/^( )/",$text,$regs)) {
            $tab[1]="s";
            $tab[2]=' ';
        }
        // Text
        else if(preg_match("/^([^< ]+)/",$text,$regs)) {
            $tab[1]="t";
            $tab[2]=trim($regs[1]);
        }

        $begin=strlen($regs[1]);
         $end=strlen($text);
         $text=substr($text, $begin, $end);
        $tab[0]=$text;

        return $tab;
    }


    function MakeLine()
    {
        $this->Text.=" ";
        $this->LineLength=array();
        $this->TagHref=array();
        $Length=0;
        $this->nbSpace=0;

        $i=$this->BeginLine();
        $this->TagName=array();

        if($i==0) {
            $Length=$this->StringLength[0];
            $this->TagName[0]=1;
            $this->TagHref[0]=$this->href;
        }

        while($Length<$this->wTextLine)
        {
            $tab=$this->Parser($this->Text);
            $this->Text=$tab[0];
            if($this->Text=="") {
                $this->LastLine=true;
                break;
            }

            if($tab[1]=="o") {
                array_unshift($this->PileStyle,$tab[2]);
                $this->FindStyle($this->PileStyle[0],$i+1);

                $this->DoStyle($i+1);
                $this->TagName[$i+1]=1;
                if($this->TagStyle[$tab[2]]['indent']!=-1) {
                    $Length+=$this->TagStyle[$tab[2]]['indent'];
                    $this->Indent=$this->TagStyle[$tab[2]]['indent'];
                }
                if($tab[2]=="a")
                    $this->href=$tab['href'];
            }

            if($tab[1]=="c") {
                array_shift($this->PileStyle);
                if(isset($this->PileStyle[0]))
                {
                    $this->FindStyle($this->PileStyle[0],$i+1);
                    $this->DoStyle($i+1);
                }
                $this->TagName[$i+1]=1;
                if($this->TagStyle[$tab[2]]['indent']!=-1) {
                    $this->LastLine=true;
                    $this->Text=trim($this->Text);
                    break;
                }
                if($tab[2]=="a")
                    $this->href="";
            }

            if($tab[1]=="s") {
                $i++;
                $Length+=$this->Space;
                $this->Line2Print[$i]="";
                if($this->href!="")
                    $this->TagHref[$i]=$this->href;
            }

            if($tab[1]=="t") {
                $i++;
                $this->StringLength[$i]=$this->GetStringWidth($tab[2]);
                $Length+=$this->StringLength[$i];
                $this->LineLength[$i]=$Length;
                $this->Line2Print[$i]=$tab[2];
                if($this->href!="")
                    $this->TagHref[$i]=$this->href;
             }

        }

        trim($this->Text);
        if($Length>$this->wTextLine || $this->LastLine==true)
            $this->EndLine();
    }


    function BeginLine()
    {
        $this->Line2Print=array();
        $this->StringLength=array();

        if(isset($this->PileStyle[0]))
        {
            $this->FindStyle($this->PileStyle[0],0);
            $this->DoStyle(0);
        }

        if(count($this->NextLineBegin)>0) {
            $this->Line2Print[0]=$this->NextLineBegin['text'];
            $this->StringLength[0]=$this->NextLineBegin['length'];
            $this->NextLineBegin=array();
            $i=0;
        }
        else {
            preg_match("/^(( *(<([^>]+)>)* *)*)(.*)/",$this->Text,$regs);
            $regs[1]=str_replace(" ", "", $regs[1]);
            $this->Text=$regs[1].$regs[5];
            $i=-1;
        }

        return $i;
    }


    function EndLine()
    {
        if(end($this->Line2Print)!="" && $this->LastLine==false) {
            $this->NextLineBegin['text']=array_pop($this->Line2Print);
            $this->NextLineBegin['length']=end($this->StringLength);
            array_pop($this->LineLength);
        }

        while(end($this->Line2Print)==="")
            array_pop($this->Line2Print);

        $this->Delta=$this->wTextLine-end($this->LineLength);

        $this->nbSpace=0;
        for($i=0; $i<count($this->Line2Print); $i++) {
            if($this->Line2Print[$i]=="")
                $this->nbSpace++;
        }
    }


    function PrintLine()
    {
        $border=0;
        if($this->border==1)
            $border="LR";
        $this->Cell($this->wLine,$this->hLine,"",$border,0,'C',$this->fill);
        $y=$this->GetY();
        $this->SetXY($this->Xini+$this->lPadding,$y);

        if($this->Indent!=-1) {
            if($this->Indent!=0)
                $this->Cell($this->Indent,$this->hLine);
            $this->Indent=-1;
        }

        $space=$this->LineAlign();
        $this->DoStyle(0);
        for($i=0; $i<count($this->Line2Print); $i++)
        {
            if(isset($this->TagName[$i]))
                $this->DoStyle($i);
            if(isset($this->TagHref[$i]))
                $href=$this->TagHref[$i];
            else
                $href='';
            if($this->Line2Print[$i]=="")
                $this->Cell($space,$this->hLine,"         ",0,0,'C',false,$href);
            else
                $this->Cell($this->StringLength[$i],$this->hLine,$this->Line2Print[$i],0,0,'C',false,$href);
        }

        $this->LineBreak();
        if($this->LastLine && $this->Text!="")
            $this->EndParagraph();
        $this->LastLine=false;
    }


    function LineAlign()
    {
        $space=$this->Space;
        if($this->align=="J") {
            if($this->nbSpace!=0)
                $space=$this->Space + ($this->Delta/$this->nbSpace);
            if($this->LastLine)
                $space=$this->Space;
        }

        if($this->align=="R")
            $this->Cell($this->Delta,$this->hLine);

        if($this->align=="C")
            $this->Cell($this->Delta/2,$this->hLine);

        return $space;
    }


    function LineBreak()
    {
        $x=$this->Xini;
        $y=$this->GetY()+$this->hLine;
        $this->SetXY($x,$y);
    }


    function EndParagraph()
    {
        $border=0;
        if($this->border==1)
            $border="LR";
        $this->Cell($this->wLine,$this->hLine/2,"",$border,0,'C',$this->fill);
        $x=$this->Xini;
        $y=$this->GetY()+$this->hLine/2;
        $this->SetXY($x,$y);
    }
    
}