<script src="js/daypilot/daypilot-all.min.js" type="text/javascript"></script>
<div id="dp"></div>

var dp = new DayPilot.Calendar("dp");
dp.init();

dp.startDate = "2016-08-01";

function loadEvents() {
DayPilot.request("backend_events.php", function(result) {
var data = eval("(" + result.responseText + ")");
for(var i = 0; i < data.length; i++) {
var e = new DayPilot.Event(data[i]);
dp.events.add(e);
}
});
}

<?php
require_once '_db.php';

$result = $db->query('SELECT * FROM events');

class Event {}
$events = array();

foreach($result as $row) {
    $e = new Event();
    $e->id = $row['id'];
    $e->text = $row['name'];
    $e->start = $row['start'];
    $e->end = $row['end'];
    $events[] = $e;
}

echo json_encode($events);

?>