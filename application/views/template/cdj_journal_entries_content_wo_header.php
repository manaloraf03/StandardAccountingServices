    <table width="100%" border="0" cellspacing="-1">
        <tr>
            <td style="padding: 4px;" width="50%"><strong>DATE :</strong> <?php echo date_format(new DateTime($journal_info->date_txn),"m/d/Y"); ?></td>
            <td style="padding: 4px;" width="50%"><strong>REF # :</strong> <?php echo $journal_info->ref_no; ?></td>
        </tr>
        <?php if ($journal_info->payment_method_id == 2) { ?>
            <tr> 
                <td style="padding: 4px;" width="50%"><strong>CHECK # :</strong> <?php echo $journal_info->check_no; ?></td>
                <td style="padding: 4px;" width="50%"><strong>CHECK DATE :</strong> <?php echo date_format(new DateTime($journal_info->check_date),"m/d/Y"); ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td style="padding: 4px;" width="50%"><strong>TXN # :</strong> <?php echo $journal_info->txn_no; ?></td>
            <td style="padding: 4px;" width="50%"><strong>AMOUNT :</strong> <?php echo number_format($journal_info->amount,2); ?></td>
        </tr>
        <tr>
            <td style="padding: 4px;"><strong>PAYEE :</strong> <?php echo $journal_info->supplier_name; ?></td>
            <td style="padding: 4px;"><strong>PAYMENT METHOD :</strong> <?php echo $journal_info->payment_method; ?></td>
        </tr>
    </table><br>
    <table width="100%" style="border-collapse: collapse;border-spacing: 0;font-family: tahoma;font-size: 11" border="0">
            <thead>
            <tr>
                <th width="10%" style="border: 1px solid black;text-align: left;height: 30px;padding: 6px;">Account #</th>
                <th width="30%" style="border: 1px solid black;text-align: left;height: 30px;padding: 6px;">Account</th>
                <th width="30%" style="border: 1px solid black;text-align: right;height: 30px;padding: 6px;">Memo</th>
                <th width="15%" style="border: 1px solid black;text-align: right;height: 30px;padding: 6px;">Debit</th>
                <th width="15%" style="border: 1px solid black;text-align: right;height: 30px;padding: 6px;">Credit</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $dr_amount=0.00; $cr_amount=0.00;

            foreach($journal_accounts as $account){

                ?>
                <tr>
                    <td width="30%" style="border: 1px solid black;text-align: left;height: 30px;padding: 6px;"><?php echo $account->account_no; ?></td>
                    <td width="30%" style="border: 1px solid black;text-align: left;height: 30px;padding: 6px;"><?php echo $account->account_title; ?></td>
                    <td width="30%" style="border: 1px solid black;text-align: right;height: 30px;padding: 6px;"><?php echo $account->memo; ?></td>
                    <td width="15%" style="border: 1px solid black;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($account->dr_amount,2); ?></td>
                    <td width="15%" style="border: 1px solid black;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($account->cr_amount,2); ?></td>
                </tr>
                <?php

                $dr_amount+=$account->dr_amount;
                $cr_amount+=$account->cr_amount;

            }

            ?>

            </tbody>
                <tfoot>
                    <tr style="border: 1px solid black;">
                        <td colspan="5"></td>
                    </tr>
                    <tr style="border: 1px solid black;">
                        <td style="border: 1px solid black;text-align: left;height: 30px;padding: 6px;" colspan="2"><strong>Remarks :</strong></td>
                        <td style="border: 1px solid black;text-align: right;height: 30px;padding: 6px;" align="right"><strong>Total : </strong></td>
                        <td style="border: 1px solid black;text-align: right;height: 30px;padding: 6px;" align="right"><strong><?php echo number_format($dr_amount,2); ?></strong></td>
                        <td style="border: 1px solid black;text-align: right;height: 30px;padding: 6px;" align="right"><strong><?php echo number_format($cr_amount,2); ?></strong></td>
                    </tr>
                    <tr style="border: 1px solid black;">
                        <td colspan="2" style="border: 1px solid black;text-align: left;height: 30px;padding: 6px;"><?php echo $journal_info->remarks; ?></td>
                        <td colspan="3" style="border: 1px solid black;text-align: left;height: 30px;padding: 6px;"></td>
                    </tr>
                </tfoot>    
        </table><br><br>


















