<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Create Student</h1>
        <form action="./update" method="post">
        <input type="hidden" name = "id" value = "<?=$students->id?>">
            <table class = "table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th><input type="text" name = "name_student" value = "<?=$students->name_student?>"></th>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <th><input type="text" name = "phone"value = "<?=$students->phone?>"></th>
                    </tr>
                    <tr>
                        <th>Class</th>
                        <th><input type="text" name = "class"value = "<?=$students->class?>" ></th>
                    </tr>
                    <tr>
                        <th>City</th>
                        <th><input type="text" name = "city"value = "<?=$students->city?>"></th>
                    </tr>
                
                </thead>
            </table>
            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </form>
    </div>
</body>
</html>

