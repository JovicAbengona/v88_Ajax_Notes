<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Notes extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model("Note");
        }
        public function index(){
            $this->load->view('index');
        }

        public function index_html(){
            $data["notes"] = $this->Note->all();
            $this->load->view("partials/notes", $data);
        }

        public function index_json(){
            $data = array();
            $data["notes"] = $this->Note->all();
            echo json_encode($data);
        }

        public function create(){
            $new_note = $this->input->post();
            $this->Note->create($new_note);
            $data["notes"] = $this->Note->all();
            $this->load->view("partials/notes", $data);
        }

        public function update($id){
            $update_note = $this->input->post();
            $update_note["id"] = $id;
            $this->Note->update($update_note);
            $data["notes"] = $this->Note->all();
            $this->load->view("partials/notes", $data);
        }

        public function delete($id){
            $this->Note->delete($id);
            $data["notes"] = $this->Note->all();
            $this->load->view("partials/notes", $data);
        }
    }
?>