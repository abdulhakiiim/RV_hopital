<?php require_once'view/head.php';
    foreach($donne as $rv ){
           $rv[0];
    }
?>

<body class="card text-white bg-info" >
<div class="container col-md-5 col-md-offset-2">
    <div class="panel panel-info">
    <div class="panel-heading">Ajout Medcin  </div>
    <div class="panel-body">
    <form action="<?php echo URL.'RendezVous/update';?>"   method="post">
    <div class="form-group">
    <label for="" class="form control-label">ID Rv</label>
    <input type="text" class="form-control" name="idRv" value="<?= $rv[0]?>" readonly>
    </div>
    <div class="form-group">
    <label for="" class="form control-label">Heure Rv</label>
    <input type="time" class="form-control" name="heureRv"  value="<?= $rv[1]?>">
    </div>
    <div class="form-group">
    <label for="" class="form control-label">Date Rv</label>
    <input type="date" class="form-control" name="dateRv"  value="<?= $rv[2]?>">
    </div>
    <div class="form-group">
    <label for="" class="form control-label">Nom Medecin</label>
    <select name="nomM" id="nomM">
    <?php
    foreach($data as $med ){
    foreach($med as $medecin){
      ?>
        <option value="<?php  echo $medecin[0];?>"><?=$medecin[1]?></option>
        <?php
      
    }
}
?>
    </select>
    </div>
    <div class="form-group">
    <label for="" class="form control-label">Nom Patient</label>
    <select name="nomP" id="nomp">
    <?php 
    foreach($dat as $pat ){
    foreach($pat as $patient){
        ?>
     <option value="<?= $patient[0]?>"><?=$patient[1]?></option>
     <?php
    }
}
  ?>  
    </select>
    </div>

    <input type="submit" value="Modifier" name="Modifier"  class="btn btn-primary">
    <button type="reset" class="btn btn-warning"> Annuler</button>

    </form>
    </div>
    </div>
    </div>
    </div>
    <div>
  

</body>
</html>