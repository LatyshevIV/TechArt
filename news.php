

<?php 


$start = 0;
$news_per_page = 4;

$records = $induction->query("SELECT * FROM news");
$nr_of_news = $records->num_rows;

$pages = ceil($nr_of_news / $news_per_page);

if (isset($_GET['page-nr'])){
	$page = $_GET['page-nr'] - 1;
	
	$start = $page * $news_per_page;
}

if(isset($_GET['page-nr'])){
		if($_GET['page-nr'] > 1 && $_GET['page-nr'] <= $pages){
	
			$id = $_GET['page-nr'] + 1;
		}else{
			$id = $_GET['page-nr'];	
		}
		
	}else{
		$id = 1;
	}

$result = mysqli_query($induction, "SELECT * FROM news LIMIT $start, $news_per_page");
?>



<section class="news">
        <div class="container">
          <h1 class="title">Новости</h1>

          <ul class="news_list">
		  
			<?php 
				while($news = $result->fetch_assoc()){
					?>
					
					<li class="news_item">
					  <a href="/news_detail.php?id=<?php echo $news["id"] ?>" class="news_link">
						<div class="news_date"><?php echo str_replace(' 00:00:00', '', $news["date"]) ?></div>
						<div class="news_title"><?php echo $news["title"] ?></div>
						<div class="news_description"><?php echo $news["announce"] ?></div>
						<div class="news_btn">
						  Подробнее
						  <svg
							width="27"
							height="16"
							viewBox="0 0 27 16"
							fill="none"
							xmlns="http://www.w3.org/2000/svg"
						  >
							<path
							  d="M1 7C0.447715 7 4.82823e-08 7.44772 0 8C-4.82823e-08 8.55228 0.447715 9 1 9L1 7ZM26.707 8.70711C27.0975 8.31658 27.0975 7.68342 26.707 7.2929L20.343 0.928934C19.9525 0.538409 19.3193 0.538409 18.9288 0.928934C18.5383 1.31946 18.5383 1.95262 18.9288 2.34315L24.5857 8L18.9288 13.6569C18.5383 14.0474 18.5383 14.6805 18.9288 15.0711C19.3193 15.4616 19.9525 15.4616 20.343 15.0711L26.707 8.70711ZM1 9L25.9999 9L25.9999 7L1 7L1 9Z"
							  fill="white"
							/>
						  </svg>
						</div>
					  </a>
					</li>
					
					
					<?php
				}
			
			
			?>
		  
          </ul>

          <div class="pagination" id="<?php echo $id ?>">
		  
			<?php 
				if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1){
					
					?>
						<a href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?>" class="pagination_item prev">
						<svg
							width="17"
							height="16"
							viewBox="0 0 17 16"
							fill="none"
							xmlns="http://www.w3.org/2000/svg"
						  >
							<path
							  d="M1 7C0.447715 7 -4.82823e-08 7.44772 0 8C4.82823e-08 8.55228 0.447715 9 1 9L1 7ZM16.466 8.70711C16.8565 8.31658 16.8565 7.68342 16.466 7.29289L10.102 0.928931C9.7115 0.538407 9.07834 0.538407 8.68781 0.928932C8.29729 1.31946 8.29729 1.95262 8.68781 2.34315L14.3447 8L8.68781 13.6569C8.29729 14.0474 8.29729 14.6805 8.68781 15.0711C9.07834 15.4616 9.7115 15.4616 10.102 15.0711L16.466 8.70711ZM1 9L15.7589 9L15.7589 7L1 7L1 9Z"
							  fill="#841844"
							/>
						  </svg>
						</a>
					<?php
					
				}
			
			
			?>
		  
		  
		  
		  
			<?php 
				for($counter = 1; $counter <= $pages; $counter ++){
					?>
						<a href="?page-nr=<?php echo $counter ?>" class="pagination_item"><?php echo $counter ?></a>
					<?php
				}
			?>
			
			
			
			<?php 
				if(!isset($_GET['page-nr'])){
					?>
					
					<a href="?page-nr=2" class="pagination_item next">
					  <svg
						width="17"
						height="16"
						viewBox="0 0 17 16"
						fill="none"
						xmlns="http://www.w3.org/2000/svg"
					  >
						<path
						  d="M1 7C0.447715 7 -4.82823e-08 7.44772 0 8C4.82823e-08 8.55228 0.447715 9 1 9L1 7ZM16.466 8.70711C16.8565 8.31658 16.8565 7.68342 16.466 7.29289L10.102 0.928931C9.7115 0.538407 9.07834 0.538407 8.68781 0.928932C8.29729 1.31946 8.29729 1.95262 8.68781 2.34315L14.3447 8L8.68781 13.6569C8.29729 14.0474 8.29729 14.6805 8.68781 15.0711C9.07834 15.4616 9.7115 15.4616 10.102 15.0711L16.466 8.70711ZM1 9L15.7589 9L15.7589 7L1 7L1 9Z"
						  fill="#841844"
						/>
					  </svg>
					</a>
					<?php
					
				}else{
					if($_GET['page-nr'] >= $pages){
					?>
					
					<?php
					}else{
						?>
					
					<a href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>" class="pagination_item next">
					  <svg
						width="17"
						height="16"
						viewBox="0 0 17 16"
						fill="none"
						xmlns="http://www.w3.org/2000/svg"
					  >
						<path
						  d="M1 7C0.447715 7 -4.82823e-08 7.44772 0 8C4.82823e-08 8.55228 0.447715 9 1 9L1 7ZM16.466 8.70711C16.8565 8.31658 16.8565 7.68342 16.466 7.29289L10.102 0.928931C9.7115 0.538407 9.07834 0.538407 8.68781 0.928932C8.29729 1.31946 8.29729 1.95262 8.68781 2.34315L14.3447 8L8.68781 13.6569C8.29729 14.0474 8.29729 14.6805 8.68781 15.0711C9.07834 15.4616 9.7115 15.4616 10.102 15.0711L16.466 8.70711ZM1 9L15.7589 9L15.7589 7L1 7L1 9Z"
						  fill="#841844"
						/>
					  </svg>
					</a>
					
					<?php
				
					}
				}
			?>
			
            
          </div>
		  
        </div>
      </section>