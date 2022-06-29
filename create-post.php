<?php
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['title']) && !empty($_POST['body']) && !empty($_POST['author'])) {

        $sqlSetNewPost = "INSERT INTO posts (title, body, author, created_at) 
        VALUES ('{$_POST['title']}', '{$_POST['body']}', '{$_POST['author']}', NOW())";
        setDataToServer($sqlSetNewPost, $connection);
    }
}


$sqlAuthor = 'SELECT * FROM author ';
$authors =  getDataFromServer($sqlAuthor, $connection, true);



function setGender($author)
{
    if ($author['gender'] == 'M') {
        echo 'author-M';
    } else {
        echo 'author-F';
    }
}


?>
<head>

  <title>Vivify Blog - single post</title>



  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<link href="styles/blog.css" rel="stylesheet">
<link href="styles/styles.css" rel="stylesheet">
</head>

<?php include('header.php'); ?>

  <main role="main" class="container">
    <div class="row">

     <div class='col-sm-8 blog-main'>
     <h3>Create new author</h3>

        <form class="form-control" action="create-post.php" method="post">

        <select name="author" id="" required>
                        <option value='' selected disabled hidden>Choose your author</option>
                        <?php foreach ($authors as $author) { ?>
                            <option class="<?php setGender($author) ?>" value="<?php echo $author['id'] ?>"><?php echo "{$author['firstname']} {$author['lastname']}" ?></option>
                        <?php } ?>
                    </select>  
      

            <label for="Post Title"></label>
            <input type="text" name="title" id="" placeholder="Post Title" required>

            <textarea name="body" id="" cols="50" rows="5" placeholder="Text" required></textarea>

            <button class="btn" name = "submit-btn"  type = "Submit">Add new post</button>

        </form>
    </div>
  </div>
    <?php include('sidebar.php'); ?>
    <?php include('footer.php'); ?>