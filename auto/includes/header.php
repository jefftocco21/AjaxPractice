<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Ajax Autosuggest</title>
    <link rel="stylesheet" media="all" href="assets/public.css" />
    <script src="assets/public.js"></script>
  </head>
  <body>

    <div id="main">

      <div id="header">

        <div id="navigation">
          <a href="index.php">Main page</a>
        </div>

        <div id="search-area">

          <form id="search-form" action="search.php" method="GET">
            <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
            <input id="search" type="text" name="q" value="<?php echo htmlspecialchars($q); ?>" />
            <input type="submit" value="Search" />
          </form>

          <ul id="suggestions">
            <li><a href="search.php?q=a">a</a></li>
            <li><a href="search.php?q=b">b</a></li>
            <li><a href="search.php?q=c">c</a></li>
            <li><a href="search.php?q=d">d</a></li>
          </ul>

        </div>

      </div>
