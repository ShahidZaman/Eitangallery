<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class pdf_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    function getContent($postid){

        $property=$this->db->get_where('property', array(
            'property_id' =>$postid
        ))->row_array();

return $property;

}
}
?>