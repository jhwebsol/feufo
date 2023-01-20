<style>
.cdy div{
width:20%;
float:left;
margin:10px; }
hr{
    border:1px #e96125 solid!important;
}
</style>
<?php include("db_config.php"); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://www.feufo.com/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/demostyle.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/font-awesome.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="screen" />
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<link href="css/mobiscroll.javascript.min.css" rel="stylesheet" />
<script src="js/mobiscroll.javascript.min.js"></script>
  
    <title>Book Interviews</title>
    <style>
        body {
            background: linear-gradient(90deg, rgba(96, 40, 89, 1) 0%, rgba(78, 48, 109, 1) 46%, rgba(58, 57, 133, 1) 100%);
        }

        p label {
            font-weight: 600;
            padding-bottom: 10px;
            color: #000
        }

        #calendar {
            margin-left: auto;
            margin-right: auto;
            width: 100%;
            font-family: 'Lato', sans-serif;
        }

        #calendar_weekdays div {
            display: inline-block;
            vertical-align: top;
        }

        #calendar_content,
        #calendar_weekdays,
        #calendar_header {
            position: relative;
            width: 100%;
            overflow: hidden;
            float: left;
            z-index: 10;
        }

        #calendar_weekdays div,
        #calendar_content div {
            width: 40px;
            height: 40px;
            overflow: hidden;
            text-align: center;
            background-color: #FFFFFF;
            color: #787878;
        }

        #calendar_content {
            -webkit-border-radius: 0px 0px 12px 12px;
            -moz-border-radius: 0px 0px 12px 12px;
            border-radius: 0px 0px 12px 12px;
        }

        #calendar_content div {
            float: left;
        }

        #calendar_content div:hover {
            background-color: #F8F8F8;
        }

        #calendar_content div.blank {
            background-color: #E8E8E8;
        }

        #calendar_header,
        #calendar_content div.today {
            zoom: 1;
            filter: alpha(opacity=70);
            opacity: 0.7;
        }

        #calendar_content div.today {
            color: #000;
        }

        #calendar_header {
            width: 100%;
            height: 37px;
            text-align: center;
            background-color: #FF6860;
            padding: 18px 0;
            -webkit-border-radius: 12px 12px 0px 0px;
            -moz-border-radius: 12px 12px 0px 0px;
            border-radius: 12px 12px 0px 0px;
        }

        #calendar_header h1 {
            font-size: 1.5em;
            color: #000;
            float: left;
            width: 70%;
        }

        i[class^=icon-chevron] {
            color: #000;
            float: left;
            width: 15%;
            border-radius: 50%;
        }

        .sf-step p {
            color: #000
        }

        .boxtm label {
            border: 1px solid #ccc;
            padding: 10px 10px;
            margin-right: 10px;
            background-color: #f6f5f5;
            min-width: 190px;
            margin-bottom: 10px;
        }

        .sf-step .boxtm label small {
            font-weight: 300 !important;
        }

        .calendar_header h1 {
            color: #fff;
            text-align: center;
        }

        .stepform h4 {
            color: #060675
        }

        .btn-dts {
            width: 100%;
            margin-bottom: 12px;
            border: 1px solid #494b78;
            padding: 12px;
        }

        .btn-dts:hover {
            background-color: #ced031;
            color: #060675
        }

        #custom-search-input {
            margin: 0;
            margin-top: 10px;
            padding: 0;
        }

        #custom-search-input .search-query {
            padding-right: 3px;
            padding-right: 4px \9;
            padding-left: 3px;
            padding-left: 4px \9;
            /* IE7-8 doesn't have border-radius, so don't indent the padding */

            margin-bottom: 0;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }

        #custom-search-input button {
            border: 0;
            background: none;
            /** belows styles are working good */
            padding: 2px 5px;
            margin-top: 2px;
            position: relative;
            left: -28px;
            /* IE7-8 doesn't have border-radius, so don't indent the padding */
            margin-bottom: 0;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            color: #D9230F;
        }

        .search-query:focus+button {
            z-index: 3;
        }

        .formboxes {
            background-color: #f7f6f7;
            color: #000;
            padding: 10px
        }

        .formboxes label {
            font-weight: 600;
            font-size: 14px;
            margin-top: 2px;
        }

        .userboxes {
            background-color: #f7f6f7;
            color: #000;
            padding: 6px;
             margin-bottom: 20px;
            border: 1px solid #d8d4d4;
            border-radius: 10px;
        }
        .userboxes h6{
            font-size: 13px;
        }

        .inboxeg label{font-weight:600;color:}
        .inboxeg {
            border-top: 1px solid #ccc;
            padding: 10px 1px;
            margin: 0px;
        }

        .stepwizard-step p {
            margin-top: 0px;
            color: #666;
        }

        .stepwizard-row {
            display: table-row;
        }

        .stepwizard small {
            color: #fff
        }

        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }

        .stepwizard-step button[disabled] {
            /*opacity: 1 !important;
    filter: alpha(opacity=100) !important;*/
        }

        .stepwizard .btn.disabled,
        .stepwizard .btn[disabled],
        .stepwizard fieldset[disabled] .btn {
            opacity: 1 !important;
            color: #bbfffb;
        }

        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-index: 0;
        }

        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }

        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
            font-weight: 800;
            color: #fff;
        }

        .form-group {
            margin-bottom: 2rem;
        }

        .bnt-mds {
            padding: 10px 20px;
            font-size: 16px;
            min-width: 100px
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step col-xs-3">
                    <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                    <p class="mr-5"><small>Interview Details</small></p>
                </div>
                <div class="stepwizard-step col-xs-3">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                    <p><small>Book An Interviews</small></p>
                </div>
                <div class="stepwizard-step col-xs-3">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                    <p><small>Select A slot for Interview Confirmation</small></p>
                </div>
                <div class="stepwizard-step col-xs-3">
                    <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                    <p><small>Confirm Interview Schedule</small></p>
                </div>

            </div>
        </div>
        <form role="form" class="stepform">
            <div class="panel panel-primary setup-content" id="step-1">
                <div class="panel-heading">
                    <h3 class="panel-title">1. Interview Details</h3>
                    <hr />
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6"><img src="img/interview-practice.png" class="img-fluid"></div>
                            <div class="col-md-6">
                                <p>
                                    <label class="control-label" for="Interview Type"><i class="fa fa-bars"></i> Interview Type</label>
                                    <select class="form-control" name="interview_type" id="interview_type">
                                        <option>Online</option>
                                    </select>
                                    <input name="pid" id="pid" type="hidden" value="<?= $_GET['id'];?>" />
                                </p>
                                <p>
                                    <label class="control-label" for="Select Storage"><i class="fa fa-calendar"></i> Select Stage</label>
                                    <select class="form-control" name="stage" id="stage" required>
                                        <option>1st Round Interview</option>
                                        <option>2nd Round Interview</option>
                                        <option>3rd Round Interview</option>
                                        <option>4th Round Interview</option>
                                        <option>5th Round Interview</option>
                                    </select>
                                </p>
                                <p class="radio">
                                    <label class="control-label" for="Choose Interview Time/Schedule" style="font-size:20px;"><i class="fa fa-cogs"></i> Choose Interview Time/Schedule</label>
                                </p>
                                <p class="radio">
                                    <label><input name="nameradio1" id="nameradio1" type="radio" value="Fixed Slot" /> Fixed Slot <br>
                                        <small style="font-weight:300">You pick the time for the interview</small></label>
                                </p>
                                <p class="radio">
                                    <label><input name="nameradio1" id="nameradio1" type="radio" value="Flexible Slots" /> Flexible Slots <br>
                                        <small style="font-weight:300">Let candidate pick from the available slots</small></label>
                                </p>
                                <p>
                                    <label class="control-label" for="Choose Interview Time/Schedule"><i class="fa fa-calendar"></i> Select Duration</label>
                                    <select class="form-control" id="duration" name="duration" required>
                                        <option value="">Select</option>
                                        <option>10 min</option>
                                        <option>15 min</option>
                                        <option>20 min</option>
                                        <option>30 min</option>
                                        <option>60 min</option>
                                        <option>90 Days</option>
                                    </select>
                                </p>
                                <p>
                                    <label class="control-label" for="Choose Interview Time/Schedule"><i class="fa fa-yelp"></i> Time Zone</label>
                                    <select class="form-control" name="timezone" id="timezone" required>
                                        <option value="">Select</option>
                                        <option>Central Standard Time - Chicago (GMT-6) </option>
                                        <option>Mountain Standard Time - Denver (GMT-7) </option>
                                    </select>
                                </p>
                            </div>
                        </div>
                        <button class="btn btn-primary nextBtn bnt-mds pull-right" type="button">Next</button>
                    </div>
                </div>
            </div>

            <div class="panel panel-primary setup-content" id="step-2">
                <div class="panel-heading">
                    <h3 class="panel-title">2. Book An Interviews</h3>
                    <hr />
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <h4>Interview Details</h4>
                            <?php $idd=$_GET['id'];
                            $sqlts =mysqli_query($conn,"SELECT * FROM candidate_interview_details WHERE emp_id = '".$idd."'");
                            $rests= mysqli_fetch_array($sqlts); ?>
                            <p><label class="control-label" for="Interview Type"><i class="fa fa-bars"></i> Interview Type :</label> <?= $rests['interview_type']; ?> </p>
                            <p><label class="control-label" for="Interview Type"><i class="fa fa-calendar"></i> Stage :</label> <?= $rests['stage']; ?> </p>
                            <p><label class="control-label" for="Interview Type"><i class="fa fa-cogs"></i> Schedule Type :</label> <?= $rests['schedule_at']; ?> </p>
                            <p><label class="control-label" for="Interview Type"><i class="fa fa-calendar"></i> Duration :</label> <?= $rests['duration']; ?> </p>
                        </div>
                        <div class="col-md-5">
                            <h4><i class="fa fa-calendar-plus-o"></i> Select Date</h4>
                        <div class="mbsc-grid">
                            <div class="mbsc-row">
                                <div class="mbsc-col-sm-12 mbsc-col-md-12">
                                    <div class="mbsc-form-group">
                                        <div class="mbsc-form-group-title">Date</div>
                                          <input name="cid" id="cid" value="<?= $rests['id'];?>" type="hidden" />
                                          <input name="pid" id="pid" type="hidden" value="<?= $_GET['id'];?>" />
                                        <div id="demo-multi-day" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
      
                            <p>&nbsp;</p>
                            <h4 style="margin-top:30px"><i class="fa fa-clock-o"></i> Time Zone</h4>
                            <p>
                                <select class="form-control" name="tzone" id="tzone">
                                    <option>Select</option>
                                    <option>Central Standard Time - Chicago (GMT-6) </option>
                                    <option>Mountain Standard Time - Denver (GMT-7) </option>
                                </select>
                            </p>
                        </div>
                        <div class="col-md-4" id="date_time">
                          <?php $idd=$_GET['id'];
                          $sqlsr =mysqli_query($conn,"SELECT * FROM candidate_interview_date WHERE emp_id='".$idd."'");
                            while($ress= mysqli_fetch_array($sqlsr)){ ?>
                             <div class="row">
                                <div class="col-md-12">
                                    <h4><i class="fa fa-globe"></i> Select Time</h4>
                                </div>
                                <div class="col-md-12"><input class="control-label" type="text" value="<?= $ress['in_date'];?>" style="border:0px;" readonly><span data-value="<?= $ress['id'] ?>" class="delete-time">X</a></div>
                              <div class="table-responsive " id="dynamic_field"> 
                                <div class="" style="width:20%;float:left;">
                                    <label>Hours</label>
                                    <input class="" type="text" name="hours[]" id="hours" style="width:100%">
                                    <input value="<?= $ress['cid']; ?>" type="hidden" name="cd_id" style="width:100%">
                                </div>

                                <div class="" style="width:20%;float:left;">
                                    <label>Minute</label>
                                    <input class="" type="text" name="minutes[]" id="minutes" style="width:100%;">
                                </div>
                                <div class="" style="width:20%;float:left;">
                                    <label>&nbsp;</label>
                                    <select name="timezone[]" id="timezone"  style="width:100%;background-color:#fff;">
                                        <option>AM</option>
                                        <option>PM</option>
                                    </select>
                                </div>
                              </div> 
                                <div style="width:20%;float:left;">
                                    <label>&nbsp;</label>
                                    <button type="button" name="add" id="add" class="btn btn-success">
                                    <img src="img/plus.jpeg" style="width:20px;height:20px;"></button>
                                    <!-- <img src="img/delete.png" style="width:20px;height:20px;"> -->
                                </div>
                            </div>
                            <hr /><?php } ?>
                           <!--  <div class="col-md-12">
                                <h4>Add More Dates</h4>
                                <button class="btn btn-dts"> 09 December 2022</button>
                                <button class="btn btn-dts"> 19 December 2022</button>
                                <button class="btn btn-dts"> 22 December 2022</button>
                            </div> -->
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary nextBtn nexttme bnt-mds pull-right" type="button">Next</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-primary setup-content" id="step-3">
                <div class="panel-heading">
                    <h3 class="panel-title">3. Select A slot for Interview Confirmation</h3>
                    <hr />
                </div>
                <div class="panel-body">
                    <div class="row">

                        <div class="col-md-12" style="margin-bottom:20px;margin-top: 20px;"><strong>Choose a slot to confirm the interview schedule.</strong></div>
                    </div>
                    <?php $idd=$_GET['id'];
                        $sqlsrt =mysqli_query($conn,"SELECT * FROM candidate_interview_date WHERE emp_id='".$idd."'");
                        while($resst= mysqli_fetch_array($sqlsrt)){ $cids=$resst['id'];
                       ?>
                    <div class="row">
                        <div class="col-md-1 text-center"><strong><?= $resst['in_date']?></strong></div>
                        <div class="col-md-11">
                            <p class="radio boxtm">
                             <?php $sqltm =mysqli_query($conn,"SELECT * FROM candidate_interview_times WHERE cd_interview_id='".$cids."'");
                             while($restm= mysqli_fetch_array($sqltm)){ 
                                $hour=(int)$restm['hours'];
                                $hours=(int)$restm['hours'];
                                $data= $hour.':'.$restm['minute'].' '.$restm['timezone'] .'-'. ++$hours.':'.$restm['minute'].' '.$restm['timezone']; ?>
                                <label><input name="timeslot_<?= $resst['id'];?>" type="radio" value="<?= $restm['id']; ?>" /> <?= $data; ?> </label>
                                <?php } ?>
                                <input value="<?= $resst['id'];?>" type="hidden" name="cdid">
                            </p>
                        </div>
                    </div><?php } ?>
                    <div class="row">
                        <div class="col-md-12">
                            <hr />
                        </div>
                        <div class="col-md-12">
                            <h4>Details</h4>
                        </div>
                        <?php $idd=$_GET['id'];
                            $sqltls =mysqli_query($conn,"SELECT * FROM candidate_interview_details WHERE emp_id = '".$idd."'");
                            $restls= mysqli_fetch_array($sqltls); ?>
                        <div class="col-md-4"><label class="control-label" style="margin-bottom:10px" for="Interview Type"><i class="fa fa-bars"></i> <span>Interview Type :</span> <strong><?= $restls['interview_type']; ?> </strong> </label></div>
                        <div class="col-md-4"><label class="control-label" style="margin-bottom:10px" for="Interview Type"><i class="fa fa-calendar"></i> <span>Stage :</span> <strong><?= $restls['stage']; ?>  </strong></label></div>
                        <div class="col-md-4"><label class="control-label" style="margin-bottom:10px" for="Interview Type"><i class="fa fa-cogs"></i> <span>Schedule Type :</span> <strong><?= $restls['schedule_at']; ?></strong></label> </div>
                        <div class="col-md-4"><label class="control-label" style="margin-bottom:10px" for="Interview Type"><i class="fa fa-calendar"></i> <span>Duration :</span> <strong><?= $restls['duration']; ?></strong></label> </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr />
                        </div>
                        <div class="col-md-12">
                            <h4>Interviewers</h4>
                        </div>
                        <div class="col-md-4"><label class="control-label" style="background-color:#ccc;padding:4px 10px;border-radius:10px;" for="Interview Type"><i class="fa fa-user"></i> <span>Team</span></label></div>
                        <div class="col-md-12">
                            <button class="btn btn-primary nextBtn nextltbtn bnt-mds pull-right" type="button">Next</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-primary setup-content" id="step-4">
                <div class="panel-heading">
                    <h3 class="panel-title">4. Book An Interviews</h3>
                    <hr />
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4><i class="fa fa-calendar-plus-o"></i> Add Interviews</h4>

                            <div class="row" id="custom-search-input">
                                <div class="input-group col-md-12" style="margin-bottom:20px;">
                                    <input type="text" class="  search-query form-control" placeholder="Search Interviewers" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger" type="button">
                                            <span class="fa fa-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>

                            <div class="row">
                              <?php $idd=$_GET['id'];
                                $sqldt =mysqli_query($conn,"SELECT * FROM candidate_interview_details WHERE emp_id = '".$idd."'");
                                $restdt= mysqli_fetch_array($sqldt); $idd=$_GET['id'];
                                $cds_id= $restdt['id'];
                                $sqldts =mysqli_query($conn,"SELECT * FROM candidate_interviewers WHERE emp_id = '".$idd."' and cds_id='".$cds_id."'");
                                while($restdts= mysqli_fetch_array($sqldts)){ ?>     
                              <div class="col-md-6">
                                <div class="userboxes">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-3 col-3">
                                            <img src="img/user.jpg" class="img-fluid">
                                        </div>
                                        <div class="col-md-7 col-xs-7 col-7" style="padding-left:0px;padding-right:0px">
                                            <h6>Name: <?= $restdts['name'];?></h6>
                                            <h6>Email: <?= $restdts['email_id'];?></h6>
                                        </div>

                                        <div class="col-md-2 col-xs-1 col-1"><button class="btn btn-sm btn-danger delete-interviewer" value="<?= $restdts['id'];?>" type="button"> <i class="fa fa-trash"></i> </button></div>
                                    </div>
                                 </div>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="row">
                                <div class="formboxes">
                                    <div class="well well-sm">
                                       <div class="table-responsive " id="dynamic_fields"> 
                                        <fieldset>
                                            <legend class="text-left">Enter Interview Details</legend>
                                            <div class="row form-group" style="margin-bottom:15px;">
                                                <label class="col-md-3 control-label" for="name">Name</label>
                                                <div class="col-md-9">
                                                    <input id="iname" name="iname[]" type="text" placeholder="Enter Full Name" class="form-control" >
                                                    <input value="<?= $restdt['id'];?>" type="hidden" name="cds_id" id="cds_id">
                                                    <input value="<?= $_GET['id'];?>" type="hidden" name="emp_id" id="emp_id">
                                                </div>
                                            </div>

                                            <div class="row form-group" style="margin-bottom:15px;">
                                                <label class="col-md-3 control-label" for="email">E-mail</label>
                                                <div class="col-md-9">
                                                    <input id="email_intr" name="email_intr[]" type="text" placeholder="Enter Your Email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group" style="margin-bottom:15px;">
                                                <label class="col-md-3 control-label" for="cno">Contact Number</label>
                                                <div class="col-md-9">
                                                    <input id="contact_noit" name="contact_noit[]" type="number" placeholder="Your Contact Number" class="form-control" maxlength="10">
                                                </div>
                                            </div>
                                        </fieldset>
                                     </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <p> <button class="btn btn-md btn-info" type="button" name="addintr" id="addintr">
                                        <i class="fa fa-plus"></i> Add More Interviewers
                                    </button></p>
                            </div>
                            <div class="row">
                                <p> <button class="btn btn-md btn-info send-addit" type="button" name="addit" id="addit"> Add
                                    </button></p>
                            </div>
                            <div class="row" style="margin-top:30px;margin-bottom:20px;">
                                <h4 ><i class="fa fa-clock-o"></i> Customize Video Link</h4>
                                <div class="" style="width:100%;float:left;">
                                    <input class="" type="text" name="video_link" id="video_link"  style="width:100%;">
                                     <input value="<?= $restdt['id'];?>" type="hidden" name="cd_idd" id="cd_idd">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="userboxes">
                                <h4>Interview Details</h4>
                                <?php $cidd=$restdt['id'];
                                $sqldte =mysqli_query($conn,"SELECT * FROM candidate_interview_date WHERE emp_id='".$cidd."'");
                                $resdte= mysqli_fetch_array($sqldte); ?>
                                <div class="row inboxeg">
                                    <label class="control-label col-md-4" for="Interview Type"><i class="fa fa-bars"></i> Interview Type:</label>
                                    <div class="col-md-8"><?= $restdt['interview_type']; ?> </div>
                                </div>
                                <div class="row inboxeg">
                                    <label class="control-label col-md-4" for="Interview Type"><i class="fa fa-calendar"></i> Interview Stage:</label>
                                    <div class="col-md-8"><?= $restdt['stage']; ?> </div>
                                </div>
                                <div class="row inboxeg">
                                    <label class="control-label col-md-4" for="Interview Type"><i class="fa fa-cogs"></i> Schedule Type:</label>
                                    <div class="col-md-8"><?= $restdt['schedule_at']; ?></div>
                                </div>
                                <div class="row inboxeg">
                                    <label class="control-label col-md-4" for="Interview Type"><i class="fa fa-calendar"></i> Timezone:</label>
                                    <div class="col-md-8"><?= $restdt['timezone']; ?> </div>
                                </div>
                                <div class="row inboxeg">
                                    <label class="control-label col-md-4" for="Interview Type"><i class="fa fa-clock-o"></i> Duration:</label>
                                    <div class="col-md-8"><?= $restdt['duration']; ?> </div>
                                </div>

                                <div class="row inboxeg">
                                    <label class="control-label col-md-4" for="Interview Type"><i class="fa fa-bars"></i> Selected Slots:</label>
                                    <div class="col-md-8"> <?php  $cidd=$restdt['id'];
                                $sqldtes =mysqli_query($conn,"SELECT * FROM candidate_interview_date WHERE cid='".$cidd."'");
                                while($resdtes= mysqli_fetch_array($sqldtes)){
                                 $hid= $resdtes['hours'];  
                                 $sqltme =mysqli_query($conn,"SELECT * FROM candidate_interview_times WHERE id='".$hid."'");
                                $restme= mysqli_fetch_array($sqltme); 
                                $hour=(int)$restme['hours'];
                                $hours=(int)$restme['hours'];
                                $data= $hour.':'.$restme['minute'].' '.$restme['timezone'] .'-'. ++$hours.':'.$restme['minute'].' '.$restme['timezone'];
                                 ?>
                               <?= $resdtes['in_date']?>(<?= $data;?>),<?php } ?></div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-success bnt-mds pull-right laststep" type="button">Confirm / Submit</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {

            var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn');

            allWells.hide();

            navListItems.click(function(e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                    $item = $(this);

                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-success').addClass('btn-default');
                    $item.addClass('btn-success');
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                }
            });

            allNextBtn.click(function() {
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                    curInputs = curStep.find("input[type='text'],input[type='url']"),
                    isValid = true;

                $(".form-group").removeClass("has-error");
                for (var i = 0; i < curInputs.length; i++) {
                    if (!curInputs[i].validity.valid) {
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                    }
                }

                if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
            });

            $('div.setup-panel div a.btn-success').trigger('click');
        });
        $(function() {
            $('body').on('click', '.nextBtn', function() {
                var $container = $(this).closest(".stepform");
                var duration = $container.find("#duration").val();
                var interview_type = $container.find("#interview_type").val();
                var stage = $container.find("#stage").val();
                var schedule_at = $container.find("#nameradio1").val();
                var timezone = $container.find("#timezone").val();
                var emp_id = $container.find("#pid").val();
                $.ajax({
                    type: 'POST',
                    url: 'https://www.feufo.com/update_interview.php',
                    data: {
                        emp_id: emp_id,
                        interview_type: interview_type,
                        duration: duration,
                        stage: stage,
                        schedule_at: schedule_at,
                        timezone: timezone
                    },
                    success: function(data) {
                          //alert(data);
                    }
                });
            });
        }); 
    $(function() {
        $('body').on('click', '.laststep', function() {
            var $container = $(this).closest(".stepform");
            var video_link = $container.find("#video_link").val();
            var cd_idd = $container.find("#cd_idd").val();
            var action = "add_laststep";
           // alert(video_link);
            $.ajax({
                type: 'POST',
                url: 'https://www.feufo.com/send_interview_link.php',
                data: {
                    video_link: video_link,
                    cd_idd: cd_idd,
                    action: action
                },
                success: function(data) {
                      alert(data);
                }
            });
        });
    }); 
    $(function() {
    $('body').on('click', '.nextltbtn', function() {
        var $container = $(this).closest(".stepform");
        var timeslot = $('input[name^="timeslot"]:checked').map(function(){
         return this.value;
        }).get();
        var cdid = $('input[name="cdid"]').map(function(){
         return this.value;
         }).get();
         var action = "add_slot";
        $.ajax({
            type: 'POST',
            url: 'https://www.feufo.com/update_intdate.php',
            data: {
                timeslot: timeslot,
                cdid: cdid,
                action: action
            },
            success: function(data) {
                  alert(data);
            //  console.log(msg);
            }
        });
    });
}); 
 $(function() {
 $('body').on('click', '.mbsc-calendar-cell-text', function() {
   var dates = $(this).attr("aria-label");
   var $container = $(this).closest(".stepform");
   var emp_id = $container.find("#pid").val();
   var cd_id = $container.find("#cid").val();
   var action = "add_date";
    $.ajax({
        type: 'POST',
        url: 'https://www.feufo.com/update_intdate.php',
        data: {
            emp_id: emp_id,
            dates: dates,
            cd_id: cd_id,
            action: action
          },
        success: function(msg) {
            $("#date_time").load(" #date_time");
            console.log(msg);
           // alert(msg);
        }
    });
 });
});
$(function() {
 $('body').on('click', '.nexttme', function() {
   var $container = $(this).closest(".stepform");
   var tzone = $container.find("#tzone").val();
   var cdid = $container.find("#cd_id").val();      
 var minute = $('input[name="minutes[]"]').map(function(){
     return this.value;
    }).get();     
 var hours = $('input[name="hours[]"]').map(function(){
     return this.value;
    }).get();     
 var timezone = $('select[name="timezone[]"]').map(function(){
     return this.value;
    }).get();     
  var action = "add_time";
 // alert(hours);
    $.ajax({
        type: 'POST',
        url: 'https://www.feufo.com/update_intdate.php',
        data: {
            cdid: cdid,
            tzone: tzone,
            minute: minute,
            hours: hours,
            timezone: timezone,
            action: action
          },
        success: function(msg) {
            console.log(msg);
         //   alert(msg);
        }
    });
});
});
$(function() {
 $('body').on('click', '.send-addit', function() {
   var $container = $(this).closest(".stepform");  
   var cds_id = $container.find("#cds_id").val();
   var emp_id = $container.find("#emp_id").val(); 
 var iname = $('input[name="iname[]"]').map(function(){
     return this.value;
    }).get();     
 var email_intr = $('input[name="email_intr[]"]').map(function(){
     return this.value;
    }).get();     
 var contact_noit = $('input[name="contact_noit[]"]').map(function(){
     return this.value;
    }).get();     
  var action = "add_interviewer";
//   alert(mv);
    $.ajax({
        type: 'POST',
        url: 'https://www.feufo.com/update_intdate.php',
        data: {
            emp_id: emp_id,
            cds_id: cds_id,
            email_intr: email_intr,
            iname: iname,
            contact_noit: contact_noit,
            action: action
          },
        success: function(msg) {
             $("#step-4").load(" #step-4");
            //console.log(msg);
        }
    });
});
});
</script>
<script type="text/javascript">
mobiscroll.setOptions({
    theme: 'ios',
    themeVariant: 'light'
});

mobiscroll.datepicker('#demo-multi-day', {
    controls: ['calendar'],
    display: 'inline',
    selectMultiple: true
});

mobiscroll.datepicker('#demo-max-days', {
    controls: ['calendar'],
    display: 'inline',
    selectMultiple: true,
    selectMax: 5,
    headerText: 'Pick up to 5 days'
});

mobiscroll.datepicker('#demo-counter', {
    controls: ['calendar'],
    display: 'inline',
    selectMultiple: true,
    selectCounter: true
});
</script>

<script type="text/javascript">
 /* Delete */   
 $(function(){
 $('body').on('click', '.delete-time', function() {
    data_pid = $(this).attr('data-value');
   var action = "add_delete";
    $.ajax({
        type: 'POST',
        url: 'https://www.feufo.com/delete_candintr.php',
        data: {
            data_pid: data_pid,
            action: action
          },
        success: function(msg) {
            $("#date_time").load(" #date_time");
           //console.log(msg);
        }
    });
 });
});
$(function(){
 $('body').on('click', '.delete-interviewer', function() {
    data_pid = $(this).attr('value');
   var action = "delete_interviewer";
    $.ajax({
        type: 'POST',
        url: 'https://www.feufo.com/delete_candintr.php',
        data: {
            data_pid: data_pid,
            action: action
          },
        success: function(msg) {
            $("#step-4").load("#step-4");
           //console.log(msg);
        }
    });
 });
});
$(document).ready(function() {
    var i = 1;
    $('#add').click(function() {
        i++;
         $('#dynamic_field').append('<div id="row'+i+'" class="cdy"><div><strong>Hours:</strong><br /><input type="text" name="hours[]" id="hours" placeholder="Enter Hours" class="form-control name_list" /></div><div><strong>Minutes:</strong><br /><input type="text" name="minutes[]" id="minutes" placeholder="Enter Minutes" class="form-control name_list" /></div><div><strong>Minute:</strong><br /><select type="text" name="timezone[]" id="timezone" class="form-control"><option>AM</option><option>PM</option></select></div><div style="width:10%; margin-top:30px"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div><div class="clearfix"></div><hr/>'); 
    });
    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });
    $('#submit').click(function() {
        $.ajax({
            url: "add-product.php",
            method: "POST",
            data: $('#add_name').serialize(),
            success: function(data) {
                alert(data);
                $('#add_name')[0].reset();
            }
        });
    });
});
$(document).ready(function() {
    var j = 1;
    $('#addintr').click(function() {
        j++;
         $('#dynamic_fields').append('<div id="row'+j+'" class="cdys"><div><strong>Name:</strong><br /><input type="text" name="iname[]" id="iname" placeholder="Enter Name" class="form-control name_list" /></div><div><strong>Email Id:</strong><br /><input type="text" name="email_intr[]" id="email_intr" placeholder="Enter Email Id" class="form-control name_list" /></div><div><strong>Contact No:</strong><br /><input type="text" name="contact_noit[]" id="contact_noit" placeholder="Enter Contact No" class="form-control name_list" /></div><div style="width:10%; margin-top:30px"><button type="button" name="remove" id="'+j+'" class="btn btn-danger btn_removes">X</button></div></div><div class="clearfix"></div><hr/>'); 
    });
    $(document).on('click', '.btn_removes', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });
    $('#submit').click(function() {
        $.ajax({
            url: "index.php",
            method: "POST",
            data: $('#add_name').serialize(),
            success: function(data) {
             //   alert(data);
                $('#add_name')[0].reset();
            }
        });
    });
});
$(document).ready(function() {
        
     $('#nextBtn').click(function() {
         var valid = validateFormSection();
    //     if ( valid ) {
    //         $($questions[currentQuestion]).slideUp(function() {
    //             $($questions[currentQuestion]).removeClass('active'); //Remove the active class
    //             currentQuestion++;
    //             $($questions[currentQuestion]).addClass('active'); //Add class active
    //             if (currentQuestion == $questions.length - 1) {
    //                 $('#next').css('display', 'none');
    //                 $('#submit').css('display', 'inline');
    //             }else{
    //                 $('#next').css('display', 'inline');
    //                 $('#submit').css('display', 'none');
    //             }
    //             $('#back').css('display', 'inline');
    //             $($questions[currentQuestion]).slideDown();
    //         });
    //     }
    }); 
    
    $('form').submit( function (e) {
        var valid = validateFormSection();
        if ( valid ) {
            $('form').submit();
        } else {
            e.preventDefault();
        }
    });
    
    // Remove class active when fields are being filled
    $('input, textarea').on('keyup', function() {
        if ( $(this).val() != "" && $(this).hasClass('active') ) {
            $(this).removeClass('active');
        }
    });
    
    function validateFormSection() {
        var valid = true; //As long as it's true, we may continue
        var section = $('#step-1'); //Find the active section
        var inputs = section.find('input, select, textarea'); //Get all its inputs, of all types
        //We'll save the first validated element in here
        //We have to define it here, not inside the `inputs.each()` loop
        //So we have access to it outside that loop
        var focusElem;
        
        inputs.each(function(index, el) {
            var elem = $(el); //Current element we're working with
            
            if ( elem.data('validate') == true ){ //We get the validate attribute and check if it's true
                if ( elem.val() == "" ) {
                    valid = false;
                    elem.addClass('active');
                    if ( ! focusElem ) { //Only save when it's empty (first time around)
                        focusElem = elem;
                    }
                }
            }
        });
        if ( ! valid ) {
            alert('Please fill mandatory fields');
            focusElem.focus();
        }
        return valid;
    }
    
});
</script>
</body>

</html>