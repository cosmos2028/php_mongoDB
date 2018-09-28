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
  <div id="header"></div>
  <div class="widget center">

  <div class="blur"></div>

  <div class="text center">
    <h1 class="">Paname Vert</h1>
  </div>

</div>
  <div id="tb" style="padding:3px;">
    <span>Libelle Français:</span>
    <input id="libellefrancais" style="line-height:26px;border:1px solid #ccc; border-radius: 5px;">
    <span>Adresse:</span>
    <input id="adresse" style="line-height:26px;border:1px solid #ccc; border-radius: 5px;">
    <span>Espece:</span>
    <input id="espece" style="line-height:26px;border:1px solid #ccc; border-radius: 5px;">
    <a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearch()">Search</a>
  </div>

  <table id="dg" title="Les arbres à Paname" class="easyui-datagrid" style="width:100%;height:650px"
          url="get_arbres.php"
          toolbar="#toolbar"
          rownumbers="true" fitColumns="true" singleSelect="true"
          pagination="true"
          >
      <thead>
          <tr>
              <th field="_id" width="50">_id</th>
              <th field="objectid" width="50">Objectid</th>
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
      <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Suprimer Arbre</a>
      <a href="arbre_map.php" class="easyui-linkbutton c1" style="width:120px">Voir sur la carte</a>
  </div>

  <!--//////////////DIALOG//////////////-->

  <div id="dlg" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px"
        closed="true" buttons="#dlg-buttons">
    <div class="ftitle">Information</div>
    <form id="fm" method="post" novalidate>
      <div class="fitem">
          <label>_id:</label>
          <input name="_id" class="easyui-textbox" readonly="true">
      </div>
      <div class="fitem">
          <label>ObjectID:</label>
          <input name="objectid" class="easyui-textbox" readonly="true" type="number">
      </div>
        <div class="fitem">
            <label>Libelle Français:</label>
            <input name="libellefrancais" class="easyui-textbox" required="true">
        </div>
        <div class="fitem">
            <label>Adresse:</label>
            <input name="adresse" class="easyui-textbox" required="true">
        </div>
        <div class="fitem">
            <label>Espece:</label>
            <input name="espece" class="easyui-textbox" required="true">
        </div>
        <div class="fitem">
            <label>Hauteure en M.:</label>
            <input type="number" name="hauteurenm" class="easyui-textbox" validType="numbers" required="true">
        </div>
    </form>
</div>
<div id="dlg-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveArbre()" style="width:90px">Save</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
</div>
</body>
</html>
