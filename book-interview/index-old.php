
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
     <script type="text/javascript" src="js/jq.stepform.js"></script>
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
            font-size: 16px;
            margin-top: 10px;
        }

        .userboxes {
            background-color: #f7f6f7;
            color: #000;
            padding: 6px;
            margin: 10px;
            margin-bottom: 20px;
            border: 1px solid #d8d4d4;
            border-radius: 10px;
        }
        .inboxeg{border-bottom: 1px solid #ccc;
padding: 10px;
margin: 0px;}
.stepwizard-step p {
    margin-top: 0px;
    color:#666;
}
.stepwizard-row {
    display: table-row;
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
.stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
    opacity:1 !important;
    color:#bbb;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content:" ";
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
}
    </style>
</head>

<body>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                <p class="mr-5"><small>Housing & Food</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p><small>Food & Utilization</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p><small>Child Care & Education</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p><small>Employment & Finance</small></p>
            </div>
             <div class="stepwizard-step col-xs-3"> 
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p><small>Personal Safety</small></p>
            </div>
        </div>
    </div>
    
    <form role="form" class="stepform">
        <div class="panel panel-primary setup-content" id="step-1">
            <div class="panel-heading">
                 <h3 class="panel-title">Housing</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                   <p>
                        <label class="control-label" for="Select Storage"><i class="fa fa-calendar"></i> Select Stage</label>
                        <select class="form-control" id="stage" name="stage">
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
                        <select class="form-control" id="duration" name="duration">
                            <option>Select</option>
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
                        <select class="form-control" id="timezone" name="timezone">
                            <option>Select</option>
                            <option>Central Standard Time - Chicago (GMT-6) </option>
                            <option>Mountain Standard Time - Denver (GMT-7) </option>
                        </select>
                    </p>
                </div>
                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
            </div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-2">
            <div class="panel-heading">
                 <h3 class="panel-title">Destination</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">Company Name</label>
                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
                </div>
                <div class="form-group">
                    <label class="control-label">Company Address</label>
                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address" />
                </div>
                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
            </div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-3">
            <div class="panel-heading">
                 <h3 class="panel-title">Schedule</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">Company Name</label>
                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
                </div>
                <div class="form-group">
                    <label class="control-label">Company Address</label>
                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address" />
                </div>
                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
            </div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-4">
            <div class="panel-heading">
                 <h3 class="panel-title">Cargo</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">Company Name</label>
                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
                </div>
                <div class="form-group">
                    <label class="control-label">Company Address</label>
                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address" />
                </div>
                <button class="btn btn-success pull-right" type="submit">Finish!</button>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">

 $(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
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

    allNextBtn.click(function () {
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
 $(function(){
$('body').on('click', '.nextBtn', function(){
 var $container = $(this).closest(".stepform");
 var duration = $container.find("#duration").val();
 var stage = $container.find("#stage").val();
 var nameradio1 = $container.find("#nameradio1").val();
 var timezone = $container.find("#timezone").val();
   $.ajax({
      type : 'POST',
      url : 'https://localhost/feufo/update_interview.php', 
      data : {
        duration: duration,
        stage: stage,
        nameradio1 : nameradio1,
        timezone : timezone
      },
      success : function(msg){
        console.log(msg);
      }
  });
});
});
</script> 
</body>

</html>