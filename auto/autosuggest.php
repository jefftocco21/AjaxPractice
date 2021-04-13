<?php
  // You can simulate a slow server with sleep
  // sleep(2);

  function is_ajax_request() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
      $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
  }

  if(!is_ajax_request()) {
    exit;
  }

  function str_starts_with($choice, $query){
    return strpos($choice, $query) === 0; //returns position postion of query inside choice string
  }

  function str_contains($choice, $query){
    return strpos($choice, $query) !== false;
  }

  function search($query, $choices){
  //$choices is most likely a stand in for a database
  $d_query = strtolower($query);
  
  $matches = [];
    foreach($choices as $choice){
      $d_choice = strtolower($choice);
      if(str_starts_with($d_choice, $d_query)){
        $matches[] = $choice; 
      }
    }
    return $matches; 
  }
  $query = isset($_GET['q']) ? $_GET['q'] : '';

  // find and return search suggestions as JSON
  

  $choices = file('includes/us_passenger_trains.txt', FILE_IGNORE_NEW_LINES);

  $suggestions = search($query, $choices);
  sort($suggestions); //sort alphabetically
  $max_suggestions = 5;
  $top_suggestions = array_slice($suggestions, 0, $max_suggestions); //start at beginning of $suggestions result set and display top 5 suggestions

  echo json_encode($top_suggestions);

?>
