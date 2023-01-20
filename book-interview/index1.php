
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
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-white text-center">Book An Interviews</h1>
         
        <div class="row">
            <div class="col-md-12">
                <form class="stepform" action="" method="post"> <?php $j=1; ?>
                    <fieldset class="sf-step interview <?php if($j==1){ echo "sf-active"; $j++; } ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <legend>1. Interview Details</legend>
                                <hr />
                            </div>
                            <div class="col-md-6"><img src="img/interview-practice.png" class="img-fluid"></div>
                            <div class="col-md-6">
                                <p>
                                    <label class="control-label" for="Interview Type"><i class="fa fa-bars"></i> Interview Type</label>
                                    <select class="form-control">
                                        <option>Online</option>
                                    </select>
                                </p>
                                <p>
                                    <label class="control-label" for="Select Storage"><i class="fa fa-calendar"></i> Select Stage</label>
                                    <select class="form-control">
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
                                    <label><input name="nameradio1" type="radio" value="Fixed Slot" /> Fixed Slot <br>
                                        <small style="font-weight:300">You pick the time for the interview</small></label>
                                </p>
                                <p class="radio">
                                    <label><input name="nameradio1" type="radio" value="Flexible Slots" /> Flexible Slots <br>
                                        <small style="font-weight:300">Let candidate pick from the available slots</small></label>
                                </p>
                                <p>
                                    <label class="control-label" for="Choose Interview Time/Schedule"><i class="fa fa-calendar"></i> Select Duration</label>
                                    <select class="form-control">
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
                                    <select class="form-control">
                                        <option>Select</option>
                                        <option>Central Standard Time - Chicago (GMT-6) </option>
                                        <option>Mountain Standard Time - Denver (GMT-7) </option>
                                    </select>
                                </p>
                            </div>
                        </div>
                        <p>&nbsp;</p>
                        <p class="text-center">
                            <button type="button" name="sendme" class="btn btn-success nextBtn">Change</button>
                        </p>  
                    </fieldset>
                    <fieldset class="sf-step interview">
                        <div class="row">
                            <div class="col-md-12">
                                <legend>2. Book An Interviews</legend>
                                <hr />
                            </div>
                            <div class="col-md-3">
                                <h4>Interview Details</h4>
                                <p><label class="control-label" for="Interview Type"><i class="fa fa-bars"></i> Interview Type :</label> Online </p>
                                <p><label class="control-label" for="Interview Type"><i class="fa fa-calendar"></i> Stage :</label> 1st Technical Interview </p>
                                <p><label class="control-label" for="Interview Type"><i class="fa fa-cogs"></i> Schedule Type :</label> Flexible Slots </p>
                                <p><label class="control-label" for="Interview Type"><i class="fa fa-calendar"></i> Duration :</label> 60 Minutes </p>
                            </div>
                            <div class="col-md-5">
                                <h4><i class="fa fa-calendar-plus-o"></i> Select Date & Time</h4>

                                <div id="calendar">
                                    <div id="calendar_header"><i class="icon-chevron-left"></i>
                                        <h1></h1><i class="icon-chevron-right"></i>
                                    </div>
                                    <div id="calendar_weekdays"></div>
                                    <div id="calendar_content"></div>
                                </div>
                                <p>&nbsp;</p>
                                <h4 style="margin-top:30px"><i class="fa fa-clock-o"></i> Time Zone</h4>
                                <p>
                                    <select class="form-control">
                                        <option>Select</option>
                                        <option>Central Standard Time - Chicago (GMT-6) </option>
                                        <option>Mountain Standard Time - Denver (GMT-7) </option>
                                    </select>
                                </p>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4><i class="fa fa-globe"></i> Select Time</h4>
                                    </div>
                                    <div class="col-md-12"><input class="control-label" type="text" value="15-December-2022" style="border:0px;" readonly> X</div>
                                    <div class="" style="width:20%;float:left;">
                                        <label>Hours</label>
                                        <input class="" type="text" value="" style="width:100%">
                                    </div>

                                    <div class="" style="width:20%;float:left;">
                                        <label>Minute</label>
                                        <input class="" type="text" value="" style="width:100%;">
                                    </div>
                                    <div class="" style="width:20%;float:left;">
                                        <label>&nbsp;</label>
                                        <select style="width:100%;background-color:#fff;">
                                            <option>AM</option>
                                            <option>PM</option>
                                        </select>
                                    </div>
                                    <div style="width:20%;float:left;">
                                        <label>&nbsp;</label>
                                        <img src="img/plus.jpeg" style="width:20px;height:20px;">
                                        <img src="img/delete.png" style="width:20px;height:20px;">
                                    </div>
                                </div>

                                <hr />
                                <div class="col-md-12">
                                    <h4>Add More Dates</h4>
                                    <button class="btn btn-dts"> 09 December 2022</button>
                                    <button class="btn btn-dts"> 19 December 2022</button>
                                    <button class="btn btn-dts"> 22 December 2022</button>
                                </div>
                            </div>
                        </div>
                         <p>&nbsp;</p>
                        <p class="text-center">
                           <button type="button" class="btn btn-success nextBtn">Change</button>
                        </p>
                    </fieldset>

                    <fieldset class="sf-step interview">
                        <div class="row">
                            <div class="col-md-12" style="border-bottom:1px solid #ccc">
                                <legend>3. Select A slot for Interview Confirmation</legend>
                            </div>
                            <div class="col-md-12" style="margin-bottom:20px;margin-top: 20px;"><strong>Choose a slot to confirm the interview schedule.</strong></div>
                        </div>
                        <div class="row">
                            <div class="col-md-1 text-center"><strong>Dec 15</strong></div>
                            <div class="col-md-11">
                                <p class="radio boxtm">
                                    <label><input name="nameradio1" type="radio" value="09:00 AM - 10:00 AM" /> 09:00 AM - 10:00 AM </label>
                                    <label><input name="nameradio1" type="radio" value="11:00 AM - 12:00 AM" /> 11:00 AM - 12:00 PM </label>
                                    <label><input name="nameradio1" type="radio" value="01:00 AM - 02:00 AM" /> 02:00 PM - 03:00 PM </label>
                                    <label><input name="nameradio1" type="radio" value="01:00 AM - 02:00 AM" /> 04:00 PM - 05:00 PM </label>
                                    <label><input name="nameradio1" type="radio" value="01:00 AM - 02:00 AM" /> 05:00 PM - 06:00 PM </label>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1 text-center"><strong>Dec 16</strong></div>
                            <div class="col-md-11">
                                <p class="radio boxtm">
                                    <label><input name="nameradio1" type="radio" value="11:00 AM - 12:00 AM" /> 11:00 AM - 12:00 PM </label>
                                    <label><input name="nameradio1" type="radio" value="01:00 AM - 02:00 AM" /> 01:00 PM - 02:00 PM </label>
                                    <label><input name="nameradio1" type="radio" value="01:00 AM - 02:00 AM" /> 02:00 PM - 02:30 PM </label>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1 text-center"><strong>Dec 20</strong></div>
                            <div class="col-md-11">
                                <p class="radio boxtm">
                                    <label><input name="nameradio1" type="radio" value="01:00 AM - 02:00 AM" /> 01:00 PM - 02:00 PM </label>
                                    <label><input name="nameradio1" type="radio" value="01:00 AM - 02:00 AM" /> 02:00 PM - 02:30 PM </label>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <hr />
                            </div>
                            <div class="col-md-12">
                                <h4>Details</h4>
                            </div>
                            <div class="col-md-4"><label class="control-label" style="margin-bottom:10px" for="Interview Type"><i class="fa fa-bars"></i> <span>Interview Type :</span> <strong>Online</strong> </label></div>
                            <div class="col-md-4"><label class="control-label" style="margin-bottom:10px" for="Interview Type"><i class="fa fa-calendar"></i> <span>Stage :</span> <strong>1st Technical Interview </strong></label></div>
                            <div class="col-md-4"><label class="control-label" style="margin-bottom:10px" for="Interview Type"><i class="fa fa-cogs"></i> <span>Schedule Type :</span> <strong>Flexible Slots</strong></label> </div>
                            <div class="col-md-4"><label class="control-label" style="margin-bottom:10px" for="Interview Type"><i class="fa fa-calendar"></i> <span>Duration :</span> <strong>60 Minutes</strong></label> </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <hr />
                            </div>
                            <div class="col-md-12">
                                <h4>Interviewers</h4>
                            </div>
                            <div class="col-md-4"><label class="control-label" style="background-color:#ccc;padding:4px 10px;border-radius:10px;" for="Interview Type"><i class="fa fa-user"></i> <span>Team</span></label></div>

                        </div>
                    </fieldset>
                    <fieldset class="sf-step interview">
                        <div class="row">
                            <div class="col-md-12">
                                <legend>4. Book An Interviews</legend>
                                <hr />
                            </div>
                            <div class="col-md-4">
                                <h4>Interview Details</h4>
                                <p><label class="control-label" for="Interview Type"><i class="fa fa-bars"></i> Interview Type :</label> Online </p>
                                <p><label class="control-label" for="Interview Type"><i class="fa fa-calendar"></i> Stage :</label> 1st Technical Interview </p>
                                <p><label class="control-label" for="Interview Type"><i class="fa fa-cogs"></i> Schedule Type :</label> Flexible Slots </p>
                                <p><label class="control-label" for="Interview Type"><i class="fa fa-calendar"></i> Timezone :</label> India Standered Zone(+5:30) </p>
                                <p><label class="control-label" for="Interview Type"><i class="fa fa-clock-o"></i> Duration :</label> 60 Minutes </p>
                                <p><label class="control-label" for="Interview Type"><i class="fa fa-bars"></i> Selected Slots :</label> 22 December 2022(05:00PM-06:00PM), 23 December 2022(11:00AM-12:20PM)</p>
                            </div>

                            <div class="col-md-8">
                                <h4><i class="fa fa-calendar-plus-o"></i> Add Interviews</h4>

                                <div class="row" id="custom-search-input">
                                    <div class="input-group col-md-12">
                                        <input type="text" class="  search-query form-control" placeholder="Search Interviewers" />
                                        <span class="input-group-btn">
                                            <button class="btn btn-danger" type="button">
                                                <span class="fa fa-search"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5 userboxes">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-2">
                                                <img src="img/user.jpg" class="img-fluid">
                                            </div>
                                            <div class="col-md-7 col-xs-10">
                                                <h6>User Name: Neha</h6>
                                                <h6>Email: xxxx@xxxx.com</h6>
                                            </div>

                                            <div class="col-md-2"><button class="btn btn-sm btn-danger" type="button"> <i class="fa fa-trash"></i> </button></div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 userboxes">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-2">
                                                <img src="img/user.jpg" class="img-fluid">
                                            </div>
                                            <div class="col-md-7 col-xs-10">
                                                <h6>User Name: Manoj</h6>
                                                <h6>Email: xxxxx@xxxx.com</h6>
                                            </div>

                                            <div class="col-md-2"><button class="btn btn-sm btn-danger" type="button"> <i class="fa fa-trash"></i> </button></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="formboxes">
                                        <div class="well well-sm">
                                            <fieldset>
                                                <legend class="text-left">Enter Interview Details</legend>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="name">Name</label>
                                                    <div class="col-md-9">
                                                        <input id="name" name="name" type="text" placeholder="Enter Full Name" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="email">E-mail</label>
                                                    <div class="col-md-9">
                                                        <input id="email" name="email" type="text" placeholder="Enter Your Email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="cno">Contact Number</label>
                                                    <div class="col-md-9">
                                                        <input id="cno" name="tel" type="tel" placeholder="Your Contact Number" class="form-control">
                                                    </div>
                                                </div>
                                            </fieldset>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <p> <button class="btn btn-md btn-info" type="button">
                                            <i class="fa fa-plus"></i> Add Interviewers
                                        </button></p>
                                </div>
                                <div class="row">
                                    <h4 style="margin-top:30px"><i class="fa fa-clock-o"></i> Customize Video Link</h4>
                                    <div class="" style="width:100%;float:left;">
                                        <input class="" type="text" value="" style="width:100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="sf-step interview">
                       <div class="userboxes">
                         <h4>Interview Details</h4>
                        <div class="row inboxeg">
                            <label class="control-label col-md-3" for="Interview Type"><i class="fa fa-bars"></i> Interview Type :</label>
                            <div class="col-md-9">Online </div>
                        </div>
                        <div class="row inboxeg">
                            <label class="control-label col-md-3" for="Interview Type"><i class="fa fa-calendar"></i> Interview Stage :</label>
                            <div class="col-md-9">Applied </div>
                        </div>
                        <div class="row inboxeg">
                            <label class="control-label col-md-3" for="Interview Type"><i class="fa fa-cogs"></i> Schedule Type :</label>
                            <div class="col-md-9">Flexible Slots </div>
                        </div>
                        <div class="row inboxeg">
                            <label class="control-label col-md-3" for="Interview Type"><i class="fa fa-calendar"></i> Timezone :</label>
                            <div class="col-md-9">India Standered Zone(+5:30) </div>
                        </div>
                        <div class="row inboxeg">
                            <label class="control-label col-md-3" for="Interview Type"><i class="fa fa-clock-o"></i> Duration :</label>
                            <div class="col-md-9">60 Minutes </div>
                        </div>
                        <div class="row inboxeg">
                            <label class="control-label col-md-3" for="Interview Type"><i class="fa fa-bars"></i> Selected Slots :</label>
                            <div class="col-md-9">22 December 2022(05:00PM-06:00PM), 23 December 2022(11:00AM-12:20PM)</div>
                        </div>
                           <p>&nbsp;</p>
 
                        <p class="text-center">
                            <input type="submit" value="Confirm / Submit" name='submit' class="btn btn-success">
                        </p>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            function c() {
                p();
                var e = h();
                var r = 0;
                var u = false;
                l.empty();
                while (!u) {
                    if (s[r] == e[0].weekday) {
                        u = true
                    } else {
                        l.append('<div class="blank"></div>');
                        r++
                    }
                }
                for (var c = 0; c < 42 - r; c++) {
                    if (c >= e.length) {
                        l.append('<div class="blank"></div>')
                    } else {
                        var v = e[c].day;
                        var m = g(new Date(t, n - 1, v)) ? '<div class="today">' : "<div>";
                        l.append(m + "" + v + "</div>")
                    }
                }
                var y = o[n - 1];
                a.css("background-color", y).find("h1").text(i[n - 1] + " " + t);
                f.find("div").css("color", y);
                l.find(".today").css("background-color", y);
                d()
            }

            function h() {
                var e = [];
                for (var r = 1; r < v(t, n) + 1; r++) {
                    e.push({
                        day: r,
                        weekday: s[m(t, n, r)]
                    })
                }
                return e
            }

            function p() {
                f.empty();
                for (var e = 0; e < 7; e++) {
                    f.append("<div>" + s[e].substring(0, 3) + "</div>")
                }
            }

            function d() {
                var t;
                var n = $("#calendar").css("width", e + "px");
                n.find(t = "#calendar_weekdays, #calendar_content").css("width", e + "px").find("div").css({
                    width: e / 7 + "px",
                    height: e / 7 + "px",
                    "line-height": e / 7 + "px"
                });
                n.find("#calendar_header").css({
                    height: e * (1 / 7) + "px"
                }).find('i[class^="icon-chevron"]').css("line-height", e * (1 / 7) + "px")
            }

            function v(e, t) {
                return (new Date(e, t, 0)).getDate()
            }

            function m(e, t, n) {
                return (new Date(e, t - 1, n)).getDay()
            }

            function g(e) {
                return y(new Date) == y(e)
            }

            function y(e) {
                return e.getFullYear() + "/" + (e.getMonth() + 1) + "/" + e.getDate()
            }

            function b() {
                var e = new Date;
                t = e.getFullYear();
                n = e.getMonth() + 1
            }
            var e = 480;
            var t = 2013;
            var n = 9;
            var r = [];
            var i = ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"];
            var s = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
            var o = ["#16a085", "#1abc9c", "#c0392b", "#27ae60", "#FF6860", "#f39c12", "#f1c40f", "#e67e22", "#2ecc71", "#e74c3c", "#d35400", "#2c3e50"];
            var u = $("#calendar");
            var a = u.find("#calendar_header");
            var f = u.find("#calendar_weekdays");
            var l = u.find("#calendar_content");
            b();
            c();
            a.find('i[class^="icon-chevron"]').on("click", function() {
                var e = $(this);
                var r = function(e) {
                    n = e == "next" ? n + 1 : n - 1;
                    if (n < 1) {
                        n = 12;
                        t--
                    } else if (n > 12) {
                        n = 1;
                        t++
                    }
                    c()
                };
                if (e.attr("class").indexOf("left") != -1) {
                    r("previous")
                } else {
                    r("next")
                }
            })
        })
    </script>
<script type="text/javascript">
/*$(function(){
$('body').on('click', '.optionsss', function(){
    var answer_opt = $(this).val();
  var $container = $(this).closest(".container");
 var qid = $container.find(".qid").val();
 data_pid=$(this).attr('data-pid');
   $.ajax({
      type : 'POST',
      url : 'http://localhost/feufo/update_interview.php', 
      data : {
        qid: $container.find(".qid").val(),
        id: data_pid,
        ans : answer_opt
      },
      success : function(msg){
        console.log(msg);
      }
  });
 });
});  */
$(document).ready(function() {
  $('.nextBtn').click(function(){
    var $current = $('.interview.sf-active');
    // use $current here to test if the question was answered if needed 
    // maybe something like if($current.find('.answer').val().trim() == ''){ return;}
    $('.interview').removeClass('sf-active');
    $current.next().addClass('sf-active');
});
});   
</script>   
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
</script> 
</body>

</html>