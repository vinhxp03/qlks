<?php 
/**
* 
*/
class Home extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('bill_model');
	}
	function index()
	{
		$list = $this->bill_model->get_revenue();
		$this->data['list'] = $list;

		$this->data['temp'] = 'admin/home/index';
		$this->load->view('admin/layout',$this->data);
	}
	public function fetch_revenue()
	{
		$output='';
		$list = $this->bill_model->get_revenue();

        foreach ($list as $value) {
        	$output.='
				<tr>
					<td>'.$value->TENLOAIPHONG.'</td>
					<td>'.$value->NAM.'</td>
					<td>'.$value->THANG.'</td>
					<td>'.$value->TONG.' (VND)</td>
				</tr>
        	';
        }
        return $output;
	}

	public function print_report()
	{
		$this->load->view('admin/tcpdf/tcpdf.php');

		// Extend the TCPDF class to create custom Header and Footer

		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetTitle('Danh mục phòng');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
		$pdf->setFooterData(array(0,64,0), array(0,64,128));

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// ---------------------------------------------------------

		// set default font subsetting mode
		$pdf->setFontSubsetting(true);

		// set auto page breaks dejavuserif
		$pdf->SetFont('dejavuserif','', '12',true);

		// Add a page
		// This method has several options, check the source code documentation for more information.
		$pdf->AddPage();

		$content = '';
		$content.='<br><br>
			<table border="1" cellpadding="7px" cellspacing="0">
				<tr style="background-color: rgb(221, 221, 221);">
				<td colspan="4"><h2 align="center"><b>Báo cáo doanh thu theo loại phòng</b></h2></td></tr>
				<tr>
					<td width="30%">Loại Phòng</td>
					<td width="20%">Năm</td>
					<td width="20%">Tháng</td>
					<td width="30%">Tổng doanh thu</td>
				</tr>
		';
		$content.= $this->fetch_revenue();
		$content.='</table>';

		$pdf->writeHTML($content, true, false, true, false, '');

		$content = '';
		$content.='<br>
				<table>
					<tr align="center">
						<td colspan="2"></td>
						<td colspan="3">Ngày ... tháng ... năm 20... <br></td>
					</tr>
					<tr align="center">
						<td colspan="2"></td>
						<td colspan="3">Người lập báo cáo<br></td>
					</tr>
					<tr align="center">
						<td colspan="2"></td>
						<td colspan="3" style="font-size: 10px"><i>(Ký, họ tên)</i></td>
					</tr>
				</table>
		';
		$pdf->writeHTML($content);

		$pdf->lastPage();

		// close and output PDF document
		$pdf->Output('DanhMucPhong.pdf','I');

	}
}

 ?>