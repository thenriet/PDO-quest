<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friends</title>
</head>
<body>
    <div class="container">
        <div class="friends">
            <ul>
                <?php foreach($friends as $friend):?>
                    <li><?=$friend['firstname'] . ' ' . $friend['lastname'] ?></li>
                <?php endforeach?>
            </ul>
            <form action="index.php" method="post">
                <div>
                    <label for="firstname">Firstname
                        <input type="text"
                        max-length="45"
                        min-length="2"
                        name="firstname"
                        id="firstname"
                        required
                        >
                    </label>
                    <?php if(!empty($errors)):?>
                        <?= $errors['firstname']?>
                        <?php endif ?>
                </div>
                <div>
                    <label for="lastname">Lastname
                        <input type="text"
                        max-length="45"
                        min-length="2"
                        id="lastname"
                        name="lastname"
                        required
                        >
                    </label>
                    <?php if(!empty($errors)):?>
                        <?= $errors['lastname']?>
                    <?php endif ?>
                </div>
                <div><button onClick="refreshPage()">Submit</button></div>
            </form>
        </div>
    </div>
</body>
</html>