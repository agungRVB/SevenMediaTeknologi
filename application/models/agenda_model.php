<?php
class agenda_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function get_event(){
		$query = $this->db->get('calendar');
		return $query -> result_array();
	}
	
	public function set_agenda(){
		$this->load->helper('url');

		$mulai = url_title( $this->input->post('mulai'), 'dash', TRUE);
		$selesai = url_title( $this->input->post('selesai'), 'dash', TRUE);	
		$keterangan = url_title( $this->input->post('keterangan'), 'dash', TRUE);
		$keterangan=str_replace('-',' ', $keterangan);
			
			$warna = url_title( $this->input->post('warna'), 'dash', TRUE);
			$arrcolor = array("#02B793","#0DD10D","#985207","#6A0505","#1C9AE3","#E612E9","#F70984","#FF6600","black","blue","green","orange","purple","red");
            $loop=0;
            while($loop <= 13) {
	            if ($warna==$loop) {
	            	$warna = $arrcolor[$loop];
	            }
	            $loop++;
            }

		$data = array(
			'keterangan' => $keterangan,
			'warna' => $warna,
			'mulai' => $mulai,
			'selesai' => $selesai,
		);
		return $this->db->insert('calendar', $data);
	}
	
	public function delete_event(){
		$link = mysqli_connect("localhost","root","","management_projek");
		$result = mysqli_query($link, "select no from calendar ");
			$cek=1;
			while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC)) {
				if (empty($_POST[$cek])) {
                }else{
                	$no = url_title( $this->input->post($cek), 'dash', TRUE);
                	$this->db->delete('calendar', array('no' => $no));
                }
            $cek++;
			}
	}
}
?>