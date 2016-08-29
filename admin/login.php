<?php
    function show_form(){
        echo '
        <form action="index.php" method="post">
<table width="366" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor="#787878">
<tr>
<td width="358" height="121" valign="middle" bgcolor="#FFFFFF">
<table width="358" height="126" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" bordercolor="#787878">
<tr bgcolor="#2872ae">
<td height="18" colspan="3">
<div align="center" class="Estilo4 Estilo4 Estilo10 Estilo3 Estilo1">COCPanel 1.0</div>
</td>
</tr>
<tr bgcolor="#FFFFFF">
<td width="25" height="36"> </td>
<td width="150" class="Estilo5 Estilo10">Username:</td>
<td width="183"><input name="username" type="text" id="user" size="20" maxlength="20" /></td>
</tr>
<tr bgcolor="#FFFFFF">
<td height="36"> </td>
<td class="Estilo5 Estilo10">Password:</td>
<td><input type="password" name="password" size="20" maxlength="20" /></td>
</tr>
<tr >
<td colspan="2">
<div align="center">
                                    <input name="entrar2" type="reset" id="limpiar" value="Reset" style="width:100px;font-size:15px;color:#ffffff;background:#999999" class="cursor" />
                                </div>
</td>
<td>
<div align="center">
                                    <input name="entrar" type="submit" id="entrar" value="Go" style="width:100px;font-size:15px;color:#ffffff;background:#999999" class="cursor" />
                                </div>
</td>
</tr>
</table>
</td>
</tr>
</table>
</form>';
    }
?>