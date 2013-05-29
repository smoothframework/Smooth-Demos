
		<section>
			
			<?php foreach($postContent as $key => $value) : ?>

				<article>
					<header>
						<h1><?php echo $value['title']; ?></h1>
					</header>
					<p>
						<?php echo $value['content']; ?>
					</p>
					<footer>
						<span>Published on <a href="#"><?php echo $value['published']; ?></a> by <a href="#"><?php echo $value['author']; ?></a></span>
					</footer>
				</article>

			<?php endforeach; ?>

		</section>

		<section>
			<h4>Comments</h4>

				<?php foreach($postComments as $key => $value) : ?>
					
					<blockquote>
						<p><?php echo $value['comment']; ?></p>
						<footer>--<?php echo $value['author']; ?> on <?php echo $value['published']; ?></footer>
					</blockquote>

				<?php endforeach; ?>
		</section>