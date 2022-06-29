<?php
include ('db.php');

    $sql = "SELECT * FROM posts ORDER BY created_at DESC" ;
    $posts = getDataFromServer($sql, $connection, true);

?>

<head>
<link href="styles/blog.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles/style.css">
</head>

<?php include('header.php'); ?>

<main role="main" class="container">
 <div class="row">
   <div class="col-sm-8 blog-main">
    <?php foreach ($posts as $post) { ?>
        <div class="blog-post">
            <a href="single-post.php?id=<?php echo $post['id'] ?>">
                <h2  class="blog-post-title"><?php echo $post['title'] ?></h2>
            </a>
            <p class="blog-post-meta"><?php echo date_format(date_create($post['created_at']), 'd-F-Y') ?> by <a href="#"><?php echo $post['author'] ?></a></p>
            <p><?php echo $post['body'] ?></p>
    </div>
    <?php } ?>

    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
    </nav>

</div>

<?php include('sidebar.php'); ?>
<?php include('footer.php'); ?>