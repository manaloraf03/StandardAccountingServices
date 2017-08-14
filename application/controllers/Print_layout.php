<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Print_layout extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model(array(
            'Users_model',
            'Check_layout_model',
            'Print_layout_model'
        ));
    }

    public function index() {
        $this->Users_model->validate();
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', true);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', true);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', true);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', true);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', true);
        $data['title'] = 'Print Layout';
        // (in_array('6-7',$this->session->user_rights)? 
        $this->load->view('print_layout_view', $data);
        // :redirect(base_url('dashboard')));
        
    }


    function transaction($txn=null){
        switch($txn){
            case 'list':
                $m_layout=$this->Print_layout_model;
                $response['data']=$m_layout->get_list(array('print_layout.is_active'=>TRUE,'print_layout.is_deleted'=>FALSE));

                echo json_encode($response);
                break;
                // $response['data']=$this->response_rows(array('check_layout.is_active'=>TRUE,'check_layout.is_deleted'=>FALSE));
                // echo json_encode($response);
                // break;

            case 'create':
                $m_layout=$this->Print_layout_model;
                $m_layout->layout_name=$this->input->post('layout_name',TRUE);
                $m_layout->layout_description=$this->input->post('layout_description',TRUE);
                $m_layout->save();

                $layout_id=$m_layout->last_insert_id();

                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='Layout successfully created.';
                $response['row_added']=$m_layout->get_list($layout_id);
                echo json_encode($response);


                break;



            case 'update':
                $m_layout=$this->Print_layout_model;

                $layout_id=$this->input->post('layout_id',TRUE);


                if($this->input->post('type',TRUE)=="scale-only"){

                    // $m_layout->set('date_modified','NOW()');
                    $m_layout->particular_pos_left=$this->input->post('particular_pos_left',TRUE);
                    $m_layout->particular_pos_top=$this->input->post('particular_pos_top',TRUE);
                    $m_layout->particular_font_family=str_replace('"','',$this->input->post('particular_font_family',TRUE));
                    $m_layout->particular_font_size=$this->input->post('particular_font_size',TRUE);
                    $m_layout->particular_is_italic=$this->input->post('particular_is_italic',TRUE);
                    $m_layout->particular_is_bold=($this->input->post('particular_is_bold',TRUE)=="400"?"normal":"bold");

                    $m_layout->company_name_pos_left=$this->input->post('company_name_pos_left',TRUE);
                    $m_layout->company_name_pos_top=$this->input->post('company_name_pos_top',TRUE);
                    $m_layout->company_name_font_family=str_replace('"','',$this->input->post('company_name_font_family',TRUE));
                    $m_layout->company_name_font_size=$this->input->post('company_name_font_size',TRUE);
                    $m_layout->company_name_is_italic=$this->input->post('company_name_is_italic',TRUE);
                    $m_layout->company_name_is_bold=($this->input->post('company_name_is_bold',TRUE)=="400"?"normal":"bold");


                    $m_layout->company_address_pos_left=$this->input->post('company_address_pos_left',TRUE);
                    $m_layout->company_address_pos_top=$this->input->post('company_address_pos_top',TRUE);
                    $m_layout->company_address_font_family=str_replace('"','',$this->input->post('company_address_font_family',TRUE));
                    $m_layout->company_address_font_size=$this->input->post('company_address_font_size',TRUE);
                    $m_layout->company_address_is_italic=$this->input->post('company_address_is_italic',TRUE);
                    $m_layout->company_address_is_bold=($this->input->post('company_address_is_bold',TRUE)=="400"?"normal":"bold");

                    $m_layout->company_contact_pos_left=$this->input->post('company_contact_pos_left',TRUE);
                    $m_layout->company_contact_pos_top=$this->input->post('company_contact_pos_top',TRUE);
                    $m_layout->company_contact_font_family=str_replace('"','',$this->input->post('company_contact_font_family',TRUE));
                    $m_layout->company_contact_font_size=$this->input->post('company_contact_font_size',TRUE);
                    $m_layout->company_contact_is_italic=$this->input->post('company_contact_is_italic',TRUE);
                    $m_layout->company_contact_is_bold=($this->input->post('company_contact_is_bold',TRUE)=="400"?"normal":"bold");




                    $m_layout->company_photo_pos_left=$this->input->post('company_photo_pos_left',TRUE);
                    $m_layout->company_photo_pos_top=$this->input->post('company_photo_pos_top',TRUE);
                    $m_layout->company_photo_width=$this->input->post('company_photo_width',TRUE);
                    $m_layout->company_photo_height=$this->input->post('company_photo_height',TRUE);





                    // $m_layout->words_pos_left=$this->input->post('words_pos_left',TRUE);
                    // $m_layout->words_pos_top=$this->input->post('words_pos_top',TRUE);

                    // $m_layout->words_font_family=str_replace('"','',$this->input->post('words_font_family',TRUE));
                    // $m_layout->words_font_size=$this->input->post('words_font_size',TRUE);
                    // $m_layout->words_is_italic=$this->input->post('words_is_italic',TRUE);
                    // $m_layout->words_is_bold=($this->input->post('words_is_bold',TRUE)=="400"?"normal":"bold");


                    // $m_layout->amount_pos_left=$this->input->post('amount_pos_left',TRUE);
                    // $m_layout->amount_pos_top=$this->input->post('amount_pos_top',TRUE);

                    // $m_layout->amount_font_family=str_replace('"','',$this->input->post('amount_font_family',TRUE));
                    // $m_layout->amount_font_size=$this->input->post('amount_font_size',TRUE);
                    // $m_layout->amount_is_italic=$this->input->post('amount_is_italic',TRUE);
                    // $m_layout->amount_is_bold=($this->input->post('amount_is_bold',TRUE)=="400"?"normal":"bold");


                    // $m_layout->date_pos_left=$this->input->post('date_pos_left',TRUE);
                    // $m_layout->date_pos_top=$this->input->post('date_pos_top',TRUE);

                    // $m_layout->date_font_family=str_replace('"','',$this->input->post('date_font_family',TRUE));
                    // $m_layout->date_font_size=$this->input->post('date_font_size',TRUE);
                    // $m_layout->date_is_italic=$this->input->post('date_is_italic',TRUE);
                    // $m_layout->date_is_bold=($this->input->post('date_is_bold',TRUE)=="400"?"normal":"bold");


                    // $m_layout->posted_by_user=$this->session->user_id;
                    $m_layout->modify($layout_id);

                }else{

                    $m_layout->layout_name=$this->input->post('layout_name',TRUE);
                    $m_layout->layout_description=$this->input->post('layout_description',TRUE);
                    $m_layout->is_portrait=($this->input->post('is_portrait',TRUE)==1?1:0); //not sure why posted value 0 is NULL is backend
                    // $m_layout->posted_by_user=$this->session->user_id;
                    $m_layout->modify($layout_id);


                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Check layout successfully updated.';
                   $response['row_updated']=$m_layout->get_list($layout_id);
                    echo json_encode($response);
                }




                break;
            case 'delete':
                $m_layout=$this->Print_layout_model;

                $layout_id=$this->input->post('layout_id',TRUE);
                // $m_layout->set('date_deleted','NOW()');
                // $m_layout->deleted_by_user=$this->session->user_id;
                $m_layout->is_deleted=1;
                if($m_layout->modify($layout_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Check layout successfully deleted.';

                    echo json_encode($response);
                }

        }


    }


    // function response_rows($filter){
    //     $m_layout=$this->Check_layout_model;

    //     return $m_layout->get_list(
    //         $filter,

    //         array(
    //             'check_layout.*',
    //             'IF(check_layout.is_portrait,"Portrait","Landscape") as layout',
    //             'CONCAT_WS(" ",ua.user_fname,ua.user_lname) as posted_by_user'
    //         ),

    //         array(
    //             array('user_accounts as ua','ua.user_id=check_layout.posted_by_user','left')
    //         )

    //     );
    // }





}
