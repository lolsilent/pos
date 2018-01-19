<?php
#!/usr/local/bin/php

//validate_referer();?><!-- 
  
  function display() { 
    var Today = new Date(); 
    var hours = Today.getHours(); 
    var min = Today.getMinutes(); 
    var sec = Today.getSeconds(); 
    var Time = hours; 
    Time += ((min < 10) ? ":0" : ":") + min; 
    Time += ((sec < 10) ? ":0" : ":") + sec; 
    this.clockform.clock.value = Time; 
    setTimeout("display()",1000); 
  } 

  display(); 

  --> 