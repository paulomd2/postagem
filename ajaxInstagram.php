<?php

  /**
   * Instagram PHP API
   *
   * @link https://github.com/cosenary/Instagram-PHP-API
   * @author Christian Metz
   * @since 20.06.2012
   */

  require 'Instagram.php';
  use MetzWeb\Instagram\Instagram;

  // Initialize class for public requests
  $instagram = new Instagram('12345678');

  // Receive AJAX request and create call object
  $tag = $_GET['tag'];
  $maxID = $_GET['max_id'];
  $clientID = $instagram->getApiKey();

  $call = new stdClass;
  $call->pagination->next_max_id = $maxID;
  $call->pagination->next_url = "https://api.instagram.com/v1/tags/{$tag}/media/recent?client_id={$clientID}&max_tag_id={$maxID}";

  // Receive new data
  $media = $instagram->pagination($call);

  // Collect everything for json output
  $images = array();
  foreach ($media->data as $data) {
    $images[] = $data->images->thumbnail->url;
  }

  echo json_encode(array(
    'next_id' => $media->pagination->next_max_id,
    'images'  => $images
  ));