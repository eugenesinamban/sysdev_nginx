<?php
date_default_timezone_set("Asia/Tokyo");
echo "<h1>Hello World!</h1>";

echo date("Y, n月 j日 - g:i");

$seconds = date('s') + 40;
$minutes = date('i') + 40;
$hours = date('g') + 40;
$radius = 30;

?>
<html>
  <head>
    <style>
        #seconds {
            color: blue;
        }
    </style>
  </head>
  <body>
        <svg viewBox="0 0 300 300" xmlns="http://www.w3.org/2000/svg" stroke='#000' fill='#fff'>
            <circle cx='30' cy='30' r="<?php echo $radius; ?>" />
            <g>
                <line id="seconds" x1='40' y1='40' x2="<?php echo $seconds; ?>" y2='5' stroke="red" />
                <!-- <line id="hour" x1="40" y1="40" x2="<?php echo $hour; ?>" y2="20" stroke="blue" />
                <line id="minute" x1="40" y1="40" x2="<?php echo $hour; ?>" y2="15" stroke="green" /> -->
            </g>
        </svg>
  </body>
</html>
