<?php

include('conexao.php');

$sql_code_states = "SELECT * FROM estado ORDER BY nome_estado ASC"; 
$sql_query_states = $conn->query($sql_code_states) or die($conn->error);
?>

<form method="GET" action="">
    <select required name="estado">
    <option value="">Selecione um estado</option>
    <?php while($estado =$sql_query_states->fetch_assoc()) { ?>
        <option <?php if(isset($_GET['estado']) && $_GET['estado'] == $estado['estado_id']) echo "selected" ?> value="<?php echo $estado['estado_id']; ?>"><?php echo $estado['nome_estado'];?> </option>
   <?php } ?>
</select>
<?php if(isset($_GET['estado'])) { ?>
<select required name="cidade">
<option value="">selecione uma cidade</option>
<?php
$selected_states =$conn->real_escape_string($_GET['estado']);
$sql_code_cities = "SELECT * FROM cidades WHERE cidade_id = '$selected_states'";
$sql_query_cities = $conn->query($sql_code_cities) or die($conn->error);

while($cidade =$sql_query_cities->fetch_assoc()) { ?>
    <option value="><?php echo $cidade['cidade_id']; ?>"><?php echo $cidade['nome_cidade']; ?></option>
    <?php } ?>
</select>
<?php }?>
    <button type="submit">Avançar</button>
</form>