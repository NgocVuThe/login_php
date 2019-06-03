<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        h1{
            text-align: center;
        }
    </style>
</head>
<body>
<h1>Student List</h1>
<div class="container table-responsive">
<div id = "result"></div>

<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th> Name Student</th>
            <th>Phone</th>
            <th>Class</th>
            <th>City</th>
            <th>
                <a class="btn btn-sm btn-success" href="./create">Create</a>
            </th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($students as $key => $student):?>
        <tr>
            <td><?= $key+1; ?></td>
            <td><?= $student->name_student;?></td>
            <td><?= $student->phone; ?></td>
            <td><?= $student->class; ?></td>
            <td><?= $student->city; ?></td>
            <td>
                <a class="btn btn-sm btn-primary" href="./edit&id=<?=$student->id?>">Edit</a>
                <a class="btn btn-sm btn-danger btn-submit" OnClick= "ConfirmDelete()" href="./delete&id=<?=$student->id?>">Delete</a>   
            </td>
        </tr>            
    <?php endforeach ?>
    </tbody>
</table>
</div>
</body>
</body>
</html>