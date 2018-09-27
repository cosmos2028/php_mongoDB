function doSearch(){
      $('#dg').datagrid('load',{
          libellefrancais: $('#libellefrancais').val(),
          adresse: $('#adresse').val()
      });
}

function newArbre(){
    $('#dlg').dialog('open').dialog('setTitle','New User');
    $('#fm').form('clear');
    url = 'save_user.php';
}

function editArbre(){
  var row = $('#dg').datagrid('getSelected');
  if (row){
    $('#dlg').dialog('open').dialog('setTitle','Editer Arbre');
    $('#fm').form('load',row);
      url = 'update_arbre.php?id='+row.id;
  }
}

function saveArbre(){
    $('#fm').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.errorMsg){
                $.messager.show({
                    title: 'Error',
                    msg: result.errorMsg
                });
            } else {
                $('#dlg').dialog('close');        // close the dialog
                $('#dg').datagrid('reload');    // reload the user data
            }
        }
    })};


    //function formatColumn(colName, value,row){
    //  console.log("row");
    //  return "row."+colName;
    //}
