<?php

  class CustomPageTemplate{
    public function __construct(){
      self::custom_template_init();
      self::add_vc_shortcodes();
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
      $vars[] = 'ccat';
      return $vars;
    }

    public function rewriteRules($rules){
      $newrules = self::rewrite();
      return $newrules + $rules;
    }

    public function rewrite(){
      $newrules = array();
      $newrules['featured-article/(.*)/(.*)/(.*)'] = 'index.php?ctem=featured-article&ccat=$matches[1]&fi=$matches[2]&ft=$matches[3]';
      $newrules['featured-article/(.*)'] = 'index.php?ctem=featured-article&ccat=$matches[1]';
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
          case 'featured-article':
            $_feedcategory = get_query_var( 'ccat' );
            $_fi = get_query_var('fi');
            if(!empty($_feedcategory)){
              if(!empty($_fi)){
                $_access = get_stylesheet_directory() . '/_template/custom-'.$_feedtemplate.'.php';
                include_once($_access);
                die();
              }else{
                $_access = get_stylesheet_directory() . '/_template/custom-featured-articles.php';
                include_once($_access);
                die();
              }
            }
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

    public function add_vc_shortcodes(){
      add_shortcode( 'vc_row', [$this,'add_vc_row'] );
      add_shortcode( 'vc_column', [$this,'add_vc_column'] );
      add_shortcode( 'vc_column_text', [$this,'add_vc_column_text'] );
      add_shortcode( 'vc_separator', [$this,'add_vc_separator'] );
      add_shortcode( 'lvca_team', [$this,'add_lvca_team'] );
      add_shortcode( 'lvca_team_member', [$this,'add_lvca_team_member'] );
    }
    public function add_vc_row($params,$content = null){
      return do_shortcode($content);
    }
    public function add_vc_column($params,$content = null){
      return do_shortcode($content);
    }
    public function add_vc_separator($params,$content = null){
      return do_shortcode('<hr>'.$content);
    }
    public function add_vc_column_text($params,$content = null){
      return html_entity_decode($content);
    }
    public function add_lvca_team($params,$content = null){
      return do_shortcode('<div class="cont-member">'.$content.'</div>');
    }
    public function add_lvca_team_member($params,$content = null){
      $new_params = [];
      $cur_key = 0;
      $param_index = ['member_name','member_image','member_position','member_details'];
      foreach ($params as $key => $value) {
        if(in_array($key, $param_index)){
          $cur_key = $key;
        }
        $new_params[$cur_key] .= preg_replace("/[\"]+/", "", html_entity_decode($value, ENT_QUOTES)).' ';
      }
      $new_params['member_name'] .= $new_params[0];
      unset($new_params[0]);
      return html_entity_decode('<img class="pull-left member-image" src="'.get_stylesheet_directory_uri().'/assets/'.trim($new_params['member_image'],' ').'.jpg" width="300" alt="" /><div class="member-name"><strong>'.strtoupper(trim($new_params['member_name'],'"')).'</strong></div><div class="member-position"><strong>'.$new_params['member_position'].'</strong></div><div class="member-details">'.$new_params['member_details'].'</div>');
    }
  }
