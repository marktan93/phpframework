<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Multiple Upload | GMT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <!-- Generic page styles -->
    <link rel="stylesheet" href="<?php echo LIBS;?>temp/css/style.css">
    <!-- blueimp Gallery styles -->
    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="<?php echo LIBS;?>temp/css/jquery.fileupload.css">
    <link rel="stylesheet" href="<?php echo LIBS;?>temp/css/jquery.fileupload-ui.css">
    <!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript><link rel="stylesheet" href="<?php echo LIBS;?>temp/css/jquery.fileupload-noscript.css"></noscript>
    <noscript><link rel="stylesheet" href="<?php echo LIBS;?>temp/css/jquery.fileupload-ui-noscript.css"></noscript>
    
    <script src='<?php echo LIBS;?>assets/plugins/common/modernizr.js'></script>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="<?php echo LIBS;?>assets/plugins/validationEngine/validationEngine.jquery.css" rel="stylesheet" />
    <link href="<?php echo LIBS;?>assets/plugins/tagmanager/tagmanager.css" rel="stylesheet" />
    <link href="<?php echo LIBS;?>assets/css/main.css" rel="stylesheet">
    <link href="<?php echo LIBS;?>assets/css/style-default.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <?php load_file("cms/header.php");?>
        
        
        
        <div id="main-container" >
                <div class="inner-continer">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- The file upload form used as target for the file upload widget -->
                            <form id="fileupload" action="//jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">
                                <!-- Redirect browsers with JavaScript disabled to the origin page -->
                                <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
                                <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                <div class="row fileupload-buttonbar">
                                    <div class="col-lg-7">
                                        <!-- The fileinput-button span is used to style the file input field as button -->
                                        <span class="btn btn-success fileinput-button">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            <span>Add files...</span>
                                            <input type="file" name="files[]" multiple>
                                        </span>
                                        <button type="submit" class="btn btn-primary start">
                                            <i class="glyphicon glyphicon-upload"></i>
                                            <span>Start upload</span>
                                        </button>
                                        <button type="reset" class="btn btn-warning cancel">
                                            <i class="glyphicon glyphicon-ban-circle"></i>
                                            <span>Cancel upload</span>
                                        </button>
                                        <button type="button" class="btn btn-danger delete">
                                            <i class="glyphicon glyphicon-trash"></i>
                                            <span>Delete</span>
                                        </button>
                                        <input type="checkbox" class="toggle">
                                        <!-- The global file processing state -->
                                        <span class="fileupload-process"></span>
                                    </div>
                                    <!-- The global progress state -->
                                    <div class="col-lg-5 fileupload-progress fade">
                                        <!-- The global progress bar -->
                                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                        </div>
                                        <!-- The extended global progress state -->
                                        <div class="progress-extended">&nbsp;</div>
                                    </div>
                                </div>
                                <!-- The table listing the files available for upload/download -->
                                <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                            </form>
                            <br>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Demo Notes</h3>
                                </div>
                                <div class="panel-body">
                                    <ul>
                                        <li>The maximum file size for uploads in this demo is <strong>2 MB</strong> for each product item.</li>
                                        <li>Only image files (<strong>JPG, GIF, PNG</strong>) are allowed to uploaded.</li>
                                        <li>Can be uploaded <strong>multiple</strong> group item in 1 time.</li>
                                        <li>You can <strong>drag &amp; drop</strong> files from your desktop on this webpage with Google Chrome, Mozilla Firefox and Apple Safari.</li>
                                        <li>Remember <strong>scroll down</strong> to fill up the product details.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row">                

                    <div class="col-md-12">
                       <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h3 class="panel-title">Product Item Details</h3>
                                </div>
                            <div class="panel-body">
                                <form action="#" role="form" id="formvalidationtooltip">
                                    <div class="form-body">

                                        <div class="form-group">
                                            <label>Product Name</label><input type="text" class="form-control validate[required]" name="productname" id="productname" placeholder="Product Name" data-prompt-position="topLeft">
                                        </div>

                                        <div class="form-group">
                                            <label>Product Code</label>
                                            <input type="text" class="form-control validate[required]" name="productcode" id="productcode" placeholder="Product Code" data-prompt-position="topLeft">
                                        </div>
                                         <div class="form-group">
                                            <label>Product Price</label>
                                            <input type="text" class="form-control validate[required,custom[onlyLetterNumber]]" name="spacel" id="spacel" placeholder="Only Numbers And Digits" data-prompt-position="topLeft">
                                        </div>



                                        <div class="form-group">
                                            <label>Product Categories</label>
                                            <select name="product categories" id="product categories" class="form-control validate[required]" data-prompt-position="topLeft">
                                                <option value="">Choose a categories</option>
                                                <option value="option1">Male</option>
                                                <option value="option2">Female</option>
                                                <option value="option3">Equipment/ Accessories</option>
                                            </select>
                                        </div>


                                       

                                            <div class="form-group">
                                                <label>Product Part</label>
                                                    <select name="product_categories" id="product_categories" class="form-control validate[required]" data-prompt-position="topLeft">
                                                        <option value="">Choose a categories</option>
                                                        <option value="option1">Male</option>
                                                        <option value="option2">Female</option>
                                                        <option value="option3">Equipment/ Accessories</option>
                                                    </select>
                                            </div>

                                            <div class="form-group">
                                                <a style="cursor:pointer;" data-toggle="modal" data-target="#myModal">Configure Categories & Parts</a>
                                            </div>

                                       

                                    </div>

                                    <div class="form-actions fluid">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn btn-info">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
           
           
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
    </script>
    
    </div>
              
            
    </div> <!--end of main container-->
          
           
	
    <?php load_file('cms/footer.php')?>
    
    
    
    
    </div>
           
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Configure Categories & Parts</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                    <label>Product Categories</label>
                    <select id="categories" class="form-control validate[required]" data-prompt-position="topLeft">
                        <option value="">Choose a categories</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="equipment">Equipment/ Accessories</option>
                    </select>
                </div>
              <div class="form-group">
                    <label>Product Part</label><br />
                    <input type="text" name="tags" placeholder="Tags" class="tm-input tm-input-info form-control" />
              </div>
              <div class="form-group" style="text-align: center; display:none;" id="loading">
                    <img src="<?php echo LIBS?>temp/img/loading.gif" height="30" width="30"  />
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>       
           
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script src="<?php echo LIBS;?>temp/js/vendor/jquery.ui.widget.js"></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
    <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- blueimp Gallery script -->
    <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="<?php echo LIBS;?>temp/js/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="<?php echo LIBS;?>temp/js/jquery.fileupload.js"></script>
    <!-- The File Upload processing plugin -->
    <script src="<?php echo LIBS;?>temp/js/jquery.fileupload-process.js"></script>
    <!-- The File Upload image preview & resize plugin -->
    <script src="<?php echo LIBS;?>temp/js/jquery.fileupload-image.js"></script>
    <!-- The File Upload audio preview plugin -->
    <script src="<?php echo LIBS;?>temp/js/jquery.fileupload-audio.js"></script>
    <!-- The File Upload video preview plugin -->
    <script src="<?php echo LIBS;?>temp/js/jquery.fileupload-video.js"></script>
    <!-- The File Upload validation plugin -->
    <script src="<?php echo LIBS;?>temp/js/jquery.fileupload-validate.js"></script>
    <!-- The File Upload user interface plugin -->
    <script src="<?php echo LIBS;?>temp/js/jquery.fileupload-ui.js"></script>
    <!-- The main application script -->
    <script src="<?php echo LIBS;?>assets/js/constant.js"></script>
    <script src="<?php echo LIBS;?>temp/js/main.js"></script>
    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
    <!--[if (gte IE 8)&(lt IE 10)]>
    <script src="js/cors/jquery.xdr-transport.js"></script>
    <![endif]-->

    <script src='<?php echo LIBS;?>assets/plugins/slimScroll/jquery.slimscroll.js'></script>
    <script src="<?php echo LIBS;?>assets/plugins/common/jquery.blockUI.js"></script>
    <script src="<?php echo LIBS;?>assets/plugins/tagmanager/tagmanager.js"></script>
    
     <script src="<?php echo LIBS;?>assets/plugins/validation/jquery.validate.min.js"></script>
    <script src="<?php echo LIBS;?>assets/plugins/validationEngine/languages/jquery.validationEngine-en.js"></script>
    <script src="<?php echo LIBS;?>assets/plugins/validationEngine/jquery.validationEngine.js"></script>
    
    <script src="<?php echo LIBS;?>assets/js/app.js"></script>
    <script src="<?php echo LIBS;?>assets/js/plugins.js"></script>
    <script>
        jQuery(document).ready(function(){
            App.init();
			FormValidationInline.init();
            FormValidationTooltip.init();
        });
    </script>
    
</body> 
</html>