<?php
/**
 * Created by PhpStorm.
 * User: Hem
 * Date: 11/30/2018
 * Time: 1:46 PM
 */

class Merchant_model extends CI_model
{
    public function get_merchants($rowno, $rowperpage, $search = '')
    {
        $this->db->select('*');
        $this->db->from('merchant');
        $this->db->join('pasal_detail', 'pasal_detail.id = merchant.pasal_detail_id');
        $this->db->join('pasal_address', 'pasal_detail.address_id = pasal_address.id');

      /*  $this->db->join('personal_detail', 'personal_detail.id = merchant.personal_detail_id');
        $this->db->join('address', 'personal_detail.permanent_address_id = address.id');
        $this->db->join('temp_address', 'personal_detail.temp_address_id = temp_address.id');*/

        $this->db->join('status', 'merchant.status = status.id');

        if ($search != '') {
            $this->db->like('merchant.username', $search);
            $this->db->or_like('pasal_detail.pasal_name', $search);
            $this->db->or_like('pasal_detail.pasal_email', $search);
            /*$this->db->or_like('personal_detail.full_name', $search);
            $this->db->or_like('personal_detail.email', $search);*/
        }
        $this->db->limit($rowperpage, $rowno);

        $query = $this->db->get();
        return $query->result();
    }

    public function getRecordCount($search = '')
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('merchant');
        $this->db->join('pasal_detail', 'pasal_detail.id = merchant.pasal_detail_id');
        $this->db->join('personal_detail', 'personal_detail.id = merchant.personal_detail_id');
        $this->db->join('pasal_address', 'pasal_detail.address_id = pasal_address.id');
        $this->db->join('address', 'personal_detail.permanent_address_id = address.id');
        $this->db->join('temp_address', 'personal_detail.temp_address_id = temp_address.id');
        $this->db->join('status', 'merchant.status = status.id');

        if ($search != '') {
            $this->db->like('merchant.username', $search);
            $this->db->or_like('pasal_detail.pasal_name', $search);
            $this->db->or_like('personal_detail.full_name', $search);
            $this->db->or_like('pasal_detail.pasal_email', $search);
            $this->db->or_like('personal_detail.email', $search);
        }

        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }

    public function get_merchant_byId($id)
    {
        $this->db->select('*');
        $this->db->from('merchant');
        $this->db->join('pasal_detail', 'pasal_detail.id = merchant.pasal_detail_id');
        $this->db->join('personal_detail', 'personal_detail.id = merchant.personal_detail_id');
        $this->db->join('pasal_address', 'pasal_detail.address_id = pasal_address.id');
        $this->db->join('address', 'personal_detail.permanent_address_id = address.id');
        $this->db->join('temp_address', 'personal_detail.temp_address_id = temp_address.id');
        $this->db->join('status', 'merchant.status = status.id');
        $this->db->where('merchant.id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function save_merchant_detail($record, $image_name, $citizenship_image_name)
    {
        $merchant_type = $_POST['merchant_type'];
        if ($merchant_type == 0) {
            if ($record != null) {
                $pasal_detail_id = $record->pasal_detail_id;
                $address_id = $record->address_id;
            } else {
                $pasal_detail_id = null;
                $address_id = null;
            }
            $id = $this->save_pasal_detail($pasal_detail_id, $address_id, $image_name);
            if ($id == null) return false;
            $this->db->set('pasal_detail_id', $id);
        } else {
            if ($record != null) {
                $personal_detail_id = $record->personal_detail_id;
                $address_id = $record->permanent_address_id;
                $temp_address_id = $record->temp_address_id;
            } else {
                $personal_detail_id = null;
                $address_id = null;
                $temp_address_id = null;
            }
            $id = $this->save_personal_detail($personal_detail_id, $address_id, $temp_address_id, $image_name, $citizenship_image_name);
            if ($id == null) return false;
            $this->db->set('personal_detail_id', $id);
        }
        $this->db->set('username', $_POST['username']);
        $this->db->set('merchant_type', $merchant_type);
        $this->db->set('status', 1);
        $this->db->set('created_on', $this->get_time());
        if ($_POST['merchant_id'] != null) {
            $this->db->where('id', $_POST['merchant_id']);
            $this->db->update('merchant');
        } else {
            $this->db->insert('merchant');
        }
        return true;
    }

    public function get_time()
    {
        return date("Y-m-d H:i:s");
    }

    public function save_pasal_detail($pasal_detail_id, $address_id, $image_name)
    {
        $address_id = $this->save_pasal_address($address_id);

        $this->db->set('pasal_name', $_POST['pasal_name']);
        $this->db->set('pasal_email', $_POST['pasal_email']);
        $this->db->set('phone_no', $_POST['contact_no']);
        $this->db->set('phone_no_two', $_POST['contact_no_two']);
        $this->db->set('address_id', $address_id);
        $this->db->set('pan_no', $_POST['pan_no']);

        $this->db->set('pasal_image', $image_name);

        if ($pasal_detail_id != null) {
            $this->db->where('id', $pasal_detail_id);
            $this->db->update('pasal_detail');
        } else {
            $this->db->insert('pasal_detail');
            $pasal_detail_id = $this->db->insert_id();
        }
        return $pasal_detail_id;
    }

    public function save_personal_detail($personal_detail_id, $address_id, $temp_address_id, $image_name, $citizenship_image_name)
    {
        $address_id = $this->save_personal_address($address_id);
        $temp_address = $this->save_temp_address($temp_address_id);

        $this->db->set('full_name', $_POST['full_name']);
        $this->db->set('permanent_address_id', $address_id);
        $this->db->set('temp_address_id', $temp_address);
        $this->db->set('email', $_POST['personal_email']);
        $this->db->set('phone_one', $_POST['personal_contact_no']);
        $this->db->set('phone_two', $_POST['personal_contact_two']);

        $this->db->set('citizenship_no', $_POST['citizenship_no']);
        $this->db->set('citizenship_image', $citizenship_image_name);
        $this->db->set('image', $image_name);

        if ($personal_detail_id != null) {
            $this->db->where('id', $personal_detail_id);
            $this->db->update('pasal_detail');
        } else {
            $this->db->insert('pasal_detail');
            $personal_detail_id = $this->db->insert_id();
        }
        return $personal_detail_id;
    }

    public function save_pasal_address($address_id)
    {
        $this->db->set('pasal_district', $_POST['district']);
        $this->db->set('pasal_municipality_vdc', $_POST['municipality_vdc']);
        $this->db->set('pasal_ward', $_POST['ward']);
        $this->db->set('pasal_town', $_POST['town']);
        $this->db->set('pasal_gps_longitude', $_POST['gps_longitude']);
        $this->db->set('pasal_gps_latitude', $_POST['gps_latitude']);
        if ($address_id != null) {
            $this->db->where('id', $address_id);
            $this->db->update('pasal_address');
        } else {
            $this->db->insert('pasal_address');
            $address_id = $this->db->insert_id();
        }
        return $address_id;
    }

    public function save_personal_address($address_id)
    {
        $this->db->set('district', $_POST['personal_district']);
        $this->db->set('municipality_vdc', $_POST['personal_municipality_vdc']);
        $this->db->set('ward', $_POST['personal_ward']);
        $this->db->set('town', $_POST['personal_town']);
        $this->db->set('gps_longitude', $_POST['personal_gps_longitude']);
        $this->db->set('gps_latitude', $_POST['personal_gps_latitude']);
        if ($address_id != null) {
            $this->db->where('id', $address_id);
            $this->db->update('address');
        } else {
            $this->db->insert('address');
            $address_id = $this->db->insert_id();
        }
        return $address_id;
    }

    public function save_temp_address($address_id)
    {
        $this->db->set('temp_district', $_POST['temp_personal_district']);
        $this->db->set('temp_municipality_vdc', $_POST['temp_personal_municipality_vdc']);
        $this->db->set('temp_ward', $_POST['temp_personal_ward']);
        $this->db->set('temp_town', $_POST['temp_personal_town']);
        $this->db->set('temp_gps_longitude', $_POST['temp_gps_longitude']);
        $this->db->set('temp_gps_latitude', $_POST['temp_gps_latitude']);
        if ($address_id != null) {
            $this->db->where('id', $address_id);
            $this->db->update('temp_address');
        } else {
            $this->db->insert('temp_address');
            $address_id = $this->db->insert_id();
        }
        return $address_id;
    }


}