<?php $title = 'Shared';
    require '../includes/header.inc.php';
    require '../includes/dbh.inc.php';
?>

<main>
    <form action="../includes/shared.inc.php" method="post" enctype="multipart/form-data">
        <!-- Validator value -->
        <label for="name">File is called:</label><br>
        <input id="uploadName" type="text" name="fileName" placeholder="Kalles selfie" required><br>

        <label for="comment">Context:</label><br>
        <textarea name="comment" id="uploadComment" cols="25" rows="4" placeholder="Picture taken in Japan and Kalle was 6 years old."></textarea><br><br>

        <input id="uploadFile" type="file" name="file" required>
        <input id="uploadbtn" class="btn" name="submit" type="submit" value="Upload">
    </form>

    <div id="ownContent">
        <?php
            $sql = "SELECT * FROM files";
            $result = mysqli_query($conn, $sql);
            $username = $_SESSION['username'];
        while ($row = mysqli_fetch_object($result)): ?>
            <?php if ($row->user == $username) : ?>
                <div class="post">
                    <br>
                    <form action="../includes/deleteFile.php" method="post">
                        <label><?php echo $row->filesName; ?></label>
                        <input type="hidden" name="picId" value="<?php echo $row->fileId ?>">
                        <button type="submit" name="submit">
                            <img class="trash" src="../img/icon/trash.png" alt="trash-can">
                        </button>
                    </form>
                    <img class="img" src="<?php echo '../uploadedfiles/'.$row->files; ?>">
                    <p><?php 
                        if($row->filesComment != '') {
                            echo 'ID: '.$row->fileId.' Context: '.$row->filesComment; 
                        } else {
                            echo 'ID: '.$row->fileId.' No given context';
                        }
                    ?></p>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
</main>

<?php require '../includes/footer.inc.php'; ?>