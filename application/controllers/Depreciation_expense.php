<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Depreciation_expense extends CORE_Controller
	{
		function __construct()
		{
			parent::__construct('');
			$this->validate_session();

			$this->load->model(
				array(
					'Users_model',
					'Fixed_asset_management_model',
					'Depreciation_expense_model',
					'Account_title_model'
				)
			);
		}

		public function index()
		{
			$this->Users_model->validate();
			$data['_def_css_files'] = $this->load->view('template/assets/css_files', '', true);
	        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', true);
	        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', true);
	        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', true);
	        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', true);
	        $data['title'] = 'Depreciation Expense Report';
	        $data['accounts'] = $this->Account_title_model->get_list(array('is_deleted'=>FALSE));
	        $data['starting_year']=date('Y', strtotime('-100 year'));
	        $data['ending_year']=date('Y', strtotime('+10 year'));
	        $data['current_year']=date('Y');
	        (in_array('10-2',$this->session->user_rights)? 
	        $this->load->view('depreciation_expense_view',$data)
	        :redirect(base_url('dashboard')));
	        
		}

		function transaction($txn=null){
			switch($txn){
				case 'gdr-list':
					$m_fixed_asset=$this->Fixed_asset_management_model;

					$month=$this->input->get('m',TRUE);
					$year=$this->input->get('y',TRUE);

					$response['data']=$m_fixed_asset->get_depreciation_expense($month, $year);

					echo json_encode($response);
				break;

				case 'review-list':
					$m_depreciation_expense= $this->Depreciation_expense_model;
					$response['data']=$m_depreciation_expense->get_list(array('depreciation_expense.is_active'=>TRUE),
						array('depreciation_expense.de_id',
							'MONTHNAME(depreciation_expense.de_date) as de_month',
							'YEAR(depreciation_expense.de_date) as de_year',
							'depreciation_expense.de_expense_total',
							'depreciation_expense.de_remarks',
							'depreciation_expense.de_ref_no',
							'depreciation_expense.date_posted',
							'depreciation_expense.is_journal_posted'
							)
						);

					echo json_encode($response);
				break;

				case 'gdr-print':
					$m_fixed_asset=$this->Fixed_asset_management_model;

					$month=$this->input->get('m',TRUE);
					$year=$this->input->get('y',TRUE);

					$data['depreciation_expenses']=$m_fixed_asset->get_depreciation_expense($month, $year);

					$this->load->view('template/depreciation_expense_report',$data);
				break;

				case 'prepare-for-review':
					$month=$this->input->get('m',TRUE);
					$year=$this->input->get('y',TRUE);

					$response['data']=$m_fixed_asset->get_depreciation_expense($month, $year);

				break;

				case 'create-for-review':
					$m_depreciation_expense= $this->Depreciation_expense_model;

					$month=$this->input->post('month',TRUE);
					$year=$this->input->post('year',TRUE);
					$total=$this->input->post('total');
					$date=$year.'-'.$month.'-01';

					$m_depreciation_expense->de_expense_total=$this->get_numeric_value($total);
					$m_depreciation_expense->de_date=date('Y-m-d',strtotime($year.'-'.$month.'-01'));
					$m_depreciation_expense->de_remarks='For Review';
					$m_depreciation_expense->save();


					$response['title'] = 'Success!';
                    $response['stat'] = 'success';
                    $response['msg'] = 'Depreciation Expense successfully prepared for review.'.$date;

                    echo json_encode($response);

				break;
			}
		}
	}
?>