<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class MGGameForm extends CFormModel {
  public $active = 0; //active will never be saved in the games FBVStorage settings it is just a handler for the Game database entry
  public $arcade_image = "";
  public $name = "";
  public $description = "";
  public $more_info_url = "";
  public $image_width = 450;
  public $image_height = 450;
  
  public function load() {}
  
  public function save() {}
}

/**
 * Unfortunately in PHP 5.2 it is not possible to retrieve the child class name 
 * in a parent class method usind __CLASS__ or get_class.
 * 
 * Hence we have to make sure getGameID is implemented in each GameForm by making use 
 * of this interface
 * @abstract
 */
interface MGGameFormInterface
{
    public function getGameID();
}