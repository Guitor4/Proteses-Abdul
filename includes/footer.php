<script src="js/JQuery2.min.js"></script>

<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/protetico.js"></script>
<script type='text/javascript' src='FullCalendar/main.min.js'></script>
<script type='text/javascript' src='FullCalendar/javascript.js'></script>

<script src="bootstrap-select-1.14-dev/js/bootstrap-select.js"></script>

<script>
    $(function() {
        $("#datepicker").datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0
        });
    });
</script>
<script type="text/javascript">
    function habilitar() {
        if (document.getElementById('denteOuro').checked) {
            document.getElementById('qtdOuro').removeAttribute("disabled");
        } else {
            document.getElementById('qtdOuro').value = "";
            document.getElementById('qtdOuro').setAttribute("disabled", "disabled");
        }
    }
</script>
<?php
if (isset($calendario)) {
    echo $calendario;
}
?>



</body>

</html>