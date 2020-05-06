<?php
include_once '../auth/auth.php';

include_once '../action/connectDB.php';
$idBook = $_REQUEST['id'];

$sql = "SELECT code
        AS 'book_id', books.name, status, author, price, image, categories.name AS 'category_name', categories.id AS 'category_id' 
        FROM books 
        JOIN categories ON books.category_id = categories.id
        WHERE code = $idBook";
$stmt = $conn->query($sql);
$book = $stmt->fetch();

//laay  tat ca cateogry
$sql2 = 'SELECT * FROM categories';
$stmt2 = $conn->query($sql2);
$categories = $stmt2->fetchAll();



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Books
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Add new</a>
                        <a class="dropdown-item" href="#">List</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['userLogin']['name'] ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="col-md-12">
        <div class="card mt-5">
            <div class="card-header">
                Update book
            </div>
            <div class="card-body">
                <form method="post" action="../action/update-book.php?id=<?php echo $book['book_id'] ?>">
                    <div class="form-group">
                        <label >Name</label>
                        <input name="name" type="text" value="<?php echo $book['name'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label >Author</label>
                        <input name="author" type="text" value="<?php echo $book['author'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label >Price</label>
                        <input name="price" type="text" value="<?php echo $book['price'] ?>"" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select name="category" class="form-control" id="exampleFormControlSelect1">
                            <?php foreach ($categories as $category): ?>
                            <option
                                <?php if ($book['category_id'] == $category['id']): ?>
                                selected
                                <?php endif ?>
                           value="<?php echo $category['id'] ?>" ><?php echo $category['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="exampleFormControlSelect1">
                            <option value="1"
                            <?php if ($book['status'] == 1): ?>
                                    selected
                                <?php endif ?>
                            >Còn sách</option>
                            <option
                                <?php if ($book['status'] == 0): ?>
                                selected
                                <?php endif ?> value="0">Hết sách</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
