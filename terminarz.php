<!DOCTYPE html>
<html>
<head>
    <title>DayPilot Pro for JavaScript</title>
	<!-- demo stylesheet -->
    	<link type="text/css" rel="stylesheet" href="../Terminaz/media/layout.css" />

	<!-- helper libraries -->
	<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
	
	<!-- daypilot libraries -->
        <script src="js/daypilot/daypilot-all.min.js" type="text/javascript"></script>
	
        <!-- daypilot themes -->
	<link type="text/css" rel="stylesheet" href="../Terminaz/themes/calendar_white.css" />
	<link type="text/css" rel="stylesheet" href="../Terminaz/themes/bubble_default.css" />


        
        <style type="text/css">
    #toolbar 
    {
    	margin-bottom: 10px;
    }
    
    #toolbar a 
    {
    	display: inline-block;
    	height: 20px;
    	text-decoration: none;
    	padding: 5px;
    	color: #666;
    	border: 1px solid #aaa;

	    background: -webkit-gradient(linear, left top, left bottom, from(#fafafa), to(#e2e2e2));
	    background: -webkit-linear-gradient(top, #fafafa 0%, #e2e2e2);
	    background: -moz-linear-gradient(top, #fafafa 0%, #e2e2e2);
	    background: -ms-linear-gradient(top, #fafafa 0%, #e2e2e2);
	    background: -o-linear-gradient(top, #fafafa 0%, #e2e2e2);
	    background: linear-gradient(top, #fafafa 0%, #e2e2e2);
	    filter: progid:DXImageTransform.Microsoft.Gradient(startColorStr="#fafafa", endColorStr="#e2e2e2");    	
    }            
            
        </style>
</head>
<body>


        <div class="main">
            
            <div class="space"></div>
                
            
            <div id="toolbar">
                <a href="javascript:dp.viewType='Day';dp.update();">Day</a>
                <a href="javascript:dp.viewType='Week';dp.update();">Week</a>
            </div>
            <div id="dp"></div>

            <script type="text/javascript">
                var dp = new DayPilot.Calendar("dp");

                // behavior and appearance
                dp.cssClassPrefix = "calendar_white";

                // view
                dp.startDate = new DayPilot.Date("2013-05-01");  // or just dp.startDate = "2013-03-25";
                dp.viewType = "Week";

                dp.moveBy = 'Full';
                dp.showToolTip = false;

                // bubble, with async loading
                dp.bubble = new DayPilot.Bubble({
                    cssClassPrefix: "bubble_default",
                    onLoad: function(args) {
                        var ev = args.source;
                        args.async = true;  // notify manually using .loaded()

                        // simulating slow server-side load
                        setTimeout(function() {
                            args.html = "<div style='font-weight:bold'>" + ev.text() + "</div><div>Start: " + ev.start().toString("MM/dd/yyyy HH:mm") + "</div><div>End: " + ev.end().toString("MM/dd/yyyy HH:mm") + "</div><div>Id: " + ev.id() + "</div>";
                            args.loaded();
                        }, 500);

                    }
                });

                // no events at startup, we will load them later using loadEvents()
                dp.events.list = [];

                dp.onBeforeEventRender = function(args) {
                };

                dp.onBeforeCellRender = function(args) {
                    if (args.cell.start.getDayOfWeek() === 6 || args.cell.start.getDayOfWeek() === 0) {
                        args.cell.backColor = "#eee";
                    }
                    else {
                        if (args.cell.start.getHours() === 13) {
                            args.cell.backColor = "#eee";
                        }
                    }
                };

                dp.onEventMoved = function (args) {
                    DayPilot.request(
                        "backend_move.php", 
                        function(req) { // success
                            var response = eval("(" + req.responseText + ")");
                            if (response && response.result) {
                                dp.message("Moved: " + response.message);
                            }
                        },
                        args,
                        function(req) {  // error
                            dp.message("Saving failed");
                        }
                    );        
                };

                dp.onEventResized = function (args) {
                    DayPilot.request(
                        "backend_resize.php", 
                        function(req) { // success
                            var response = eval("(" + req.responseText + ")");
                            if (response && response.result) {
                                dp.message("Resized: " + response.message);
                            }
                        },
                        args,
                        function(req) {  // error
                            dp.message("Saving failed");
                        }
                    );    
                };

                // event creating
                dp.onTimeRangeSelected = function (args) {
                    var name = prompt("New event name:", "Event");
                    dp.clearSelection();
                    if (!name) return;
                    var e = new DayPilot.Event({
                        start: args.start,
                        end: args.end,
                        id: DayPilot.guid(),
                        resource: args.resource,
                        text: name
                    });
                    dp.events.add(e);

                    args.text = name;

                    DayPilot.request(
                        "backend_create.php", 
                        function(req) { // success
                            var response = eval("(" + req.responseText + ")");
                            if (response && response.result) {
                                dp.message("Created: " + response.message);
                            }
                        },
                        args,
                        function(req) {  // error
                            dp.message("Saving failed");
                        }
                    ); 
                };

                dp.onEventClick = function(args) {
                    alert("clicked: " + args.e.id());
                };

                dp.init();

                loadEvents();

                function loadEvents() {
                    DayPilot.request("backend_events.php", function(result) {
                        var data = eval("(" + result.responseText + ")");
                        for(var i = 0; i < data.length; i++) {
                            var e = new DayPilot.Event(data[i]);                
                            dp.events.add(e);
                        }
                    });
                }

            </script>

        </div>
        <div class="clear">
        </div>
</body>
</html>

