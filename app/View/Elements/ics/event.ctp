<?php
echo "
BEGIN:VEVENT
UID:". md5($uid) . "
SUMMARY:".  $summary . "
LOCATION:" . $location . "
DTSTART;VALUE=DATETIME:".$this->Time->format('Ymd\THis\Z',$start) . "
DTSTAMP:" . $this->Time->format('Ymd\THis\Z',$start) . "
DTEND:" . $this->Time->format('Ymd\THis\Z',$end) . "
DESCRIPTION:". $description . "
CLASS:PUBLIC
STATUS:FREE
X-MICROSOFT-CDO-BUSYSTATUS:FREE";

if(isset($reminder_value) && isset($reminder_unit)){
  $reminder_date = '-P';
  switch($reminder_unit){
    default: 
    case 'H': 
    case 'M': 
    case 'S': 
      $reminder_date .= 'T' . (int)$reminder_value . $reminder_unit; 
      break;
    case 'D': 
      $reminder_date .= (int)$reminder_value . $reminder_unit; 
      break;
  }
  
  echo 'BEGIN:VALARM'."\n";
  echo 'ACTION:DISPLAY'."\n";
  echo 'DESCRIPTION:REMINDER'."\n";
  echo 'TRIGGER;RELATED=START:'.$reminder_date."\n";
  echo 'END:VALARM'."\n";
}



echo "END:VEVENT
";