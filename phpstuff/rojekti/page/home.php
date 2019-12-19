<?php $title = 'Home';
    require '../includes/header.inc.php';
    require '../includes/dbh.inc.php';
    function ifempty($x) {
        if ($x != '') {
            echo '<br>Context: '.$x;
        } else {
            echo '<br>No given context';
        }
    }
?>

<main>
    <div id="ownContent">
        <?php
            $sql = "SELECT * FROM files";
            $result = mysqli_query($conn, $sql);
            $download = scandir('../uploadedfiles');
        while ($row = mysqli_fetch_object($result)): ?>
            <div class="post">
                <h2 style="padding-left:1em"><?php echo $row->filesName; ?></h2>
                <a href="<?php echo '../uploadedfiles/'.$row->files; ?>">
                    <img class="img" src="<?php echo '../uploadedfiles/'.$row->files; ?>">
                </a>
                <p><?php
                        echo 'ID: '.$row->fileId;
                        echo ' Shared by: '.$row->user;
                        echo ifempty($row->filesComment);
                ?></p>
                <p><a href="<?php echo '../uploadedfiles/'.$row->files; ?>" download="<?php echo $row->files; ?>">Download</a></p>
            </div>
        <?php endwhile; ?>
    </div>
</main>

<?php require '../includes/footer.inc.php'; ?>