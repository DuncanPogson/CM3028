<script src="js/daypilot/daypilot-all.min.js" type="text/javascript"></script>
    <div id="dp"></div>

var dp = new DayPilot.Calendar("dp");
dp.init();

dp.startDate = "2016-08-01";

function loadEvents() {
    DayPilot.request("calendarevents.php", function(result) {
        var data = eval("(" + result.responseText + ")");
        for(var i = 0; i < data.length; i++) {
            var e = new DayPilot.Event(data[i]);
            dp.events.add(e);
        }
    });
}
<link type="text/css" rel="stylesheet" href="themes/calendar_white.css" />
