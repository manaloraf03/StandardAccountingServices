<br />


<div class="row">
    <div class="col-sm-12">
        <div style='border-bottom:1px solid gray;'></div>
    </div>
</div><br />

<div class="row" >
    <div class="col-lg-12">
        <div class="title-action" style="margin-left: 3%;">
        <?php  if($journal_info->payment_method_id != 2){ ?>
            <a href="Templates/layout/journal-cdj?id=<?php echo $journal_info->journal_id; ?>&type=preview" target="_blank" class="btn btn-default" style="text-transform:none;font-family: tahoma;" ><i class="fa fa-print"></i> Print </a> 
        <?php } ?>

            <?php  if($journal_info->journal_is_approved == TRUE && $journal_info->payment_method_id == 2){ ?>
            <a href="Templates/layout/journal-cdj?id=<?php echo $journal_info->journal_id; ?>&type=preview" target="_blank" class="btn btn-default" style="text-transform:none;font-family: tahoma;" ><i class="fa fa-print"></i> Print </a> 
            <a href="Templates/layout/journal-cdj-version-2?id=<?php echo $journal_info->journal_id; ?>&type=preview" target="_blank" class="btn btn-default" style="text-transform:none;font-family: tahoma;" ><i class="fa fa-print"></i> Print Voucher and Check </a> <span style="font-weight: bolder;font-size: 12px;"><br><br>Status: </span> <span style="font-size: 12px;"> Approved <i class="fa fa-check-circle" style="color:green;"></i> </span>
             <?php }else if ($journal_info->journal_is_approved == FALSE && $journal_info->payment_method_id == 2){ ?>

             
             <br><br> <span style="font-weight: bolder;font-size: 12px;">Status: </span> <span style="font-size: 12px;"> For Approval <i class="fa fa-times-circle" style="color:red;"></i> </span>

             <?php } ?>

<!--             <a href="Templates/layout/journal-cdj?id=<?php echo $journal_info->journal_id; ?>&type=pdf" class="btn btn-default" style="text-transform:none;font-family: tahoma;" ><i class="fa fa-file-pdf-o"></i> Download as PDF </a> -->
        </div>
    </div>

</div>

<br />