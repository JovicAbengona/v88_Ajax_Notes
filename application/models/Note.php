<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Note extends CI_Model {
        public function all(){
            $get_notes = $this->db->query("SELECT * FROM notes")->result_array();

            if($get_notes != NULL){
                return $get_notes;
            }
            else{
                return "No Result";
            }
        }

        public function create($new_note){
            $query = "INSERT INTO notes (title, created_at, updated_at) VALUES (?, ?, ?)";
            $values = array($new_note["note"], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));

            return $this->db->query($query, $values);
        }

        public function update($update_note){
            $query = "UPDATE notes SET title = ?, description = ?, updated_at = ? WHERE id = ? ";
            $values = array($update_note["title"], $update_note["description"], date("Y-m-d, H:i:s"), $update_note["id"]);

            return $this->db->query($query, $values);
        }

        public function delete($id){
            $query = "DELETE FROM notes WHERE id = ? ";
            $values = $id;

            return $this->db->query($query, $values);
        }
    }
?>
