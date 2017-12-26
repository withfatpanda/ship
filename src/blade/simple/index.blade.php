<!DOCTYPE html>
<html {{ language_attributes() }}>
<head>
  <meta charset="{{ bloginfo( 'charset' ) }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-title" content="{{ bloginfo( 'name' ) }} - {{ bloginfo('description') }}">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="{{ bloginfo( 'pingback_url' ) }}">
  @php(wp_head())
</head>
<body {{ body_class() }}>
  @while(have_posts()) @php(the_post())
    @php(the_content())
  @endwhile
</body>
</html>