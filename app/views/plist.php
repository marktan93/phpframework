<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Products | GMT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src='<?php echo LIBS?>assets/plugins/common/modernizr.js'></script>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <link href="<?php echo LIBS?>assets/plugins/jquery-ui/jquery.ui.1.10.2.ie.css" rel="stylesheet">
    <![endif]-->
    <link href="<?php echo LIBS?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo LIBS?>assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.css" rel="stylesheet">    
    <link href="<?php echo LIBS?>assets/plugins/select2/select2.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo LIBS?>assets/plugins/datatables/css/DT_bootstrap.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo LIBS?>assets/plugins/footable/css/footable.core.css" />

    <link href="<?php echo LIBS?>assets/css/main.css" rel="stylesheet">
    <link href="<?php echo LIBS?>assets/css/style-default.css" rel="stylesheet">

</head>

<body>
    
    <div id="wrapper">

        <?php load_file("cms/header.php") ?>

        <div id="main-container">
           
            <div class="inner-continer">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-danger">
                            <div class="panel-heading" style="height:50px;">
                                <h3 class="panel-title" style="margin-top:10px">Product Listing</h3>

                                <div class="panel-tools">
                                    <a href="<?php echo url("product/add");?>"><button class="btn btn-primary"><i class="fs-upload"></i> Add Product</button> </a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table id="data-table" class="table table-bordered table-hover footable DynamicTable table-condensed table-striped checkboxs js-table-sortable">
                                    <thead>
                                        <tr>
                                            <th align="center" style="width: 8%;">No.</th>
                                            <th>Item Name./ Code </th>
                                            <th align="center">Price </th>
                                            <th align="center" style="width: 15%;">Product Images</th>
                                            <th align="center" style="width: 12%;">Categories</th>
                                            <th style="width: 10%;">Item Part</th>
                                            <th style="width: 8%;">Status</th>
                                            <th class="center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $products = viewbag("products");
                                            $count = 0;
                                            if ($products != null)
                                            foreach($products as $product) {
                                        ?>
                                        <tr class="selectable" >
                                            <td align="center"><?php echo ++$count; ?></td>
                                            <td><strong><?php echo $product['product_name']; ?></strong></td>
                                            <td align="center">SGD <?php echo $product['product_price'];?></td>
                                            <td align="center"><img src="<?php echo LIBS?>assets/images/<?php echo $product['product_image']; ?>" alt=""/></td>
                                            <td align="center" class="important"><?php echo $product['category_name']; ?></td>
                                            <td align="center"><?php echo $product['part_name'];?></td>
                                            <td class="center"><label style="cursor:pointer;" href="#" class="btn-activate" pid="<?php echo $product['product_id']; ?>" >
                                                                <span class="label <?php echo ($product['product_status'] == Constant::Activated?"label-success": "label-danger"); ?>">
                                                                                    <?php echo $product['product_status'] ?>
                                                                </span></label></td>
                                            <td class="center">
                                                <a href="#" class="btn btn-xs btn-info bs-tooltip" data-placement="top" data-original-title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <label href="#" pid="<?php echo $product['product_id']; ?>" class="btn-delete btn btn-xs btn-danger bs-tooltip" data-placement="top" data-original-title="Delete">
                                                    <i class="fa fa-trash-o"></i>
                                                </label>
                                            </td>
                                        </tr>
                                        
                                        <?php
                                            }
                                        ?>
                                        

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div><!-- /main-container -->
        
        <?php load_file("cms/footer.php") ?>
        
    </div><!-- /wrapper -->

    <a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>

    <!-- Jquery -->
   <script src="<?php echo LIBS?>assets/js/jquery.js"></script>
    <script src="<?php echo LIBS?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src='<?php echo LIBS?>assets/plugins/slimScroll/jquery.slimscroll.js'></script>
    <script src='<?php echo LIBS?>assets/js/jquery-ui-1.10.4.js'></script>
    

    <script src="<?php echo LIBS?>assets/plugins/select2/select2.min.js"></script>
    <script src="<?php echo LIBS?>assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo LIBS?>assets/plugins/datatables/js/DT_bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo LIBS?>assets/plugins/footable/js/footable.min.js"></script>

    <script src="<?php echo LIBS?>assets/js/app.js"></script>
    <script src="<?php echo LIBS?>assets/js/plugins.js"></script>
    <script src='<?php echo LIBS?>assets/js/constant.js'></script>
    <script src='<?php echo LIBS?>assets/js/ajax.js'></script>
    <script>
        jQuery(document).ready(function(){
            App.init();
            DataTabels.init();
            
        });
    </script>

</body>
</html>
