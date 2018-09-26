<?php
require_once "vendor/autoload.php";
//require(__DIR__.'/vendor/mongodb/src/Database.php');
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Paname Vert</title>
  <?php include 'view/base.php';?>
</head>
<body>
  <div id="tb" style="padding:3px">
    <span>Libelle Français:</span>
    <input id="libellefrancais" style="line-height:26px;border:1px solid #ccc">
    <span>Adresse:</span>
    <input id="adresse" style="line-height:26px;border:1px solid #ccc">
    <a href="#" class="easyui-linkbutton" plain="true" onclick="doSearch()">Search</a>
  </div>

  <table id="dg" title="Les arbres à Paname" class="easyui-datagrid" style="width:100%;height:650px"
          url="get_arbres.php"
          toolbar="#toolbar"
          rownumbers="true" fitColumns="true" singleSelect="true"
          pagination="true"
          >
      <thead>
          <tr>
              <th field="libellefrancais" width="50">Libelle Français</th>
              <th field="adresse" width="50">Adresse</th>
              <th field="espece" width="50">Espece</th>
              <th field="hauteurenm" width="50">Hauteure en M.</th>
          </tr>
      </thead>
  </table>
  <div id="toolbar">
      <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newArbre()">Ajouter Arbre</a>
      <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editArbre()">Editer Arbre</a>
      <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyArbre()">Suprimer Arbre</a>
  </div>
</body>
</html>
