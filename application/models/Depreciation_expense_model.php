<?php

class Depreciation_expense_model extends CORE_Model {
    protected  $table="Depreciation_expense";
    protected  $pk_id="de_id";

    function __construct() {
        parent::__construct();
    }


function get_journal_entries($de_id){

$sql="SELECT main.* FROM(SELECT 

2 as account_id,
'' as memo,
de.de_expense_total as dr_amount,
0 as cr_amount
FROM depreciation_expense de
WHERE de.de_id = 18


UNION ALL

SELECT 
2 as account_id,
'' as memo,
0 as dr_amount,
de.de_expense_total as cr_amount

FROM depreciation_expense de

WHERE de.de_id = 18 


)as main WHERE main.dr_amount>0 OR main.cr_amount>0
";

      return $this->db->query($sql)->result();




}

}
?>