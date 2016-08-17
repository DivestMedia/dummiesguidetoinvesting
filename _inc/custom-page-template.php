<?php

  class CustomPageTemplate{
    public function __construct(){
      self::custom_template_init();
      self::add_vc_shortcodes();
    }

    public function custom_template_init(){
      add_filter( 'rewrite_rules_array',[$this,'rewriteRules'] ,10);
      add_filter( 'template_include', [ $this, 'template_include' ],1,1 );
      add_filter( 'query_vars', [ $this, 'prefix_register_query_var' ] );
    }

    public function prefix_register_query_var($vars){
      $vars[] = 'ft';
      $vars[] = 'fi';
      $vars[] = 'ctem';
      $vars[] = 'ccat';
      $vars[] = 'vti';
      return $vars;
    }

    public function rewriteRules($rules){
      $newrules = self::rewrite();
      return $newrules + $rules;
    }

    public function rewrite(){
      $newrules = array();
      // $newrules['invest-or-divest/'] = 'index.php?ctem=invest-or-divest&vti=$matches[1]';
      $newrules['featured-article/(.*)/(.*)/(.*)'] = 'index.php?ctem=featured-article&ccat=$matches[1]&fi=$matches[2]&ft=$matches[3]';
      $newrules['featured-article/(.*)'] = 'index.php?ctem=featured-article&ccat=$matches[1]';
      $newrules['find-a-broker/list-of-brokerage-firms/(.*)/(.*)'] = 'index.php?ctem=brokerage-firm&fi=$matches[1]&ft=$matches[2]';
      $newrules['community/media/e-books/(.*)/(.*)'] = 'index.php?ctem=e-books&fi=$matches[1]&ft=$matches[2]';
      $newrules['community/media/e-books/(.*)'] = 'index.php?ctem=e-books-download&fi=$matches[1]';
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
          case 'e-books-download':
            if(is_numeric($_feedid)){
              $_curcategory = 'e-books';
              $_curlimit = 40;
              $_books =  do_shortcode( '[CGP_GENERATE_POSTS limit="'.$_curlimit.'" category="'.$_curcategory.'"]' );
              $_books = json_decode($_books);
              $_book = $_books[CustomPageTemplate::post_search($_feedid, $_books)];
              $_ebfile = unserialize($_book->post_fmeta)[1]['file'];
              $_ebfile  = !empty($_ebfile)?$_ebfile:'#';
              echo '<a id="btn-download" href="'.$_ebfile .'" download="'.$_book->post_title.'"><script>document.getElementById("btn-download").click();</script>';
            }else{
              echo '<script>window.location.assign("'.site_url().'");</script>';
            }
            // include_once($_access);
            die();
          break;
          case 'e-books':
            if(!empty($_feedid)&&!empty($_feedtitle)){
              $_access = get_stylesheet_directory() . '/_template/custom-'.$_feedtemplate.'.php';
              include_once($_access);
            }else{
              echo '<script>window.location.assign("'.site_url().'");</script>';
            }
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
          case 'brokerage-firm':
            $_access = get_stylesheet_directory() . '/_template/custom-'.$_feedtemplate.'.php';
            include_once($_access);
            die();
          break;
          case 'invest-or-divest':
            $_iod_title= get_query_var( 'vti' );
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

    public function add_vc_shortcodes(){
      add_shortcode( 'vc_row', [$this,'add_vc_row'] );
      add_shortcode( 'vc_row_inner', [$this,'add_vc_row_inner'] );
      add_shortcode( 'vc_column_inner', [$this,'add_vc_column_inner'] );
      add_shortcode( 'vc_column', [$this,'add_vc_column'] );
      add_shortcode( 'vc_single_image', [$this,'add_vc_single_image'] );
      add_shortcode( 'vc_column_text', [$this,'add_vc_column_text'] );
      add_shortcode( 'vc_separator', [$this,'add_vc_separator'] );
      add_shortcode( 'lvca_team', [$this,'add_lvca_team'] );
      add_shortcode( 'lvca_team_member', [$this,'add_lvca_team_member'] );
      add_shortcode( 'icon', [$this,'add_vc_icon'] );
    }

    public function add_vc_row($params,$content = null){
      return do_shortcode($content);
    }

    public function add_vc_row_inner($params,$content = null){
      return do_shortcode($content);
    }
    
    public function add_vc_column_inner($params,$content = null){
      $_col = self::convert_fraction(preg_replace("/[\"]+/", "",html_entity_decode($params['width'], ENT_QUOTES)));
      $_div_class = '';
      if($_col==1)
        $_div_class = 'col-md-12 col';
      else if($_col==0.5)
        $_div_class = 'col-md-6 col-sm-6 col';

      return '<div class="'.$_div_class.'">'.do_shortcode($content).'</div>';
    }

    public function add_vc_icon($params,$content = null){
      $_icon_name = preg_replace("/[\"]+/", "",html_entity_decode($params['name'], ENT_QUOTES));
      return '<i class="fa '.$_icon_name.'"></i>'.do_shortcode($content);
    }

    public function add_vc_column($params,$content = null){
      return do_shortcode($content);
    }

    public function add_vc_single_image($params,$content = null){
      return do_shortcode($content);
    }

    public function add_vc_separator($params,$content = null){
      return do_shortcode('<hr>'.$content);
    }

    public function add_vc_column_text($params,$content = null){
      return html_entity_decode(do_shortcode($content)) ;
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

    public function convert_fraction( $mathString )    {
        $mathString = trim($mathString);
        $mathString = str_replace ('[^0-9\+-\*\/\(\) ]', '', $mathString); 

        $compute = create_function("", "return (" . $mathString . ");" );
        return 0 + $compute();
    }
  }
