<!DOCTYPE html>
<html>
<head>
	<title>JCORE - Statement of Account</title>

	<style type="text/css">
        body {
            font-family: 'Calibri',sans-serif;
            font-size: 12px;
        }

        .align-right {
            text-align: right;
        }

        .align-left {
            text-align: left;
        }

        .data {
            border-bottom: 1px solid #404040;
        }

        .align-center {
            text-align: center;
        }

        .report-header {
            font-weight: bolder;
            font-size: 25px;
        }

        hr {
            border-top: 1px solid #404040;
        }

	    @media print {
	      @page { margin: 0; size: landscape; }
	      body { margin: 1.0cm; }
		}
    </style>
    <script>
    	(function(){
    		window.print();
    	})();
    </script>
</head>
<body>
	<table width="100%">
        <tr>
            <td width="10%"><img src="<?php echo base_url($company_info->logo_path); ?>" style="height: 90px; width: 120px; text-align: left;"></td>
            <td width="90%">
                <span class="report-header"><strong><?php echo $company_info->company_name; ?></strong></span><br>
                <span><?php echo $company_info->company_address; ?></span><br>
                <span><?php echo $company_info->landline.'/'.$company_info->mobile_no; ?></span>
            </td>
        </tr>
    </table><hr>
    <div>
        <h3><strong><?php echo $customer_info->customer_name; ?>'s STATEMENT OF ACCOUNT</strong></h3>
    </div><br>
    <table width="100%" border="1" cellspacing="0" cellpadding="4">
    	<tr>
    		<td width="10%"><b>Customer Name : </b></td>
    		<td width="40%"><?php echo $customer_info->customer_name; ?></td>
    		<td width="10%"><b>Date : </b></td>
    		<td width="40%"><?php echo date('Y-m-d'); ?></td>
    	</tr>
    	<tr>
    		<td width="10%"><b>Address : </b></td>
    		<td width="40%"><?php echo $customer_info->address; ?></td>
    		<td width="10%"><b>Contact Person : </b></td>
    		<td width="40%"><?php echo $customer_info->contact_name; ?></td>
    	</tr>
    </table><br>
    <?php $sumPrev = 0; $sumCur = 0; $sumPayment = 0; $totalBalance = 0; $total = 0; ?>
    <table width="100%" border="1" cellspacing="0" cellpadding="4">
    	<tr>
    		<td colspan="5" align="center"><strong>PREVIOUS BALANCES</strong></td>
    	</tr>
    	<tr>
    		<th width="20%">Invoice #</th>
	        <th width="10%">Date</th>
	        <th width="20%" align="right">Amount</th>
	        <th width="20%" align="right">Balance Amount</th>
	        <th width="20%" align="right">Total</th>
    	</tr>
    	<?php foreach($previous_balances as $previous_balance) { ?>
    		<tr>
    			<td><?php echo $previous_balance->sales_inv_no; ?></td>
    			<td><?php echo $previous_balance->date_invoice; ?></td>
    			<td align="right"><?php echo number_format($previous_balance->receivable_amount,2); ?></td>
    			<td align="right"><?php echo number_format($previous_balance->balance_amount,2); ?></td>
    			<td></td>
    		</tr>
    		<?php $sumPrev += $previous_balance->receivable_amount; ?>
    	<?php } ?>
    	<tr>
            <td colspan="4" align="right"><b>SUB-TOTAL:</b></td>
            <td id="total_prev" align="right"><?php echo number_format($sumPrev,2); ?></td>
        </tr>
    	<tr>
    		<td colspan="5" align="center"><strong>CURRENT BALANCES</strong></td>
    	</tr>
    	<tr>
    		<th width="20%">Invoice #</th>
	        <th width="10%">Date</th>
	        <th width="20%" align="right">Amount</th>
	        <th width="20%" align="right">Balance Amount</th>
	        <th width="20%" align="right">Total</th>
    	</tr>
    	<?php foreach($current_balances as $current_balance) { ?>
    		<tr>
    			<td><?php echo $current_balance->sales_inv_no; ?></td>
    			<td><?php echo $current_balance->date_invoice; ?></td>
    			<td align="right"><?php echo number_format($current_balance->receivable_amount,2); ?></td>
    			<td align="right"><?php echo number_format($current_balance->balance_amount,2); ?></td>
    			<td></td>
    		</tr>
    		<?php $sumCur += $current_balance->receivable_amount; ?>
    	<?php } ?>
    	<tr>
    	<tr>
            <td colspan="4" align="right"><b>SUB-TOTAL:</b></td>
            <td id="total_current" align="right"><?php echo number_format($sumCur,2); ?></td>
        </tr>
		<td colspan="5" align="center"><strong>PAYMENTS</strong></td>
    	</tr>
    	<tr>
    		<th width="20%">Receipt #</th>
	        <th width="10%">Date</th>
	        <th width="20%" align="right">Payment Amount</th>
	        <th width="20%" align="right" colspan="2"></th>
    	</tr>
    	<?php foreach($payments as $payment) { ?>
    		<tr>
    			<td><?php echo $payment->receipt_no_desc; ?></td>
    			<td><?php echo $payment->date_paid; ?></td>
    			<td align="right"><?php echo number_format($payment->payment_amount,2); ?></td>
    			<td colspan="2"></td>
    		</tr>
    		<?php $sumPayment += $payment->payment_amount; ?>
    	<?php } ?>
    	<?php $total = $sumPrev + $sumCur; ?>
    	<?php $totalBalance = $total - $sumPayment; ?>
    	<tr>
            <td colspan="4" align="right"><b>TOTAL:</b></td>
            <td id="total" align="right"><?php echo number_format($total,2); ?></td>
        </tr>
        <tr>
            <td colspan="4" align="right"><b>LESS PAYMENT:</b></td>
            <td id="total_payment" align="right"><?php echo number_format($sumPayment,2); ?></td>
        </tr>
        <tr>
            <td colspan="4" align="right"><b>BALANCE:</b></td>
            <td id="total_balance" align="right"><?php echo number_format($totalBalance,2); ?></td>
        </tr>
    </table>
    <br><br>
    <table width="100%" cellpadding="10">
    	<tr>
    		<td width="10%"></td>
    		<td width="20%" style="border-bottom: 1px solid black;"></td>
    		<td width="10%"></td>
    		<td width="20%" style="border-bottom: 1px solid black;"></td>
    		<td width="10%"></td>
    	</tr>
    	<tr>
    		<td width="10%"></td>
    		<td width="20%" align="center"><strong>Prepared By</strong></td>
    		<td width="10%"></td>
    		<td width="20%" align="center"><strong>Received By</strong></td>
    		<td width="10%"></td>
    	</tr>
    </table>
</body>
</html>