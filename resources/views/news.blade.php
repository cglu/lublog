
<div class="sidebar-module">
	<h4>最新IT新闻:</h4>
	<ol class="list-unstyled">
<?php
$rss = simplexml_load_string(file_get_contents("http://articles.csdn.net/api/rss.php?tid=1093"));
$news = get_object_vars($rss->channel)['item'];
$keys = array_rand($news, 5);
foreach ($keys as $key) {
    $item = $news[$key];
    ?>
             <li><a target="_blank" href="<?php echo $item->link ?>"><?php echo $item->title; ?></a></li>
             <?php
}
?>
            </ol>
</div>