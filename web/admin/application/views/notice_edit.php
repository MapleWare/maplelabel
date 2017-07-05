<?php

$id = '';
$subject = '';
$content = '';
$content_type = '';
$show_yn = '';

if(!empty($notice))
{
    foreach ($notice as $record)
    {
        $id = $record->id;
        $subject = $record->subject;
        $content = $record->content;
        $content_type = $record->content_type;
        $show_yn = $record->show_yn;
    }
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Notice/News Management
        <small>Add / Edit User</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Notice Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url('notice/addnew') ?>" method="post" id="addnotice" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Subject</label>
                                        <input type="text" class="form-control required" value="<?php echo $subject; ?>" id="subject" name="subject" maxlength="128">
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role">Content Type</label>
                                        <select class="form-control required" id="content_type" name="content_type">
                                            <option value="0">Select Type</option>
                                            <option value="notice" <?php echo $content_type=='notice'?'selected':''?>>Notice</option>
                                            <option value="news" <?php echo $content_type=='news'?'selected':''?>>News</option>
                                            <option value="update" <?php echo $content_type=='update'?'selected':''?>>Update</option>
                                        </select>
                                    </div>
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Content</label>
                                        <textarea class="form-control required" rows="10" id="content" name="content"><?php echo $content; ?></textarea>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Show</label>
                                        <select class="form-control required" id="show_yn" name="show_yn">
                                            <option value="0">Select</option>
                                            <option value="y" <?php echo $show_yn=='y'?'selected':''?>>Yes</option>
                                            <option value="n" <?php echo $show_yn=='n'?'selected':''?>>No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="hidden" value="<?php echo $id; ?>" name="id" id="id" />    
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
</div>

<script src="<?php echo base_url(); ?>assets/js/addnotice.js" type="text/javascript"></script>