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

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Book Interviews</title>
    <style>
        body {
            background: linear-gradient(90deg, rgba(96, 40, 89, 1) 0%, rgba(78, 48, 109, 1) 46%, rgba(58, 57, 133, 1) 100%);
        }

        p label {
            font-weight: 600;
            padding-bottom: 3px;
            color: #000;
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
                    <p class="mr-5"><small>Book A Demo Details</small></p>
                </div> 
                <div class="stepwizard-step col-xs-3">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                    <p><small>Confirm Interview Schedule</small></p>
                </div>

            </div>
        </div>

        <form role="form" class="stepform">
            <div class="panel panel-primary setup-content" id="step-1">
                <div class="panel-heading">
                    <h3 class="panel-title">1. Book A Consultant with Our Sales Team</h3>
                    <hr />
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                        <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <label class="control-label" for="Company Name"> Company Name</label>
                                   <input type="text" name="username" id="name" placeholder="Your Company" class="form-control" required>
                                </p> 
                            </div>
                             <div class="col-md-12">
                                <p>
                                    <label class="control-label" for="Full Name"> Full Name</label>
                                   <input type="text" name="username" id="name" placeholder="Full Name" class="form-control" required>
                                </p> 
                            </div>
                             <div class="col-md-6">
                                <p>
                                    <label class="control-label" for="Email"> Email</label>
                                   <input type="email" name="username" id="name" placeholder="Email" class="form-control" required>
                                </p> 
                            </div>
                             <div class="col-md-6">
                                <p>
                                    <label class="control-label" for="Full Name"> Contact Number</label>
                                   <input type="tel" name="username" id="name" placeholder="Contact Number" class="form-control" value="+91-" required>
                                </p> 
                            </div>

                             <div class="col-md-12">
                                <p>
                                    <label class="control-label" for="Your Training Focus"> Your Training Focus</label>
                                   <input type="text" name="username" id="name" placeholder="Your Training Focus" class="form-control" value="" required>
                                </p> 
                            </div> 
                            </div>
                            </div>
                            <div class="col-md-6"><img src="img/interview-practice.png" class="img-fluid"></div> 
                        </div>
                        <button class="btn btn-primary nextBtn bnt-mds pull-right" type="button">Next</button>
                    </div>
                </div>
            </div> 

            <div class="panel panel-primary setup-content" id="step-2">
                <div class="panel-heading">
                    <h3 class="panel-title">2. Thanks What time works best for a Quick Call</h3>
                    <hr />
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                             <div class="row">
                                <div class="formboxes">
                                    <div class="well well-sm">
                                        <fieldset>
                                             <div class="row form-group" style="margin-bottom:15px;">
                                                <label class="col-md-2 control-label text-center" for="name">Select Date :</label>
                                                <div class="col-md-8">
                                                    <input id="name" name="name" type="date" placeholder="Select Date" class="form-control">
                                                </div>
                                            </div>                                             
                                        </fieldset>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <div class="col-md-12">
                             <div class="row">
                                <h2 class="text-center">What Time Works</h2>
                                <h5 class="text-center">30 Minute Meetings - America/Los_angeles Time(11:21 AM)</h5>
                                <div class="formboxes">
                                    <div class="well well-sm">
                                         <div class="row">
                         <div class="col-md-12">
                            <p class="radio boxtm">
                                <label><input name="nameradio1" type="radio" value="09:00 AM" /> 09:00 AM </label>
                                <label><input name="nameradio1" type="radio" value="10:00 AM" /> 10:00 AM </label>
                                <label><input name="nameradio1" type="radio" value="10:30 AM" /> 10:30 AM </label>
                                <label><input name="nameradio1" type="radio" value="11:00 AM" /> 11:00 AM </label>
                                 <label><input name="nameradio1" type="radio" value="11:30 AM" /> 11:30 AM </label>
                                <label><input name="nameradio1" type="radio" value="12:00 AM" /> 12:00 PM </label>
                                <label><input name="nameradio1" type="radio" value="02:00 AM" /> 02:00 PM </label>
                                <label><input name="nameradio1" type="radio" value="02:00 AM" /> 02:30 PM </label>
                            </p>
                        </div>
                    </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        
                        <div class="col-md-12">
                            <button class="btn btn-success bnt-mds pull-right" type="submit">Confirm / Submit</button>
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
                var stage = $container.find("#stage").val();
                var nameradio1 = $container.find("#nameradio1").val();
                var timezone = $container.find("#timezone").val();
                $.ajax({
                    type: 'POST',
                    url: 'https://localhost/feufo/update_interview.php',
                    data: {
                        duration: duration,
                        stage: stage,
                        nameradio1: nameradio1,
                        timezone: timezone
                    },
                    success: function(msg) {
                        console.log(msg);
                    }
                });
            });
        });
    </script>
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
            var e = 440;
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

</body>

</html>