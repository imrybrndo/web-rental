<?php
function base_url($a=''){
    $getbase_url = $GLOBALS['setUri']['base'];
    return $getbase_url.$a; 
}

function redirect($a=''){
  header("location: ".$a);
  exit;
}

function assets($a=''){
    $getbase_assets= $GLOBALS['setUri']['assets'];
    return base_url($getbase_assets.$a);
}

function url($a='',$b=''){
  return base_url($b.'?halaman='.$a);
}

function templates($a=''){
    return assets($GLOBALS['templates'].$a);
}

function content_open(){
  return '
          <div class="card shadow p-3 bg-body rounded" style="border:none;">
            <div class="card-body">
  ';
}

function content_close(){
  return '
            </div>
        </div>
  ';
}
