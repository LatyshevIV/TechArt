<?php include "header.php";?>

<?php  
	function get_news_id($id){
		global $induction;
		$news_props = $induction->query("SELECT * FROM `news` WHERE id=$id");
		foreach ( $news_props as $news){
			return($news);
		}
	}
	 
	$news = get_news_id($_GET['id'])
?>
	 

      <div class="container">
        <ul class="beadcrumds">
          <li class="beadcrumds_item"><a href="/">Главная</a></li>
          <li class="beadcrumds_item"><?php echo $news["title"] ?></li>
        </ul>
      </div>

      <div class="news_detail">
        <div class="container">
          <h1 class="title"><?php echo $news["title"] ?></h1>
          <div class="news_date">
            <?php echo str_replace(' 00:00:00', '', $news["date"]) ?>
          </div>
          <div class="news_content">
            <a href="/images/<?php echo $news["image"] ?>" data-fancybox data-caption="<?php echo $news["announce"] ?>" class="news_img">
              <img src="/images/<?php echo $news["image"] ?>" >
            </a>
            <div class="news_description"><?php echo $news["announce"] ?></div>
            <div class="news_text"><?php echo $news["content"] ?></div>
			<a href="/" class="news_btn">
		  <svg xmlns="http://www.w3.org/2000/svg" width="26" height="16" viewBox="0 0 26 16" fill="none">
			<path d="M0.293015 8.70711C-0.0975094 8.31658 -0.0975094 7.68342 0.293014 7.2929L6.65698 0.928934C7.0475 0.538409 7.68067 0.538409 8.07119 0.928934C8.46171 1.31946 8.46171 1.95262 8.07119 2.34315L2.41434 8L8.07119 13.6569C8.46171 14.0474 8.46171 14.6805 8.07119 15.0711C7.68067 15.4616 7.0475 15.4616 6.65698 15.0711L0.293015 8.70711ZM26 9L1.00012 9L1.00012 7L26 7L26 9Z" fill="#841844"/>
		  </svg>
		  Назад к новостям
		</a>
          </div>
		  
		  	<div style="clear: both;"> </div>  
        </div>
      </div>
    </main>

<?php include "footer.php";?>