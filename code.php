<?php
function filter_data($data) {
    $data = trim($data);
     $data = strip_tags($data);
     $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    // BBcode array
    $find = array(
       '~\[b\]~s',
       '~\[/b\]~s',
       '~\[li\]~s',
       '~\[/li\]~s',
       '~\[ul\]~s',
       '~\[/ul\]~s',
       '~\[i\]~s',
       '~\[/i\]~s',
       '~\[u\]~s',
       '~\[/u\]~s',
       '~\[quote\]~s',
       '~\[/quote\]~s',
       '~\[size=(.*?)\]~s',
       '~\[/size\]~s',
       '~\[color=((?:[a-zA-Z]|#[a-fA-F0-9]{3,6})+)\]~s',
       '~\[/color\]~s',
       '~\[url\]((?:ftp|https?)://.*?)\[/url\]~s',
       '~\[img\](https?://.*?\.(?:jpg|jpeg|gif|png|bmp))\[/img\]~s'
     );

     // HTML tags to replace BBcode

     $replace = array(

       '<b>',
       '</b>',
       '<li>',
       '</li>',
       '<ul>',
       '</ul>',
       '<i>',
       '</i>',
       '<span style="text-decoration:underline;">',
       '</span>',
       '<pre>',
       '</'.'pre>',
       '<span style="font-size:$1px;">',
       '</span>',
       '<span style="color:$1;">',
       '</span>',
       '<a href="$1">$1</a>',
       '<img src="$1" alt="" />'
    );
    // Replacing the BBcodes with corresponding HTML tags
    return preg_replace($find,$replace,$data);
  }
?>
