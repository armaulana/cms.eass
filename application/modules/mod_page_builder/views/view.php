<!DOCTYPE html>
<html lang="en">
    <head>
      <link href="https://fonts.googleapis.com/css?family=B612+Mono|Cabin:400,700&display=swap" rel="stylesheet"> 
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/components/keditor-master/sources/plugins/bootstrap-3.4.1/css/bootstrap.min.css')?>" data-type="keditor-style" /> 
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/components/keditor-master/sources/plugins/font-awesome-4.7.0/css/font-awesome.min.css')?>" data-type="keditor-style" /> 
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/components/keditor-master/dist/css/keditor.css')?>" data-type="keditor-style" />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/components/keditor-master/dist/css/keditor-components.css')?>" data-type="keditor-style" />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/components/keditor-master/sources/plugins/code-prettify/src/prettify.css')?>" />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/components/keditor-master/sources/css/examples.css')?>" />
      <style type="text/css">
        .keditor-topbar{
          background: #605ca8; 
        }
        .keditor-topbar-btn.active, .keditor-topbar-btn:hover {
          background-color: #45427b;
        }
        body {
          font-family: "Cabin","Helvetica Neue",Helvetica,Arial,sans-serif;
        }
      </style>
    </head>
    <title>Page Editor</title>
      <body onload="modal()">  
        <div data-keditor="html">
            <div id="content-area">
                    <?php foreach($exsist as $key){ 
                            echo $key->source;
                    }?>
            </div>
        </div>
      </body>
      <div class="modal fade bd-example-modal-lg" id="modal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header" style="border-bottom: 1px solid #d2d6de ;border-bottom-style: dashed">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  <h3 class="modal-title">Information</h3>
                  <small class="title-small"><b style="color: #666"></b></small>
              </div>
              <div class="modal-body form">
                <small>
                Gunakan Section di Setiap Content <br/>
                Penggunaan <b>Section Hanya 1</b> <br/>
                Tidak menggunakan 
                </small>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">
                  <i class="fa fa-times"></i> &nbsp; Cancel
                </button>
              </div>
          </div>
        </div>
    </div>
</html>
<script type="text/javascript" src="<?php echo base_url('assets/admin/components/keditor-master/sources/plugins/jquery-1.11.3/jquery-1.11.3.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/components/keditor-master/sources/plugins/bootstrap-3.4.1/js/bootstrap.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/components/keditor-master/sources/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/components/keditor-master/sources/plugins/ckeditor-4.11.4/ckeditor.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/components/keditor-master/sources/plugins/formBuilder-2.5.3/form-builder.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/components/keditor-master/sources/plugins/formBuilder-2.5.3/form-render.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/components/keditor-master/dist/js/keditor.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/components/keditor-master/dist/js/keditor-components.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/components/keditor-master/sources/plugins/code-prettify/src/prettify.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/components/keditor-master/sources/plugins/js-beautify-1.7.5/js/lib/beautify.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/components/keditor-master/sources/plugins/js-beautify-1.7.5/js/lib/beautify-html.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/components/keditor-master/sources/js/examples.js')?>"></script>
<script type="text/javascript" data-keditor="script">
  function modal(){
    $('#modal').modal('show');
  }

  $(function(){
    $('#content-area').keditor();
  });

  function save(){
    $.ajax({
      url : "<?php echo site_url('mod_page_builder/ajax_add')?>",
      type: "POST",
      data: {
        action: "send",
        content: $('#content-area').keditor('getContent')
      },
      success: function(data){
        alert('success');
      },
      error: function (jqXHR, textStatus, errorThrown){
        alert('Failed');
      }
    });
  }
</script>
