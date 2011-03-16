<?php

$month = $_POST['month'];




if(isset($_POST['Class'])){?><div class="title-bar"> Sales Per Class</div><?php buildTable (revByClass($month));}
if(isset($_POST['SPF'])){?><div class="title-bar"> Income Per Flight</div><?php buildTable (incomeAllFlights($month));}
if(isset($_POST['GB'])){}
if(isset($_POST['SPS'])){?><div class="title-bar"> Income Per Schedule</div><?php buildTable (incomePerSchedule($month));}
if(isset($_POST['TIP'])){?><div class="title-bar"> Period Income</div><?php buildTable (incomeTotalPeriod($month));}
if(isset($_POST['SBPF'])){}
if(isset($_POST['FF'])){?><div class="title-bar"> Flight Frequency</div><?php buildTable (flightFrequency($month));}

?>



