<section class="log">
    <header>
        <?php if($ret == true) { ?>
        <h2> La compra ha sido realizada correctamente. </h2>
        <?php } else { ?>
        <h2> La compra no se ha podido realizar. </h2>
        <?php } ?>
    </header>
</section>

<script>
    $(document).ready(function () {
        var display = $('#cabas').css("display");
        $('#cabas').empty();
        $('#cabas').load('index.php?action=cabas&display=' + display, function () {
            console.log("Cabas Loaded!");
        });
    });
</script>