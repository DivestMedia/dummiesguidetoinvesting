<?php

  class CustomPageTemplate{
    public function __construct(){
      self::custom_template_init();
    }

    public function custom_template_init(){
      add_filter( 'rewrite_rules_array',[$this,'rewriteRules'] );
      add_filter( 'template_include', [ $this, 'template_include' ],1,1 );
      add_filter( 'query_vars', [ $this, 'prefix_register_query_var' ] );
    }

    public function prefix_register_query_var($vars){
      $vars[] = 'ft';
      $vars[] = 'fi';
      $vars[] = 'ctem';
      return $vars;
    }

    public function rewriteRules($rules){
      $newrules = self::rewrite();
      return $newrules + $rules;
    }

    public function rewrite(){
      $newrules = array();

      $newrules['community/media/e-books/(.*)/(.*)'] = 'index.php?ctem=e-books&fi=$matches[1]&ft=$matches[2]';
      $newrules['latest-news/(.*)/(.*)'] = 'index.php?ctem=latest-news&fi=$matches[1]&ft=$matches[2]';
      $newrules['latest-news'] = 'index.php';

      return $newrules;
    }

    public function removeRules($rules){
      $newrules = self::rewrite();
      foreach ($newrules as $rule => $rewrite) {
            unset($rules[$rule]);
        }
      return $rules;
    }
    public function change_the_title() {
        $_cus_title = ucwords(get_query_var('tem'));
        return $_cus_title;
    }
    public function filter_title_part($title) {
        return array('a', 'b', 'c');
    }

    public function template_include($template){

      $_feedid = get_query_var( 'fi' );
      $_feedtitle = get_query_var( 'ft' );
      $_feedtemplate = get_query_var( 'ctem' );
      if(!empty($_feedtemplate)){
        switch ($_feedtemplate) {
          case 'latest-news':
            $_access = get_stylesheet_directory() . '/_template/custom-'.$_feedtemplate.'.php';
            include_once($_access);
            die();
          break;
          case 'e-books':
            $_access = get_stylesheet_directory() . '/_template/custom-'.$_feedtemplate.'.php';
            include_once($_access);
            die();
          break;
          default:
            echo "Template not found";
            wp_die();
          break;
        }
      }
      return $template;
    }
    public function seoUrl($string) {
      //Lower case everything
      $string = strtolower($string);
      //Make alphanumeric (removes all other characters)
      $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
      //Clean up multiple dashes or whitespaces
      $string = preg_replace("/[\s-]+/", " ", $string);
      //Convert whitespaces and underscore to dash
      $string = preg_replace("/[\s_]/", "-", $string);
      return $string;
    }

    public function post_search($post_id,$cur_posts){
       foreach ($cur_posts as $key => $p) {
           if ($p->ID=== $post_id) {
               return $key;
           }
       }
       return null;
    }
  }
