<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <title>JCORE - <?php echo $title; ?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-cdjp-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avenxo Admin Theme">
    <meta name="author" content="">

    <?php echo $_def_css_files; ?>
    <link rel="stylesheet" href="assets/plugins/spinner/dist/ladda-themeless.min.css">

    <style>
        .drag_member{
            cursor: pointer;
        }



    </style>
</head>

<body>

    <div class="row">
        <div class="col-lg-9">
            <br />
            <center>



            <div id="div_area_scale" style="position: relative;padding: 0%;">
                <table border="1" style="position: absolute;left: 0in;top: 0in;z-index: -10000;border-collapse: collapse;">
                    <?php if($layouts->is_portrait==1){$row=11;$col=8;}else{$row=8;$col=11;} ?>

                    <?php for($x=1;$x<=$row;$x++){ ?>
                        <tr>
                            <?php for($i=1;$i<=$col;$i++){ ?>
                                <td style="border:1px solid #eaebed;height: 1in;width: 1in;background-color: white;"></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </table>
            <div id="span_company_name" data-description="Company_name" class="drag_member" style="position: absolute;left: <?php echo $layouts->company_name_pos_left; ?>px;top: <?php echo $layouts->company_name_pos_top; ?>px;font-style: <?php echo $layouts->company_name_is_italic; ?>;font-weight:<?php echo ($layouts->company_name_is_bold?'bold':'normal'); ?>;font-size: <?php echo $layouts->company_name_font_size; ?>;font-family: <?php echo $layouts->company_name_font_family; ?>">***COMPANY NAME***</div>

            <div id="span_company_address" data-description="company_address" class="drag_member" style="position: absolute;left: <?php echo $layouts->company_address_pos_left; ?>px;top: <?php echo $layouts->company_address_pos_top; ?>px;font-style: <?php echo $layouts->company_address_is_italic; ?>;font-weight:<?php echo ($layouts->company_address_is_bold?'bold':'normal'); ?>;font-size: <?php echo $layouts->company_address_font_size; ?>;font-family: <?php echo $layouts->company_address_font_family; ?>">***Company Address***</div>

            <div id="span_company_contact" data-description="Company_contact" class="drag_member" style="position: absolute;left: <?php echo $layouts->company_contact_pos_left; ?>px;top: <?php echo $layouts->company_contact_pos_top; ?>px;font-style: <?php echo $layouts->company_contact_is_italic; ?>;font-weight:<?php echo ($layouts->company_contact_is_bold?'bold':'normal'); ?>;font-size: <?php echo $layouts->company_contact_font_size; ?>;font-family: <?php echo $layouts->company_contact_font_family; ?>">***Company Contact Information***</div>

            <div id="span_particular" data-description="Particular" class="drag_member" style="position: absolute;left: <?php echo $layouts->particular_pos_left; ?>px;top: <?php echo $layouts->particular_pos_top; ?>px;font-style: <?php echo $layouts->particular_is_italic; ?>;font-weight:<?php echo ($layouts->particular_is_bold?'bold':'normal'); ?>;font-size: <?php echo $layouts->particular_font_size; ?>;font-family: <?php echo $layouts->particular_font_family; ?>">***Particular***</div>


        </div>

            <div id="span_company_photo" data-description="span_company_photo" class="drag_member_photo" style="border:1px solid black; height: <?php echo $layouts->company_photo_height; ?>;width: <?php echo $layouts->company_photo_width; ?> ;position: absolute;left: <?php echo $layouts->company_photo_pos_left; ?>px;top: <?php echo $layouts->company_photo_pos_top; ?>px;font-weight:bold;">Company <br> Photo</div>
            </div> <br />

    </div>

</body>


<div id="modal_new_layout" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
    <div class="modal-dialog" style="width: 22%;">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#2ecc71;">
                <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                <h4 class="modal-title" style="color:#ecf0f1 !important;"><span id="modal_title"> New Check Layout</span></h4>

            </div>

            <div class="modal-body" style="overflow:hidden;">
                <form id="frm_check_layout">

                        <div class="row">
                            <div class="col-lg-12">
                                Font Size : <br />
                                <input type="text" id="txt_font_size" name="font_size" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                Font Family : <br />
                                <input type="text" id="txt_font_family" name="font_family" class="form-control">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12"><br />
                                <label class="radio-inline"><input type="checkbox" name="is_bold" id="is_bold" value="1"> Bold</label>
                                <label class="radio-inline"><input type="checkbox" name="is_italic" id="is_italic" value="1"> Italic</label>
                            </div>
                        </div>



                </form>
            </div>

            <div class="modal-footer">
                <button id="btn_apply_changes" type="button" class="btn btn-primary"  style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"><span class=""></span> Apply Property</button>
                <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">Cancel</button>
            </div>

        </div><!---content---->
    </div>
</div><!---modal-->


<div id="modal_new_layout_photo" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
    <div class="modal-dialog" style="width: 22%;">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#2ecc71;">
                <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                <h4 class="modal-title" style="color:#ecf0f1 !important;"><span id="modal_title"> Company Photo</span></h4>

            </div>

            <div class="modal-body" style="overflow:hidden;">
                <form id="frm_check_layout">

                        <div class="row">
                            <div class="col-lg-12">
                                Width : <br />
                                <input type="text" id="txt_width" name="photo_width" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                Height : <br />
                                <input type="text" id="txt_height" name="photo_height" class="form-control">

                            </div>
                        </div>




                </form>
            </div>

            <div class="modal-footer">
                <button id="btn_apply_changes_photo" type="button" class="btn btn-primary"  style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"><span class=""></span> Apply Property</button>
                <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">Cancel</button>
            </div>

        </div><!---content---->
    </div>
</div><!---modal-->



<?php echo $_def_js_files; ?>


<script>
    $(document).ready(function(){
        var _activeObject;

        $('.drag_member').draggable({
            containment:"#div_area_scale",
            stop: function(event, ui) {
                //var pos = ui.helper.position(); // just get pos.top and pos.left
                saveScalePositions();
            }
        });
        $('.drag_member_photo').draggable({
            containment:"#div_area_scale",
            stop: function(event, ui) {
                //var pos = ui.helper.position(); // just get pos.top and pos.left
                saveScalePositions();
            }
        });


        $('.drag_member').on('dblclick',function(){
            _activeObject=$(this);

            //load current property
            $('#txt_font_size').val( _activeObject.css('font-size'));
            $('#txt_font_family').val(_activeObject.css('font-family'));


            $('#is_bold').prop('checked',(_activeObject.css('font-weight')=="bold"));
            $('#is_italic').prop('checked',(_activeObject.css('font-style')=="italic"));


            $('#modal_title').html($(this).data('description'));
            $('#modal_new_layout').modal('show');
        });

        $('#btn_apply_changes').click(function(){

            if($('#txt_font_size').val()!=""){
                _activeObject.css('font-size',$('#txt_font_size').val()+'');
            }

            if($('#txt_font_family').val()!=""){
                _activeObject.css('font-family',$('#txt_font_family').val()+'');
            }

            if($('#is_bold:checked').val()!=undefined){
                _activeObject.css('font-weight','bold');
            }else{
                _activeObject.css('font-weight','normal');
            }

            if($('#is_italic:checked').val()!=undefined){
                _activeObject.css('font-style','italic');
            }else{
                _activeObject.css('font-style','normal');
            }

            saveScalePositions();

            $('#modal_new_layout').modal('hide');
        });

            $( "#target" ).contextmenu(function() {
                 _activeObject=$(this);
                 _activeObject.css('display','none');
              // alert( "Handler for .contextmenu() called." );
            });


// PHOTO 
        $('.drag_member_photo').draggable({
            containment:"#div_area_scale",
            stop: function(event, ui) {
                //var pos = ui.helper.position(); // just get pos.top and pos.left
                saveScalePositions();
            }
        });


        $('.drag_member_photo').on('dblclick',function(){
            _activeObject=$(this);

            //load current property
            $('#txt_width').val( _activeObject.css('width'));
            $('#txt_height').val(_activeObject.css('height'));



      
            $('#modal_new_layout_photo').modal('show');
        });

        $('#btn_apply_changes_photo').click(function(){

            if($('#txt_width').val()!=""){
                _activeObject.css('width',$('#txt_width').val()+'');
            }

            if($('#txt_height').val()!=""){
                _activeObject.css('height',$('#txt_height').val()+'');
            }

            saveScalePositions();

            $('#modal_new_layout_photo').modal('hide');
        });











        /*$(".drag_member").on("drag", function(event) {
            alert("dd");

            var _data=[];
            _data.push({name:'layout_id',value:<?php echo json_encode($this->input->get('id',TRUE)); ?>});
            _data.push({name:'type',value:"scale-only"});
            _data.push({name:'particular_pos_left',value:$('#span_particular').css('left')});
            _data.push({name:'particular_pos_top',value:$('#span_particular').css('top')});
            _data.push({name:'words_pos_left',value:$('#span_amount_words').css('left')});
            _data.push({name:'words_pos_top',value:$('#span_amount_words').css('top')});
            _data.push({name:'amount_pos_left',value:$('#span_amount').css('left')});
            _data.push({name:'amount_pos_top',value:$('#span_amount').css('top')});
            _data.push({name:'date_pos_left',value:$('#span_date').css('left')});
            _data.push({name:'date_pos_top',value:$('#span_date').css('top')});

            $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Check_layout/transaction/update",
                "data":_data
            });

        });*/


        var saveScalePositions=function(){
            var _data=[];
// new and in use


            _data.push({name:'layout_id',value:<?php echo json_encode($this->input->get('id',TRUE)); ?>});
            _data.push({name:'type',value:"scale-only"});

            _data.push({name:'particular_pos_left',value:$('#span_particular').css('left')});
            _data.push({name:'particular_pos_top',value:$('#span_particular').css('top')});

            _data.push({name:'particular_font_family',value:$('#span_particular').css('font-family')});
            _data.push({name:'particular_font_size',value:$('#span_particular').css('font-size')});
            _data.push({name:'particular_is_italic',value:$('#span_particular').css('font-style')});
            _data.push({name:'particular_is_bold',value:$('#span_particular').css('font-weight')});

// COMPANY NAME
            _data.push({name:'company_name_pos_left',value:$('#span_company_name').css('left')});
            _data.push({name:'company_name_pos_top',value:$('#span_company_name').css('top')});

            _data.push({name:'company_name_font_family',value:$('#span_company_name').css('font-family')});
            _data.push({name:'company_name_font_size',value:$('#span_company_name').css('font-size')});
            _data.push({name:'company_name_is_italic',value:$('#span_company_name').css('font-style')});
            _data.push({name:'company_name_is_bold',value:$('#span_company_name').css('font-weight')});

// COMPANY Address
            _data.push({name:'company_address_pos_left',value:$('#span_company_address').css('left')});
            _data.push({name:'company_address_pos_top',value:$('#span_company_address').css('top')});

            _data.push({name:'company_address_font_family',value:$('#span_company_address').css('font-family')});
            _data.push({name:'company_address_font_size',value:$('#span_company_address').css('font-size')});
            _data.push({name:'company_address_is_italic',value:$('#span_company_address').css('font-style')});
            _data.push({name:'company_address_is_bold',value:$('#span_company_address').css('font-weight')});

// COMPANY CONTACT 
            _data.push({name:'company_contact_pos_left',value:$('#span_company_contact').css('left')});
            _data.push({name:'company_contact_pos_top',value:$('#span_company_contact').css('top')});

            _data.push({name:'company_contact_font_family',value:$('#span_company_contact').css('font-family')});
            _data.push({name:'company_contact_font_size',value:$('#span_company_contact').css('font-size')});
            _data.push({name:'company_contact_is_italic',value:$('#span_company_contact').css('font-style')});
            _data.push({name:'company_contact_is_bold',value:$('#span_company_contact').css('font-weight')});

// COMPANY PHOTO 
            _data.push({name:'company_photo_pos_left',value:$('#span_company_photo').css('left')});
            _data.push({name:'company_photo_pos_top',value:$('#span_company_photo').css('top')});
            _data.push({name:'company_photo_width',value:$('#span_company_photo').css('width')});
            _data.push({name:'company_photo_height',value:$('#span_company_photo').css('height')});


// old and not in use



            // _data.push({name:'words_pos_left',value:$('#span_amount_words').css('left')});
            // _data.push({name:'words_pos_top',value:$('#span_amount_words').css('top')});

            // _data.push({name:'words_font_family',value:$('#span_amount_words').css('font-family')});
            // _data.push({name:'words_font_size',value:$('#span_amount_words').css('font-size')});
            // _data.push({name:'words_is_italic',value:$('#span_amount_words').css('font-style')});
            // _data.push({name:'words_is_bold',value:$('#span_amount_words').css('font-weight')});


            // _data.push({name:'amount_pos_left',value:$('#span_amount').css('left')});
            // _data.push({name:'amount_pos_top',value:$('#span_amount').css('top')});

            // _data.push({name:'amount_font_family',value:$('#span_amount').css('font-family')});
            // _data.push({name:'amount_font_size',value:$('#span_amount').css('font-size')});
            // _data.push({name:'amount_is_italic',value:$('#span_amount').css('font-style')});
            // _data.push({name:'amount_is_bold',value:$('#span_amount').css('font-weight')});

            // _data.push({name:'date_pos_left',value:$('#span_date').css('left')});
            // _data.push({name:'date_pos_top',value:$('#span_date').css('top')});

            // _data.push({name:'date_font_family',value:$('#span_date').css('font-family')});
            // _data.push({name:'date_font_size',value:$('#span_date').css('font-size')});
            // _data.push({name:'date_is_italic',value:$('#span_date').css('font-style')});
            // _data.push({name:'date_is_bold',value:$('#span_date').css('font-weight')});


            $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Print_layout/transaction/update",
                "data":_data
            });
        };




    });




</script>
</html>