<?php
function RevByClass($month) {
$query = "SELECT
	flightSchedule.`departuredate`,
	classes.className,
    COUNT(passengers.passengerID),
    sum(DISTINCT bookings.totalCost)
FROM
	bookings,
    `flightSchedule`,
    classes,
    `passengers`,
	`bookings_passengers`
WHERE
	classes.classID = bookings.`classID` AND
    bookings.`FlightScheduleID` = flightSchedule.`ScheduleID` AND
    passengers.`passengerID` = `bookings_passengers`.`passengerID` AND
    bookings.`bookingID` = bookings_passengers.`bookingID` AND 
    MONTH(flightSchedule.`departuredate`) = ".$month."

GROUP BY
   	flightSchedule.`departuredate`,
    bookings.classID
    ";
	return mysql_query($query);
}