<?php
require __DIR__ . DIRECTORY_SEPARATOR . 'process.php';
//check if $_SESSION['user_id']
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    <title>PIN Generator</title>
</head>
<div class="container">
    <div class="header p-3 my-3 bg-primary">
        <h1 class="text-center text-white">PIN Generator</h1>
    </div>
    <div class="main">
        <div class="content">
            <div class="card" style="    width: fit-content;
    margin-bottom: 10px;">
                <div class="card-body">
                    <form action="" method="post" class="newpin">
                        <div class="form-group">
                            <label for="">Count</label>
                            <input type="number" required name="count" style="width: fit-content;" class="form-control mt-2" id="count" aria-describedby="emailHelpId" placeholder="Enter count">
                        </div>
                        <button class="btn btn-dark my-3 mt-2" type="submit">Generate Pin</button>
                    </form>
                </div>
            </div>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>PIN</th>
                        <th>Remaining</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt = $pdo->prepare('SELECT * FROM tblpin');
                    $stmt->execute();
                    $pins = $stmt->fetchAll();
                    foreach ($pins as $pin) {
                        echo "<tr>";
                        echo "<td>" . $pin['keytext'] . "</td>";
                        echo "<td>" . $pin['leftcount'] . "</td>";
                        echo "<td>" . $pin['timestamp'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>PIN</th>
                        <th>Remaining</th>
                        <th>Timestamp</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "order": [
                [2, "desc"]
            ]
        });

        //newpin
        $(".newpin").submit(function(e) {
            e.preventDefault();
            var count = $("#count").val();
            //ajax
            $.post("process.php", {
                    count: count,
                    pin: true,
                },
                (data, textStatus, jqXHR) => {
                    window.location.reload();
                },
            );
        });
    });
</script>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>