<?php
require '../common/connect.php';

session_start();

require '../common/links.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student | <?=$_SESSION['uname']?></title>
</head>
<body>
  <img src="https://source.unsplash.com/300x300/?motivation-quotes" alt="Today's Motivation" class="bg">
  <?php include '../common/navbar.php' ?>
  <?php include '../student/studentNav.php' ?>

  <?php include '../common/message.php' ?>

  <div class="container z-11 w-100 h-100 d-flex justify-content-center align-items-center">
    <div class="row">
      <p id="quote"></p>
    </div>
  </div>
</body>


<script>
const quotes = [
    "The only way to do great work is to love what you do. - Steve Jobs",
    "Innovation distinguishes between a leader and a follower. - Steve Jobs",
    "Your time is limited, don't waste it living someone else's life. - Steve Jobs",
    "Stay hungry, stay foolish. - Steve Jobs",
    "Life is what happens when you're busy making other plans. - John Lennon",
    "The future belongs to those who believe in the beauty of their dreams. - Eleanor Roosevelt",
    "Success is not final, failure is not fatal: It is the courage to continue that counts. - Winston Churchill"
];
function generateQuote() 
{
    const randomIndex = Math.floor(Math.random() * quotes.length);
    const randomQuote = quotes[randomIndex];
    document.getElementById('quote').textContent = randomQuote;
}

window.addEventListener('load', generateQuote);

generateQuote();

</script>


<style>
  img.bg{
    height: 100%;
    width: 100%;
    object-fit: cover;
    position: fixed;
    z-index: -1;
    opacity: 0.9;
  }
</style>
</html>