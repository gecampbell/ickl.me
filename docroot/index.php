<?php
$self = str_replace('index.php', '', $_SERVER['PHP_SELF']);
// Part to be executed if FORM has been submitted
if ( isset($_REQUEST['url']) ) {

    // Start YOURLS engine
    require_once( dirname(__FILE__).'/includes/load-yourls.php' );

    $url = $_REQUEST['url'];

    $return = yourls_add_new_link( $url );
    
    $shorturl = $return['shorturl'];
    $message = $return['message'];
    $code = $return['statusCode'];
    $clicks = $return['url']['clicks'] + 0;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>ickl.me</title>
<link rel="shortcut icon" href="/favicon.ico" />
<style type="text/css">
body {
    margin-top: 6%;
    margin-left: auto;
    margin-right: auto;
    width: 800px;
    font-family: helvetica, arial, sans-serif;
    background-color: lime;
}
h1 {
    font-size: 1in;
    letter-spacing: -.1em;
    color: yellow;
}
label {
    font-size: small;
    color: #444;
}
.foot {
    font-size: smaller;
    position: absolute;
    bottom: 2em;
    color: #ccc;
}
.error {
    font-weight: bold;
    font-size: .3in;
    color: red;
    text-decoration: blink;
}
.url {
    font-family: courier new, courier, mono, fixed;
    font-weight: bold;
    width: 100%;
    font-size: .5in;
    color: black;
    background: yellow;
    padding: 10px;
    text-align: center;
    border: none;
}
a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}
a:hover {
    text-decoration: underline;
}
</style>
</head>
<body>
    <h1>ickl.me</h1>
<?php if ( isset( $_REQUEST['url'] )) { ?>
    <?php if ($code != 200) { ?>
    <p class="error"><?php echo $message;?></p>
    <?php } else { ?>
    <input type="text" class="url" value="<?php echo $shorturl;?>" disabled="True" title="This is your new ultra-short URL!" />
    <p>Link has been clicked <?php echo ($clicks==1)?"only once.":"$clicks times."?> &bull; <a href="<?php echo $shorturl.'+all';?>">Stats</a></p>
    <?php } ?>
    <p><a href="<?php echo $self;?>">Click here to shorten another</a></p>
<?php } else { ?>
    <form method="post" action="<?php echo $self;?>">
    <label>URL: <input type="text" name="url" value="http://" size="50" title="Enter the URL to shorten"/></label>
    <input type="submit" value="ickl.me" />
    </form>
<?php } ?>
<!--
.......................,,..,,,,,,,..,.......................
..,,.~.:.....?OODDD8Z7?????+++==++77+,,.....................
...:.:.:....,7Z8Z7II?+?I??I++++++=+=+~.....................,
...~,~.:.,,:IZI?=+?IIII7????????+++===~...................,,
.....:.~.,:$:,:=++????III?III?+++++=+=~~+..................,
.....:.:.,+..,:=?II?IIIIII?I?????++++==~+~................,,
.....:.:.~...,:+??IIIIIIIIII?IIIIIII?++=~=................,,
.....:...:..,::I??IIIIIIIIIIIIIIIIII??I?=:=..............,..
.....:.,=...:~=~?II777IIIIIIIIIIIIIIII??=+~+.....,,,,,,,,,,.
.....,..+....::+I77777IIIIIIIIII7$$7II?OD8DD888:,,,,:II??,..
.,......:.....+777777777IIIII?I$Z$ZDD87I?I7I?8N$,,+77I???,..
.,....,.:....:?7777777$7777I??7ONDOOO88OZ$$$$IN7,,+77I???,,.
......,......=I7777$$$ZZ$$$I??NDO88ODDDOZZ$ZZ$N,,.=7II???.,,
,,....,.....,+777ODDDNNNNNDNNNNZOOOZZZ$$$$III7N.,.=7III??,,,
,,....:..,..,D8O7Z$ZZOOOZZNN$ION7$ZZZZ$$77I7IN++.........,,,
,.....,..,D8+=.78DD8OZZZZ$NOI???D7777$$$7ONI?++~..=ZZ$77I...
.,....,.,ND~I+?ZZO$$ZZZ$77NI????+ZNND8$777II?+++..~OZ$7I....
......,.,OND77:?7$77$$$7I$N+??II??+7777777II?+++?.~7?=::,...
......,.,.ID7$?7$77$$77$DZI~?III?++++77777I????++.:OOOZZZ...
......,.,.,.8I~+$$$8N$77$I??IIII??8ZI777$77III??=+,8DNNNN...
..,...,...:.,...=+I7I777$?IODZ77III77III7777III?++=8DDNNN,..
..~.......+:..,::+?III77$$$$$$$$$77I7III7I7777I???+DNNMMM,,,
..~........~..,,:??IIII777$$$$$77$7IIIIIIII7O$7I??+D8NNND,,,
..:...........:,~?IIII7777$$$$77777I777IIII7$O$I?+++,,,,:,,,
.............,,~=?IIII77$$$$7$$77$$$$7$7ZZ$I7$$7?++.....7,,.
...............,=?III77$$77$ZZZZZZOOZ$III???I$7II??.......,.
...............,~+III7$Z$ZZZZ8Z$$$$777II?????I$7I???........
..............,,=+I7I7$ZZZZZZZ$$$$$77I7II?I???77I??7?==~=...
...............,:=II777$$$$$$$$$$$$Z$$77II???+?II??D=:DDD...
................~++I7777$$$$$$$$$$Z$$77II????+IIIIID+=$7I,..
..,,.....:=?~::+==?I7777$$7$$777$$$$7777III???IIIIODII~$Z...
..,..:+~++7?~?=~:?+I77777$7777$77$7$7$77I7III?I7II8N???=$...
..=?O?:??+?:.$,.I?$?777777$77777$$$$$$$$777III777ZDD+$=I+...
..$IZ.II?$???,.7=Z+8?777$$$$77$$$$$$$$$$$$$7I777I8D8+O~+I...
..$I~?++I+?7,:?=O?Z7D+7$$$$Z$$$Z$$$$Z$ZZZ$$77I77ZD$Z=O+$?,,,
..7++7????O+?+7I$7Z$DD?I$$$Z$$ZZZZZZZZZZ$777777$DDIO+$+$=,,,
........,............,,,,,,,,,,,,.,.........................
.....,,,,..,,...........,,,,,,,,....................,,,,,...
                                             GlassGiant.com
-->
    <p class="foot">&copy;2013 <a href="http://glen-campbell.com/">Glen Campbell</a>
&bull; <a href="/admin/">Admin</a>
&bull; <a href="http://blog.ickl.me">Blog</a>
&bull; Powered by <a href="http://yourls.org">yourls</a></p>
</body>
</html>
