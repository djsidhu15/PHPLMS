<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var_dump($_POST);

if(isset($_POST['name'])){
    echo $_POST['name'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>All courses</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<!--<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>!-->
</head>
<body>

<div data-role="page" id="pageone">
  <div data-role="header">
    <h1>All courses</h1>
  </div>

  <div data-role="main" class="ui-content">
    <h2>Courses</h2>
    <div data-role="collapsible">
    <h4>Number theory</h4>
        <p>Number theory or, in older usage, arithmetic is a branch of pure mathematics devoted primarily to the study of the integers.
            It is sometimes called "The Queen of Mathematics" because of its foundational place in the discipline.
            Number theorists study prime numbers as well as the properties of objects made out of integers or defined as generalizations of the integers.</p>
        <input type="button" value="Apply" style="background-color: blue">
    </div>

    <div data-role="collapsible">
    <h4>Algorithm design and analysis</h4>
    <p>Algorithm design is a specific method to create a mathematical process in solving problems. Applied algorithm design is algorithm engineering.
       Algorithm design is identified and incorporated into many solution theories of operation research, such as dynamic programming and divide-and-conquer.
       Techniques for designing and implementing algorithm designs are algorithm design patterns,
       such as template method pattern and decorator pattern, and uses of data structures, and name and sort lists.
       Some current day uses of algorithm design can be found in internet retrieval processes of web crawling, packet routing and caching.</p>
    <input type="button" value="Apply">
    </div>

    <div data-role="collapsible">
    <h4>Artificial Intelligence</h4>
    <p>Artificial intelligence (AI) is intelligence exhibited by machines.
        In computer science, an ideal "intelligent" machine is a flexible rational agent that perceives its
        environment and takes actions that maximize its chance of success at some goal.[1] Colloquially, the term "artificial intelligence" is applied when a
        machine mimics "cognitive" functions that humans associate with other human minds, such as "learning" and "problem solving".</p>
        <input type="button" value="Apply">
    </div>

    
    <div data-role="collapsible">
    <h4>Advanced C++</h4>
    <p>C++ (pronounced cee plus plus, /ˈsiː plʌs plʌs/) is a general-purpose programming language. 
        It has imperative, object-oriented and generic programming features, while also providing facilities for low-level memory manipulation.</p>
        <input type='button' value='Apply'>
    </div>
  </div>

  <!--<div data-role="footer">
    <h1>Footer</h1>
  </div>
</div> !-->
  <input type="button" value="click" onclick="a()">
  <script>
      function a(){
          var data = {name : "Sidharth"};
          $.post("http://localhost/PHPLMS/Test.php",data,function(json) {
    console.log(json.name);
    console.log(json.time);
}, "json");
          window.location("http://localhost/PHPLMS/Test.php");
    
      }
      
  </script>
  <?php      var_dump($_POST); ?>

</body>
</html>