<?php include("includes/css.php")?>
<style>
    .border-boxesk .heads {
        font-weight: 800 !important;
        padding-top: 20px;
    }

    .border-boxesk .fa {
        color: #dddfeb !important;
        padding-top: 20px;
    }

    .border-boxesk {
        border-left: 0.25rem solid #4e73df !important;
        background-color: #fff !important;
        width: 100%;
        height: 110px;
        border: 1px solid #e3e6f0;
        padding: 1.25rem;
        border-radius: 0.35rem;
        margin-bottom: 25px;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15) !important;
    }
    .border-boxeskgreen .heads {
        font-weight: 800 !important;
        color: #1cc88a!important;
        padding-top: 20px;
    }

    .border-boxeskgreen .fa { 
        padding-top: 20px;
color:#dddfeb !important;
    }

    .border-boxeskgreen {
        border-left: 0.25rem solid #4e73df !important;
        background-color: #fff !important;
        width: 100%;
        height: 110px;
        border: 1px solid #1cc88a;
        color: #1cc88a!important;
        padding: 1.25rem;
        border-radius: 0.35rem;
        margin-bottom: 25px;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15) !important;
    }

</style>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <div class="card">
                            <div class="card-body border-boxesk" >
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="text-xs text-primary text-uppercase heads"> Total Employer</div>
                                         <?php $sts="Active";
                                    $sqlcts=mysqli_fetch_array(mysqli_query($conn,"select count(*) as empr from employer")); ?>
                                        <div class="h5 mb-0"><?= $sqlcts['empr'];?></div>
                                    </div>
                                    <div class="col-md-2">
                                        <i class="fa fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="card">
                            <div class="card-body border-boxesk" >
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="text-xs text-primary text-uppercase heads"> Total Candidate</div>
                                        <?php $sts="Active";
                                    $sqlct=mysqli_fetch_array(mysqli_query($conn,"select count(*) as allprty from employee_details ")); ?>
                                        <div class="h5 mb-0"><?= $sqlct['allprty'];?></div>
                                    </div>
                                    <div class="col-md-2">
                                        <i class="fa fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <!--  <div class="col-lg-3 col-xs-6">
                        <div class="card">
                            <div class="card-body border-boxesk" >
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="text-xs text-primary text-uppercase heads"> Pending Property</div>
                                        <?php $sts="Active";
                                    $sqlcts=mysqli_fetch_array(mysqli_query($conn,"select count(*) as pedrty from es_property where es_property.status !='".$sts."'")); ?>
                                        <div class="h5 mb-0"><?= $sqlcts['pedrty'];?></div>
                                    </div>
                                    <div class="col-md-2">
                                        <i class="fa fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="card">
                            <div class="card-body border-boxesk" >
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="text-xs text-primary text-uppercase heads"> Total Property</div>
                                        <?php //$sts="Active";
                                   // $sqlal=mysqli_fetch_array(mysqli_query($conn,"select count(*) as prty from es_property ")); ?>
                                        <div class="h5 mb-0"><?= $sqlal['prty'];?></div>
                                    </div>
                                    <div class="col-md-2">
                                        <i class="fa fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="card">
                            <div class="card-body border-boxesk" >
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="text-xs text-primary text-uppercase heads"> Total User</div><?php  $sqlus=mysqli_fetch_array(mysqli_query($conn,"select count(*) as usf from user_profile ")); ?>
                                        <div class="h5 mb-0"><?= $sqlus['usf'];?></div>
                                    </div>
                                    <div class="col-md-2">
                                        <i class="fa fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="card">
                            <div class="card-body border-boxeskgreen">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="text-xs text-primary text-uppercase heads"> Earnings (Total)</div>
                                        <div class="h5 mb-0">4</div>
                                    </div>
                                    <div class="col-md-2">
                                        <i class="fa fa-dollar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="card">
                            <div class="card-body border-boxeskgreen">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="text-xs text-primary text-uppercase heads"> Earnings (Monthly)</div>
                                        <div class="h5 mb-0">4</div>
                                    </div>
                                    <div class="col-md-2">
                                        <i class="fa fa-dollar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="card">
                            <div class="card-body border-boxesk" >
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="text-xs text-primary text-uppercase heads"> Total Subscriber </div>
                                        <?php  $sqlpr=mysqli_query($conn,"SELECT count(*) as num from subscribe");
                                        $respr=mysqli_fetch_array($sqlpr); ?>

                                        <div class="h5 mb-0"><?= $respr['num']; ?></div>
                                    </div>
                                    <div class="col-md-2">
                                        <i class="fa fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!--     <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <?php  $sqlpr=mysqli_query($conn,"SELECT count(*) as num from es_property");
                                               $respr=mysqli_fetch_array($sqlpr); ?>

                                <h3><?= $respr['num']; ?></h3>
                                <p>Property</p>
                            </div>
                            <div class="icon"> <i class="fa fa-first-order text-white"></i> </div> <a href="property.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <?php  //$sqlpr=mysqli_query($conn,"SELECT count(*) as eq from enquiry");
                                          //     $row1=mysqli_fetch_array($sqlpr); ?>
                                <h3><?php // $row1['eq']; ?></h3>
                                <p>Enquiry </p>
                            </div>
                            <div class="icon"> <i class="fa fa-shopping-basket text-white"></i> </div> <a href="enquiry-now.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>-->
					</div>
            </section>
            
        </div>
        
        <?php include("includes/footer.php");?>
        <div class="control-sidebar-bg"></div>
    </div>
    <?php include("includes/js.php");?>
</body>

</html>
