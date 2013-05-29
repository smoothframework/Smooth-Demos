
    <section>
      <h1><?php echo $blogName; ?></h1><span>
      <?php echo $blogSlogan; ?></span>
      <hr>
    </section>

    <section>
      <?php
        foreach ($blogPosts as $key => $value) :
      ?>
       <article>
          <header>
            <h1><a href="view/p/<?php echo $value['id']; ?>"><?php echo $value['title']; ?></a></h1>
          </header>
          <p><?php echo $value['content']; ?></p>
          <footer>
            <span>Published on <a href="#"><?php echo $value['published']; ?></a> by <a href="#"><?php echo $value['author']; ?></a></span>
          </footer>
        </article>
        <hr>
      <?php
        endforeach;
      ?>
    </section>