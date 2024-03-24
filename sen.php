<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="styles/sen.css" />
</head>

<body>
  <?php include('header.php'); ?>
  <script type="text/javascript" src="js/light-dark.js"></script>
  <div class="container">
    <form>
      <div class="name">
        <input type="text" class="textboxf" placeholder="First Name" />
        <span style="margin-left: 1cm"></span>
        <input type="text" class="textboxl" placeholder="Last Name" />
      </div>
      <br />
      <input type="text" class="textbox2" placeholder="Email Address" />
      <br />
      <input type="number" class="textbox3" placeholder="Phone Number" size="10" />
      <br />
      <input placeholder="Date Of Birth" type="date" class="textbox3" />
      <br />
      <input type="text" class="card" placeholder="Diagnosis" />
      <br />
      <input type="text" class="card" placeholder="Medication" />
      <br />
      <button type="submit" class="button1">
        Save & Generate prescription
      </button>
    </form>
  </div>
  <?php include('footer.php'); ?>
</body>

</html>