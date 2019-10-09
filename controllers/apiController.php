<?php

require $_SERVER['DOCUMENT_ROOT'] . "/apiJokes/models/apiData.php";

class apiController
{

  protected $model;
  public $jokesData;

  public function __construct()
  {
    $this->model = new apiData();
    $data = json_decode($this->model->getAllData(), true);
    $this->jokesData = $data['jokes'];
  }

  // decide for what route to take
  public function getJokes($num = null)
  {
    if ($num) {
      return $this->getRandJokes($num);
    } else {
      return $this->getAllJokes();
    }
  }

  // Get a list of all the jokes from the JSON file
  public function getAllJokes()
  {
    return json_encode($this->jokesData);
  }

  // Generate the random joke array
  public function getRandJokes($num)
  {
    $randJokes = [];
    $sizeOfData = sizeof($this->jokesData);

    // use this because of array_rand limitations to handle 1
    if ($num <= 1) {
      $randElem = rand(0,  $sizeOfData - 1);
      $randJokes[] = $this->jokesData[$randElem];
    } else {
      $num = ($num < $sizeOfData ? $num : $sizeOfData); // use the max of the data list
      $randArrayKeys = array_rand($this->jokesData, $num);
      for ($i = 0; $i < $num; $i++) {
        $randJokes[] = $this->jokesData[$randArrayKeys[$i]];
      }
    }
    return json_encode($randJokes);
  }
}
