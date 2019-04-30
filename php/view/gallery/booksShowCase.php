<?php
	$book = new Book();
	$book->setConnection($connection);
	$book->setAuthor($id);
	$value = $book->getBooks();

	$values = array(
		'counter' => 0, 
		'limit' => 3,
		'col' => 4
	);

	
	if( sizeOf($value) == 0 )
	{
		echo Errors::$NO_BOOKS ;
	}
	else 
	{
		if(isset($_GET['books']))
		{
			$values['limit'] = sizeOf($value);
			$values['col'] = 6;
		}

		while( $values['counter'] < $values['limit'])
		{

?>
		<div class="col-sm-<?php echo $values['col']; ?> mb-30">
			<div class="mdl-card mdl-shadow--2dp pa-0">
				
				<div class="mdl-card__title pa-0">
					<div class="blog-img blog-1">
						<img src="<?php echo $booksPath . $value[ $values['counter'] ]['bookPicture']?>" class="figure-img img-fluid rounded" >
					</div>
				</div>
				
				<div class="mdl-card__supporting-text relative">
					<span class="blog-cat">pages : <?php echo $value[ $values['counter'] ]['bookpages']; ?></span>
					<a href="youtube-blog-post.html">
						<h4 class="mt-15 mb-20"><?php echo $value[$values['counter']]['bookName']; ?></h4>
					</a>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit eleifend lacinia...</p>
				</div>
				
				<div class="mdl-card__actions mdl-card--border">
					<span class="blog-post-date inline-block"><?php echo $value[ $values['counter'] ]['uploadDate']?></span>
				
					<div class="mdl-layout-spacer"></div>
				
					<button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mr-5" href="php/controller/deletePicture.php?name=<?php echo $filename ?>">
						<i class="zmdi zmdi-favorite"></i>
					</button>
					<button id ="share_menu_1" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
						<i class="zmdi zmdi-share" alt="share"></i>
					</button>
				</div>
				
			</div>
		</div>
<?php
			$values['counter']++;
		}
	}
?>
